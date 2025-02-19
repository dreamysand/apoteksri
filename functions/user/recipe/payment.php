<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['idObat']) && isset($_POST['jumlahBarang']) && isset($_POST['paymentMethod']) && isset($_POST['idUser']) && isset($_POST['harga'])) {
    $idObat = $_POST['idObat'];
    $idRecipe = $_POST['idRecipe'];
    $jumlahBarang = $_POST['jumlahBarang'];
    $paymentMethod = $_POST['paymentMethod'];
    $idUser = $_POST['idUser'];
    $harga = $_POST['harga'];
    $table = "transaksi";

    $sql = "INSERT INTO $table (id_user, id_obat, id_resep, jumlah_obat, id_metode_pembayaran, total_harga) VALUES (:idUser,:idObat,:idRecipe,:jumlahBarang,:paymentMethod,:harga)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->bindParam(':idObat', $idObat);
    $stmt->bindParam(':idRecipe', $idRecipe);
    $stmt->bindParam(':jumlahBarang', $jumlahBarang);
    $stmt->bindParam(':paymentMethod', $paymentMethod);
    $stmt->bindParam(':harga', $harga);

    if ($stmt->execute()) {
        $stmt = null;
        $table = "obat";
        $sql = "UPDATE $table SET stok = stok-:jumlahBarang WHERE id = :idObat";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':jumlahBarang', $jumlahBarang);
        $stmt->bindParam(':idObat', $idObat);

        $stmt->execute();
        $stmt = null;

        $table = "resep";
        $sql = "UPDATE $table SET status = 'Diterima' WHERE id = :idRecipe";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idRecipe', $idRecipe);

        $stmt->execute();
        ?>
        <script>
            alert("Pemesanan Berhasil");
        </script>
        <?php
        $_SESSION['recipe'] = 0;
        ?>
        <script>
            window.location.href = 'table.php?type=recipe&page=<?php echo $hal ?>';
        </script>
        <?php
    } else {
        $stmt = null;
        ?>
        <script>
            alert("Pemesanan Gagal");
        </script>
        <?php
        $_SESSION['recipe'] = 0;
        ?>
        <script>
            window.location.href = 'table.php?type=recipe&page=<?php echo $hal ?>';
        </script>
        <?php
    }
    
}
?>