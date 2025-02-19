<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$table = "golongan";
	$sql = "SELECT * FROM $table WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt = null;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$golongan = $_POST['golongan'];
	$id = $_POST['id'];
    $perlu_resep = $_POST['perlu_resep'];
	$hal = $_POST['page'];
    $table = "golongan";

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $target_dir = "asset/admin/icon/golongan/";
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
                    window.location.href = "table.php?type=golongan&page=<?php echo $hal; ?>";
                </script>
                <?php
                return; // Hentikan eksekusi jika upload gagal
            }
        } else {
            ?>
            <script>
                alert("Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan!");
                window.location.href = "table.php?type=golongan&page=<?php echo $hal; ?>";
            </script>
            <?php
            return; // Hentikan eksekusi jika tipe file tidak sesuai
        }
    } else {
        // Debug: Tampilkan pesan jika tidak ada file yang di-upload
        $gambar = $_POST['old_image']; // Jika tidak ada file gambar, kosongkan path gambar
    }

    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE golongan=:golongan AND id != :id");
    $stmt->bindParam(":golongan", $golongan);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $valueGolongan = $stmt->fetchColumn();
    $stmt = null;
    if ($valueGolongan>0) {
        ?>
        <script>
            alert("Obat Sudah Terdapat di Tabel");
            window.location.href = "table.php?type=golongan&page=<?php echo $hal; ?>";
        </script>
        <?php
    } else {
        $sql = "UPDATE $table SET golongan=:golongan, perlu_resep=:perlu_resep, gambar=:gambar WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':golongan', $golongan);
        $stmt->bindParam(':perlu_resep', $perlu_resep);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            ?>
            <script>
                alert("Obat Berhasil Diedit");
                window.location.href = "table.php?type=golongan&page=<?php echo $hal; ?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Obat Gagal Diedit");
                window.location.href = "table.php?type=golongan&page=<?php echo $hal; ?>";
            </script>
            <?php
        }
    }    
}
?>