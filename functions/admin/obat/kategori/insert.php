<?php  
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['kategori'])) {
    $hal = $_GET['page'];
    $kategori = $_POST['kategori'];
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $target_dir = "asset/obat/icon/kategori";
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
                    window.location.href = "table.php?type=kategori&page=<?php echo $hal; ?>";
                </script>
                <?php
                return; // Hentikan eksekusi jika upload gagal
            }
        } else {
            ?>
            <script>
                alert("Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan!");
                window.location.href = "table.php?type=kategori&page=<?php echo $hal; ?>";
            </script>
            <?php
            return; // Hentikan eksekusi jika tipe file tidak sesuai
        }
    } else {
        // Debug: Tampilkan pesan jika tidak ada file yang di-upload
        echo "Tidak ada gambar yang di-upload.";
        $gambar = ''; // Jika tidak ada file gambar, kosongkan path gambar
    }
    $table = "kategori";

    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE kategori=:kategori");
    $stmt->bindParam(":kategori", $kategori);
    $stmt->execute();
    $valueKategori = $stmt->fetchColumn();
    $stmt = null;
    if ($valueKategori>0) {
        ?>
        <script>
            alert("Kategori Sudah Terdapat di Tabel");
            window.location.href = "table.php?type=kategori&page=<?php echo $hal; ?>";
        </script>
        <?php
    } else {
        $sql = "INSERT INTO $table (kategori, gambar) VALUES (:kategori, :gambar)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':gambar', $gambar);

        if ($stmt->execute()) {
            ?>
            <script>
                alert("Kategori Berhasil Ditambahkan");
                window.location.href = "table.php?type=kategori&page=<?php echo $hal; ?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Kategori Gagal Ditambahkan");
                window.location.href = "table.php?type=kategori&page=<?php echo $hal; ?>";
            </script>
            <?php
        }
    }
}
?>