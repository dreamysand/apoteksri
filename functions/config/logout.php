<?php
// Pada script logout
session_start();
include 'functions/config/connection.php';

$table = 'adminusers';
$sql = "UPDATE $table SET status = 'inactive' WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $_SESSION['id_adminusers']);
$stmt->execute();
$stmt = null;

session_unset();
session_destroy();

// Hapus cookies
setcookie("admin", "", time() - 3600, "/");
setcookie("user", "", time() - 3600, "/");

// Redirect ke halaman login atau beranda
header("Location: index.php");
exit();

?>