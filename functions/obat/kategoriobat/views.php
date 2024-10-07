<?php 
include 'functions/config/connection.php';

function NormalForm()
{
	$normal = preg_replace('/[^a-zA-Z0-9\s]/', '', $normal);
	$normal = str_replace(' ', '%', $normal);

	return $normal;
}

$table = "kategori";

$sql = "SELECT * FROM $table WHERE 1=1";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>