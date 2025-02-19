<?php
if (isset($_COOKIE['admin']) && isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin') {
    header("Location: index.php");
    exit();
} else if (isset($_COOKIE['user']) && isset($_SESSION['roles']) && $_SESSION['roles'] == 'user') {
    header("Location: index.php");
    exit();
} 
?>