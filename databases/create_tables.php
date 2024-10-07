<?php
// Koneksi ke database apoteksri
$conn = new mysqli("localhost", "root", "", "apoteksri");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat tabel Kategori jika belum ada
$sql_kategori = "CREATE TABLE IF NOT EXISTS kategori (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kategori VARCHAR(100) NOT NULL,
    gambar VARCHAR(255)
)";

// Buat tabel Golongan jika belum ada
$sql_golongan = "CREATE TABLE IF NOT EXISTS golongan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    golongan VARCHAR(100) NOT NULL,
    gambar VARCHAR(255)
)";

// Eksekusi pembuatan tabel Kategori dan Golongan
if ($conn->query($sql_kategori) === TRUE && $conn->query($sql_golongan) === TRUE) {
    echo "Tabel Kategori dan Golongan sudah ada atau berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Buat tabel Obat jika belum ada, dengan foreign key ke Kategori dan Golongan
$sql_obat = "CREATE TABLE IF NOT EXISTS obat (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kategori_id INT(6) UNSIGNED NOT NULL,
    golongan_id INT(6) UNSIGNED NOT NULL,
    produsen VARCHAR(100),
    harga DECIMAL(10, 2),
    stok INT(10),
    FOREIGN KEY (kategori_id) REFERENCES kategori(id),
    FOREIGN KEY (golongan_id) REFERENCES golongan(id)
)";

// Eksekusi pembuatan tabel Obat
if ($conn->query($sql_obat) === TRUE) {
    echo "Tabel Obat sudah ada atau berhasil dibuat";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
