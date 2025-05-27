<?php
class ESA_Auth {

    public function __construct() {
        add_action('init', array($this, 'handle_login'));
        add_action('init', array($this, 'handle_logout'));
        add_action('wp_loaded', array($this, 'check_authentication'));
    }

    public static function create_users_table() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'esa_users';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            username varchar(50) NOT NULL,
            password varchar(255) NOT NULL,
            role enum('admin','dokter') NOT NULL DEFAULT 'dokter',
            full_name varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            last_login datetime NULL,
            is_active tinyint(1) DEFAULT 1,
            PRIMARY KEY (id),
            UNIQUE KEY username (username),
            UNIQUE KEY email (email)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        self::create_default_users(); // Insert default users
    }

    private static function create_default_users() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'esa_users';
        $existing_users = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");

        if ($existing_users == 0) {
            // Insert default admin
            $wpdb->insert(
                $table_name,
                array(
                    'username' => 'admin',
                    'password' => password_hash('admin123', PASSWORD_DEFAULT),
                    'role' => 'admin',
                    'full_name' => 'Administrator',
                    'email' => 'admin@sistempakar.com'
                )
            );

            // Insert default dokter
            $wpdb->insert(
                $table_name,
                array(
                    'username' => 'dokter1',
                    'password' => password_hash('dokter123', PASSWORD_DEFAULT),
                    'role' => 'dokter',
                    'full_name' => 'Dr. John Doe',
                    'email' => 'dokter@sistempakar.com'
                )
            );
        }
    }

    public function handle_login() {
        if (isset($_POST['esa_login']) && $_POST['esa_login'] == '1') {
            if (!wp_verify_nonce($_POST['esa_login_nonce'], 'esa_login_action')) {
                wp_die('Security check failed');
            }

            $username = sanitize_text_field($_POST['username']);
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $this->set_login_error('Username dan password harus diisi');
                return;
            }

            $user = $this->authenticate_user($username, $password);

            if ($user) {
                $this->set_user_session($user);
                $this->update_last_login($user->id);
                wp_redirect(admin_url('admin.php?page=expert-system'));
                exit;
            } else {
                $this->set_login_error('Username atau password salah');
            }
        }
    }

    public function handle_logout() {
        if (isset($_GET['esa_logout']) && $_GET['esa_logout'] == '1') {
            $this->destroy_user_session();
            wp_redirect(admin_url('admin.php?page=esa-login'));
            exit;
        }
    }

    private function authenticate_user($username, $password) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'esa_users';

        $user = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table_name WHERE username = %s AND is_active = 1",
            $username
        ));

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }

        return false;
    }

    private function set_user_session($user) {
        if (!session_id()) {
            session_start();
        }

        $_SESSION['esa_user_id'] = $user->id;
        $_SESSION['esa_username'] = $user->username;
        $_SESSION['esa_role'] = $user->role;
        $_SESSION['esa_full_name'] = $user->full_name;
        $_SESSION['esa_logged_in'] = true;
    }

    private function destroy_user_session() {
        if (!session_id()) {
            session_start();
        }

        unset($_SESSION['esa_user_id']);
        unset($_SESSION['esa_username']);
        unset($_SESSION['esa_role']);
        unset($_SESSION['esa_full_name']);
        unset($_SESSION['esa_logged_in']);

        session_destroy();
    }

    private function update_last_login($user_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'esa_users';

        $wpdb->update(
            $table_name,
            array('last_login' => current_time('mysql')),
            array('id' => $user_id)
        );
    }

    private function set_login_error($message) {
        set_transient('esa_login_error', $message, 30);
    }

    public function get_login_error() {
        $error = get_transient('esa_login_error');
        if ($error) {
            delete_transient('esa_login_error');
            return $error;
        }
        return false;
    }

    public function is_logged_in() {
        if (!session_id()) {
            session_start();
        }

        return isset($_SESSION['esa_logged_in']) && $_SESSION['esa_logged_in'] === true;
    }

    public function get_current_user() {
        if (!session_id()) {
            session_start();
        }

        if ($this->is_logged_in()) {
            return (object) array(
                'id' => $_SESSION['esa_user_id'],
                'username' => $_SESSION['esa_username'],
                'role' => $_SESSION['esa_role'],
                'full_name' => $_SESSION['esa_full_name']
            );
        }

        return false;
    }

    public function check_authentication() {
        if (is_admin() && isset($_GET['page']) && strpos($_GET['page'], 'expert-system') !== false) {
            if (!$this->is_logged_in() && $_GET['page'] !== 'esa-login') {
                wp_redirect(admin_url('admin.php?page=esa-login'));
                exit;
            }
        }
    }

    public function has_permission($required_role = 'dokter') {
        $user = $this->get_current_user();

        if (!$user) {
            return false;
        }

        if ($required_role === 'admin') {
            return $user->role === 'admin';
        }

        return in_array($user->role, ['admin', 'dokter']);
    }
}
