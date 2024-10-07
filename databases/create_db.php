<?php
// Koneksi ke MySQL
$conn = new mysqli("localhost", "root", "", "");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database apoteksri jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS apoteksri";
if ($conn->query($sql) === TRUE) {
    echo "Database apoteksri sudah ada atau berhasil dibuat";
} else {
    echo "Error membuat database: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
