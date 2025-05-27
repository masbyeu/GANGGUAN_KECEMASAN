<?php
// === UPDATED ESA_ADMIN CLASS ===
class ESA_Admin {
    
    private $auth;
    
    public function __construct() {
        $this->auth = new ESA_Auth();
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
    }
    
    public function enqueue_admin_styles() {
        wp_enqueue_style('esa-admin-style', ESA_PLUGIN_URL . 'assets/css/admin-style.css');
    }
    
    public function add_admin_menu() {
        // Login page (always accessible)
        add_menu_page(
            'Login Sistem Pakar',
            'Login SP',
            'read',
            'esa-login',
            array($this, 'login_page'),
            'dashicons-lock',
            2
        );
        
        // Main menu (requires authentication)
        add_menu_page(
            'Sistem Pakar',
            'Sistem Pakar',
            'read',
            'expert-system',
            array($this, 'dashboard_page'),
            'dashicons-analytics',
            30
        );

        // Submenu pages
        add_submenu_page(
            'expert-system',
            'Form Konsultasi',
            'Form Konsultasi',
            'read',
            'consultation-form',
            array($this, 'consultation_form_page')
        );
        
        add_submenu_page(
            'expert-system',
            'Data Penyakit',
            'Data Penyakit',
            'read',
            'expert-system-diseases',
            array($this, 'diseases_page')
        );
        
        add_submenu_page(
            'expert-system',
            'Data Gejala',
            'Data Gejala',
            'read',
            'expert-system-symptoms',
            array($this, 'symptoms_page')
        );
        

        
        add_submenu_page(
            'expert-system',
            'Konsultasi',
            'Data Konsultasi',
            'read',
            'expert-system-consultations',
            array($this, 'consultations_page')
        );
        
        // User management (admin only)
        add_submenu_page(
            'expert-system',
            'Kelola User',
            'Kelola User',
            'read',
            'expert-system-users',
            array($this, 'users_page')
        );
    }
    
    public function login_page() {
        if ($this->auth->is_logged_in()) {
            wp_redirect(admin_url('admin.php?page=expert-system'));
            exit;
        }
        
        include ESA_PLUGIN_PATH . 'templates/login-page.php';
    }
    
