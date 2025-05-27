<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register custom roles for the expert system.
 */



/**
 * Register custom block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) {
    function twentytwentyfour_block_styles() {

        register_block_style(
            'core/details',
            array(
                'name'         => 'arrow-icon-details',
                'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
                'inline_style' => '
                    .is-style-arrow-icon-details { padding-top: var(--wp--preset--spacing--10); padding-bottom: var(--wp--preset--spacing--10); }
                    .is-style-arrow-icon-details summary { list-style-type: "\2193\00a0\00a0\00a0"; }
                    .is-style-arrow-icon-details[open]>summary { list-style-type: "\2192\00a0\00a0\00a0"; }
                ',
            )
        );

        // Other block styles here...

    }
    add_action('init', 'twentytwentyfour_block_styles');
}

/**
 * Enqueue custom block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) {
    function twentytwentyfour_block_stylesheets() {
        wp_enqueue_block_style(
            'core/button',
            array(
                'handle' => 'twentytwentyfour-button-style-outline',
                'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
                'ver'    => wp_get_theme(get_template())->get('Version'),
                'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
            )
        );
    }
    add_action('init', 'twentytwentyfour_block_stylesheets');
}

/**
 * Register pattern categories for block patterns.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) {
    function twentytwentyfour_pattern_categories() {
        register_block_pattern_category(
            'twentytwentyfour_page',
            array(
                'label'       => _x('Pages', 'Block pattern category', 'twentytwentyfour'),
                'description' => __('A collection of full page layouts.', 'twentytwentyfour'),
            )
        );
    }
    add_action('init', 'twentytwentyfour_pattern_categories');
}

add_filter('nonce_life', function() {
    return 3600; // Set masa berlaku nonce menjadi 1 jam (3600 detik)
});

function simpan_penyakit() {
    if (!isset($_POST['penyakit_nonce']) || !wp_verify_nonce($_POST['penyakit_nonce'], 'penyakit_nonce_action')) {
        wp_die('Nonce tidak valid!');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'sp_diseases'; // Pastikan sesuai dengan nama tabel di database

    $data = [
        'code' => sanitize_text_field($_POST['code']),
        'name' => sanitize_text_field($_POST['name']),
        'description' => sanitize_textarea_field($_POST['description']),
        'solutions' => sanitize_textarea_field($_POST['solutions']),
    ];

    $format = ['%s', '%s', '%s', '%s']; // Pastikan format data sesuai dengan tipe kolom di database

    $insert = $wpdb->insert($table_name, $data, $format);

    if ($insert) {
        wp_redirect(admin_url('admin.php?page=expert-system-diseases')); // Redirect ke halaman setelah input berhasil
        exit; // Pastikan tidak ada output lain yang mengganggu redirect
    } else {
        wp_die('Gagal menyimpan data. Periksa apakah tabel dan kolom sesuai dengan query.');
    }

}

add_action('admin_post_simpan_penyakit', 'simpan_penyakit');
add_action('admin_post_nopriv_simpan_penyakit', 'simpan_penyakit'); // Jika ingin mengizinkan user non-login


    function process_disease_edit() {
    global $wpdb;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_edit'])) {
        $id = intval($_POST['edit_id']);
        $code = sanitize_text_field($_POST['edit_code']);
        $name = sanitize_text_field($_POST['edit_name']);
        $description = sanitize_textarea_field($_POST['edit_description']);
        $solutions = sanitize_textarea_field($_POST['edit_solutions']);
        
        $wpdb->update(
            "{$wpdb->prefix}sp_diseases",
            [
                'code' => $code,
                'name' => $name,
                'description' => $description,
                'solutions' => $solutions
            ],
            ['id' => $id]
        );
        
        // Redirect untuk mencegah data dikirim ulang saat refresh
        wp_redirect(admin_url('admin.php?page=expert-system-diseases'));
        exit;
    }
}
add_action('init', 'process_disease_edit');


function process_disease_delete() {
    global $wpdb;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_delete'])) {
        $id = intval($_POST['delete_id']);
        
        // Validasi ID harus ada dan valid
        if ($id > 0) {
            // Hapus data dari database
            $deleted = $wpdb->delete(
                "{$wpdb->prefix}sp_diseases",
                ['id' => $id],
                ['%d']
            );
            
            // Cek apakah berhasil dihapus
            if ($deleted !== false) {
                // Redirect dengan parameter success
                wp_redirect(admin_url('admin.php?page=expert-system-diseases&deleted=1'));
            } else {
                // Redirect dengan parameter error
                wp_redirect(admin_url('admin.php?page=expert-system-diseases&error=delete_failed'));
            }
        } else {
            // Redirect dengan parameter error untuk ID tidak valid
            wp_redirect(admin_url('admin.php?page=expert-system-diseases&error=invalid_id'));
        }
        exit;
    }
}

add_action('init', 'process_disease_delete');

function process_symptom_edit() {
    global $wpdb;
    
    // Mulai session
    if (!session_id()) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_edit_sypymos'])) {
        $id = intval($_POST['edit_id']); // Ambil ID gejala yang akan diedit
        $code = sanitize_text_field($_POST['edit_code']); // Sanitasi input kode gejala
        $symptom = sanitize_text_field($_POST['edit_symptom']); // Sanitasi input gejala
        $created_at = sanitize_text_field($_POST['edit_created_at']); // Sanitasi input tanggal dibuat
        $updated_at = current_time('mysql'); // Ambil waktu saat ini untuk tanggal diperbarui
        
        // Update data gejala di tabel wp_sp_symptoms
        $wpdb->update(
            "{$wpdb->prefix}sp_symptoms",
            [
                'code' => $code,
                'symptom' => $symptom,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ],
            ['id' => $id]
        );
        
        
        // Redirect ke halaman yang sama atau halaman lain setelah update
        wp_redirect(admin_url('admin.php?page=expert-system-symptoms'));
        exit;
    }
}
add_action('init', 'process_symptom_edit');

function process_symptom_add() {
    global $wpdb;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_add'])) {
        $code = sanitize_text_field($_POST['add_code']); // Input kode gejala
        $symptom = sanitize_text_field($_POST['add_symptom']); // Input gejala
        $created_at = current_time('mysql'); // Waktu saat ini
        $updated_at = current_time('mysql'); // Sama seperti created_at untuk data baru

        // Masukkan data ke tabel wp_sp_symptoms
        $wpdb->insert(
            "{$wpdb->prefix}sp_symptoms",
            [
                'code' => $code,
                'symptom' => $symptom,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ]
        );

        // Redirect ke halaman daftar gejala setelah berhasil menambah
        wp_redirect(admin_url('admin.php?page=expert-system-symptoms'));
        exit;
    }
}
add_action('init', 'process_symptom_add');

function process_symptom_delete() {
    global $wpdb;

    // Periksa apakah ada parameter delete_id di URL dan nonce valid
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['delete_id'])) {
        $id = intval($_GET['delete_id']);

        // Cek nonce untuk keamanan (opsional, jika pakai wp_nonce_url)
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'delete_symptom_' . $id)) {
            wp_die('Permintaan tidak valid atau tidak sah.');
        }

        // Hapus data dari database
        $wpdb->delete("{$wpdb->prefix}sp_symptoms", ['id' => $id]);

        // Redirect ke halaman daftar setelah hapus
        wp_redirect(admin_url('admin.php?page=expert-system-symptoms'));
        exit;
    }
}
add_action('init', 'process_symptom_delete');