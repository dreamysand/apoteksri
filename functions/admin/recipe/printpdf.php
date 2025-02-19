<?php
include 'vendor/autoload.php';
use Dompdf\Dompdf;

if (isset($_GET['printpdf'])) {
    include 'functions/config/connection.php';

    // Ambil ID dari parameter GET
    $id = isset($_GET['printpdf']) ? intval($_GET['printpdf']) : 1;
    $table = 'resep';

    // Ambil data resep berdasarkan ID
    $sql = "SELECT * FROM $table WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek apakah data ditemukan
    if (!$result) {
        die("Data resep tidak ditemukan.");
    }

    // Ambil data resep
    $id = $result['id']; 
    $id_obat = $result['id_obat']; 
    $id_user = $result['id_user'];
    $id_admin = $result['id_admin'];
    $status = $result['status'];
    $tanggalResep = $result['tanggal_resep_dibuat'];

    // Menghasilkan PDF
    $dompdf = new Dompdf();

    // Konten HTML untuk PDF
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struk Resep - Apotek Sri</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 font-sans">

        <div class="max-w-xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-green-600 mb-4">Struk Resep</h2>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Apotek Sri</h3>
            </div>
            
            <div class="border-b-2 border-gray-300 mb-4"></div>

            <p class="text-gray-700"><strong>Id Resep:</strong> <span class="text-gray-900">' .htmlspecialchars($id).'</span></p>
            <p class="text-gray-700"><strong>Id Obat:</strong> <span class="text-gray-900">' .htmlspecialchars($id_obat). '</span></p>
            <p class="text-gray-700"><strong>Id User:</strong> <span class="text-gray-900">' .htmlspecialchars($id_user). '</span></p>
            <p class="text-gray-700"><strong>Id Admin:</strong> <span class="text-gray-900">' .htmlspecialchars($id_admin). '</span></p>
            <p class="text-gray-700"><strong>Status:</strong> <span class="text-gray-900">' .htmlspecialchars($status). '</span></p>
            <p class="text-gray-700"><strong>Tanggal Resep:</strong> <span class="text-gray-900">' .htmlspecialchars($tanggalResep). '</span></p>

            <div class="border-b-2 border-gray-300 my-4"></div>
            
            <p class="text-center text-gray-600">Terima kasih telah berkunjung ke Apotek Sri!</p>
        </div>

    </body>
    </html>
';

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Bersihkan output buffer dan set header PDF
    ob_end_clean();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename='resep.pdf'");
    
    // Output PDF ke browser
    $dompdf->stream('resep.pdf', array("Attachment" => false));
    exit(); // Hentikan eksekusi skrip
}
?>