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

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nama']) && isset($_POST['kategori']) && isset($_POST['golongan']) && isset($_POST['produsen']) && isset($_POST['harga']) && isset($_POST['stok'])) {
    $hal = $_GET['page'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $golongan = $_POST['golongan'];
    $produsen = $_POST['produsen'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $khasiat = $_POST['khasiat'];
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
        echo "Tidak ada gambar yang di-upload.";
        $gambar = ''; // Jika tidak ada file gambar, kosongkan path gambar
    }
    $table = "obat";

    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE nama=:nama AND produsen = :produsen");
    $stmt->bindParam(":nama", $nama);
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
        $sql = "INSERT INTO $table (nama, kategori_id, golongan_id, produsen, harga, stok, gambar, khasiat) VALUES (:nama,:kategori,:golongan,:produsen,:harga,:stok,:gambar,:khasiat)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':golongan', $golongan);
        $stmt->bindParam(':produsen', $produsen);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->bindParam(':khasiat', $khasiat);

        if ($stmt->execute()) {
            ?>
            <script>
                alert("Obat Berhasil Ditambahkan");
                window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Obat Gagal Ditambahkan");
                window.location.href = "table.php?type=obat&page=<?php echo $hal; ?>";
            </script>
            <?php
        }
    }
}
?>