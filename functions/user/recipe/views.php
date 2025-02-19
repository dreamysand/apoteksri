<?php
$table = "resep";
$table_obat = "obat";
$table_adminuser = "adminusers";
$limit = 3;

$page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
$offset = ($page - 1) * $limit;

$sql_total_data = "SELECT COUNT(*) FROM $table WHERE id_user=:id";
$stmt = $conn->prepare($sql_total_data);
$stmt->bindParam(':id', $_SESSION['id_adminusers']);
$stmt->execute();
$total_data_row = $stmt->fetchColumn();
$stmt = null;

$total_pages = ceil($total_data_row/$limit);

$sql = "SELECT $table.id, $table_obat.nama, user.username AS user_username, admin.username AS admin_username, $table.status, $table.tanggal_resep_dibuat, $table.id_admin
    FROM $table
    JOIN $table_obat ON $table.id_obat = $table_obat.id
    JOIN $table_adminuser AS user ON $table.id_user = user.id
    JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
    WHERE id_user=:id 
    LIMIT :limit OFFSET :offset
    ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $_SESSION['id_adminusers']);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = null;
?>