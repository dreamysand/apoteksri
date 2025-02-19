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
    gambar VARCHAR(255),
    khasiat LONGTEXT,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (golongan_id) REFERENCES golongan(id) ON DELETE CASCADE ON UPDATE CASCADE
)";

// Eksekusi pembuatan tabel Obat
if ($conn->query($sql_obat) === TRUE) {
    echo "Tabel Obat sudah ada atau berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Buat tabel adminusers jika belum ada
$sql_adminusers = "CREATE TABLE IF NOT EXISTS adminusers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE KEY NOT NULL,
    password VARCHAR(255) NOT NULL,
    roles VARCHAR(100) NOT NULL,
    status VARCHAR(100) NOT NULL,
    gambar VARCHAR(100)
)";

// Eksekusi pembuatan tabel adminusers
if ($conn->query($sql_adminusers) === TRUE) {
    echo "Tabel Adminusers sudah ada atau berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Buat tabel Pembayaran
$sql_pembayaran = "CREATE TABLE IF NOT EXISTS pembayaran (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    metode_pembayaran VARCHAR(100) NOT NULL
)";

// Eksekusi pembuatan tabel Pembayaran
if ($conn->query($sql_pembayaran) === TRUE) {
    echo "Tabel Pembayaran sudah ada atau berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Ubah tabel Transaksi dan tambahkan foreign key ke metode_pembayaran dengan CASCADE
$sql_transaksi = "CREATE TABLE IF NOT EXISTS transaksi (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(10) UNSIGNED NOT NULL,
    id_admin INT(10) UNSIGNED NOT NULL,
    id_obat INT(10) UNSIGNED NOT NULL,
    jumlah_obat INT(5) NOT NULL,
    id_metode_pembayaran INT(6) UNSIGNED NOT NULL,
    total_harga DECIMAL(15, 2) NOT NULL,
    status ENUM('Belum Dikonfirmasi', 'Diterima', 'Ditolak') DEFAULT 'Belum Dikonfirmasi',
    tanggal_transaksi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES adminusers(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_admin) REFERENCES adminusers(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_obat) REFERENCES obat(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_metode_pembayaran) REFERENCES pembayaran(id) ON DELETE CASCADE ON UPDATE CASCADE
)";

// Eksekusi pembuatan tabel Transaksi
if ($conn->query($sql_transaksi) === TRUE) {
    echo "Tabel Transaksi sudah ada atau berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

$sql_resep = "CREATE TABLE IF NOT EXISTS resep (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_obat INT UNSIGNED NOT NULL,
    id_user INT UNSIGNED NOT NULL,
    id_admin INT UNSIGNED NOT NULL,
    status ENUM('Belum Dikonfirmasi', 'Diterima', 'Ditolak') DEFAULT 'Belum Dikonfirmasi',
    tanggal_resep_dibuat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_obat) REFERENCES obat(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_user) REFERENCES adminusers(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_admin) REFERENCES adminusers(id) ON DELETE CASCADE ON UPDATE CASCADE
)";


// Eksekusi pembuatan tabel Transaksi
if ($conn->query($sql_resep) === TRUE) {
    echo "Tabel Resep sudah ada atau berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}
// Tutup koneksi
$conn->close();
?>
