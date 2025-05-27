<?php
$host = "localhost";
$dbname = "sistem_pakar";
$username = "root";
$password = "";

// Koneksi
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cek tabel, buat jika belum ada
$conn->exec("
CREATE TABLE IF NOT EXISTS wp_esa_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    created_at DATETIME,
    last_login DATETIME,
    is_active TINYINT(1) DEFAULT 1
)
");

// Hash password
$password1 = password_hash("admin123", PASSWORD_DEFAULT);
$password2 = password_hash("dokter123", PASSWORD_DEFAULT);

// Insert user default
$conn->exec("
INSERT INTO wp_esa_users (username, password, role, full_name, email, created_at)
VALUES 
('admin', '$password1', 'admin', 'Administrator', 'admin@example.com', NOW()),
('dokter1', '$password2', 'dokter', 'Dr. John Doe', 'dokter@example.com', NOW())
");

echo "✅ Data user berhasil dimasukkan.";

// runningkan ini setelah memasukan data user baru (http://localhost/sistem_pakar/?generate_esa_users=1)
?>
