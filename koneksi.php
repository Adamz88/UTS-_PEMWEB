<?php
// Path ke file .env
$envPath = __DIR__ . '.env';

// Fungsi untuk membaca .env
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception("File .env tidak ditemukan!");
    }
    $vars = parse_ini_file($path);
    foreach ($vars as $key => $value) {
        putenv("$key=$value");
    }
}

// Panggil fungsi untuk memuat variabel .env
loadEnv($envPath);

$servername = getenv('DB_HOST');
$database = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
