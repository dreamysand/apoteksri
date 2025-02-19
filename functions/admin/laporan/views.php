<?php
$table = "transaksi";
$table_obat = "obat";
$table_adminuser = "adminusers";
$table_pembayaran = "pembayaran";
$limit = 3;

$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Mendapatkan filter tanggal jika ada
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : null;
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : null;

// Menyiapkan query dasar
$sql_total_data = "SELECT COUNT(*) FROM $table";

// Filter berdasarkan bulan, tahun, dan tanggal
if ($tahun) {
    $sql_total_data .= " WHERE YEAR($table.tanggal_transaksi) = :tahun";
}
if ($bulan) {
    $sql_total_data .= " AND MONTH($table.tanggal_transaksi) = :bulan";
}
if ($tanggal) {
    $sql_total_data .= " AND DAY($table.tanggal_transaksi) = :tanggal";
}

$stmt = $conn->prepare($sql_total_data);

// Bind parameter filter jika ada
if ($tahun) {
    $stmt->bindValue(':tahun', $tahun, PDO::PARAM_INT);
}
if ($bulan) {
    $stmt->bindValue(':bulan', $bulan, PDO::PARAM_INT);
}
if ($tanggal) {
    $stmt->bindValue(':tanggal', $tanggal, PDO::PARAM_INT);
}

$stmt->execute();
$total_data_row = $stmt->fetchColumn();
$stmt = null;

$total_pages = ceil($total_data_row / $limit);

// Query untuk mengambil data sesuai halaman dan filter tanggal
$sql = "SELECT $table.id, user.username AS user_username, admin.username AS admin_username, 
               $table.id_resep, $table_obat.nama, $table.jumlah_obat, 
               $table_pembayaran.metode_pembayaran, $table.total_harga, 
               $table.status, $table.tanggal_transaksi, $table.uang_bayar, $table.uang_kembalian
        FROM $table
        LEFT JOIN $table_obat ON $table.id_obat = $table_obat.id
        LEFT JOIN $table_adminuser AS user ON $table.id_user = user.id
        LEFT JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
        LEFT JOIN $table_pembayaran ON $table.id_metode_pembayaran = $table_pembayaran.id";

// Filter berdasarkan bulan, tahun, dan tanggal
if ($tahun) {
    $sql .= " WHERE YEAR($table.tanggal_transaksi) = :tahun";
}
if ($bulan) {
    $sql .= " AND MONTH($table.tanggal_transaksi) = :bulan";
}
if ($tanggal) {
    $sql .= " AND DAY($table.tanggal_transaksi) = :tanggal";
}

// Menambahkan pagination
$sql .= " LIMIT :limit OFFSET :offset";

$stmt = $conn->prepare($sql);

// Bind parameter filter jika ada
if ($tahun) {
    $stmt->bindValue(':tahun', $tahun, PDO::PARAM_INT);
}
if ($bulan) {
    $stmt->bindValue(':bulan', $bulan, PDO::PARAM_INT);
}
if ($tanggal) {
    $stmt->bindValue(':tanggal', $tanggal, PDO::PARAM_INT);
}

$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>