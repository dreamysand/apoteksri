<?php
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$hal = $_GET['page'];
	$table = "kategori";

	$sql = "DELETE FROM $table WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id);
	if ($stmt->execute()) {
		$stmt = null;
		$max_id_sql = "SELECT MAX(id) AS max FROM $table";
		$stmt = $conn->prepare($max_id_sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$max_id = $result['max'] !== null ? $result['max'] : 1 ;
		$stmt = null;

		$reset_id_sql = "ALTER TABLE $table AUTO_INCREMENT = $max_id";
		$conn->exec($reset_id_sql);
		?>
		<script>
			alert("Kategori Berhasil dihapus");
			window.location.href = "kategori.php?page=<?php echo $hal; ?>";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Kategori Gagal dihapus");
			window.location.href = "kategori.php?page=<?php echo $hal; ?>";
		</script>
		<?php
	}
}
?>