<?php
if (!isset($_COOKIE['admin']) && !isset($_COOKIE['user'])) {
    header("Location: index.php");
    exit();
}
?>