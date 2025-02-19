<?php
if (!isset($_COOKIE['admin']) && $_SESSION['roles'] !== 'admin') {
    // Periksa apakah ada halaman referer
    if (isset($_SERVER['HTTP_REFERER'])) {
        // Redirect ke halaman sebelumnya
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    exit();
}
?>
