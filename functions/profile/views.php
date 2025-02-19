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
?>