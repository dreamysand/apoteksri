<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$hal = $_GET['page'];
	$table = "adminusers";

	$sql = "DELETE FROM $table WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id);
	if ($stmt->execute()) {
		$stmt = null;
		$select_sql = "SELECT id FROM $table ORDER BY id ASC";
		$stmt = $conn->prepare($select_sql);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Disable auto-increment temporarily
		$conn->exec("ALTER TABLE $table AUTO_INCREMENT = 1");

		// Reset IDs from 1
		$new_id = 1;
		foreach ($rows as $row) {
			$update_sql = "UPDATE $table SET id = :new_id WHERE id = :old_id";
			$update_stmt = $conn->prepare($update_sql);
			$update_stmt->bindParam(':new_id', $new_id);
			$update_stmt->bindParam(':old_id', $row['id']);
			$update_stmt->execute();
			$new_id++;
		}

		// Set auto-increment to start from the next new ID
		$reset_auto_increment_sql = "ALTER TABLE $table AUTO_INCREMENT = $new_id";
		$conn->exec($reset_auto_increment_sql);

		?>
		<script>
			alert("adminusers Berhasil dihapus");
			window.location.href = 'table.php?type=adminusers&page=<?php echo $hal; ?>'
		</script>
		<?php
	} else {
		?>
		<script>
			alert("adminusers Gagal dihapus");
            window.location.href = 'table.php?type=adminusers&page=<?php echo $hal; ?>'
		</script>
		<?php
	}
}
?>