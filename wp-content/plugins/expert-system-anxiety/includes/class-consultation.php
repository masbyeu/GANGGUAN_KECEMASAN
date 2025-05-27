<?php
class ESA_Consultation {
    
    public function __construct() {
        add_action('init', array($this, 'init'));
        add_shortcode('consultation_form', array($this, 'consultation_form_shortcode'));
        add_action('wp_loaded', array($this, 'handle_consultation_submit'));
    }
    
    public function init() {
        // Add rewrite rules for consultation pages
        add_rewrite_rule('^konsultasi/?$', 'index.php?consultation_page=form', 'top');
        add_rewrite_rule('^hasil-konsultasi/([0-9]+)/?$', 'index.php?consultation_page=result&consultation_id=$matches[1]', 'top');
        
        add_filter('query_vars', array($this, 'add_query_vars'));
        add_action('template_redirect', array($this, 'consultation_template_redirect'));
    }
    
    public function add_query_vars($vars) {
        $vars[] = 'consultation_page';
        $vars[] = 'consultation_id';
        return $vars;
    }
    
    public function consultation_template_redirect() {
        $consultation_page = get_query_var('consultation_page');
        
        if ($consultation_page === 'form') {
            $this->load_consultation_form();
        } elseif ($consultation_page === 'result') {
            $this->load_consultation_result();
        }
    }
    
    private function load_consultation_form() {
        // Load template untuk form konsultasi
        include ESA_PLUGIN_PATH . 'templates/consultation-form.php';
        exit;
    }
    
    private function load_consultation_result() {
        $consultation_id = get_query_var('consultation_id');
        // Load template untuk hasil konsultasi
        include ESA_PLUGIN_PATH . 'templates/consultation-result.php';
        exit;
    }
    
    public function handle_consultation_submit() {
        if (isset($_POST['submit_consultation'])) {
            $this->process_consultation();
        }
    }
    
    private function process_consultation() {
        global $wpdb;
        
        // Validasi input
        $name = sanitize_text_field($_POST['name']);
        $age = intval($_POST['age']);
        $gender = sanitize_text_field($_POST['gender']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $school = sanitize_text_field($_POST['school']);
        
        // Insert consultation data
        $consultation_data = array(
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'school' => $school,
            'status' => 'completed'
        );
        
        $wpdb->insert("{$wpdb->prefix}sp_consultations", $consultation_data);
        $consultation_id = $wpdb->insert_id;
        
        // Process answers and calculate CF
        $this->process_answers($consultation_id, $_POST['symptoms']);
        
        // Redirect to result page
        wp_redirect(home_url('/hasil-konsultasi/' . $consultation_id));
        exit;
    }
    
    private function process_answers($consultation_id, $symptoms) {
        global $wpdb;
        
        // Insert user answers
        foreach ($symptoms as $symptom_id => $cf_user) {
            if ($cf_user > 0) {
                $wpdb->insert("{$wpdb->prefix}sp_user_answers", array(
                    'consultation_id' => $consultation_id,
                    'symptom_id' => $symptom_id,
                    'cf_user' => $cf_user
                ));
            }
        }
        
        // Calculate diagnosis using CF method
        $cf_calculator = new ESA_CF_Calculation();
        $cf_calculator->calculate_diagnosis($consultation_id);
    }
}