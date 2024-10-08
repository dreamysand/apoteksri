<?php
$table = "obat";
$table_kategori = "kategori";
$table_golongan = "golongan";
$limit = 3;

$page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
$offset = ($page - 1) * $limit;

$sql_total_data = "SELECT COUNT(*) FROM $table";
$stmt = $conn->prepare($sql_total_data);
$stmt->execute();
$total_data_row = $stmt->fetchColumn();
$stmt = null;

$total_pages = ceil($total_data_row/$limit);

$sql = "SELECT $table.id, $table.nama, $table_kategori.kategori, $table_golongan.golongan, $table.produsen, $table.harga, $table.stok, $table.gambar 
	FROM $table
	JOIN $table_kategori ON $table.kategori_id = $table_kategori.id
	JOIN $table_golongan ON $table.golongan_id = $table_golongan.id
	WHERE 1=1 
	LIMIT :limit OFFSET :offset
	"; 
$stmt = $conn->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = null;
?>