<style>
    .wrap {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    /* === Gaya Umum === */
    .wrap h1 {
        color: black;
        margin: 0;
        font-size: 2.5em;
        font-weight: 300;
        text-align: center;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }



    .form-table th {
        width: 200px;
        text-align: left;
        padding: 12px 0;
        font-weight: 600;
        color: #333;
    }

    .form-table td {
        padding: 12px 0;
    }

    .regular-text {
        width: 100%;
        max-width: 400px;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .regular-text:focus {
        outline: none;
        border-color: #0073aa;
        box-shadow: 0 0 0 2px rgba(0, 115, 170, 0.2);
    }

    /* === Buttons === */
    .button-primary {
        background-color: #0073aa;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .button-primary:hover {
        background-color: #005a87;
    }

    /* === Search Box === */
    .search-container {
        margin: 20px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        padding: 20px;
        border-radius: 8px;

    }


    .search-box {
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        width: 300px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .search-box:focus {
        outline: none;
        border-color: #0073aa;
        box-shadow: 0 0 0 2px rgba(0, 115, 170, 0.2);
    }

    .search-btn {
        background-color: #0073aa;
        color: white;
        border: none;
        padding: 12px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .search-btn:hover {
        background-color: #005a87;
    }

    .reset-btn {
        background-color: #6c757d;
        color: white;
        border: none;
        padding: 12px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .reset-btn:hover {
        background-color: #5a6268;
    }

    /* === Modal === */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(2px);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 30px;
        border: none;
        width: 90%;
        max-width: 600px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .close-btn {
        color: #aaa;
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #333;
        text-decoration: none;
    }

    /* === Table === */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .data-table th,
    .data-table td {
        padding: 15px 12px;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
    }

    .data-table th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .data-table tbody tr {
        transition: background-color 0.2s ease;
    }

    .data-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .data-table tbody tr:nth-child(even) {
        background-color: #fbfbfb;
    }

    .data-table tbody tr:nth-child(even):hover {
        background-color: #f0f0f0;
    }

    .button-edit {
        background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        color: white;
        border: none;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 6px;
        margin-right: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .button-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(243, 156, 18, 0.3);
    }

    .button-danger {
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        color: white;
        border: none;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .button-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
    }

    /* === Pagination === */
    .pagination-container {
        margin: 30px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        padding: 20px;

    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 8px;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination a,
    .pagination span {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 6px;
        color: #0073aa;
        background-color: #fff;
        transition: all 0.3s ease;
        font-weight: 500;
        min-width: 44px;
        text-align: center;
    }

    .pagination a:hover {
        background-color: #0073aa;
        color: white;
        border-color: #0073aa;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 115, 170, 0.2);
    }

    .pagination .current {
        background: linear-gradient(135deg, #0073aa 0%, #005a87 100%);
        color: white;
        border-color: #0073aa;
        box-shadow: 0 2px 4px rgba(0, 115, 170, 0.3);
    }

    .pagination .disabled {
        color: #ccc;
        cursor: not-allowed;
        background-color: #f8f9fa;
    }

    .pagination .disabled:hover {
        background-color: #f8f9fa;
        color: #ccc;
        border-color: #ddd;
        transform: none;
        box-shadow: none;
    }

    .pagination-info {
        color: #666;
        font-size: 14px;
        font-weight: 500;
    }

    .entries-per-page {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #666;
    }

    .entries-per-page select {
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background-color: white;
        cursor: pointer;
        transition: border-color 0.3s ease;
    }

    .entries-per-page select:focus {
        outline: none;
        border-color: #0073aa;
        box-shadow: 0 0 0 2px rgba(0, 115, 170, 0.2);
    }

    /* === Empty State === */
    .empty-state {
        text-align: center;
        padding: 60px 40px;
        color: #666;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 1px solid #dee2e6;
        border-radius: 12px;
        margin-top: 20px;
        font-size: 16px;
    }

    .empty-state::before {
        content: "📋";
        display: block;
        font-size: 48px;
        margin-bottom: 15px;
        opacity: 0.5;
    }

    /* === Messages === */
    .updated {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 12px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid #28a745;
    }

    .error {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 12px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid #dc3545;
    }

    /* === Responsive === */
    @media (max-width: 1024px) {
        .data-table {
            font-size: 14px;
        }

        .data-table th,
        .data-table td {
            padding: 12px 10px;
        }
    }

    @media (max-width: 768px) {
        .search-container {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .search-container>form {
            width: 100%;
        }

        .search-container>form>* {
            width: 100%;
            margin-bottom: 10px;
        }

        .search-box {
            width: 100%;
            margin-bottom: 10px;
        }

        .pagination-container {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }

        .pagination {
            justify-content: center;
            flex-wrap: wrap;
        }

        .data-table {
            font-size: 12px;
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        .data-table th,
        .data-table td {
            padding: 10px 8px;
            min-width: 100px;
        }

        .button-edit,
        .button-danger {
            padding: 6px 10px;
            font-size: 12px;
            margin: 2px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .modal-content {
            margin: 10% auto;
            width: 95%;
            padding: 20px;
        }

        .form-table th {
            width: auto;
            display: block;
            padding: 8px 0 4px 0;
        }

        .form-table td {
            display: block;
            padding: 4px 0 12px 0;
        }

        .regular-text {
            max-width: 100%;
        }

        .entries-per-page {
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }
    }

    @media (max-width: 480px) {
        .wrap h1 {
            font-size: 20px;
        }

        .data-table th,
        .data-table td {
            padding: 8px 6px;
            font-size: 11px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            font-size: 13px;
        }

        .modal-content {
            margin: 5% auto;
            padding: 15px;
        }
    }

    .wp-core-ui .button-danger {
        background: #dc3545;
        color: white;
        border: 2px solid #dc3545;
        border-radius: 4px;
        font-size: 13px;
        width: 66px;
        height: 32px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .wp-core-ui .button-danger:hover {
        background: #dc3545;
        color: white;
        border: 2px solid #dc3545;
        border-radius: 4px;
        font-size: 13px;
        width: 66px;
        height: 32px;
        box-sizing: border-box;
        cursor: pointer;
    }
</style>

<div class="wrap">
    <h1>🤧 Tambah Gejala Baru</h1>
    <form method="post">
        <table class="form-table">
            <tr>
                <th><label for="add_code">Kode Gejala</label></th>
                <td><input name="add_code" type="text" id="add_code" class="regular-text" required></td>
            </tr>
            <tr>
                <th><label for="add_symptom">Nama Gejala</label></th>
                <td><input name="add_symptom" type="text" id="add_symptom" class="regular-text" required></td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="submit_add" class="button button-primary" value="Simpan Gejala">
        </p>
    </form>
</div>

<hr>

<div class="wrap">
    <h1>📋 Manajemen Data Gejala - Expert System</h1>

    <!-- Search Form -->
    <div class="search-container">
        <form method="GET" style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
            <input type="hidden" name="page" value="expert-system-symptoms">
            <input type="text" name="search" class="search-box" placeholder="Cari berdasarkan kode atau nama gejala..."
                value="<?php echo isset($_GET['search']) ? esc_attr($_GET['search']) : ''; ?>">
            <button type="submit" class="search-btn">Cari</button>
            <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                <a href="<?php echo admin_url('admin.php?page=expert-system-symptoms'); ?>" class="reset-btn">Reset</a>
            <?php endif; ?>
        </form>

        <div class="entries-per-page">
            <label>Tampilkan:</label>
            <form method="GET" style="display: inline;">
                <input type="hidden" name="page" value="expert-system-symptoms">
                <?php if (isset($_GET['search'])): ?>
                    <input type="hidden" name="search" value="<?php echo esc_attr($_GET['search']); ?>">
                <?php endif; ?>
                <select name="per_page" onchange="this.form.submit()">
                    <option value="10" <?php selected(isset($_GET['per_page']) ? $_GET['per_page'] : 10, 10); ?>>10</option>
                    <option value="25" <?php selected(isset($_GET['per_page']) ? $_GET['per_page'] : 10, 25); ?>>25</option>
                    <option value="50" <?php selected(isset($_GET['per_page']) ? $_GET['per_page'] : 10, 50); ?>>50</option>
                    <option value="100" <?php selected(isset($_GET['per_page']) ? $_GET['per_page'] : 10, 100); ?>>100</option>
                </select>
            </form>
            <span>data per halaman</span>
        </div>
    </div>

    <?php
    global $wpdb;

    // Pagination settings
    $per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 10;
    $current_page = isset($_GET['paged']) ? intval($_GET['paged']) : 1;
    $offset = ($current_page - 1) * $per_page;

    // Search functionality
    $search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
    $where_clause = '';
    if (!empty($search)) {
        $where_clause = $wpdb->prepare(
            " WHERE code LIKE %s OR symptom LIKE %s",
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%'
        );
    }

    // Get total count
    $total_query = "SELECT COUNT(*) FROM {$wpdb->prefix}sp_symptoms" . $where_clause;
    $total_items = $wpdb->get_var($total_query);
    $total_pages = ceil($total_items / $per_page);

    // Get results with pagination
    $query = "SELECT * FROM {$wpdb->prefix}sp_symptoms" . $where_clause . " ORDER BY id DESC LIMIT %d OFFSET %d";
    $results = $wpdb->get_results($wpdb->prepare($query, $per_page, $offset));

    if ($results) {
        // Show search results info
        if (!empty($search)) {
            echo '<p><strong>Hasil pencarian untuk: "' . esc_html($search) . '"</strong> - ' . $total_items . ' data ditemukan</p>';
        }
    ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Gejala</th>
                    <th>Gejala</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo esc_html($row->id); ?></td>
                        <td><?php echo esc_html($row->code); ?></td>
                        <td><?php echo esc_html($row->symptom); ?></td>
                        <td><?php echo esc_html($row->created_at); ?></td>
                        <td>
                            <button type="button" class="button-edit" onclick="openEditModal(<?php echo esc_attr($row->id); ?>, '<?php echo esc_js($row->code); ?>', '<?php echo esc_js($row->symptom); ?>', '<?php echo esc_js($row->created_at); ?>')">Edit</button>
                            <a href="<?php echo admin_url('admin.php?page=expert-system-symptoms&action=delete&delete_id=' . $row->id . '&_wpnonce=' . wp_create_nonce('delete_symptom_' . $row->id)); ?>"
                                class="button button-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus gejala ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
            <div class="pagination-container">
                <div class="pagination-info">
                    Menampilkan <?php echo (($current_page - 1) * $per_page) + 1; ?> - <?php echo min($current_page * $per_page, $total_items); ?> dari <?php echo $total_items; ?> data
                </div>

                <ul class="pagination">
                    <?php
                    $base_url = admin_url('admin.php?page=expert-system-symptoms');
                    $search_param = !empty($search) ? '&search=' . urlencode($search) : '';
                    $per_page_param = '&per_page=' . $per_page;

                    // Previous button
                    if ($current_page > 1): ?>
                        <li><a href="<?php echo $base_url . '&paged=1' . $search_param . $per_page_param; ?>">&laquo; Pertama</a></li>
                        <li><a href="<?php echo $base_url . '&paged=' . ($current_page - 1) . $search_param . $per_page_param; ?>">&lsaquo; Sebelumnya</a></li>
                    <?php else: ?>
                        <li><span class="disabled">&laquo; Pertama</span></li>
                        <li><span class="disabled">&lsaquo; Sebelumnya</span></li>
                    <?php endif;

                    // Page numbers
                    $start_page = max(1, $current_page - 2);
                    $end_page = min($total_pages, $current_page + 2);

                    if ($start_page > 1): ?>
                        <li><a href="<?php echo $base_url . '&paged=1' . $search_param . $per_page_param; ?>">1</a></li>
                        <?php if ($start_page > 2): ?>
                            <li><span>...</span></li>
                        <?php endif;
                    endif;

                    for ($i = $start_page; $i <= $end_page; $i++): ?>
                        <li>
                            <?php if ($i == $current_page): ?>
                                <span class="current"><?php echo $i; ?></span>
                            <?php else: ?>
                                <a href="<?php echo $base_url . '&paged=' . $i . $search_param . $per_page_param; ?>"><?php echo $i; ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endfor;

                    if ($end_page < $total_pages): ?>
                        <?php if ($end_page < $total_pages - 1): ?>
                            <li><span>...</span></li>
                        <?php endif; ?>
                        <li><a href="<?php echo $base_url . '&paged=' . $total_pages . $search_param . $per_page_param; ?>"><?php echo $total_pages; ?></a></li>
                    <?php endif;

                    // Next button
                    if ($current_page < $total_pages): ?>
                        <li><a href="<?php echo $base_url . '&paged=' . ($current_page + 1) . $search_param . $per_page_param; ?>">Selanjutnya &rsaquo;</a></li>
                        <li><a href="<?php echo $base_url . '&paged=' . $total_pages . $search_param . $per_page_param; ?>">Terakhir &raquo;</a></li>
                    <?php else: ?>
                        <li><span class="disabled">Selanjutnya &rsaquo;</span></li>
                        <li><span class="disabled">Terakhir &raquo;</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>

    <?php
    } else {
        if (!empty($search)) {
            echo '<div class="empty-state">Tidak ada data gejala yang ditemukan untuk pencarian: "<strong>' . esc_html($search) . '</strong>"</div>';
        } else {
            echo '<div class="empty-state">Tidak ada data gejala yang ditemukan.</div>';
        }
    }
    ?>
</div>

<!-- Modal for Edit -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Edit Gejala</h2>

        <!-- Menampilkan pesan sukses jika ada -->
        <?php
        // Mulai session untuk mengambil pesan
        if (!session_id()) {
            session_start();
        }

        if (isset($_SESSION['edit_message'])) {
            echo '<div class="updated"><p>' . $_SESSION['edit_message'] . '</p></div>';
            unset($_SESSION['edit_message']); // Hapus pesan setelah ditampilkan
        }
        ?>

        <form id="editForm" method="POST" action="">
            <input type="hidden" id="edit_id" name="edit_id">
            <table class="form-table">
                <tr>
                    <th><label for="edit_code">Kode Gejala</label></th>
                    <td><input type="text" id="edit_code" name="edit_code" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="edit_symptom">Gejala</label></th>
                    <td><input type="text" id="edit_symptom" name="edit_symptom" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="edit_created_at">Tanggal Dibuat</label></th>
                    <td><input type="datetime-local" id="edit_created_at" name="edit_created_at" required></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="submit_edit_sypymos" class="button button-primary" value="Simpan Perubahan">
            </p>
        </form>
    </div>
</div>

<script>
    // Open Modal for Edit
    function openEditModal(id, code, symptom, created_at) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_code').value = code;
        document.getElementById('edit_symptom').value = symptom;
        document.getElementById('edit_created_at').value = created_at;
        document.getElementById('editModal').style.display = "block";
    }

    // Close Modal
    function closeModal() {
        document.getElementById('editModal').style.display = "none";
    }

    // Close Modal if clicked outside
    window.onclick = function(event) {
        if (event.target == document.getElementById('editModal')) {
            closeModal();
        }
    }
</script>