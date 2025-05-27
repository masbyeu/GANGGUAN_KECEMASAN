<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Konsultasi</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$consultation_id = get_query_var('consultation_id');
global $wpdb;

// Get consultation data
$consultation = $wpdb->get_row($wpdb->prepare("
    SELECT * FROM {$wpdb->prefix}sp_consultations 
    WHERE id = %d
", $consultation_id));

// Get all diagnosis results - ordered by percentage descending to get highest first
$results = $wpdb->get_results($wpdb->prepare("
    SELECT dr.*, d.name as disease_name, d.description, d.solutions
    FROM {$wpdb->prefix}sp_diagnosis_results dr
    JOIN {$wpdb->prefix}sp_diseases d ON dr.disease_id = d.id
    WHERE dr.consultation_id = %d
    ORDER BY dr.percentage DESC
", $consultation_id));

// Get only the highest percentage result
$highest_result = !empty($results) ? $results[0] : null;
?>

<div class="result-container">
    <div class="result-header">
        <h1>Hasil Konsultasi Kecemasan</h1>
        <div class="consultation-info">
            <p><strong>Nama:</strong> <?php echo esc_html($consultation->name); ?></p>
            <p><strong>Tanggal:</strong> <?php echo date('d/m/Y H:i', strtotime($consultation->consultation_date)); ?></p>
        </div>
    </div>

    <div class="diagnosis-results">
        <h2>Hasil Diagnosa</h2>
        
        <?php if ($highest_result): ?>
            <div class="diagnosis-item primary-diagnosis">
                <div class="diagnosis-header">
                    <h3><?php echo esc_html($highest_result->disease_name); ?></h3>
                    <div class="confidence-score">
                        <span class="percentage"><?php echo number_format($highest_result->percentage ?: 0, 1); ?>%</span>
                    </div>
                </div>
                
                <div class="diagnosis-body">
                    <div class="description">
                        <h4>Deskripsi:</h4>
                        <p><?php echo nl2br(esc_html($highest_result->description)); ?></p>
                    </div>
                    
                    <?php if ($highest_result->solutions): ?>
                    <div class="solutions">
                        <h4>Saran dan Solusi:</h4>
                        <p><?php echo nl2br(esc_html($highest_result->solutions)); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?php echo $highest_result->percentage ?: 0; ?>%"></div>
                </div>
            </div>
            
        <?php else: ?>
            <div class="no-diagnosis">
                <p>Berdasarkan jawaban Anda, tidak ditemukan indikasi gangguan kecemasan yang signifikan.</p>
                <p>Namun, jika Anda merasa ada masalah, disarankan untuk berkonsultasi dengan profesional.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="result-actions">
        <a href="<?php echo home_url('/konsultasi'); ?>" class="btn btn-secondary">Konsultasi Lagi</a>
        <button onclick="window.print()" class="btn btn-primary">Cetak Hasil</button>
    </div>
    
    <div class="disclaimer">
        <h4>Disclaimer:</h4>
        <p>Hasil ini hanya sebagai panduan awal dan tidak menggantikan diagnosa profesional. 
           Untuk penanganan yang tepat, silakan konsultasi dengan psikolog atau dokter yang kompeten.</p>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
