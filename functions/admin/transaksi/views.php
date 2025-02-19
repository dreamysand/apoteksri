<?php
$table = "transaksi";
$table_obat = "obat";
$table_adminuser = "adminusers";
$table_pembayaran = "pembayaran";
$limit = 3;

$page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
$offset = ($page - 1) * $limit;

$sql_total_data = "SELECT COUNT(*) FROM $table";
$stmt = $conn->prepare($sql_total_data);
$stmt->execute();
$total_data_row = $stmt->fetchColumn();
$stmt = null;

$total_pages = ceil($total_data_row/$limit);

$sql = "SELECT $table.id, user.username AS user_username, admin.username AS admin_username, 
               $table.id_resep, $table_obat.nama, $table.jumlah_obat, 
               $table_pembayaran.metode_pembayaran, $table.total_harga, 
               $table.status, $table.tanggal_transaksi, $table.uang_bayar, $table.uang_kembalian
        FROM $table
        INNER JOIN $table_obat ON $table.id_obat = $table_obat.id
        INNER JOIN $table_adminuser AS user ON $table.id_user = user.id
        LEFT JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
        LEFT JOIN $table_pembayaran ON $table.id_metode_pembayaran = $table_pembayaran.id
        LIMIT :limit OFFSET :offset";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>