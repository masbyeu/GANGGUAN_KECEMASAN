<?php
// CSS Styling untuk Dashboard
?>
<style>
/* Dashboard Container */
.expert-system-dashboard {

    min-height: 100vh;
    padding: 0;
    margin: 0 -20px -10px -2px;
}

.dashboard-header {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    margin-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}
#wpcontent, #wpfooter {
    margin-left: 142px;
}

.dashboard-header h1 {
    color: black;
    margin: 0;
    font-size: 2.5em;
    font-weight: 300;
    text-align: center;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.dashboard-header p {
    color: black;
    text-align: center;
    margin: 10px 0 0 0;
    font-size: 1.1em;
}

.expert-system-admin {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 30px 30px 30px;
}

/* Statistics Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
}

.stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.stat-number {
    display: block;
font-size: 2em;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-label {
    font-size: 1.1em;
    color: #7f8c8d;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Dashboard Sections */
.dashboard-section {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.dashboard-section:hover {
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.dashboard-section h2 {
    color: #2c3e50;
    font-size: 1.8em;
    font-weight: 600;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #667eea;
    position: relative;
}

.dashboard-section h2::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 50px;
    height: 3px;
    background: #764ba2;
}

/* Table Styling */
.table-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.entries-control {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #6c757d;
}

.entries-control select {
    padding: 8px 12px;
    border: 2px solid #e9ecef;
    border-radius: 6px;
    background: white;
    color: #495057;
}

.search-box {
    position: relative;
}

.search-box input {
    padding: 10px 40px 10px 15px;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    width: 300px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.search-box input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-box .search-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.data-table thead tr {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.data-table th {
    padding: 18px 15px;
    text-align: left;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 1px;
}

.data-table td {
    padding: 15px;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: middle;
}

.data-table tbody tr {
    transition: all 0.3s ease;
}

.data-table tbody tr:hover {
    background-color: #f8f9ff;
    transform: scale(1.01);
}

.data-table tbody tr:nth-child(even) {
    background-color: #fdfdfd;
}

/* Buttons */
.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
    text-decoration: none;
    display: inline-block;
    margin: 2px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.btn-small {
    padding: 6px 12px;
    font-size: 12px;
}

.btn-edit {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    padding: 20px 0;
    border-top: 1px solid #eee;
}

.pagination-info {
    color: #6c757d;
    font-size: 14px;
    font-weight: 500;
}

.pagination {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 5px;
}

.pagination li {
    margin: 0;
}

.pagination a,
.pagination span {
    display: block;
    padding: 12px 16px;
    text-decoration: none;
    border: 2px solid #dee2e6;
    color: #495057;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
    min-width: 44px;
    text-align: center;
}

.pagination a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: #667eea;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.pagination .current {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: #667eea;
}

.pagination .disabled {
    color: #6c757d;
    background-color: #f8f9fa;
    border-color: #dee2e6;
    cursor: not-allowed;
}

/* Chart Container */
.chart-container {
    position: relative;
    height: 400px;
    margin-top: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
}

.chart-container canvas {
    max-height: 100%;
    border-radius: 8px;
}

/* Status Badge */
.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-high {
    background: #fee;
    color: #dc3545;
}

.status-medium {
    background: #fff3cd;
    color: #856404;
}

.status-low {
    background: #d4edda;
    color: #155724;
}

/* Loading Animation */
.loading {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #6c757d;
}

.empty-state-icon {
    font-size: 4em;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-state h3 {
    margin-bottom: 10px;
    color: #495057;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .expert-system-admin {
        padding: 0 20px 30px 20px;
    }
}

@media (max-width: 768px) {
    .expert-system-dashboard {
        margin: 0 -10px -10px -10px;
    }
    
    .dashboard-header {
        padding: 20px;
    }
    
    .dashboard-header h1 {
        font-size: 2em;
    }
    
    .expert-system-admin {
        padding: 0 15px 20px 15px;
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 2.5em;
    }
    
    .dashboard-section {
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .table-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box input {
        width: 100%;
    }
    
    .data-table {
        font-size: 14px;
    }
    
    .data-table th,
    .data-table td {
        padding: 12px 8px;
    }
    
    .pagination {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 15px;
    }
    
    .chart-container {
        height: 300px;
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .pagination a,
    .pagination span {
        padding: 8px 12px;
        font-size: 12px;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-card,
.dashboard-section {
    animation: fadeInUp 0.6s ease forwards;
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }

/* Notification */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border-radius: 8px;
    padding: 15px 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border-left: 4px solid #28a745;
    z-index: 1000;
    transform: translateX(400px);
    transition: transform 0.3s ease;
}

.notification.show {
    transform: translateX(0);
}
</style>

<?php
global $wpdb;

// Pagination settings untuk recent consultations
$items_per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 10;
$current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
$offset = ($current_page - 1) * $items_per_page;

// Search functionality
$search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
$where_clause = '';
if (!empty($search)) {
    $where_clause = $wpdb->prepare(
        "WHERE c.name LIKE %s OR c.email LIKE %s",
        '%' . $wpdb->esc_like($search) . '%',
        '%' . $wpdb->esc_like($search) . '%'
    );
}

// Get statistics
$total_consultations = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_consultations");
$today_consultations = $wpdb->get_var($wpdb->prepare(
    "SELECT COUNT(*) FROM {$wpdb->prefix}sp_consultations WHERE DATE(consultation_date) = %s",
    date('Y-m-d')
));
$total_diseases = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_diseases");
$total_symptoms = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_symptoms");

// Get total count for pagination
$total_items = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_consultations c $where_clause");
$total_pages = ceil($total_items / $items_per_page);

// Get recent consultations with pagination
$recent_consultations = $wpdb->get_results($wpdb->prepare("
    SELECT c.*, 
           (SELECT d.name FROM {$wpdb->prefix}sp_diagnosis_results dr 
            JOIN {$wpdb->prefix}sp_diseases d ON dr.disease_id = d.id 
            WHERE dr.consultation_id = c.id 
            ORDER BY dr.percentage DESC LIMIT 1) as top_diagnosis,
           (SELECT dr.percentage FROM {$wpdb->prefix}sp_diagnosis_results dr 
            WHERE dr.consultation_id = c.id 
            ORDER BY dr.percentage DESC LIMIT 1) as top_percentage
    FROM {$wpdb->prefix}sp_consultations c 
    $where_clause
    ORDER BY c.consultation_date DESC 
    LIMIT %d OFFSET %d
", $items_per_page, $offset));
?>

<div class="expert-system-dashboard">
    <div class="dashboard-header">
        <h1>🧠 Dashboard Sistem Pakar Kecemasan Remaja</h1>
        <p>Pantau dan kelola konsultasi kecemasan remaja secara real-time</p>
    </div>
    
    <div class="expert-system-admin">
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number"><?php echo number_format($total_consultations); ?></span>
                <span class="stat-label">📊 Total Konsultasi</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?php echo number_format($today_consultations); ?></span>
                <span class="stat-label">📅 Konsultasi Hari Ini</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?php echo number_format($total_diseases); ?></span>
                <span class="stat-label">🦠 Jenis Gangguan</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?php echo number_format($total_symptoms); ?></span>
                <span class="stat-label">🔍 Gejala</span>
            </div>
        </div>
        
        <!-- Recent Consultations -->
        <div class="dashboard-section">
            <h2>📋 Konsultasi Terbaru</h2>
            
            <!-- Table Controls -->
            <div class="table-controls">
                <div class="entries-control">
                    <label for="per_page">Tampilkan:</label>
                    <select id="per_page" name="per_page" onchange="changePerPage(this.value)">
                        <option value="10" <?php selected($items_per_page, 10); ?>>10</option>
                        <option value="25" <?php selected($items_per_page, 25); ?>>25</option>
                        <option value="50" <?php selected($items_per_page, 50); ?>>50</option>
                        <option value="100" <?php selected($items_per_page, 100); ?>>100</option>
                    </select>
                    <span>entri</span>
                </div>
                
                <div class="search-box">
                    <form method="get" action="">
                        <?php foreach ($_GET as $key => $value): ?>
                            <?php if ($key !== 'search' && $key !== 'paged'): ?>
                                <input type="hidden" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>">
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <input type="text" name="search" value="<?php echo esc_attr($search); ?>" 
                               placeholder="Cari nama atau email...">
                        <span class="search-icon">🔍</span>
                    </form>
                </div>
            </div>
            
            <?php if (empty($recent_consultations)): ?>
                <div class="empty-state">
                    <div class="empty-state-icon">📋</div>
                    <h3>Tidak ada konsultasi ditemukan</h3>
                    <p>Belum ada konsultasi atau tidak ada hasil untuk pencarian "<?php echo esc_html($search); ?>"</p>
                </div>
            <?php else: ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>👤 Nama</th>
                            <th>🎂 Umur</th>
                            <th>📧 Email</th>
                            <th>📅 Tanggal</th>
                            <th>🎯 Diagnosa Utama</th>
                            <th>📈 Persentase</th>
                            <th>⚡ Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_consultations as $consultation): ?>
                        <tr>
                            <td><strong><?php echo esc_html($consultation->name); ?></strong></td>
                            <td><?php echo $consultation->age; ?> tahun</td>
                            <td><?php echo esc_html($consultation->email); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($consultation->consultation_date)); ?></td>
                            <td>
                                <?php if ($consultation->top_diagnosis): ?>
                                    <?php echo esc_html($consultation->top_diagnosis); ?>
                                <?php else: ?>
                                    <span style="color: #6c757d; font-style: italic;">Tidak ada diagnosa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($consultation->top_percentage): ?>
                                    <?php 
                                    $percentage = floatval($consultation->top_percentage);
                                    $badge_class = $percentage >= 70 ? 'status-high' : ($percentage >= 40 ? 'status-medium' : 'status-low');
                                    ?>
                                    <span class="status-badge <?php echo $badge_class; ?>">
                                        <?php echo number_format($percentage, 1); ?>%
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge status-low">0%</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=expert-system-consultations&view=' . $consultation->id); ?>" 
                                   class="btn btn-small btn-edit">👁️ Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Menampilkan <?php echo $offset + 1; ?> - <?php echo min($offset + $items_per_page, $total_items); ?> 
                        dari <?php echo number_format($total_items); ?> konsultasi
                    </div>
                    
                    <ul class="pagination">
                        <?php
                        // First page
                        if ($current_page > 1):
                        ?>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">⏮️</a></li>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>">◀️</a></li>
                        <?php else: ?>
                            <li><span class="disabled">⏮️</span></li>
                            <li><span class="disabled">◀️</span></li>
                        <?php endif; ?>
                        
                        <?php
                        // Page numbers
                        $start_page = max(1, $current_page - 2);
                        $end_page = min($total_pages, $current_page + 2);
                        
                        for ($i = $start_page; $i <= $end_page; $i++):
                            if ($i == $current_page):
                        ?>
                            <li><span class="current"><?php echo $i; ?></span></li>
                        <?php else: ?>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $i)); ?>"><?php echo $i; ?></a></li>
                        <?php 
                            endif;
                        endfor;
                        ?>
                        
                        <?php
                        // Last page
                        if ($current_page < $total_pages):
                        ?>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>">▶️</a></li>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $total_pages)); ?>">⏭️</a></li>
                        <?php else: ?>
                            <li><span class="disabled">▶️</span></li>
                            <li><span class="disabled">⏭️</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        
        <!-- Statistics Chart -->
        <div class="dashboard-section">
            <h2>📈 Statistik Konsultasi (7 Hari Terakhir)</h2>
            <div class="chart-container">
                <canvas id="consultationChart"></canvas>
            </div>
        </div>
        
        <?php
        // Get data for chart
        $chart_data = $wpdb->get_results("
            SELECT DATE(consultation_date) as date, COUNT(*) as count
            FROM {$wpdb->prefix}sp_consultations 
            WHERE consultation_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            GROUP BY DATE(consultation_date)
            ORDER BY date
        ");
        
        $labels = [];
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $labels[] = date('d/m', strtotime($date));
            
            $count = 0;
            foreach ($chart_data as $item) {
                if ($item->date === $date) {
                    $count = $item->count;
                    break;
                }
            }
            $data[] = $count;
        }
        ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
// Chart Configuration
var chartData = {
    labels: <?php echo json_encode($labels); ?>,
    data: <?php echo json_encode($data); ?>
};

// Initialize Chart
var ctx = document.getElementById('consultationChart').getContext('2d');
var consultationChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartData.labels,
        datasets: [{
            label: 'Jumlah Konsultasi',
            data: chartData.data,
            borderColor: '#667eea',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#667eea',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#f1f3f4'
                },
                ticks: {
                    color: '#6c757d'
                }
            },
            x: {
                grid: {
                    color: '#f1f3f4'
                },
                ticks: {
                    color: '#6c757d'
                }
            }
        },
        elements: {
            point: {
                hoverBackgroundColor: '#764ba2'
            }
        }
    }
});

// Change per page function
function changePerPage(value) {
    const url = new URL(window.location);
    url.searchParams.set('per_page', value);
    url.searchParams.delete('paged'); // Reset to first page
    window.location.href = url.toString();
}

// Auto-submit search after typing
let searchTimeout;
document.querySelector('input[name="search"]').addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        this.form.submit();
    }, 500);
});

// Real-time updates (optional)
function updateDashboard() {
    // Add AJAX call to update statistics in real-time
    // This would be useful for busy systems
}

// Update every 5 minutes
setInterval(updateDashboard, 300000);

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    // Add any initialization code here
    console.log('Dashboard loaded successfully');
});
</script>

<?php
// Display notifications if any
if (isset($_GET['updated']) && $_GET['updated'] === 'true') {
    echo '<div class="notification show">
        <strong>✅ Berhasil!</strong> Data telah diperbarui.
    </div>';
    
    echo '<script>
        setTimeout(function() {
            document.querySelector(".notification").classList.remove("show");
        }, 3000);
    </script>';
}
?>