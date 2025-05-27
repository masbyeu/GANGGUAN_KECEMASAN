<?php
// templates/login-page.php
if (!defined('ABSPATH')) {
    exit;
}

$auth = new ESA_Auth();
$error_message = $auth->get_login_error();
ob_start();
if (headers_sent()){
    error_log("Headers sudah di kirim sebelum login");
}
?>


<div class="esa-login-container">
    <div class="esa-login-wrapper">
        <div class="esa-login-header">
            <h1>Sistem Pakar Kecemasan Remaja</h1>
            <p>Silakan login untuk mengakses dashboard</p>
        </div>

        <?php if ($error_message): ?>
            <div class="esa-alert esa-alert-error">
                <strong>Error:</strong> <?php echo esc_html($error_message); ?>
            </div>
        <?php endif; ?>

        <form method="post" class="esa-login-form">
            <?php wp_nonce_field('esa_login_action', 'esa_login_nonce'); ?>
            <input type="hidden" name="esa_login" value="1">
            
            <div class="esa-form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required 
                       placeholder="Masukkan username Anda"
                       value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>">
            </div>

            <div class="esa-form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required 
                       placeholder="Masukkan password Anda">
            </div>

            <div class="esa-form-group">
                <button type="submit" class="esa-btn esa-btn-primary">
                    Login
                </button>
            </div>
        </form>

        <div class="esa-login-info">
            <h3>Akun Default:</h3>
            <div class="esa-default-accounts">
                <div class="esa-account-info">
                    <strong>Administrator:</strong><br>
                    Username: <code>admin</code><br>
                    Password: <code>admin123</code>
                </div>
                <div class="esa-account-info">
                    <strong>Dokter:</strong><br>
                    Username: <code>dokter1</code><br>
                    Password: <code>dokter123</code>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.esa-login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.esa-login-wrapper {
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 100%;
    max-width: 450px;
}

.esa-login-header {
    text-align: center;
    margin-bottom: 30px;
}

.esa-login-header h1 {
    color: #333;
    font-size: 24px;
    margin-bottom: 8px;
    font-weight: 600;
}

.esa-login-header p {
    color: #666;
    margin: 0;
    font-size: 14px;
}

.esa-alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 14px;
}

.esa-alert-error {
    background-color: #fee;
    border: 1px solid #fcc;
    color: #c33;
}

.esa-login-form {
    margin-bottom: 30px;
}

.esa-form-group {
    margin-bottom: 20px;
}

.esa-form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    color: #333;
    font-size: 14px;
}

.esa-form-group input[type="text"],
.esa-form-group input[type="password"] {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.3s ease;
    box-sizing: border-box;
}

.esa-form-group input[type="text"]:focus,
.esa-form-group input[type="password"]:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.esa-btn {
    display: inline-block;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    width: 100%;
}

.esa-btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.esa-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.esa-login-info {
    background: #f8f9fa;
    border-radius: 6px;
    padding: 20px;
    border: 1px solid #e9ecef;
}

.esa-login-info h3 {
    margin: 0 0 15px 0;
    color: #495057;
    font-size: 16px;
    font-weight: 600;
}

.esa-default-accounts {
    display: grid;
    gap: 15px;
}

.esa-account-info {
    background: white;
    padding: 15px;
    border-radius: 4px;
    border: 1px solid #dee2e6;
    font-size: 13px;
    line-height: 1.5;
}

.esa-account-info strong {
    color: #495057;
}

.esa-account-info code {
    background: #e9ecef;
    padding: 2px 6px;
    border-radius: 3px;
    font-family: 'Courier New', monospace;
    font-size: 12px;
    color: #495057;
}

@media (max-width: 480px) {
    .esa-login-wrapper {
        padding: 30px 20px;
        margin: 10px;
    }
    
    .esa-login-header h1 {
        font-size: 20px;
    }
}
</style>