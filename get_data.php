<?php
session_start();
include 'functions/sessions/unlogined.php';
include 'functions/config/connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (isset($_GET['type']) && $_GET['type'] == 'transaksi') {
        $table = "transaksi";
        $table_obat = "obat";
        $table_adminuser = "adminusers";
        $table_pembayaran = "pembayaran";
        $sql = "SELECT $table.id, user.username AS user_username, admin.username AS admin_username, $table.id_admin,
                $table.id_resep, $table_obat.nama, $table.jumlah_obat, 
                $table_pembayaran.metode_pembayaran, $table.total_harga, 
                $table.status, $table.tanggal_transaksi, $table.uang_bayar, $table.uang_kembalian
                FROM $table
                LEFT JOIN $table_obat ON $table.id_obat = $table_obat.id
                LEFT JOIN $table_adminuser AS user ON $table.id_user = user.id
                LEFT JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
                LEFT JOIN $table_pembayaran ON $table.id_metode_pembayaran = $table_pembayaran.id
                WHERE $table.id = :id";
            
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            $transaksi = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($transaksi) {
                echo json_encode($transaksi);
            } else {
                echo json_encode(['error' => 'Data tidak ditemukan']);
            }
        } else {
            echo json_encode(['error' => 'Terjadi kesalahan saat mengeksekusi query']);
        }
        exit; // Penting untuk menghentikan eksekusi script lebih lanjut
        header("Location: table.php?type=transaksi");
        exit();
    } elseif (isset($_GET['type']) && $_GET['type'] == 'recipe') {
        $table = "resep";
        $table_obat = "obat";
        $table_adminuser = "adminusers";
        $sql = "SELECT $table.id, $table_obat.nama, user.username AS user_username, admin.username AS admin_username, $table.status, $table.tanggal_resep_dibuat, $table.id_admin
                FROM $table
                JOIN $table_obat ON $table.id_obat = $table_obat.id
                JOIN $table_adminuser AS user ON $table.id_user = user.id
                JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
                WHERE $table.id=:id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            $transaksi = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($transaksi) {
                echo json_encode($transaksi);
            } else {
                echo json_encode(['error' => 'Data tidak ditemukan']);
            }
        } else {
            echo json_encode(['error' => 'Terjadi kesalahan saat mengeksekusi query']);
        }
        exit; // Penting untuk menghentikan eksekusi script lebih lanjut
        header("Location: table.php?type=transaksi");
        exit();
    }
}
?>