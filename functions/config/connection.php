<?php 
$servername = "localhost";
$username = "root"; // username db
$password = ""; // password db
$dbname = "apoteksri"; // nama db

try {
    // Membuat koneksi dengan PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception (menangani error)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Jika koneksi berhasil, tampilkan pesan di konsol browser
    ?>
    <script>
        console.log("Koneksi Berhasil");
    </script>
    <?php
} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan error di konsol browser
    ?>
    <script>
        console.log("Koneksi Gagal: <?php echo $e->getMessage(); ?>");
    </script>
    <?php
}
?>
