<?php
// CSS Styling
?>
<style>
    .expert-system-wrapper {
        max-width: 1200px;
        margin: 20px auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .expert-system-header {
        padding: 28px;
        text-align: center;
    }

    .expert-system-header h1 {
        margin: 0;
        font-size: 2.5em;
        font-weight: 300;
    }

    .expert-system-admin {
        padding: 30px;
        border-bottom: 1px solid #eee;
    }

    .expert-system-admin:last-child {
        border-bottom: none;
    }

    .expert-system-admin h2 {
        color: #333;
        border-bottom: 3px solid #667eea;
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-weight: 500;
    }

    /* Form Styling - PERBAIKAN UTAMA */
    .form-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .form-table th {
        text-align: left;
        padding: 15px 20px;
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        font-weight: 600;
        color: #495057;
        width: 200px;
        vertical-align: top;
    }

    .form-table td {
        padding: 15px 20px;
        border: 1px solid #dee2e6;
        vertical-align: top;
    }

    .form-table input[type="text"],
    .form-table textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        line-height: 1.5;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-table input[type="text"]:focus,
    .form-table textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: #fff;
    }

    .form-table textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Form Label Styling - TAMBAHAN BARU */
    .form-row {
        margin-bottom: 20px;
    }

    .form-row label {
        display: block;
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-row input[type="text"],
    .form-row textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        line-height: 1.5;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-row input[type="text"]:focus,
    .form-row textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: #fff;
    }

    .form-row textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Button Styling */
    .button-primary,
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .button-primary:hover,
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        text-decoration: none;
        display: inline-block;
        margin: 2px;
        transition: all 0.3s ease;
    }

    .btn-small {
        padding: 6px 12px;
        font-size: 12px;
    }

    .btn-edit {
        background: #28a745;
        color: white;
    }

    .btn-edit:hover {
        background: #218838;
        transform: translateY(-1px);
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
        transform: translateY(-1px);
    }

    /* Form Submit Button Area */
    .form-submit-area {
        text-align: right;
        padding-top: 15px;
        border-top: 1px solid #eee;
        margin-top: 20px;
    }

    /* Table Styling */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .data-table thead tr {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .data-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
    }

    .data-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
        vertical-align: top;
    }

    .data-table tbody tr {
        transition: background-color 0.3s ease;
    }

    .data-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .data-table tbody tr:nth-child(even) {
        background-color: #fdfdfd;
    }

    /* Pagination Styling */
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
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #dee2e6;
        color: #495057;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: #e9ecef;
        border-color: #adb5bd;
        transform: translateY(-1px);
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

    /* Search and Filter */
    .table-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
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
    }

    .search-box .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    /* Modal Styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 0;
        border-radius: 12px;
        width: 80%;
        max-width: 600px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px 30px;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-body {
        padding: 30px;
    }

    .close {
        color: white;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        border: none;
        background: none;
    }

    .close:hover {
        opacity: 0.7;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .expert-system-wrapper {
            margin: 10px;
            border-radius: 0;
        }

        .expert-system-admin {
            padding: 20px 15px;
        }

        .search-box input {
            width: 100%;
        }

        .table-controls {
            flex-direction: column;
            align-items: stretch;
        }

        .data-table {
            font-size: 14px;
        }

        .data-table th,
        .data-table td {
            padding: 10px 8px;
        }

        .pagination {
            justify-content: center;
            flex-wrap: wrap;
        }

        .pagination-wrapper {
            flex-direction: column;
            gap: 15px;
        }

        .modal-content {
            width: 95%;
            margin: 10% auto;
        }

        .form-table th {
            width: auto;
            display: block;
            border-bottom: none;
            padding-bottom: 5px;
        }

        .form-table td {
            display: block;
            border-top: none;
            padding-top: 5px;
        }
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
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Success/Error Messages */
    .notice {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 6px;
        border-left: 4px solid;
    }

    .notice-success {
        background-color: #d4edda;
        border-color: #28a745;
        color: #155724;
    }

    .notice-error {
        background-color: #f8d7da;
        border-color: #dc3545;
        color: #721c24;
    }

    .notice-warning {
        background-color: #fff3cd;
        border-color: #ffc107;
        color: #856404;
    }

    .buttondelete {
        background: #dc3545;
        color: white;
        border: 2px solid #dc3545;
        border-radius: 4px;
        box-sizing: -16px;
        font-size: 13px;
        width: 82px;
        height: 28px;
        box-sizing: border-box;
        cursor: pointer;
    }
