<?php  
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['roles']) && isset($_POST['status'])) {
    $hal = $_GET['page'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roles = $_POST['roles'];
    $status = $_POST['status'];
    $gambar = "asset/layout/account.png";
    $table = "adminusers";

    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $valueusername = $stmt->fetchColumn();
    $stmt = null;
    if ($valueusername>0) {
        ?>
        <script>
            alert("Pengguna Sudah Terdapat di Tabel");
            window.location.href = "table.php?type=adminusers.php?page=<?php echo $hal; ?>";
        </script>
        <?php
    } else {
        $password_Hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $table (username, email, password, roles, status, gambar) VALUES (:username,:email,:password,:roles,:status,:gambar)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_Hash);
        $stmt->bindParam(':roles', $roles);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':gambar', $gambar);

        if ($stmt->execute()) {
            ?>
            <script>
                alert("Pengguna Berhasil Ditambahkan");
                window.location.href = "table.php?type=adminusers?page=<?php echo $hal; ?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Pengguna Gagal Ditambahkan");
                window.location.href = "table.php?type=adminusers?page=<?php echo $hal; ?>";
            </script>
            <?php
        }
    }
}
?>