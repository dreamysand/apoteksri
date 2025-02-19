<?php
include 'vendor/autoload.php';
use Dompdf\Dompdf;

if (isset($_GET['printpdf'])) {
    include 'functions/config/connection.php';

    $table = "transaksi";
    $table_obat = "obat";
    $table_adminuser = "adminusers";
    $table_pembayaran = "pembayaran";

    // Query untuk mengambil data transaksi
    $sql = "SELECT $table.id, user.username AS user_username, admin.username AS admin_username, $table.id_admin,
                   $table.id_resep, $table_obat.nama, $table.jumlah_obat, 
                   $table_pembayaran.metode_pembayaran, $table.total_harga, 
                   $table.status, $table.tanggal_transaksi, $table.uang_bayar, $table.uang_kembalian
            FROM $table
            LEFT JOIN $table_obat ON $table.id_obat = $table_obat.id
            LEFT JOIN $table_adminuser AS user ON $table.id_user = user.id
            LEFT JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
            LEFT JOIN $table_pembayaran ON $table.id_metode_pembayaran = $table_pembayaran.id
            WHERE $table.id = :id";
        
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['printpdf']);
    $stmt->execute();   
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek apakah data ditemukan
    if (!$result) {
        die("Data resep tidak ditemukan.");
    }
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struk Transaksi - Apotek Sri</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { width: 80%; margin: 0 auto; }
            .header { text-align: center; }
            .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            .table th, .table td { border: 1px solid #000; padding: 10px; text-align: left; }
            .total { font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="header">Struk Transaksi</h1>
            <p>ID Transaksi: '.htmlspecialchars($result['id']).'</p>
            <p>User: '.htmlspecialchars($result['user_username']).'</p>
            <p>Id Admin: '.htmlspecialchars($result['id_admin']).'</p>
            <p>Obat: '.htmlspecialchars($result['nama']).'</p>
            <p>Jumlah Obat: '.htmlspecialchars($result['jumlah_obat']).'</p>
            <p>Metode Pembayaran: '.htmlspecialchars($result['metode_pembayaran']).'</p>
            <p>Tanggal Transaksi: '.htmlspecialchars($result['tanggal_transaksi']).'</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Total Harga</th>
                        <th>Uang Bayar</th>
                        <th>Uang Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rp. '.number_format($result['total_harga'], 0, ',', '.').'</td>
                        <td>Rp. '.number_format($result['uang_bayar'], 0, ',', '.').'</td>
                        <td>Rp. '.number_format($result['uang_kembalian'], 0, ',', '.').'</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: center;">Terima kasih telah berbelanja di Apotek Sri!</p>
        </div>
    </body>
    </html>';

    // Load HTML ke Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Bersihkan output buffer dan set header PDF
    ob_end_clean();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename='transaksi.pdf'");
    
    // Output PDF ke browser
    $dompdf->stream('struk-transaksi_'.$result['id'].'_'.$result['tanggal_transaksi'].'.pdf', array("Attachment" => true));
    exit();
}
?>