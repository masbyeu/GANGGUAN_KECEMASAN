<?php
/**
 * Plugin Name: Expert System Anxiety
 * Description: Sistem Pakar Kecemasan Remaja dengan Metode Certainty Factor
 * Version: 1.0
 * Author: Your Name
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('ESA_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ESA_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Include required files
require_once ESA_PLUGIN_PATH . 'includes/class-database.php';
require_once ESA_PLUGIN_PATH . 'includes/class-consultation.php';
require_once ESA_PLUGIN_PATH . 'includes/class-cf-calculation.php';
require_once ESA_PLUGIN_PATH . 'includes/class-admin.php';
require_once ESA_PLUGIN_PATH . 'includes/class-auth.php'; // File baru untuk autentikasi
require_once ESA_PLUGIN_PATH . 'templates/symptoms-page.php';
require_once ESA_PLUGIN_PATH . 'templates/diseases-page.php';

// Activation hook
register_activation_hook(__FILE__, 'esa_create_tables');

// Initialize plugin
add_action('plugins_loaded', 'esa_init');

function esa_init() {
    new ESA_Admin();
    new ESA_Consultation();
    new ESA_Auth(); // Initialize authentication class
}

function esa_create_tables() {
    ESA_Database::create_tables();
    ESA_Auth::create_users_table(); // Create users table for custom authentication
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'esa_enqueue_scripts');
function esa_enqueue_scripts() {
    wp_enqueue_style('esa-style', ESA_PLUGIN_URL . 'assets/css/style.css');
    wp_enqueue_script('esa-script', ESA_PLUGIN_URL . 'assets/js/script.js', array('jquery'));
}

// Register shortcode for consultation form
add_shortcode('consultations_form', 'consultation_form_shortcode');

function consultation_form_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/consultation-form.php';
    return ob_get_clean();
}

add_filter('nonce_life', function() {
    return 3600; // Set masa berlaku nonce menjadi 1 jam (3600 detik)
});
add_action('init', function () {
    if (isset($_GET['generate_esa_users']) && $_GET['generate_esa_users'] === '1') {
        if (class_exists('ESA_Auth')) {
            ESA_Auth::create_users_table(); // Ini akan create table + insert default user
            echo "✅ Default users berhasil dibuat.";
        } else {
            echo "❌ Class ESA_Auth tidak ditemukan.";
        }
        exit;
    }
});