<?php
// admin/users.php
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;
$table_name = $wpdb->prefix . 'esa_users';

// Get all users
$users = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");

// Check for success message
$success_message = '';
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 'added':
            $success_message = 'User berhasil ditambahkan!';
            break;
        case 'updated':
            $success_message = 'User berhasil diperbarui!';
            break;
        case 'deleted':
            $success_message = 'User berhasil dihapus!';
            break;
    }
}
?>

<div class="esa-users-management">
    <div class="esa-page-header">
        <h1>Kelola User</h1>
        <button class="esa-btn esa-btn-primary" onclick="openAddUserModal()">
            <span class="dashicons dashicons-plus-alt"></span>
            Tambah User
        </button>
    </div>

    <?php if ($success_message): ?>
        <div class="esa-alert esa-alert-success">
            <?php echo esc_html($success_message); ?>
        </div>
    <?php endif; ?>

    <!-- Users Table -->
    <div class="esa-table-container">
        <table class="esa-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Login Terakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo esc_html($user->id); ?></td>
                            <td>
                                <strong><?php echo esc_html($user->username); ?></strong>
                            </td>
                            <td><?php echo esc_html($user->full_name); ?></td>
                            <td><?php echo esc_html($user->email); ?></td>
                            <td>
                                <span class="esa-role-badge esa-role-<?php echo esc_attr($user->role); ?>">
                                    <?php echo ucfirst($user->role); ?>
                                </span>
                            </td>
                            <td>
                                <span class="esa-status-badge esa-status-<?php echo $user->is_active ? 'active' : 'inactive'; ?>">
                                    <?php echo $user->is_active ? 'Aktif' : 'Nonaktif'; ?>
                                </span>
                            </td>
                            <td>
                                <?php echo $user->last_login ? date('d/m/Y H:i', strtotime($user->last_login)) : 'Belum pernah'; ?>
                            </td>
                            <td>
                                <div class="esa-action-buttons">
                                    <button class="esa-btn esa-btn-sm esa-btn-secondary" 
                                            onclick="editUser(<?php echo esc_attr(json_encode($user)); ?>)">
                                        Edit
                                    </button>
                                    <?php if ($user->id != 1): // Jangan hapus admin utama ?>
                                        <button class="esa-btn esa-btn-sm esa-btn-danger" 
                                                onclick="deleteUser(<?php echo $user->id; ?>, '<?php echo esc_js($user->username); ?>')">
                                            Hapus
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="esa-no-data">Tidak ada data user</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="esa-modal" style="display: none;">
    <div class="esa-modal-content">
        <div class="esa-modal-header">
            <h2>Tambah User Baru</h2>
            <span class="esa-close" onclick="closeAddUserModal()">&times;</span>
        </div>
        <form method="post" class="esa-form">
            <?php wp_nonce_field('esa_user_action', 'esa_nonce'); ?>
            <input type="hidden" name="action" value="add">
            
            <div class="esa-form-row">
                <div class="esa-form-group">
                    <label for="add_username">Username *</label>
                    <input type="text" id="add_username" name="username" required>
                </div>
                <div class="esa-form-group">
                    <label for="add_full_name">Nama Lengkap *</label>
                    <input type="text" id="add_full_name" name="full_name" required>
                </div>
            </div>

            <div class="esa-form-row">
                <div class="esa-form-group">
                    <label for="add_email">Email *</label>
                    <input type="email" id="add_email" name="email" required>
                </div>
                <div class="esa-form-group">
                    <label for="add_role">Role *</label>
                    <select id="add_role" name="role" required>
                        <option value="dokter">Dokter</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div class="esa-form-group">
                <label for="add_password">Password *</label>
                <input type="password" id="add_password" name="password" required>
            </div>

            <div class="esa-modal-footer">
                <button type="button" class="esa-btn esa-btn-secondary" onclick="closeAddUserModal()">
                    Batal
                </button>
                <button type="submit" class="esa-btn esa-btn-primary">
                    Tambah User
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="esa-modal" style="display: none;">
    <div class="esa-modal-content">
        <div class="esa-modal-header">
            <h2>Edit User</h2>
            <span class="esa-close" onclick="closeEditUserModal()">&times;</span>
        </div>
        <form method="post" class="esa-form">
            <?php wp_nonce_field('esa_user_action', 'esa_nonce'); ?>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" id="edit_id" name="id">
            
            <div class="esa-form-row">
                <div class="esa-form-group">
                    <label for="edit_username">Username *</label>
                    <input type="text" id="edit_username" name="username" required>
                </div>
                <div class="esa-form-group">
                    <label for="edit_full_name">Nama Lengkap *</label>
                    <input type="text" id="edit_full_name" name="full_name" required>
                </div>
            </div>

            <div class="esa-form-row">
                <div class="esa-form-group">
                    <label for="edit_email">Email *</label>
                    <input type="email" id="edit_email" name="email" required>
                </div>
                <div class="esa-form-group">
                    <label for="edit_role">Role *</label>
                    <select id="edit_role" name="role" required>
                        <option value="dokter">Dokter</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div class="esa-form-row">
                <div class="esa-form-group">
                    <label for="edit_password">Password (kosongkan jika tidak diubah)</label>
                    <input type="password" id="edit_password" name="password">
                </div>
                <div class="esa-form-group">
                    <label for="edit_is_active">Status *</label>
                    <select id="edit_is_active" name="is_active" required>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>

            <div class="esa-modal-footer">
                <button type="button" class="esa-btn esa-btn-secondary" onclick="closeEditUserModal()">
                    Batal
                </button>
                <button type="submit" class="esa-btn esa-btn-primary">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteUserModal" class="esa-modal" style="display: none;">
    <div class="esa-modal-content esa-modal-small">
        <div class="esa-modal-header">
            <h2>Konfirmasi Hapus</h2>
            <span class="esa-close" onclick="closeDeleteUserModal()">&times;</span>
        </div>
        <div class="esa-modal-body">
            <p>Apakah Anda yakin ingin menghapus user <strong id="deleteUserName"></strong>?</p>
            <p class="esa-warning">Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <form method="post" class="esa-modal-footer">
            <?php wp_nonce_field('esa_user_action', 'esa_nonce'); ?>
            <input type="hidden" name="action" value="delete">
            <input type="hidden" id="delete_id" name="id">
            
            <button type="button" class="esa-btn esa-btn-secondary" onclick="closeDeleteUserModal()">
                Batal
            </button>
            <button type="submit" class="esa-btn esa-btn-danger">
                Hapus User
            </button>
        </form>
    </div>
