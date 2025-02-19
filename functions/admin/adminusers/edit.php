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
    $hal = $_GET['page'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null; // Hash password
    $roles = $_POST['roles'];
    $status = $_POST['status'];
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
            alert('Email Sudah Ada');
            window.location.href = 'table.php?type=adminusers&page=<?php echo $hal; ?>'
        </script>
        <?php
    } else {
        // Update data
        $sql = "UPDATE $table SET username = :username, email = :email,";
        if ($password) {
            $sql .= "password = :password,";
        }
        $sql .= " roles = :roles, status = :status, gambar = :gambar WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        if ($password) {
            $stmt->bindParam(':password', $password);
        }
        $stmt->bindParam(':roles', $roles);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
           ?>
            <script>
                alert('Data Berhasil di Edit');
                window.location.href = 'table.php?type=adminusers&page=<?php echo $hal; ?>'
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Email Sudah Ada');
                window.location.href = 'table.php?type=adminusers&page=<?php echo $hal; ?>'
            </script>
            <?php
        }
    }
}
?>
