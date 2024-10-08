<?php 
include 'functions/config/connection.php';

function NormalForm()
{
	$normal = preg_replace('/[^a-zA-Z0-9\s]/', '', $normal);
	$normal = str_replace(' ', '%', $normal);

	return $normal;
}

$table = "obat";
$table_kategori = "kategori";
$table_golongan = "golongan";

$sql = "
	SELECT $table.id, $table.nama, $table_kategori.kategori, $table_golongan.golongan, $table.produsen, $table.harga, $table.stok, $table.gambar 
	FROM $table
	JOIN $table_kategori ON $table.kategori_id = $table_kategori.id
	JOIN $table_golongan ON $table.golongan_id = $table_golongan.id
	WHERE 1=1
";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>