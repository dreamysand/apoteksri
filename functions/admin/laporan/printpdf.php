<?php
include 'vendor/autoload.php';
use Dompdf\Dompdf;

ob_start();
if (isset($_GET['printpdf'])) {
    include 'functions/config/connection.php';

    $table = "transaksi";
    $table_obat = "obat";
    $table_adminuser = "adminusers";
    $table_pembayaran = "pembayaran";

    $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : null;
    $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;
    $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : null;

    
    $sql = "SELECT $table.id, user.username AS user_username, admin.username AS admin_username, 
               $table.id_resep, $table_obat.nama, $table.jumlah_obat, 
               $table_pembayaran.metode_pembayaran, $table.total_harga, 
               $table.status, $table.tanggal_transaksi, $table.uang_bayar, $table.uang_kembalian
        FROM $table
        LEFT JOIN $table_obat ON $table.id_obat = $table_obat.id
        LEFT JOIN $table_adminuser AS user ON $table.id_user = user.id
        LEFT JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
        LEFT JOIN $table_pembayaran ON $table.id_metode_pembayaran = $table_pembayaran.id";
    
    if ($tahun) {
        $sql .= " WHERE YEAR($table.tanggal_transaksi) = :tahun";
    }
    if ($bulan) {
        $sql .= " AND MONTH($table.tanggal_transaksi) = :bulan";
    }
    if ($tanggal) {
        $sql .= " AND DAY($table.tanggal_transaksi) = :tanggal";
    }
    $stmt = $conn->prepare($sql);
    if ($tahun) {
        $stmt->bindValue(':tahun', $tahun, PDO::PARAM_INT);
    }
    if ($bulan) {
        $stmt->bindValue(':bulan', $bulan, PDO::PARAM_INT);
    }
    if ($tanggal) {
        $stmt->bindValue(':tanggal', $tanggal, PDO::PARAM_INT);
    }

    $stmt->execute();   
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cek apakah data ditemukan
    if (!$result) {
        die("Tidak ada transaksi pada tanggal itu.");
    }

    // Menghasilkan konten HTML untuk PDF
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struk Resep - Apotek Sri</title>
    </head>
    <body>

        <h1 style="text-align: center;">Laporan Transaksi</h1>
        <table border="1" cellspacing="0" style="width: 100%; font-size: 10px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Admin</th>
                    <th>Id Resep</th>
                    <th>Obat</th>
                    <th>Jumlah Obat</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Tanggal Transaksi</th>
                    <th>Uang Bayar</th>
                    <th>Uang Kembalian</th>
                </tr>
            </thead>
            <tbody>';

    // Tambahkan data transaksi ke dalam tabel HTML
    foreach ($result as $row) {
        $html .= '<tr>
            <td>'.htmlspecialchars($row['id']).'</td>
            <td>'.htmlspecialchars($row['user_username']).'</td>
            <td>'.htmlspecialchars($row['admin_username']).'</td>
            <td>'.htmlspecialchars($row['id_resep']).'</td>
            <td>'.htmlspecialchars($row['nama']).'</td>
            <td>'.htmlspecialchars($row['jumlah_obat']).'</td>
            <td>'.htmlspecialchars($row['metode_pembayaran']).'</td>
            <td>'.htmlspecialchars($row['total_harga']).'</td>
            <td>'.htmlspecialchars($row['status']).'</td>
            <td>'.htmlspecialchars($row['tanggal_transaksi']).'</td>
            <td>'.htmlspecialchars($row['uang_bayar']).'</td>
            <td>'.htmlspecialchars($row['uang_kembalian']).'</td>
        </tr>';
    }

    $html .= '
            </tbody>
        </table>
    </body>
    </html>';
    $namePDF = 'laporan_transaksi';
    if ($tahun) {
        $namePDF .= "_".$tahun;
    }
    if ($bulan) {
        $namePDF .= "_".$bulan;
    }
    if ($tanggal) {
        $namePDF .= "_".$tanggal;
    }

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
    $dompdf->stream($namePDF.'.pdf', array("Attachment" => true));
    
    exit();
}
?>