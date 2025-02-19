<?php
if (isset($_POST['payment'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['idObat']) && isset($_POST['needRecipe']) && isset($_POST['jumlahBarang']) && isset($_POST['paymentMethod']) && isset($_POST['idUser']) && isset($_POST['harga'])) {
        $idObat = $_POST['idObat'];
        $needRecipe = $_POST['needRecipe'];
        $jumlahBarang = $_POST['jumlahBarang'];
        $paymentMethod = $_POST['paymentMethod'];
        $idUser = $_POST['idUser'];
        $harga = $_POST['harga'];
        $table = "transaksi";

        $sql = "INSERT INTO $table (id_user, id_obat, jumlah_obat, id_metode_pembayaran, total_harga) VALUES (:idUser,:idObat,:jumlahBarang,:paymentMethod,:harga)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':idObat', $idObat);
        $stmt->bindParam(':jumlahBarang', $jumlahBarang);
        $stmt->bindParam(':paymentMethod', $paymentMethod);
        $stmt->bindParam(':harga', $harga);

        if ($stmt->execute()) {
            $stmt = null;
            ?>
            <script>
                alert("Pemesanan Berhasil");
                window.location.href = "table.php?type=obat&id=<?php echo $idObat; ?>";
            </script>
            <?php
        } else {
            $stmt = null;
            ?>
            <script>
                alert("Pemesanan Gagal");
                window.location.href = "table.php?type=obat&id=<?php echo $idObat; ?>";
            </script>
            <?php
        }
        $table = "obat";
        $sql = "UPDATE $table SET stok = stok-:jumlahBarang WHERE id = :idObat";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':jumlahBarang', $jumlahBarang);
        $stmt->bindParam(':idObat', $idObat);

        $stmt->execute();
    }
}
?>