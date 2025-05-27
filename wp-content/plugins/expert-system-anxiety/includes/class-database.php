<?php
class ESA_Database {
    
    public static function create_tables() {
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        
        // SQL untuk membuat semua tabel (sesuai struktur di atas)
        $sql_diseases = "CREATE TABLE {$wpdb->prefix}sp_diseases (
            id INT AUTO_INCREMENT PRIMARY KEY,
            code VARCHAR(10) UNIQUE NOT NULL,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            solutions TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) $charset_collate;";
        
        // ... (tambahkan semua SQL untuk tabel lainnya)
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_diseases);
        // dbDelta untuk tabel lainnya
        
        // Insert data default
        self::insert_default_data();
    }
    
    private static function insert_default_data() {
        global $wpdb;
        
        // Insert penyakit default
        $diseases = array(
            array('code' => 'P001', 'name' => 'Gangguan Kecemasan Umum', 'description' => '...'),
            array('code' => 'P002', 'name' => 'Gangguan Kecemasan Sosial', 'description' => '...'),
            // ... tambahkan penyakit lainnya
        );
        
        foreach ($diseases as $disease) {
            $wpdb->insert("{$wpdb->prefix}sp_diseases", $disease);
        }
        
        // Insert gejala dan rules default
        // ...
    }
}