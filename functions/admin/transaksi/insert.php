<?php
$hal = (isset($_GET['page'])) ? $_GET['page'] : 1 ;

$table = "obat";
$table_kategori = "kategori";
$table_golongan = "golongan";
$table_pembayaran = "pembayaran";
$table_user= "adminusers";

$sql = "
	SELECT $table.id, $table.nama, $table_kategori.kategori, $table_golongan.golongan, $table_golongan.perlu_resep, $table.produsen, $table.harga, $table.stok, $table.gambar, $table.khasiat 
	FROM $table
	JOIN $table_kategori ON $table.kategori_id = $table_kategori.id
	JOIN $table_golongan ON $table.golongan_id = $table_golongan.id
	WHERE $table_golongan.perlu_resep = 'Tidak' AND $table.stok>0
";

$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt = null;
} else {
	?>
	<script>
		alert("Gagal");
		window.location.href = "table.php?type=transaksi&page=<?php echo $hal; ?>";
	</script>
	<?php
}
$sql_payment = "
	SELECT * FROM $table_pembayaran
";
$stmt = $conn->prepare($sql_payment);
if ($stmt->execute()) {
	$metode = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt = null;
} else {
	?>
	<script>
		alert("Gagal");
		window.location.href = "table.php?type=transaksi&page=<?php echo $hal; ?>";
	</script>
	<?php
}
$sql_user = "
	SELECT * FROM $table_user
";
$stmt = $conn->prepare($sql_user);
if ($stmt->execute()) {
	$result_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
	?>
	<script>
		alert("Gagal");
		window.location.href = "table.php?type=transaksi&page=<?php echo $hal; ?>";
	</script>
	<?php
}
$harga_obat = [];
foreach ($result as $obat) {
    $harga_obat[$obat['id']] = $obat['harga']; // Misalkan 'harga' adalah kolom yang menyimpan harga obat
}
$stok = [];
foreach ($result as $obat) {
	$stok[$obat['id']] = $obat['stok'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$table = 'transaksi';
    // Pastikan semua input terdefinisi
    $id_obat = isset($_POST['obat']) ? $_POST['obat'] : null;
    $user = isset($_POST['user']) ? $_POST['user'] : null;
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : null;
    $metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : null;
    $total_harga = isset($_POST['total_harga']) ? $_POST['total_harga'] : null;
    $tanggal = date('Y-m-d H:i:s'); // Ambil tanggal dan waktu saat ini

    // Cek apakah metode pembayaran dipilih
    if (empty($metode_pembayaran)) {
        echo "<script>alert('Metode pembayaran tidak boleh kosong!');</script>";
    } else {
        // Masukkan data transaksi ke database
        $sql = "INSERT INTO $table (id_obat, id_user, jumlah_obat, id_metode_pembayaran, total_harga, tanggal_transaksi) 
                  VALUES (:obat_id, :user_id, :jumlah, :metode_pembayaran, :total_harga, :tanggal)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':obat_id', $id_obat);
        $stmt->bindParam(':user_id', $user);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':metode_pembayaran', $metode_pembayaran);
        $stmt->bindParam(':total_harga', $total_harga);
        $stmt->bindParam(':tanggal', $tanggal);

        if ($stmt->execute()) {
        	$stmt = null;
        	$table_obat = 'obat';
        	$sql = "UPDATE $table_obat SET stok = stok-:jumlahBarang WHERE id = :idObat";
	    	$stmt = $conn->prepare($sql);
	    	$stmt->bindParam(':jumlahBarang', $jumlah);
	    	$stmt->bindParam(':idObat', $id_obat);
	    	$stmt->execute();
        	?>
            <script>
            	alert('Transaksi berhasil ditambahkan!'); 
            	window.location.href='table.php?type=transaksi&page=<?php echo $hal ?>';
           	</script>
        	<?php
        }
    }
}
?>