    public function dashboard_page() {
        if (!$this->auth->is_logged_in()) {
            wp_redirect(admin_url('admin.php?page=esa-login'));
            exit;
        }
        
        global $wpdb;
        
        // Get statistics
        $total_consultations = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_consultations");
        $today_consultations = $wpdb->get_var($wpdb->prepare("
            SELECT COUNT(*) FROM {$wpdb->prefix}sp_consultations 
            WHERE DATE(consultation_date) = %s
        ", date('Y-m-d')));
        
        $total_diseases = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_diseases");
        $total_symptoms = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}sp_symptoms");
        
        $current_user = $this->auth->get_current_user();
        
        // Include dashboard template
        include ESA_PLUGIN_PATH . 'templates/admin-dashboard.php';
    }
    
    public function consultation_form_page() {
        if (!$this->auth->has_permission('dokter')) {
            wp_die('Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        
        echo do_shortcode('[consultation_form]');
    }
    
    public function diseases_page() {
        if (!$this->auth->has_permission('dokter')) {
            wp_die('Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        
        // Handle form submissions with nonce verification
        if (isset($_POST['action']) && check_admin_referer('esa_disease_action', 'esa_nonce')) {
            $this->handle_disease_action();
        }
        
        // Display diseases management page
        include ESA_PLUGIN_PATH . 'admin/diseases.php';
    }
    
    public function symptoms_page() {
        if (!$this->auth->has_permission('dokter')) {
            wp_die('Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        
        // Handle form submissions with nonce verification
        if (isset($_POST['action']) && check_admin_referer('esa_symptom_action', 'esa_nonce')) {
            $this->handle_symptom_action();
        }
        
        // Display symptoms management page
        include ESA_PLUGIN_PATH . 'admin/symptoms.php';
    }
    
    public function rules_page() {
        if (!$this->auth->has_permission('dokter')) {
            wp_die('Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        
        // Handle form submissions with nonce verification
        if (isset($_POST['action']) && check_admin_referer('esa_rule_action', 'esa_nonce')) {
            $this->handle_rule_action();
        }
        
        // Display rules management page
        include ESA_PLUGIN_PATH . 'admin/rules.php';
    }
    
    public function consultations_page() {
        if (!$this->auth->has_permission('dokter')) {
            wp_die('Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        
        // Display consultations page
        include ESA_PLUGIN_PATH . 'admin/consultations.php';
    }
    
    public function users_page() {
        if (!$this->auth->has_permission('admin')) {
            wp_die('Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        
        // Handle user management actions
        if (isset($_POST['action']) && check_admin_referer('esa_user_action', 'esa_nonce')) {
            $this->handle_user_action();
        }
        
        // Display users management page
        include ESA_PLUGIN_PATH . 'admin/users.php';
    }
    
    // Existing methods remain the same...
    private function handle_disease_action() {
        global $wpdb;
        
        if ($_POST['action'] === 'add') {
            $wpdb->insert("{$wpdb->prefix}sp_diseases", array(
                'code' => sanitize_text_field($_POST['code']),
                'name' => sanitize_text_field($_POST['name']),
                'description' => sanitize_textarea_field($_POST['description']),
                'solutions' => sanitize_textarea_field($_POST['solutions'])
            ));
        } elseif ($_POST['action'] === 'edit') {
            $wpdb->update(
                "{$wpdb->prefix}sp_diseases",
                array(
                    'code' => sanitize_text_field($_POST['code']),
                    'name' => sanitize_text_field($_POST['name']),
                    'description' => sanitize_textarea_field($_POST['description']),
                    'solutions' => sanitize_textarea_field($_POST['solutions'])
                ),
                array('id' => intval($_POST['id']))
            );
        } elseif ($_POST['action'] === 'delete') {
            $wpdb->delete("{$wpdb->prefix}sp_diseases", array('id' => intval($_POST['id'])));
        }
    }
    
    private function handle_symptom_action() {
        global $wpdb;

        if ($_POST['action'] === 'add') {
            $wpdb->insert("{$wpdb->prefix}sp_symptoms", array(
                'symptom' => sanitize_text_field($_POST['symptom']),
                'description' => sanitize_textarea_field($_POST['description'])
            ));
        } elseif ($_POST['action'] === 'edit') {
            $wpdb->update(
                "{$wpdb->prefix}sp_symptoms",
                array(
                    'symptom' => sanitize_text_field($_POST['symptom']),
                    'description' => sanitize_textarea_field($_POST['description'])
                ),
                array('id' => intval($_POST['id']))
            );
        } elseif ($_POST['action'] === 'delete') {
            $wpdb->delete("{$wpdb->prefix}sp_symptoms", array('id' => intval($_POST['id'])));
        }
    }
    
    private function handle_rule_action() {
        global $wpdb;

        if ($_POST['action'] === 'add') {
            $wpdb->insert("{$wpdb->prefix}sp_rules", array(
                'rule_code' => sanitize_text_field($_POST['rule_code']),
                'rule_description' => sanitize_textarea_field($_POST['rule_description']),
                'rule_solution' => sanitize_textarea_field($_POST['rule_solution'])
            ));
        } elseif ($_POST['action'] === 'edit') {
            $wpdb->update(
                "{$wpdb->prefix}sp_rules",
                array(
                    'rule_code' => sanitize_text_field($_POST['rule_code']),
                    'rule_description' => sanitize_textarea_field($_POST['rule_description']),
                    'rule_solution' => sanitize_textarea_field($_POST['rule_solution'])
                ),
                array('id' => intval($_POST['id']))
            );
        } elseif ($_POST['action'] === 'delete') {
            $wpdb->delete("{$wpdb->prefix}sp_rules", array('id' => intval($_POST['id'])));
        }
    }
    
    private function handle_user_action() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'esa_users';

        if ($_POST['action'] === 'add') {
            $wpdb->insert($table_name, array(
                'username' => sanitize_text_field($_POST['username']),
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role' => sanitize_text_field($_POST['role']),
                'full_name' => sanitize_text_field($_POST['full_name']),
                'email' => sanitize_email($_POST['email'])
            ));
        } elseif ($_POST['action'] === 'edit') {
            $update_data = array(
                'username' => sanitize_text_field($_POST['username']),
                'role' => sanitize_text_field($_POST['role']),
                'full_name' => sanitize_text_field($_POST['full_name']),
                'email' => sanitize_email($_POST['email']),
                'is_active' => intval($_POST['is_active'])
            );
            
            // Only update password if provided
            if (!empty($_POST['password'])) {
                $update_data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            
            $wpdb->update($table_name, $update_data, array('id' => intval($_POST['id'])));
        } elseif ($_POST['action'] === 'delete') {
            $wpdb->delete($table_name, array('id' => intval($_POST['id'])));
        }
    }
}