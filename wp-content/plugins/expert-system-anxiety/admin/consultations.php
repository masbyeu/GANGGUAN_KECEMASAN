<style>
    /* CSS untuk Data Konsultasi Sistem Pakar */

.wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}

.wrap h1 {
    color: #2c3e50;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 30px;
    border-bottom: 3px solid #3498db;
    padding-bottom: 10px;
}

.wrap h2 {
    color: #2c3e50;
    font-size: 24px;
    font-weight: 600;
    margin: 30px 0 20px 0;
    padding: 15px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.wrap h3 {
    color: #34495e;
    font-size: 20px;
    font-weight: 500;
    margin: 25px 0 15px 0;
    padding: 10px 0;
    border-left: 4px solid #3498db;
    padding-left: 15px;
    background-color: #f8f9fa;
    padding-right: 15px;
    padding-top: 12px;
    padding-bottom: 12px;
}

.expert-system-admin {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 30px;
}

/* Enhanced Filter Container */
.filters-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    border: 1px solid #dee2e6;
}

.filters-row {
    display: flex;
    gap: 20px;
    align-items: end;
    flex-wrap: wrap;
    width: 100%;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 200px;
}

.filter-group label {
    font-weight: 600;
    color: #2c3e50;
    font-size: 14px;
    margin-bottom: 4px;
}

.filter-group input, .filter-group select {
    padding: 10px 12px;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.2s ease;
    background: white;
}

.filter-group input:focus, .filter-group select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
}

.filter-actions {
    display: flex;
    gap: 10px;
    align-items: end;
}

/* DataTable Controls */
.datatable-controls {
    background: #f8f9fa;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    border-bottom: 1px solid #e9ecef;
}

.datatable-controls-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.datatable-controls-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.entries-selector {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #495057;
    font-weight: 500;
}

.entries-selector select {
    padding: 8px 12px;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    font-size: 14px;
    background: white;
    min-width: 70px;
}

.quick-search {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #495057;
    font-weight: 500;
}

.quick-search input {
    padding: 8px 12px;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    font-size: 14px;
    width: 200px;
    transition: all 0.2s ease;
}

.quick-search input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
}

/* Enhanced Table Styling */
.data-table-container {
    position: relative;
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
    background: white;
    position: relative;
}

.data-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: sticky;
    top: 0;
    z-index: 10;
}

.data-table thead th {
    color: white;
    font-weight: 600;
    padding: 15px 12px;
    text-align: left;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    cursor: pointer;
    user-select: none;
    transition: background-color 0.2s ease;
    white-space: nowrap;
}

.data-table thead th:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.data-table thead th.sortable::after {
    content: '↕';
    position: absolute;
    right: 8px;
    opacity: 0.6;
    font-size: 12px;
    transition: opacity 0.2s ease;
}

.data-table thead th.sortable:hover::after {
    opacity: 1;
}

.data-table thead th.sort-asc::after {
    content: '↑';
    opacity: 1;
    color: #ffd700;
}

.data-table thead th.sort-desc::after {
    content: '↓';
    opacity: 1;
    color: #ffd700;
}

.data-table tbody tr {
    border-bottom: 1px solid #e9ecef;
    transition: all 0.2s ease;
}

.data-table tbody tr:hover {
    background-color: #f8f9fa;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.data-table tbody tr:last-child {
    border-bottom: none;
}

.data-table tbody td {
    padding: 14px 12px;
    font-size: 14px;
    color: #495057;
    vertical-align: middle;
}

.data-table tbody td:first-child {
    font-weight: 600;
    color: #2c3e50;
    text-align: center;
    width: 60px;
    background-color: #f8f9fa;
}

/* Button styling */
.btn {
    display: inline-block;
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.2s ease;
    margin-right: 8px;
    margin-bottom: 4px;
    border: none;
    cursor: pointer;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn:hover::before {
    left: 100%;
}

.btn-small {
    padding: 6px 12px;
    font-size: 12px;
}

.btn-edit {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: 1px solid #667eea;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn:not(.btn-edit) {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
    border: 1px solid #11998e;
}

.btn:not(.btn-edit):hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(17, 153, 142, 0.4);
    color: white;
}

