<?php
$table = "transaksi";
$table_obat = "obat";
$table_adminuser = "adminusers";
$table_pembayaran = "pembayaran";

$sql = "SELECT $table.id, user.username AS user_username, admin.username AS admin_username, 
               $table.id_resep, $table.id_admin, $table_obat.nama, $table_obat.gambar, $table.jumlah_obat, 
               $table_pembayaran.metode_pembayaran, $table.total_harga, 
               $table.status, $table.tanggal_transaksi, $table.uang_bayar, $table.uang_kembalian
        FROM $table
        LEFT JOIN $table_obat ON $table.id_obat = $table_obat.id
        LEFT JOIN $table_adminuser AS user ON $table.id_user = user.id
        LEFT JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
        LEFT JOIN $table_pembayaran ON $table.id_metode_pembayaran = $table_pembayaran.id
        WHERE $table.id_user = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $_SESSION['id_adminusers']);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>