</style>

<?php


// Get disease data if ID is provided for editing
global $wpdb;

// Get disease data if ID is provided for editing
$edit_disease = null;
if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    $edit_disease = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}sp_diseases WHERE id = %d",
        $edit_id
    ));
}
// Pagination settings
$items_per_page = 10;
$current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
$offset = ($current_page - 1) * $items_per_page;

// Search functionality
$search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
$where_clause = '';
if (!empty($search)) {
    $where_clause = $wpdb->prepare(
        "WHERE name LIKE %s OR code LIKE %s OR description LIKE %s",
        '%' . $wpdb->esc_like($search) . '%',
        '%' . $wpdb->esc_like($search) . '%',
        '%' . $wpdb->esc_like($search) . '%'
    );
}

// Get total count for pagination
$total_items = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_diseases $where_clause");
$total_pages = ceil($total_items / $items_per_page);

// Get diseases with pagination
$diseases = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}sp_diseases $where_clause ORDER BY code LIMIT %d OFFSET %d",
    $items_per_page,
    $offset
));
?>

<div class="expert-system-wrapper">
    <div class="expert-system-header">
        <h1>📑 Manajemen Data Penyakit</h1>
        <p style="margin: 10px 0 0 0; opacity: 0.9;">Kelola data penyakit untuk sistem pakar diagnosis</p>
    </div>

    <!-- Add New Disease Form - DIPERBAIKI -->
    <div class="expert-system-admin">
        <h2>📝 Tambah Penyakit Baru</h2>
        <form method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="simpan_penyakit">
            <?php wp_nonce_field('penyakit_nonce_action', 'penyakit_nonce'); ?>

            <div class="form-row">
                <label for="code">Kode Penyakit:</label>
                <input type="text" name="code" id="code" required maxlength="10" placeholder="Contoh: P001">
            </div>

            <div class="form-row">
                <label for="name">Nama Penyakit:</label>
                <input type="text" name="name" id="name" required placeholder="Masukkan nama penyakit">
            </div>

            <div class="form-row">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" placeholder="Masukkan deskripsi penyakit..."></textarea>
            </div>

            <div class="form-row">
                <label for="solutions">Solusi/Saran Pengobatan:</label>
                <textarea name="solutions" id="solutions" placeholder="Masukkan solusi atau saran pengobatan..."></textarea>
            </div>

            <div class="form-submit-area">
                <button type="submit" class="button-primary">💾 Simpan Penyakit</button>
            </div>
        </form>
    </div>

    <!-- Diseases List -->
    <div class="expert-system-admin">
        <h2>📋 Daftar Penyakit</h2>

        <!-- Table Controls -->
        <div class="table-controls">
            <div class="search-box">
                <form method="get" action="">
                    <?php foreach ($_GET as $key => $value): ?>
                        <?php if ($key !== 'search' && $key !== 'paged'): ?>
                            <input type="hidden" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <input type="text" name="search" value="<?php echo esc_attr($search); ?>"
                        placeholder="Cari berdasarkan nama, kode, atau deskripsi...">
                    <span class="search-icon">🔍</span>
                </form>
            </div>

            <div>
                <a href="<?php echo esc_url(remove_query_arg(['search', 'paged'])); ?>" class="btn btn-primary">
                    🔄 Reset Filter
                </a>
            </div>
        </div>

        <?php if (empty($diseases)): ?>
            <div style="text-align: center; padding: 50px; color: #6c757d;">
                <h3>📄 Tidak ada data ditemukan</h3>
                <p>Belum ada penyakit yang ditambahkan atau tidak ada hasil untuk pencarian "<?php echo esc_html($search); ?>"</p>
            </div>
        <?php else: ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Kode</th>
                        <th style="width: 25%;">Nama Penyakit</th>
                        <th style="width: 45%;">Deskripsi</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($diseases as $disease): ?>
                        <tr>
                            <td><strong><?php echo esc_html($disease->code); ?></strong></td>
                            <td><?php echo esc_html($disease->name); ?></td>
                            <td>
                                <?php
                                $description = esc_html($disease->description);
                                echo strlen($description) > 100 ? substr($description, 0, 100) . '...' : $description;
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-small btn-edit" onclick="editDisease(<?php echo $disease->id; ?>)">
                                    ✏️ Edit
                                </button>
                                <form method="post" style="display: inline;">
                                    <input type="hidden" name="delete_id" value="<?php echo $disease->id; ?>">
                                    <button type="submit" name="submit_delete"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus penyakit ini?')"
                                        class="buttondelete">🗑️ Hapus</button>
                                </form>
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
                        dari <?php echo $total_items; ?> data
                    </div>

                    <ul class="pagination">
                        <?php
                        // First page
                        if ($current_page > 1):
                        ?>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">⏮️ Pertama</a></li>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>">◀️ Sebelumnya</a></li>
                        <?php else: ?>
                            <li><span class="disabled">⏮️ Pertama</span></li>
                            <li><span class="disabled">◀️ Sebelumnya</span></li>
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
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>">Selanjutnya ▶️</a></li>
                            <li><a href="<?php echo esc_url(add_query_arg('paged', $total_pages)); ?>">Terakhir ⏭️</a></li>
                        <?php else: ?>
                            <li><span class="disabled">Selanjutnya ▶️</span></li>
                            <li><span class="disabled">Terakhir ⏭️</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal" <?php echo ($edit_disease) ? 'style="display: block;"' : ''; ?>>
    <div class="modal-content">
        <div class="modal-header">
            <h3>✏️ Edit Penyakit</h3>
            <button class="close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <?php if ($edit_disease): ?>
                <!-- Form action mengarah ke halaman yang sama, bukan admin-post.php -->
                <form method="post" action="">
                    <!-- Name field harus sesuai dengan yang dicari di fungsi process_disease_edit() -->
                    <input type="hidden" name="edit_id" value="<?php echo esc_attr($edit_disease->id); ?>">
                    <?php wp_nonce_field('disease_edit_action', 'disease_edit_nonce'); ?>

                    <div class="form-row">
                        <label>Kode Penyakit</label>
                        <!-- Name field harus sesuai: edit_code -->
                        <input type="text" name="edit_code" value="<?php echo esc_attr($edit_disease->code); ?>" required>
                    </div>

                    <div class="form-row">
                        <label>Nama Penyakit</label>
                        <!-- Name field harus sesuai: edit_name -->
                        <input type="text" name="edit_name" value="<?php echo esc_attr($edit_disease->name); ?>" required>
                    </div>

                    <div class="form-row">
                        <label>Deskripsi</label>
                        <!-- Name field harus sesuai: edit_description -->
                        <textarea name="edit_description"><?php echo esc_textarea($edit_disease->description); ?></textarea>
                    </div>

                    <div class="form-row">
                        <label>Solusi</label>
                        <!-- Name field harus sesuai: edit_solutions -->
                        <textarea name="edit_solutions"><?php echo esc_textarea($edit_disease->solutions); ?></textarea>
                    </div>

                    <div class="form-submit-area">
                        <!-- Submit button name harus sesuai: submit_edit -->
                        <button type="submit" name="submit_edit" class="button-primary">💾 Simpan Perubahan</button>
                    </div>
                </form>
            <?php else: ?>
                <p>Data penyakit tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    // Edit Disease Function - redirect to same page with edit_id parameter
    function editDisease(id) {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('edit_id', id);
        window.location.href = currentUrl.toString();
    }

    // Close Modal Function
    function closeModal() {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.delete('edit_id');
        window.location.href = currentUrl.toString();
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            closeModal();
        }
    }

    // Auto-submit search after typing (debounced)
    let searchTimeout;
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                this.form.submit();
            }, 500);
        });

    }
</script>