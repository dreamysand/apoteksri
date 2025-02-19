<?php
$table_kategori = "kategori";
$table_golongan = "golongan";

$sql_kategori = "SELECT * FROM $table_kategori";
$sql_golongan = "SELECT * FROM $table_golongan";

$stmt = $conn->prepare($sql_kategori);
if ($stmt->execute()) {
    $result_kategori = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
} else {
    ?>
    <script>
        console.log("Data Gagal Diambil")
    </script>
    <?php
}

$stmt = $conn->prepare($sql_golongan);
if ($stmt->execute()) {
    $result_golongan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
} else {
    ?>
    <script>
        console.log("Data Gagal Diambil")
    </script>
    <?php
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$table = "obat";
	$sql = "SELECT * FROM $table WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt = null;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = $_POST['nama'];
	$id = $_POST['id'];
	$hal = $_POST['page'];
    $kategori = $_POST['kategori'];
    $golongan = $_POST['golongan'];
    $produsen = $_POST['produsen'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $khasiat = $_POST['khasiat'];
    $table = "obat";

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $target_dir = "asset/obat/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedFileType = [
            'jpg',
            'png',
            'jpeg',
            'gif',
            'jfif',
            'avif',
            'webp',
            'svg'
        ];

        // Cek tipe file yang diizinkan (jpg, jpeg, png, gif, jfif)
        if (in_array($imageFileType, $allowedFileType)) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar = $target_file; // Simpan path gambar
                // Debug: Cek apakah gambar berhasil dipindah
                echo "File uploaded to: " . $gambar;
            } else {
                ?>
                <script>
                    alert("Upload gambar gagal!");
                    window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
                </script>
                <?php
                return; // Hentikan eksekusi jika upload gagal
            }
        } else {
            ?>
            <script>
                alert("Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan!");
                window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
            </script>
            <?php
            return; // Hentikan eksekusi jika tipe file tidak sesuai
        }
    } else {
        // Debug: Tampilkan pesan jika tidak ada file yang di-upload
        $gambar = $_POST['old_image']; // Jika tidak ada file gambar, kosongkan path gambar
    }

    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE nama=:nama AND id != :id AND produsen = :produsen");
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":produsen", $produsen);
    $stmt->execute();
    $valueNama = $stmt->fetchColumn();
    $stmt = null;
    if ($valueNama>0) {
        ?>
        <script>
            alert("Obat Sudah Terdapat di Tabel");
            window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
        </script>
        <?php
    } else {
        $sql = "UPDATE $table SET nama=:nama, kategori_id=:kategori, golongan_id=:golongan, produsen=:produsen, harga=:harga, stok=:stok, gambar=:gambar, khasiat=:khasiat WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':golongan', $golongan);
        $stmt->bindParam(':produsen', $produsen);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->bindParam(':khasiat', $khasiat);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            ?>
            <script>
                alert("Obat Berhasil Diedit");
                window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Obat Gagal Diedit");
                window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
            </script>
            <?php
        }
    }    
}
?>