/* Modern Pagination */
.pagination-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #e9ecef;
    flex-wrap: wrap;
    gap: 20px;
}

.pagination-info {
    color: #6c757d;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.pagination-info::before {
    content: '📊';
    font-size: 16px;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
}

.pagination a, .pagination span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    text-decoration: none;
    color: #495057;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
    background: white;
    position: relative;
    overflow: hidden;
}

.pagination a::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transition: width 0.3s ease;
    z-index: -1;
}

.pagination a:hover::before {
    width: 100%;
}

.pagination a:hover {
    color: white;
    border-color: #667eea;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.pagination .current {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: #667eea;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    transform: translateY(-1px);
}

.pagination .disabled {
    background-color: #f8f9fa;
    color: #6c757d;
    cursor: not-allowed;
    border-color: #dee2e6;
}

.pagination .disabled:hover {
    transform: none;
    box-shadow: none;
}

.pagination .page-dots {
    border: none;
    background: none;
    color: #6c757d;
    cursor: default;
    font-weight: bold;
}

/* Loading States */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 20;
    backdrop-filter: blur(2px);
}

.loading {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Status indicators */
.status-indicator {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-high {
    background-color: #e74c3c;
    color: white;
}

.status-medium {
    background-color: #f39c12;
    color: white;
}

.status-low {
    background-color: #27ae60;
    color: white;
}

/* Enhanced Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #6c757d;
}

.empty-state .icon {
    font-size: 64px;
    margin-bottom: 20px;
    opacity: 0.5;
    display: block;
}

.empty-state .message {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #495057;
}

.empty-state .submessage {
    font-size: 14px;
    opacity: 0.8;
    max-width: 400px;
    margin: 0 auto;
    line-height: 1.5;
}

/* Form table styling */
.form-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.form-table tr {
    border-bottom: 1px solid #e9ecef;
}

.form-table tr:last-child {
    border-bottom: none;
}

.form-table th {
    background-color: #f8f9fa;
    font-weight: 600;
    padding: 15px;
    text-align: left;
    color: #2c3e50;
    width: 200px;
    border-right: 1px solid #e9ecef;
}

.form-table td {
    padding: 15px;
    color: #495057;
}

/* Responsive design */
@media (max-width: 768px) {
    .wrap {
        padding: 15px;
    }
    
    .wrap h1 {
        font-size: 24px;
    }
    
    .filters-row {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-group {
        min-width: auto;
    }
    
    .datatable-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .datatable-controls-left,
    .datatable-controls-right {
        justify-content: space-between;
    }
    
    .quick-search input {
        width: 100%;
    }
    
    .data-table {
        font-size: 12px;
    }
    
    .data-table thead th,
    .data-table tbody td {
        padding: 8px 6px;
    }
    
    .pagination-container {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
        gap: 15px;
    }
    
    .pagination {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .pagination a, .pagination span {
        min-width: 35px;
        height: 35px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .data-table-container {
        overflow-x: auto;
    }
    
    .pagination a, .pagination span {
        min-width: 30px;
        height: 30px;
        font-size: 11px;
        margin: 1px;
    }
    
    .btn {
        padding: 4px 8px;
        font-size: 11px;
        margin-right: 4px;
    }
}

/* Animation for table rows */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.data-table tbody tr {
    animation: fadeInUp 0.3s ease-out;
}

/* Print styles */
@media print {
    .filters-container,
    .datatable-controls,
    .pagination-container,
    .btn {
        display: none !important;
    }
    
    .data-table {
        box-shadow: none;
    }
    
    .data-table thead th {
        background: #667eea !important;
        -webkit-print-color-adjust: exact;
    }
}
</style>

<div class="wrap">
    <h1>Data Konsultasi</h1>
    
    <?php
    global $wpdb;
    
    // Filter parameters
    $search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
    $date_from = isset($_GET['date_from']) ? sanitize_text_field($_GET['date_from']) : '';
    $date_to = isset($_GET['date_to']) ? sanitize_text_field($_GET['date_to']) : '';
    $per_page = isset($_GET['per_page']) ? max(10, min(100, intval($_GET['per_page']))) : 25;
    
    // Pagination
    $page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $offset = ($page - 1) * $per_page;
    
    // Build WHERE clause for filtering
    $where_conditions = array("1=1");
    $where_params = array();
    
    if (!empty($search)) {
        $where_conditions[] = "(c.name LIKE %s OR c.email LIKE %s OR c.school LIKE %s OR c.id LIKE %s)";
        $search_param = '%' . $wpdb->esc_like($search) . '%';
        $where_params[] = $search_param;
        $where_params[] = $search_param;
        $where_params[] = $search_param;
        $where_params[] = $search_param;
    }
    
    if (!empty($date_from)) {
        $where_conditions[] = "DATE(c.consultation_date) >= %s";
        $where_params[] = $date_from;
    }
    
    if (!empty($date_to)) {
        $where_conditions[] = "DATE(c.consultation_date) <= %s";
        $where_params[] = $date_to;
    }
    
    $where_clause = implode(' AND ', $where_conditions);
    
    // Get consultations with filtering
    $query = "
        SELECT c.*, 
               (SELECT COUNT(*) FROM {$wpdb->prefix}sp_diagnosis_results dr WHERE dr.consultation_id = c.id) as diagnosis_count
        FROM {$wpdb->prefix}sp_consultations c 
        WHERE {$where_clause}
        ORDER BY c.consultation_date DESC 
        LIMIT %d OFFSET %d
    ";
    
    $params = array_merge($where_params, array($per_page, $offset));
    $consultations = $wpdb->get_results($wpdb->prepare($query, $params));
    
    // Get total count for pagination
    $count_query = "SELECT COUNT(*) FROM {$wpdb->prefix}sp_consultations c WHERE {$where_clause}";
    $total_consultations = $wpdb->get_var($wpdb->prepare($count_query, $where_params));
    $total_pages = ceil($total_consultations / $per_page);
    
    // Calculate showing range
    $showing_start = $total_consultations > 0 ? $offset + 1 : 0;
    $showing_end = min($offset + $per_page, $total_consultations);
    ?>
    
    <!-- Enhanced Filter Form -->
    <div class="filters-container">
        <form method="get" action="" id="filterForm">
            <input type="hidden" name="page" value="expert-system-consultations">
            <input type="hidden" name="per_page" value="<?php echo $per_page; ?>">
            
            <div class="filters-row">
                <div class="filter-group">
                    <label for="search">🔍 Cari Data:</label>
                    <input type="text" 
                           id="search" 
                           name="search" 
                           value="<?php echo esc_attr($search); ?>" 
                           placeholder="Nama, email, sekolah, atau ID...">
                </div>
                
                <div class="filter-group">
                    <label for="date_from">📅 Tanggal Dari:</label>
                    <input type="date" 
                           id="date_from" 
                           name="date_from" 
                           value="<?php echo esc_attr($date_from); ?>">
                </div>
                
                <div class="filter-group">
                    <label for="date_to">📅 Tanggal Sampai:</label>
                    <input type="date" 
                           id="date_to" 
                           name="date_to" 
                           value="<?php echo esc_attr($date_to); ?>">
                </div>
                
                <div class="filter-actions">
                    <button type="submit" class="btn btn-edit">
                        🔍 Filter Data
                    </button>
                    <a href="<?php echo admin_url('admin.php?page=expert-system-consultations'); ?>" 
                       class="btn">
                        🔄 Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
    
    <div class="expert-system-admin">
        <!-- DataTable Controls -->
        <div class="datatable-controls">
            <div class="datatable-controls-left">
                <div class="entries-selector">
                    <span>Tampilkan</span>
                    <select id="entriesSelect" onchange="changePerPage(this.value)">
                        <option value="10" <?php selected($per_page, 10); ?>>10</option>
                        <option value="25" <?php selected($per_page, 25); ?>>25</option>
                        <option value="50" <?php selected($per_page, 50); ?>>50</option>
                        <option value="100" <?php selected($per_page, 100); ?>>100</option>
                    </select>
                    <span>entri per halaman</span>
                </div>
            </div>
            <div class="datatable-controls-right">
                <div class="quick-search">
                    <span>🔍 Cari Cepat:</span>
                    <input type="text" 
                           id="quickSearch" 
                           placeholder="Ketik untuk mencari..." 
                           value="<?php echo esc_attr($search); ?>">
                </div>
            </div>
        </div>

        <div class="data-table-container" style="position: relative;">
            <div id="loadingOverlay" class="loading-overlay" style="display: none;">
                <div class="loading"></div>
            </div>
            
            <table class="data-table" id="consultationTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="sortable" data-column="id">ID</th>
                        <th class="sortable" data-column="name">Nama</th>
                        <th class="sortable" data-column="age">Umur</th>
                        <th class="sortable" data-column="gender">JK</th>
                        <th class="sortable" data-column="email">Email</th>
                        <th class="sortable" data-column="school">Sekolah</th>
                        <th class="sortable" data-column="date">Tanggal</th>
                        <th class="sortable" data-column="results">Hasil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php 
                    $no = $offset + 1;
                    foreach ($consultations as $consultation): 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $consultation->id; ?></td>
                        <td><strong><?php echo esc_html($consultation->name); ?></strong></td>
                        <td><?php echo $consultation->age; ?> th</td>
                        <td><?php echo $consultation->gender === 'L' ? '👨 L' : '👩 P'; ?></td>
                        <td><?php echo esc_html($consultation->email); ?></td>
                        <td><?php echo esc_html($consultation->school); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($consultation->consultation_date)); ?></td>
                        <td>
                            <span class="status-indicator <?php 
                                if ($consultation->diagnosis_count >= 3) echo 'status-high';
                                elseif ($consultation->diagnosis_count >= 2) echo 'status-medium';
                                else echo 'status-low';
                            ?>">
                                <?php echo $consultation->diagnosis_count; ?> diagnosa
                            </span>
                        </td>
                        <td>
                            <a href="<?php echo admin_url('admin.php?page=expert-system-consultations&view=' . $consultation->id); ?>" 
                               class="btn btn-small btn-edit">
                               📄 Detail
                            </a>
                            <a href="<?php echo home_url('/hasil-konsultasi/' . $consultation->id); ?>" 
                               target="_blank" 
                               class="btn btn-small">
                               👁️ Lihat Hasil
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if (empty($consultations)): ?>
                    <tr>
                        <td colspan="10" class="empty-state">
                            <div class="icon">📋</div>
                            <div class="message">
                                <?php if (!empty($search) || !empty($date_from) || !empty($date_to)): ?>
                                    Tidak ada data konsultasi yang sesuai dengan filter
                                <?php else: ?>
                                    Belum ada data konsultasi
                                <?php endif; ?>
                            </div>
                            <div class="submessage">
                                <?php if (!empty($search) || !empty($date_from) || !empty($date_to)): ?>
                                    Coba ubah atau hapus filter pencarian untuk melihat lebih banyak data
                                <?php else: ?>
                                    Data konsultasi akan muncul setelah ada user yang melakukan konsultasi
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Enhanced Pagination -->
        <?php if ($total_pages > 1): ?>
        <div class="pagination-container">
            <div class="pagination-info">
                Menampilkan <strong><?php echo number_format($showing_start); ?></strong> sampai 
                <strong><?php echo number_format($showing_end); ?></strong> 
                dari <strong><?php echo number_format($total_consultations); ?></strong> data
            </div>
            
            <div class="pagination">
                <?php
                // Build query string for pagination links
                $query_args = array();
                if (!empty($search)) $query_args['search'] = $search;
                if (!empty($date_from)) $query_args['date_from'] = $date_from;
                if (!empty($date_to)) $query_args['date_to'] = $date_to;
                if ($per_page != 25) $query_args['per_page'] = $per_page;
                $query_args['page'] = 'expert-system-consultations';
                
                // Previous button
                if ($page > 1):
                    $prev_args = array_merge($query_args, array('paged' => $page - 1));
                ?>
                    <a href="<?php echo admin_url('admin.php?' . http_build_query($prev_args)); ?>" 
                       title="Halaman Sebelumnya">‹ Prev</a>
                <?php else: ?>
                    <span class="disabled">‹ Prev</span>
                <?php endif; ?>
                
                <?php
                // Page numbers logic - Enhanced
                $start_page = max(1, $page - 2);
                $end_page = min($total_pages, $page + 2);
                
                // Always show first page
                if ($start_page > 1):
                    $first_args = array_merge($query_args, array('paged' => 1));
                ?>
                    <a href="<?php echo admin_url('admin.php?' . http_build_query($first_args)); ?>">1</a>
                    <?php if ($start_page > 2): ?>
                        <span class="page-dots">...</span>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                    <?php if ($i === $page): ?>
                        <span class="current"><?php echo $i; ?></span>
                    <?php else: ?>
                        <?php 
                        $page_args = array_merge($query_args, array('paged' => $i));
                        ?>
                        <a href="<?php echo admin_url('admin.php?' . http_build_query($page_args)); ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                
                <?php
                // Always show last page
                if ($end_page < $total_pages):
                    if ($end_page < $total_pages - 1):
                ?>
                        <span class="page-dots">...</span>
                    <?php endif; ?>
                    <?php 
                    $last_args = array_merge($query_args, array('paged' => $total_pages));
                    ?>
                    <a href="<?php echo admin_url('admin.php?' . http_build_query($last_args)); ?>"><?php echo $total_pages; ?></a>
                <?php endif; ?>
                
                <?php
                // Next button
                if ($page < $total_pages):
                    $next_args = array_merge($query_args, array('paged' => $page + 1));
                ?>
                    <a href="<?php echo admin_url('admin.php?' . http_build_query($next_args)); ?>" 
                       title="Halaman Selanjutnya">Next ›</a>
                <?php else: ?>
                    <span class="disabled">Next ›</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <?php
    // Show detail view if requested
    if (isset($_GET['view'])) {
        $consultation_id = intval($_GET['view']);
        $consultation = $wpdb->get_row($wpdb->prepare("
            SELECT * FROM {$wpdb->prefix}sp_consultations WHERE id = %d
        ", $consultation_id));
        
        if ($consultation) {
            $results = $wpdb->get_results($wpdb->prepare("
                SELECT dr.*, d.name as disease_name 
                FROM {$wpdb->prefix}sp_diagnosis_results dr
                JOIN {$wpdb->prefix}sp_diseases d ON dr.disease_id = d.id
                WHERE dr.consultation_id = %d
                ORDER BY dr.percentage DESC
            ", $consultation_id));
            
            $answers = $wpdb->get_results($wpdb->prepare("
                SELECT ua.*, s.symptom 
                FROM {$wpdb->prefix}sp_user_answers ua
                JOIN {$wpdb->prefix}sp_symptoms s ON ua.symptom_id = s.id
                WHERE ua.consultation_id = %d
                ORDER BY s.symptom
            ", $consultation_id));
            ?>
            
            <div class="expert-system-admin">
                <h2>📋 Detail Konsultasi #<?php echo $consultation_id; ?></h2>
                
                <h3>👤 Data Pasien</h3>
                <table class="form-table">
                    <tr><th>Nama Lengkap</th><td><strong><?php echo esc_html($consultation->name); ?></strong></td></tr>
                    <tr><th>Umur</th><td><?php echo $consultation->age; ?> tahun</td></tr>
                    <tr><th>Jenis Kelamin</th><td><?php echo $consultation->gender === 'L' ? '👨 Laki-laki' : '👩 Perempuan'; ?></td></tr>
                    <tr><th>Email</th><td><?php echo esc_html($consultation->email); ?></td></tr>
                    <tr><th>Telepon</th><td><?php echo esc_html($consultation->phone); ?></td></tr>
                    <tr><th>Sekolah</th><td><?php echo esc_html($consultation->school); ?></td></tr>
                    <tr><th>Tanggal Konsultasi</th><td><?php echo date('d/m/Y H:i:s', strtotime($consultation->consultation_date)); ?></td></tr>
                </table>
                
                <h3>🔍 Jawaban Gejala (<?php echo count($answers); ?> gejala)</h3>
                <table class="data-table">
                    <thead>
                        <tr><th>No</th><th>Gejala</th><th>Nilai CF User</th></tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no_gejala = 1;
                        foreach ($answers as $answer): 
                        ?>
                        <tr>
                            <td><?php echo $no_gejala++; ?></td>
                            <td><?php echo esc_html($answer->symptom); ?></td>
                            <td><strong><?php echo number_format($answer->cf_user, 2); ?></strong></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <h3>🏥 Hasil Diagnosa (<?php echo count($results); ?> penyakit)</h3>
                <table class="data-table">
                    <thead>
                        <tr><th>Ranking</th><th>Penyakit</th><th>CF</th><th>Persentase</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result): ?>
                        <tr>
                            <td><strong>#<?php echo $result->rank_position; ?></strong></td>
                            <td><?php echo esc_html($result->disease_name); ?></td>
                            <td><?php echo number_format($result->cf_result, 4); ?></td>
                            <td>
                                <span class="status-indicator <?php 
                                    if ($result->percentage >= 70) echo 'status-high';
                                    elseif ($result->percentage >= 40) echo 'status-medium';
                                    else echo 'status-low';
                                ?>"><strong><?php echo number_format($result->percentage, 2); ?>%</strong></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div style="margin-top: 30px; text-align: center;">
                    <a href="<?php echo admin_url('admin.php?page=expert-system-consultations'); ?>" 
                       class="btn btn-edit" style="padding: 12px 24px; font-size: 14px;">
                        ← Kembali ke Daftar Konsultasi
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="expert-system-admin">
                <div class="empty-state">
                    <div class="icon">❌</div>
                    <div class="message">Data konsultasi tidak ditemukan</div>
                    <div class="submessage">ID konsultasi yang Anda cari mungkin tidak ada atau telah dihapus</div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<script>
// Enhanced JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Quick search functionality
    let searchTimeout;
    const quickSearchInput = document.getElementById('quickSearch');
    const filterForm = document.getElementById('filterForm');
    
    if (quickSearchInput) {
        quickSearchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchValue = e.target.value.trim();
                
                // Update the main search field
                const mainSearchField = document.getElementById('search');
                if (mainSearchField) {
                    mainSearchField.value = searchValue;
                }
                
                // Auto-submit form for quick search
                if (searchValue.length >= 2 || searchValue.length === 0) {
                    showLoading();
                    filterForm.submit();
                }
            }, 500);
        });
    }
    
    // Sortable headers (client-side sorting for current page)
    const sortableHeaders = document.querySelectorAll('.sortable');
    sortableHeaders.forEach(header => {
        header.addEventListener('click', function() {
            // Add sorting logic here if needed
            // For now, just show visual feedback
            this.classList.toggle('sort-asc');
        });
    });
    
    // Enhanced form submission with loading
    if (filterForm) {
        filterForm.addEventListener('submit', function() {
            showLoading();
        });
    }
    
    // Auto-hide loading after page load
    hideLoading();
});

// Utility functions
function showLoading() {
    const overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.style.display = 'flex';
    }
}

function hideLoading() {
    const overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
}

function changePerPage(value) {
    showLoading();
    const url = new URL(window.location);
    url.searchParams.set('per_page', value);
    url.searchParams.delete('paged'); // Reset to first page
    window.location.href = url.toString();
}

// Enhanced table interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scroll to pagination clicks
    const paginationLinks = document.querySelectorAll('.pagination a');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            showLoading();
            // Smooth scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
    
    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K to focus search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.getElementById('quickSearch');
            if (searchInput) {
                searchInput.focus();
                searchInput.select();
            }
        }
    });
    
    // Add tooltips to action buttons
    const actionButtons = document.querySelectorAll('.btn');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});

// Print functionality
function printTable() {
    window.print();
}

// Export functionality (if needed)
function exportData() {
    alert('Fitur export akan segera hadir!');
}

// Add some visual enhancements
document.addEventListener('DOMContentLoaded', function() {
    // Animate table rows on load
    const tableRows = document.querySelectorAll('.data-table tbody tr');
    tableRows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.05}s`;
    });
    
    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});
</script>

<style>
/* Ripple effect */
.btn {
    position: relative;
    overflow: hidden;
}

.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    transform: scale(0);
    animation: ripple-animation 0.6s linear;
}

@keyframes ripple-animation {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

/* Loading state for table */
.data-table.loading {
    opacity: 0.5;
    pointer-events: none;
}

/* Custom scrollbar */
.data-table-container::-webkit-scrollbar {
    height: 8px;
}

.data-table-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.data-table-container::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 4px;
}

.data-table-container::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
}
</style>