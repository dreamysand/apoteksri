<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table = "adminusers";
    $sql = "SELECT * FROM $table WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $table = "adminusers";

    if (isset($_POST['cropped_image'])) {
        $cropped_image = $_POST['cropped_image'];
        $binary = preg_replace('#^data:image/\w+;base64,#i', '', $cropped_image);
        $image_data = base64_decode($binary);

        $target_dir = "asset/profile";
        $image_name = uniqid() . '.png';
        $target_file = $target_dir . $image_name;

        if (file_put_contents($target_file, $image_data)) {
            $gambar = $target_file;
        } else {
            $gambar = $_POST['old_image'];
        }
    } else {
        $gambar = $_POST['old_image'];
    }

    // Cek apakah username sudah ada di database (kecuali untuk ID ini)
    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE email = :email AND id != :id");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $valueUsername = $stmt->fetchColumn();
    $stmt = null;

    if ($valueUsername > 0) {
        ?>
        <script>
            alert('Username sudah ada!'); 
            window.location.href = 'profile.php?id=<?php echo $id ?>';
        </script>
        <?php
    } else {
        // Update data
        $sql = "UPDATE $table SET username = :username, email = :email, password = :password, gambar = :gambar WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Data Berhasil Diedit'); window.location.href = 'profile.php?id=$id';</script>";
        } else {
            echo "<script>alert('Data Gagal Diedit'); window.location.href = 'profile.php?id=$id';</script>";
        }
    }
}
?>