</div>

<style>
.esa-users-management {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.esa-page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
}

.esa-page-header h1 {
    margin: 0;
    color: #333;
    font-size: 28px;
    font-weight: 600;
}

.esa-alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 14px;
}

.esa-alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.esa-table-container {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.esa-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.esa-table th {
    background: #f8f9fa;
    padding: 15px 12px;
    text-align: left;
    font-weight: 600;
    color: #333;
    border-bottom: 2px solid #dee2e6;
}

.esa-table td {
    padding: 15px 12px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle;
}

.esa-table tbody tr:hover {
    background-color: #f8f9fa;
}

.esa-role-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.esa-role-admin {
    background: #e3f2fd;
    color: #1976d2;
}

.esa-role-dokter {
    background: #e8f5e8;
    color: #2e7d32;
}

.esa-status-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
}

.esa-status-active {
    background: #d4edda;
    color: #155724;
}

.esa-status-inactive {
    background: #f8d7da;
    color: #721c24;
}

.esa-action-buttons {
    display: flex;
    gap: 8px;
}

.esa-btn {
    display: inline-block;
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.esa-btn-sm {
    padding: 6px 12px;
    font-size: 12px;
}

.esa-btn-primary {
    background: #667eea;
    color: white;
}

.esa-btn-primary:hover {
    background: #5a67d8;
}

.esa-btn-secondary {
    background: #6c757d;
    color: white;
}

.esa-btn-secondary:hover {
    background: #5a6268;
}

.esa-btn-danger {
    background: #dc3545;
    color: white;
}

.esa-btn-danger:hover {
    background: #c82333;
}

