<?php
if (isset($_GET['file']) && isset($_GET['redirect'])) {
    $file = urldecode($_GET['file']);
    $redirect = urldecode($_GET['redirect']);
    
    if (file_exists($file)) {
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename='".basename($file)."'");
        readfile($file);
        unlink($file); // Hapus file temporer
    }

    // Redirect setelah download
    header("Location: $redirect");
    exit();
}
?>
