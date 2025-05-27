<?php
/**
 * Template untuk halaman penyakit/gangguan kecemasan - WordPress Integration
 * File: templates/diseases-page.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Fungsi untuk mendapatkan data penyakit dari database
function get_diseases_data() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'sp_diseases';
    
    $diseases = $wpdb->get_results(
        "SELECT * FROM $table_name ORDER BY code ASC",
        ARRAY_A
    );
    
    return $diseases;
}

// Fungsi shortcode untuk halaman penyakit
function diseases_page_shortcode($atts) {
    $atts = shortcode_atts(array(
        'show_search' => 'true',
        'show_stats' => 'true',
        'show_solutions' => 'true',
        'layout' => 'grid' // grid atau list
    ), $atts);
    
    ob_start();
    
    $diseases = get_diseases_data();
    ?>
    
    <div id="esa-diseases-container">
        <!-- Inline CSS untuk styling -->
        <style>
            #esa-diseases-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            }
            
            .esa-diseases-header {
                color: black;
                padding: 40px 30px;
                border-radius: 15px;
                text-align: center;
                margin-bottom: 30px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            }
            
            .esa-diseases-header h1 {
                font-size: 2.5em;
                margin: 0 0 15px 0;
                font-weight: 600;
            }
            
            .esa-diseases-header p {
                font-size: 1.1em;
                opacity: 0.9;
                margin: 0;
                line-height: 1.6;
            }
            
            .esa-diseases-search-container {
                background: white;
                border-radius: 15px;
                padding: 25px;
                margin-bottom: 30px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                border: 1px solid #e2e8f0;
            }
            
            .esa-diseases-search-box {
                width: 100%;
                padding: 15px 20px;
                border: 2px solid #e2e8f0;
                border-radius: 25px;
                font-size: 1.1em;
                outline: none;
                transition: all 0.3s ease;
            }
            
            .esa-diseases-search-box:focus {
                border-color: #e53e3e;
                box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
            }
            
            .esa-diseases-stats {
                background: white;
                border-radius: 15px;
                padding: 25px;
                text-align: center;
                margin-bottom: 30px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                border: 1px solid #e2e8f0;
            }
            
            .esa-diseases-stats h3 {
                color: #4a5568;
                margin: 0 0 10px 0;
                font-size: 1.2em;
            }
            
            .esa-diseases-stats-number {
                font-size: 2.5em;
                font-weight: bold;
                color: #e53e3e;
                margin: 0;
            }
            
            .esa-diseases-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
                gap: 25px;
                margin-bottom: 30px;
            }
            
            .esa-disease-card {
                background: white;
                border-radius: 15px;
                padding: 30px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
                border-left: 5px solid #e53e3e;
                border: 1px solid #e2e8f0;
                position: relative;
                overflow: hidden;
            }
            
            .esa-disease-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            }
            
            .esa-disease-card::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 100px;
                height: 100px;
                background: linear-gradient(135deg, rgba(229, 62, 62, 0.1), rgba(252, 129, 129, 0.05));
                border-radius: 0 0 0 100px;
            }
            
            .esa-disease-code {
                background: #e53e3e;
                color: white;
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 0.9em;
                font-weight: 600;
                display: inline-block;
                margin-bottom: 15px;
            }
            
            .esa-disease-name {
                font-size: 1.4em;
                font-weight: 700;
                color: #2d3748;
                margin-bottom: 15px;
                line-height: 1.3;
            }
            
            .esa-disease-description {
                font-size: 1em;
                line-height: 1.6;
                color: #4a5568;
                margin-bottom: 20px;
            }
            
            .esa-disease-solutions {
                background: #f7fafc;
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 15px;
                border-left: 3px solid #4299e1;
            }
            
            .esa-disease-solutions h4 {
                color: #2b6cb0;
                margin: 0 0 10px 0;
                font-size: 1em;
                font-weight: 600;
            }
            
            .esa-disease-solutions p {
                margin: 0;
                color: #4a5568;
                font-size: 0.95em;
                line-height: 1.5;
            }
            
            .esa-disease-meta {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.85em;
                color: #718096;
                border-top: 1px solid #e2e8f0;
                padding-top: 15px;
            }
            
            .esa-severity-badge {
                padding: 4px 10px;
                border-radius: 12px;
                font-size: 0.8em;
                font-weight: 600;
                text-transform: uppercase;
            }
            
            .severity-mild {
                background: #c6f6d5;
                color: #22543d;
            }
            
            .severity-moderate {
                background: #feebc8;
                color: #744210;
            }
            
            .severity-severe {
                background: #fed7d7;
                color: #742a2a;
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
            
            .esa-category-filter {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-bottom: 30px;
                flex-wrap: wrap;
            }
            
            .esa-filter-btn {
                background: white;
                border: 2px solid #e2e8f0;
                padding: 10px 20px;
                border-radius: 25px;
                color: #4a5568;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
                cursor: pointer;
            }
            
            .esa-filter-btn:hover,
            .esa-filter-btn.active {
                background: #e53e3e;
                border-color: #e53e3e;
                color: white;
                text-decoration: none;
            }
            
            @media (max-width: 768px) {
                #esa-diseases-container {
                    padding: 15px;
                }
                
                .esa-diseases-header h1 {
                    font-size: 2em;
                }
                
                .esa-diseases-grid {
                    grid-template-columns: 1fr;
                }
                
                .esa-category-filter {
                    justify-content: flex-start;
                    overflow-x: auto;
                    padding-bottom: 10px;
                }
            }
        </style>
        
        <!-- Header -->
        <div class="esa-diseases-header">
            <h1>Jenis Gangguan Kecemasan</h1>
            <p>Pelajari berbagai jenis gangguan kecemasan mental yang umum dialami remaja, beserta deskripsi dan solusi penanganannya untuk membantu proses pemahaman dan penanganan yang tepat.</p>
        </div>
        
        <!-- Category Filter -->
        <div class="esa-category-filter">
            <button class="esa-filter-btn active" data-category="all">Semua Gangguan</button>
            <button class="esa-filter-btn" data-category="umum">Kecemasan Umum</button>
            <button class="esa-filter-btn" data-category="sosial">Kecemasan Sosial</button>
            <button class="esa-filter-btn" data-category="panik">Gangguan Panik</button>
            <button class="esa-filter-btn" data-category="fobia">Fobia Spesifik</button>
            <button class="esa-filter-btn" data-category="perpisahan">Kecemasan Perpisahan</button>
        </div>
        
        <?php if ($atts['show_search'] === 'true'): ?>
        <!-- Search Container -->
        <div class="esa-diseases-search-container">
            <input type="text" class="esa-diseases-search-box" placeholder="Cari gangguan berdasarkan nama, kode, atau deskripsi..." id="esaDiseasesSearchBox">
        </div>
        <?php endif; ?>
        
        <?php if ($atts['show_stats'] === 'true'): ?>
        <!-- Stats -->
        <div class="esa-diseases-stats">
            <h3>Total Jenis Gangguan Kecemasan</h3>
            <div class="esa-diseases-stats-number" id="esaTotalDiseases"><?php echo count($diseases); ?></div>
        </div>
        <?php endif; ?>
        
        <!-- Diseases Grid -->
        <div class="esa-diseases-grid" id="esaDiseasesGrid">
            <?php if (!empty($diseases)): ?>
                <?php foreach ($diseases as $disease): ?>
                    <?php 
                    // Determine category based on name
                    $category = 'umum';
                    $name_lower = strtolower($disease['name']);
                    if (strpos($name_lower, 'sosial') !== false) $category = 'sosial';
                    elseif (strpos($name_lower, 'panik') !== false) $category = 'panik';
                    elseif (strpos($name_lower, 'fobia') !== false) $category = 'fobia';
                    elseif (strpos($name_lower, 'perpisahan') !== false) $category = 'perpisahan';
                    
                    // Determine severity
                    $severity = 'moderate';
                    if (strpos($name_lower, 'ringan') !== false) $severity = 'mild';
                    elseif (strpos($name_lower, 'berat') !== false || strpos($name_lower, 'panik') !== false) $severity = 'severe';
                    ?>
                    <div class="esa-disease-card" 
                         data-code="<?php echo esc_attr($disease['code']); ?>" 
                         data-name="<?php echo esc_attr($disease['name']); ?>"
                         data-description="<?php echo esc_attr($disease['description']); ?>"
                         data-category="<?php echo esc_attr($category); ?>">
                        
                        <div class="esa-disease-code"><?php echo esc_html($disease['code']); ?></div>
                        <div class="esa-disease-name"><?php echo esc_html($disease['name']); ?></div>
                        <div class="esa-disease-description"><?php echo esc_html($disease['description']); ?></div>
                        
                        <?php if ($atts['show_solutions'] === 'true' && !empty($disease['solutions'])): ?>
                        <div class="esa-disease-solutions">
                            <h4>💡 Solusi & Penanganan</h4>
                            <p><?php echo esc_html($disease['solutions']); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <div class="esa-disease-meta">
                            <span>
                                <span class="esa-severity-badge severity-<?php echo $severity; ?>">
                                    <?php echo ucfirst($severity); ?>
                                </span>
                            </span>
                            <span>📅 <?php echo date('d M Y', strtotime($disease['created_at'])); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="esa-no-results">
                    <div class="esa-no-results-icon">😔</div>
                    <p>Belum ada data gangguan kecemasan yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- No Results Message (Hidden by default) -->
        <div class="esa-no-results" id="esaDiseasesNoResults" style="display: none;">
            <div class="esa-no-results-icon">🔍</div>
            <p>Tidak ada gangguan yang sesuai dengan pencarian atau filter Anda.</p>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchBox = document.getElementById('esaDiseasesSearchBox');
        const diseasesGrid = document.getElementById('esaDiseasesGrid');
        const totalDiseases = document.getElementById('esaTotalDiseases');
        const noResults = document.getElementById('esaDiseasesNoResults');
        const allCards = document.querySelectorAll('.esa-disease-card');
        const filterBtns = document.querySelectorAll('.esa-filter-btn');
        
        let activeCategory = 'all';
        let activeSearch = '';
        
        // Filter by category
        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                activeCategory = this.getAttribute('data-category');
                filterCards();
            });
        });
        
        // Search functionality
        if (searchBox) {
            searchBox.addEventListener('input', function() {
                activeSearch = this.value.toLowerCase().trim();
                filterCards();
            });
        }
        
        function filterCards() {
            let visibleCount = 0;
            
            allCards.forEach(function(card) {
                const code = card.getAttribute('data-code').toLowerCase();
                const name = card.getAttribute('data-name').toLowerCase();
                const description = card.getAttribute('data-description').toLowerCase();
                const category = card.getAttribute('data-category');
                
                const matchesSearch = activeSearch === '' || 
                                    code.includes(activeSearch) || 
                                    name.includes(activeSearch) || 
                                    description.includes(activeSearch);
                
                const matchesCategory = activeCategory === 'all' || category === activeCategory;
                
                if (matchesSearch && matchesCategory) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Update total count
            if (totalDiseases) {
                totalDiseases.textContent = visibleCount;
            }
            
            // Show/hide no results message
            if (visibleCount === 0) {
                diseasesGrid.style.display = 'none';
                noResults.style.display = 'block';
            } else {
                diseasesGrid.style.display = 'grid';
                noResults.style.display = 'none';
            }
        }
        
        // Animation for cards
        allCards.forEach(function(card, index) {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(function() {
                card.style.transition = 'all 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 150);
        });
    });
    </script>
    
    <?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('diseases_page', 'diseases_page_shortcode');

// Tambahkan fungsi untuk AJAX search (opsional)
add_action('wp_ajax_esa_search_diseases', 'esa_search_diseases_ajax');
add_action('wp_ajax_nopriv_esa_search_diseases', 'esa_search_diseases_ajax');

function esa_search_diseases_ajax() {
    global $wpdb;
    
    $search_term = sanitize_text_field($_POST['search_term']);
    $category = sanitize_text_field($_POST['category']);
    $table_name = $wpdb->prefix . 'sp_diseases';
    
    $where_conditions = array();
    $prepare_values = array();
    
    if (!empty($search_term)) {
        $where_conditions[] = "(code LIKE %s OR name LIKE %s OR description LIKE %s)";
        $prepare_values[] = '%' . $search_term . '%';
        $prepare_values[] = '%' . $search_term . '%';
        $prepare_values[] = '%' . $search_term . '%';
    }
    
    if (!empty($category) && $category !== 'all') {
        $where_conditions[] = "name LIKE %s";
        $prepare_values[] = '%' . $category . '%';
    }
    
    $where_clause = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';
    
    $query = "SELECT * FROM $table_name $where_clause ORDER BY code ASC";
    
    if (!empty($prepare_values)) {
        $diseases = $wpdb->get_results(
            $wpdb->prepare($query, $prepare_values),
            ARRAY_A
        );
    } else {
        $diseases = $wpdb->get_results($query, ARRAY_A);
    }
    
    wp_send_json_success($diseases);
}

// Fungsi untuk menambah menu admin
add_action('admin_menu', 'esa_add_diseases_admin_menu');

function esa_add_diseases_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=page',
        'Gangguan Kecemasan',
        'Gangguan Kecemasan',
        'manage_options',
        'esa-diseases',
        'esa_diseases_admin_page'
    );
}

function esa_diseases_admin_page() {
    $diseases = get_diseases_data();
    ?>
    <div class="wrap">
        <h1>Manajemen Gangguan Kecemasan</h1>
        <p>Berikut adalah daftar jenis gangguan kecemasan yang tersedia dalam sistem:</p>
        
        <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ddd;">
            <h3>📊 Statistik</h3>
            <p><strong>Total Gangguan:</strong> <?php echo count($diseases); ?> jenis</p>
        </div>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th style="width: 80px;">Kode</th>
                    <th style="width: 200px;">Nama Gangguan</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th style="width: 120px;">Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diseases as $disease): ?>
                <tr>
                    <td><strong style="color: #e53e3e;"><?php echo esc_html($disease['code']); ?></strong></td>
                    <td><strong><?php echo esc_html($disease['name']); ?></strong></td>
                    <td><?php echo esc_html(substr($disease['description'], 0, 100)); ?><?php echo strlen($disease['description']) > 100 ? '...' : ''; ?></td>
                    <td><?php echo esc_html(substr($disease['solutions'], 0, 80)); ?><?php echo strlen($disease['solutions']) > 80 ? '...' : ''; ?></td>
                    <td><?php echo date('d M Y', strtotime($disease['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="margin-top: 20px; padding: 15px; background: #f0f0f1; border-radius: 5px;">
            <h3>🚀 Cara Penggunaan:</h3>
            <p>Untuk menampilkan halaman gangguan kecemasan di halaman atau post, gunakan shortcode berikut:</p>
            <code>[diseases_page]</code>
            <br><br>
            <p><strong>Opsi kustomisasi:</strong></p>
            <ul>
                <li><code>[diseases_page show_search="false"]</code> - Sembunyikan fitur pencarian</li>
                <li><code>[diseases_page show_stats="false"]</code> - Sembunyikan statistik</li>
                <li><code>[diseases_page show_solutions="false"]</code> - Sembunyikan bagian solusi</li>
                <li><code>[diseases_page show_search="false" show_stats="false"]</code> - Tampilan minimal</li>
            </ul>
        </div>
    </div>
    <?php
}
?>