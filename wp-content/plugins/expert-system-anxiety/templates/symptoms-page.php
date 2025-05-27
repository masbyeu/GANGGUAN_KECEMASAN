<?php
/**
 * Template untuk halaman gejala - WordPress Integration
 * File: templates/symptoms-page.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Fungsi untuk mendapatkan data gejala dari database
function get_symptoms_data() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'sp_symptoms';
    
    $symptoms = $wpdb->get_results(
        "SELECT * FROM $table_name ORDER BY code ASC",
        ARRAY_A
    );
    
    return $symptoms;
}

// Fungsi shortcode untuk halaman gejala
function symptoms_page_shortcode($atts) {
    $atts = shortcode_atts(array(
        'show_search' => 'true',
        'show_stats' => 'true',
        'columns' => '2'
    ), $atts);
    
    ob_start();
    
    $symptoms = get_symptoms_data();
    ?>
    
    <div id="esa-symptoms-container">
        <!-- Inline CSS untuk styling -->
        <style>
            #esa-symptoms-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            }
            
            .esa-header {
    color: black;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }
            
            .esa-header h1 {
                font-size: 2.5em;
                margin: 0 0 15px 0;
                font-weight: 600;
            }
            
            .esa-header p {
                font-size: 1.1em;
                opacity: 0.9;
                margin: 0;
                line-height: 1.6;
            }
            
            .esa-search-container {
                background: white;
                border-radius: 15px;
                padding: 25px;
                margin-bottom: 30px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                border: 1px solid #e2e8f0;
            }
            
            .esa-search-box {
                width: 100%;
                padding: 15px 20px;
                border: 2px solid #e2e8f0;
                border-radius: 25px;
                font-size: 1.1em;
                outline: none;
                transition: all 0.3s ease;
            }
            
            .esa-search-box:focus {
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }
            
            .esa-stats {
                background: white;
                border-radius: 15px;
                padding: 25px;
                text-align: center;
                margin-bottom: 30px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                border: 1px solid #e2e8f0;
            }
            
            .esa-stats h3 {
                color: #4a5568;
                margin: 0 0 10px 0;
                font-size: 1.2em;
            }
            
            .esa-stats-number {
                font-size: 2.5em;
                font-weight: bold;
                color: #667eea;
                margin: 0;
            }
            
            .esa-symptoms-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }
            
            .esa-symptom-card {
                background: white;
                border-radius: 15px;
                padding: 25px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
                border-left: 4px solid #667eea;
                border: 1px solid #e2e8f0;
            }
            
            .esa-symptom-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            }
            
            .esa-symptom-code {
                background: #667eea;
                color: white;
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 0.9em;
                font-weight: 600;
                display: inline-block;
                margin-bottom: 15px;
            }
            
            .esa-symptom-description {
                font-size: 1.1em;
                line-height: 1.6;
                color: #4a5568;
                margin-bottom: 15px;
                font-weight: 500;
            }
            
            .esa-symptom-meta {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.9em;
                color: #718096;
                border-top: 1px solid #e2e8f0;
                padding-top: 15px;
            }
            
            .esa-no-results {
                text-align: center;
                padding: 60px 20px;
                color: #718096;
                font-size: 1.1em;
            }
            
            .esa-no-results-icon {
                font-size: 3em;
                margin-bottom: 15px;
                opacity: 0.5;
            }
            
            @media (max-width: 768px) {
                #esa-symptoms-container {
                    padding: 15px;
                }
                
                .esa-header h1 {
                    font-size: 2em;
                }
                
                .esa-symptoms-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        
        <!-- Header -->
        <div class="esa-header">
            <h1>Gejala Kecemasan Mental</h1>
            <p>Kenali berbagai gejala yang dapat mengindikasikan adanya masalah kecemasan mental pada remaja. Informasi ini dapat membantu dalam proses diagnosa dini dan konsultasi.</p>
        </div>
        
        <?php if ($atts['show_search'] === 'true'): ?>
        <!-- Search Container -->
        <div class="esa-search-container">
            <input type="text" class="esa-search-box" placeholder="Cari gejala berdasarkan kode atau deskripsi..." id="esaSearchBox">
        </div>
        <?php endif; ?>
        
        <?php if ($atts['show_stats'] === 'true'): ?>
        <!-- Stats -->
        <div class="esa-stats">
            <h3>Total Gejala Teridentifikasi</h3>
            <div class="esa-stats-number" id="esaTotalSymptoms"><?php echo count($symptoms); ?></div>
        </div>
        <?php endif; ?>
        
        <!-- Symptoms Grid -->
        <div class="esa-symptoms-grid" id="esaSymptomsGrid">
            <?php if (!empty($symptoms)): ?>
                <?php foreach ($symptoms as $symptom): ?>
                    <div class="esa-symptom-card" data-code="<?php echo esc_attr($symptom['code']); ?>" data-description="<?php echo esc_attr($symptom['symptom']); ?>">
                        <div class="esa-symptom-code"><?php echo esc_html($symptom['code']); ?></div>
                        <div class="esa-symptom-description"><?php echo esc_html($symptom['symptom']); ?></div>
                        <div class="esa-symptom-meta">
                            <span>Ditambahkan: <?php echo date('d M Y', strtotime($symptom['created_at'])); ?></span>
                            <span>📋</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="esa-no-results">
                    <div class="esa-no-results-icon">😔</div>
                    <p>Belum ada data gejala yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- No Results Message (Hidden by default) -->
        <div class="esa-no-results" id="esaNoResults" style="display: none;">
            <div class="esa-no-results-icon">🔍</div>
            <p>Tidak ada gejala yang sesuai dengan pencarian Anda.</p>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchBox = document.getElementById('esaSearchBox');
        const symptomsGrid = document.getElementById('esaSymptomsGrid');
        const totalSymptoms = document.getElementById('esaTotalSymptoms');
        const noResults = document.getElementById('esaNoResults');
        const allCards = document.querySelectorAll('.esa-symptom-card');
        
        if (searchBox) {
            searchBox.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let visibleCount = 0;
                
                allCards.forEach(function(card) {
                    const code = card.getAttribute('data-code').toLowerCase();
                    const description = card.getAttribute('data-description').toLowerCase();
                    
                    if (code.includes(searchTerm) || description.includes(searchTerm)) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Update total count
                if (totalSymptoms) {
                    totalSymptoms.textContent = visibleCount;
                }
                
                // Show/hide no results message
                if (visibleCount === 0 && searchTerm !== '') {
                    symptomsGrid.style.display = 'none';
                    noResults.style.display = 'block';
                } else {
                    symptomsGrid.style.display = 'grid';
                    noResults.style.display = 'none';
                }
            });
        }
        
        // Animation for cards
        allCards.forEach(function(card, index) {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(function() {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
    </script>
    
    <?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('symptoms_page', 'symptoms_page_shortcode');

// Tambahkan fungsi untuk AJAX search (opsional)
add_action('wp_ajax_esa_search_symptoms', 'esa_search_symptoms_ajax');
add_action('wp_ajax_nopriv_esa_search_symptoms', 'esa_search_symptoms_ajax');

function esa_search_symptoms_ajax() {
    global $wpdb;
    
    $search_term = sanitize_text_field($_POST['search_term']);
    $table_name = $wpdb->prefix . 'sp_symptoms';
    
    $symptoms = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE code LIKE %s OR symptom LIKE %s ORDER BY code ASC",
            '%' . $search_term . '%',
            '%' . $search_term . '%'
        ),
        ARRAY_A
    );
    
    wp_send_json_success($symptoms);
}

// Fungsi untuk menambah menu admin (opsional)
add_action('admin_menu', 'esa_add_symptoms_admin_menu');

function esa_add_symptoms_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=page',
        'Gejala Kecemasan',
        'Gejala Kecemasan',
        'manage_options',
        'esa-symptoms',
        'esa_symptoms_admin_page'
    );
}

function esa_symptoms_admin_page() {
    $symptoms = get_symptoms_data();
    ?>
    <div class="wrap">
        <h1>Manajemen Gejala Kecemasan</h1>
        <p>Berikut adalah daftar gejala yang tersedia dalam sistem:</p>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Gejala</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($symptoms as $symptom): ?>
                <tr>
                    <td><strong><?php echo esc_html($symptom['code']); ?></strong></td>
                    <td><?php echo esc_html($symptom['symptom']); ?></td>
                    <td><?php echo date('d M Y H:i', strtotime($symptom['created_at'])); ?></td>
                    <td><?php echo date('d M Y H:i', strtotime($symptom['updated_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="margin-top: 20px; padding: 15px; background: #f0f0f1; border-radius: 5px;">
            <h3>Cara Penggunaan:</h3>
            <p>Untuk menampilkan halaman gejala di halaman atau post, gunakan shortcode berikut:</p>
            <code>[symptoms_page]</code>
            <br><br>
            <p>Dengan opsi tambahan:</p>
            <ul>
                <li><code>[symptoms_page show_search="false"]</code> - Sembunyikan fitur pencarian</li>
                <li><code>[symptoms_page show_stats="false"]</code> - Sembunyikan statistik</li>
                <li><code>[symptoms_page show_search="false" show_stats="false"]</code> - Tampilan minimal</li>
            </ul>
        </div>
    </div>
    <?php
}
?>