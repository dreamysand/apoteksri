<?php  
$table_obat = "obat";
$table_user = "adminusers";

$sql_obat = "SELECT $table_obat.id, $table_obat.nama FROM $table_obat JOIN golongan ON $table_obat.golongan_id = golongan.id WHERE golongan.perlu_resep='Ya'";
$sql_user = "SELECT * FROM $table_user WHERE roles='user'";

$stmt = $conn->prepare($sql_obat);
if ($stmt->execute()) {
    $result_obat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
} else {
    ?>
    <script>
        console.log("Data Gagal Diambil")
    </script>
    <?php
}

$stmt = $conn->prepare($sql_user);
if ($stmt->execute()) {
    $result_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
} else {
    ?>
    <script>
        console.log("Data Gagal Diambil")
    </script>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['obat']) && isset($_POST['user']) && isset($_POST['admin'])) {
    $hal = $_GET['page'];
    $obat = $_POST['obat'];
    $user = $_POST['user'];
    $admin = $_POST['admin'];
    $table = "resep";

    
    $sql = "INSERT INTO $table (id_obat, id_user, id_admin) VALUES (:obat,:user,:admin)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':obat', $obat);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':admin', $admin);

    if ($stmt->execute()) {
        ?>
        <script>
            alert("Data Berhasil Ditambahkan");
            window.location.href = "table.php?type=recipe&page=<?php echo $hal; ?>";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data Gagal Ditambahkan");
            window.location.href = "table.php?type=recipe&page=<?php echo $hal; ?>";
        </script>
        <?php
    }
}
?>