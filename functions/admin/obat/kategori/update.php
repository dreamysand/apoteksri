<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$table = 'siswa';
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$nilai = $_POST['nilai'];
	
	$sql = "UPDATE $table SET nama = :nama, kelas = :kelas, nilai = :kelas WHERE nis = :nis";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nama', $nama);
	$stmt->bindParam(':kelas', $kelas);
	$stmt->bindParam(':nilai', $nilai);
	$stmt->bindParam(':nis', $nis);
	$stmt->execute();
}
?>