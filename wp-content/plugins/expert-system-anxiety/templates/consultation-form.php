<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konsultasi Kecemasan Remaja</title>
    <?php wp_head(); ?>
    <style>
        .consultation-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        
        .consultation-header {
            text-align: center;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .symptom-question {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .symptom-question label {
            font-weight: 500;
            color: #444;
            margin-bottom: 10px;
            display: block;
        }
        
        .cf-scale {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        
        .cf-slider {
            flex: 1;
            margin-right: 15px;
        }
        
        .cf-value {
            background: #667eea;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            min-width: 40px;
            text-align: center;
            font-weight: bold;
        }
        
        .cf-labels {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: transform 0.2s;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
        }
        
        .diagnosis-result {
            background: #e8f5e8;
            border: 1px solid #4caf50;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .diagnosis-result h3 {
            color: #2e7d32;
            margin-top: 0;
        }
        
        .percentage-display {
            background: #f0f8ff;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        
        .percentage-value {
            font-size: 24px;
            font-weight: bold;
            color: #1976d2;
        }
        
        .confidence-bar {
            background: #e0e0e0;
            height: 20px;
            border-radius: 10px;
            overflow: hidden;
            margin: 10px 0;
        }
        
        .confidence-fill {
            height: 100%;
            background: linear-gradient(90deg, #4caf50, #2196f3);
            transition: width 0.5s ease;
        }
    </style>
</head>
<body <?php body_class(); ?>>

<?php
// Handle form submission
if (isset($_POST['submit_consultation']) && wp_verify_nonce($_POST['consultation_nonce'], 'consultation_submit')) {
    global $wpdb;
    
    // Get user data
    $name = sanitize_text_field($_POST['name']);
    $age = intval($_POST['age']);
    $gender = sanitize_text_field($_POST['gender']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $school = sanitize_text_field($_POST['school']);
    
    // Insert consultation record
    $consultation_id = $wpdb->insert(
        $wpdb->prefix . 'sp_consultations',
        array(
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'school' => $school,
            'consultation_date' => current_time('mysql'),
            'status' => 'completed'
        ),
        array('%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s')
    );
    
    if ($consultation_id) {
        // Get user answers and calculate CF
        $symptoms = $_POST['symptoms'];
        $user_answers = array();
        
        foreach ($symptoms as $symptom_id => $cf_user) {
            if ($cf_user > 0) {
                // Insert user answer
                $wpdb->insert(
                    $wpdb->prefix . 'sp_user_answers',
                    array(
                        'consultation_id' => $consultation_id,
                        'symptom_id' => $symptom_id,
                        'cf_user' => floatval($cf_user),
                        'created_at' => current_time('mysql')
                    ),
                    array('%d', '%d', '%f', '%s')
                );
                
                $user_answers[$symptom_id] = floatval($cf_user);
            }
        }
        
        // Get diseases and calculate diagnosis
        $diseases = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sp_diseases");
        $diagnosis_results = array();
        
        foreach ($diseases as $disease) {
            // Get rules for this disease
            $rules = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM {$wpdb->prefix}sp_rules WHERE disease_id = %d",
                    $disease->id
                )
            );
            
            if (empty($rules)) continue;
            
            $cf_combine = 0;
            $matched_symptoms = 0;
            $total_symptoms = count($rules);
            
            foreach ($rules as $rule) {
                if (isset($user_answers[$rule->symptom_id])) {
                    $cf_expert = floatval($rule->cf_expert);
                    $cf_user = $user_answers[$rule->symptom_id];
                    $cf_result = $cf_expert * $cf_user;
                    
                    if ($cf_combine == 0) {
                        $cf_combine = $cf_result;
                    } else {
                        $cf_combine = $cf_combine + $cf_result * (1 - $cf_combine);
                    }
                    
                    $matched_symptoms++;
                }
            }
            
            // Calculate percentage
            $percentage = $cf_combine * 100;
            
            if ($percentage > 0) {
                $diagnosis_results[] = array(
                    'disease' => $disease,
                    'cf_result' => $cf_combine,
                    'percentage' => $percentage,
                    'matched_symptoms' => $matched_symptoms,
                    'total_symptoms' => $total_symptoms
                );
            }
        }
        
        // Sort by CF result (highest first)
        usort($diagnosis_results, function($a, $b) {
            return $b['cf_result'] <=> $a['cf_result'];
        });
        
        // Save diagnosis results with percentage and rank
        foreach ($diagnosis_results as $rank => $result) {
            $wpdb->insert(
                $wpdb->prefix . 'sp_diagnosis_results',
                array(
                    'consultation_id' => $consultation_id,
                    'disease_id' => $result['disease']->id,
                    'cf_result' => $result['cf_result'],
                    'percentage' => $result['percentage'],
                    'rank_position' => $rank + 1,
                    'matched_symptoms' => $result['matched_symptoms'],
                    'total_symptoms' => $result['total_symptoms'],
                    'created_at' => current_time('mysql')
                ),
                array('%d', '%d', '%f', '%f', '%d', '%d', '%d', '%s')
            );
        }
    }
}
?>

<div class="consultation-container">
    <div class="consultation-header">
        <h1>Sistem Pakar Kecemasan Remaja</h1>
        <p>Silakan isi data diri Anda dan jawab pertanyaan berikut dengan jujur</p>
    </div>

    <?php if (isset($diagnosis_results) && !empty($diagnosis_results)): ?>
    <div class="diagnosis-result">
        <h3>Hasil Diagnosis</h3>
        
        <?php foreach ($diagnosis_results as $index => $result): ?>
        <div class="diagnosis-item" style="margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 6px;">
            <h4 style="margin-top: 0; color: #333;">
                Peringkat <?php echo $index + 1; ?>: <?php echo esc_html($result['disease']->name); ?>
            </h4>
            
            <div class="percentage-display">
                <div>Tingkat Keyakinan:</div>
                <div class="percentage-value"><?php echo number_format($result['percentage'], 2); ?>%</div>
                <div class="confidence-bar">
                    <div class="confidence-fill" style="width: <?php echo $result['percentage']; ?>%;"></div>
                </div>
                <small>CF Value: <?php echo number_format($result['cf_result'], 4); ?></small>
            </div>
            
            <p><strong>Deskripsi:</strong> <?php echo esc_html($result['disease']->description); ?></p>
            <p><strong>Solusi:</strong> <?php echo esc_html($result['disease']->solutions); ?></p>
            <p><small>Gejala yang cocok: <?php echo $result['matched_symptoms']; ?> dari <?php echo $result['total_symptoms']; ?> gejala</small></p>
        </div>
        <?php endforeach; ?>
        
        <div style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 6px; margin-top: 20px;">
            <strong>Disclaimer:</strong> Hasil ini hanya sebagai panduan awal dan tidak menggantikan diagnosis profesional. 
            Untuk penanganan yang tepat, silakan konsultasi dengan psikolog atau dokter yang kompeten.
        </div>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="submit-btn" style="display: inline-block; text-decoration: none;">
                Konsultasi Lagi
            </a>
        </div>
    </div>
    <?php else: ?>

    <form method="post" action="" class="consultation-form">
        <?php wp_nonce_field('consultation_submit', 'consultation_nonce'); ?>
        
        <!-- Data Diri -->
        <div class="form-section">
            <h3>Data Diri</h3>
            <div class="form-group">
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="age">Umur:</label>
                <input type="number" id="age" name="age" min="10" max="25" required>
            </div>
            
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="">Pilih...</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            
            <div class="form-group">
                <label for="phone">No. Telepon:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            
            <div class="form-group">
                <label for="school">Sekolah:</label>
                <input type="text" id="school" name="school">
            </div>
        </div>

        <!-- Pertanyaan Gejala -->
        <div class="form-section">
            <h3>Pertanyaan Gejala</h3>
            <p>Berikan nilai keyakinan Anda terhadap gejala berikut (0 = Tidak Yakin, 1 = Sangat Yakin):</p>
            
            <?php
            global $wpdb;
            $symptoms = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sp_symptoms ORDER BY id");
            
            foreach ($symptoms as $symptom): ?>
            <div class="symptom-question">
                <label><?php echo esc_html($symptom->symptom); ?></label>
                <div class="cf-scale">
                    <input type="range" 
                           name="symptoms[<?php echo $symptom->id; ?>]" 
                           min="0" 
                           max="1" 
                           step="0.1" 
                           value="0"
                           class="cf-slider"
                           data-symptom-id="<?php echo $symptom->id; ?>">
                    <div class="cf-value">0.0</div>
                </div>
                <div class="cf-labels">
                    <span>Tidak Yakin</span>
                    <span>Sangat Yakin</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="form-submit">
            <input type="submit" name="submit_consultation" value="Submit Konsultasi" class="submit-btn">
        </div>
    </form>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update CF values in real-time
    const sliders = document.querySelectorAll('.cf-slider');
    
    sliders.forEach(function(slider) {
        const valueDisplay = slider.parentNode.querySelector('.cf-value');
        
        slider.addEventListener('input', function() {
            valueDisplay.textContent = parseFloat(this.value).toFixed(1);
        });
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>