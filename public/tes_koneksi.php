<?php

// --- GANTI BAGIAN INI SESUAI FILE .env ANDA ---
$host = '127.0.0.1';
$dbname = 'rumah-umkm';
$user = 'root';
$pass = ''; // Kosongkan jika tidak ada password
// ---------------------------------------------

header('Content-Type: text/plain');

try {
    // 1. Coba koneksi ke database
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "✅ Koneksi Berhasil!\n\n";

    // 2. Coba buat tabel sederhana
    $dbh->exec("CREATE TABLE IF NOT EXISTS test_tabel (id INT, pesan VARCHAR(255))");
    echo "✅ Perintah CREATE TABLE berhasil dijalankan.\n\n";
    
    // 3. Coba hapus tabel tersebut
    $dbh->exec("DROP TABLE test_tabel");
    echo "✅ Perintah DROP TABLE berhasil dijalankan.\n\n";

    echo "🎉 SELAMAT! Koneksi, hak akses CREATE, dan DROP Anda berfungsi normal.\nMasalah kemungkinan besar ada pada konfigurasi Laravel atau cache.";

} catch (PDOException $e) {
    echo "❌ GAGAL TOTAL!\n\n";
    echo "Pesan Error: " . $e->getMessage();
    die();
}