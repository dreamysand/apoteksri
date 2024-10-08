<?php
$table = "golongan";
$limit = 3;

$page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
$offset = ($page - 1) * $limit;

$sql_total_data = "SELECT COUNT(*) FROM $table";
$stmt = $conn->prepare($sql_total_data);
$stmt->execute();
$total_data_row = $stmt->fetchColumn();
$stmt = null;

$total_pages = ceil($total_data_row/$limit);

$sql = "SELECT * FROM $table LIMIT :limit OFFSET :offset"; 
$stmt = $conn->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = null;
?>