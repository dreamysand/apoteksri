<?php
include 'vendor/autoload.php';
use Dompdf\Dompdf;
include 'functions/config/connection.php';

if (isset($_GET['cashier'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['user_username']) && isset($_POST['id_admin']) && isset($_POST['obat']) && isset($_POST['jumlah_obat']) && isset($_POST['metode_pembayaran']) && isset($_POST['tanggal_transaksi']) && isset($_POST['total_harga']) && isset($_POST['pay_balance']) && isset($_POST['return_balance'])) {
        $table = "transaksi";

        $sql = "UPDATE $table SET id_admin = :id_admin, status = 'Diterima', uang_bayar = :pay_balance, uang_kembalian = :return_balance WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_admin', $_POST['id_admin']);
        $stmt->bindParam(':pay_balance', $_POST['pay_balance']);
        $stmt->bindParam(':return_balance', $_POST['return_balance']);
        $stmt->bindParam(':id', $_POST['id']);
        if ($stmt->execute()) {
	        ?>
	        <script>
	        	alert("Data Berhasil")
	        </script>
		    <?php
		} else {
		    ?>
	        <script>
	        	alert("Data Gagal")
	        </script>
		    <?php
		}

        // Menghasilkan konten HTML untuk PDF
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
                <p>ID Transaksi: '.htmlspecialchars($_POST['id']).'</p>
                <p>User: '.htmlspecialchars($_POST['user_username']).'</p>
                <p>Admin: '.htmlspecialchars($_POST['id_admin']).'</p>
                <p>Obat: '.htmlspecialchars($_POST['obat']).'</p>
                <p>Jumlah Obat: '.htmlspecialchars($_POST['jumlah_obat']).'</p>
                <p>Metode Pembayaran: '.htmlspecialchars($_POST['metode_pembayaran']).'</p>
                <p>Tanggal Transaksi: '.htmlspecialchars($_POST['tanggal_transaksi']).'</p>
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
                            <td>Rp. '.number_format($_POST['total_harga'], 0, ',', '.').'</td>
                            <td>Rp. '.number_format($_POST['pay_balance'], 0, ',', '.').'</td>
                            <td>Rp. '.number_format($_POST['return_balance'], 0, ',', '.').'</td>
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
        $dompdf->stream('struk-transaksi_'.$_POST['id'].'_'.$_POST['tanggal_transaksi'].'.pdf', array("Attachment" => true));
        exit();
    } else {
    	$table = "transaksi";
	    $table_obat = "obat";
	    $table_adminuser = "adminusers";
	    $table_pembayaran = "pembayaran";

	    $id = $_GET['cashier'];
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
        $stmt->bindParam(':id', $id);
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
}
?>