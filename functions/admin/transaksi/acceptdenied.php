<?php
if (isset($_GET['denied'])) {
    $id = $_GET['denied'];
    $hal = $_GET['page'];
    $table = 'transaksi';

    // Memperbarui status
    $sql = "UPDATE $table SET status='Ditolak' WHERE id=:id"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt = null;

    ?>
    <script>
        window.location.href = 'table.php?type=transaksi&page=<?php echo $hal ?>'
    </script>
    <?php
}
?>