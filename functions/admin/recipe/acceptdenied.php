<?php
if (isset($_GET['denied'])) {
    $id = $_GET['denied'];
    $hal = $_GET['page'];
    $table = 'resep';

    // Memperbarui status
    $sql = "UPDATE $table SET status='Ditolak' WHERE id=:id"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt = null;

    ?>
    <script>
        window.location.href = 'table.php?type=recipe&page=<?php echo $hal ?>'
    </script>
    <?php
} elseif (isset($_GET['accepted'])) {
    $id = $_GET['accepted'];
    $hal = $_GET['page'];
    $table = 'resep';

    // Memperbarui status
    $sql = "UPDATE $table SET status='Diterima' WHERE id=:id"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt = null;

    ?>
    <script>
        window.location.href = 'table.php?type=recipe&page=<?php echo $hal ?>'
    </script>
    <?php
}
?>