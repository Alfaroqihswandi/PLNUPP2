<?php
$host = 'localhost'; // Ganti dengan alamat host jika diperlukan
$db = 'monitoring_proyek';
$user = 'username'; // Ganti dengan username database Anda
$pass = 'password'; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
