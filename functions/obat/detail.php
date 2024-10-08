<?php
include 'functions/config/connection.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$hal = (isset($_GET['page'])) ? $_GET['page'] : 1 ;

	$table = "obat";
	$table_kategori = "kategori";
	$table_golongan = "golongan";

	$sql = "
		SELECT $table.id, $table.nama, $table_kategori.kategori, $table_golongan.golongan, $table.produsen, $table.harga, $table.stok, $table.gambar, $table.khasiat 
		FROM $table
		JOIN $table_kategori ON $table.kategori_id = $table_kategori.id
		JOIN $table_golongan ON $table.golongan_id = $table_golongan.id
		WHERE $table.id = :id
	";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id);
	if ($stmt->execute()) {
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} else {
		?>
		<script>
			alert("Gagal");
			window.location.href = "obat.php?page=<?php echo $hal; ?>";
		</script>
		<?php
	}
	
}
?>