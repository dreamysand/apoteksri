<?php
include 'vendor/autoload.php';
include 'functions/config/connection.php';
use Smalot\PdfParser\Parser;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdfFile'])) {
    if ($_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
        $pdfFilePath = $_FILES['pdfFile']['tmp_name'];

        // Parsing PDF
        $parser = new Parser();
        $pdf = $parser->parseFile($pdfFilePath);
        $recipe = $pdf->getText();

        // Ekstrak informasi dari teks PDF
        preg_match('/Id Resep:\s*(\d+)/', $recipe, $idMatch);
        preg_match('/Id Obat:\s*(\d+)/', $recipe, $idObatMatch);
        preg_match('/Id User:\s*(\d+)/', $recipe, $idUserMatch);
        preg_match('/Id Admin:\s*(\d+)/', $recipe, $idAdminMatch);
        preg_match('/Status:\s*([\w]+(?:\s+[\w]+))/', $recipe, $statusMatch);
        preg_match('/Tanggal Resep:\s*(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $recipe, $tanggalMatch);

        // Data variabel
        $id = $idMatch[1];
        $id_obat = $idObatMatch[1];
        $id_user = $idUserMatch[1];
        $id_admin = $idAdminMatch[1];
        $status = $statusMatch[1];
        $tanggalResep = $tanggalMatch[1];

        if ($status == 'Diterima') {
            ?>
            <script>
                alert("Resep telah diterima");
                window.location.href = 'table.php?type=recipe&page=<?php echo $_GET['hal'] ?>';
            </script>
            <?php
        } else  {
            // Query ke database
            $table = 'resep';
            $table_obat = "obat";
            $table_adminuser = "adminusers";
            $sql = "SELECT $table.id, $table_obat.nama, $table_obat.harga, user.username AS user_username, admin.username AS admin_username, $table.status, $table.tanggal_resep_dibuat, $table.id_admin, $table.id_user, $table.id_obat
                FROM $table
                JOIN $table_obat ON $table.id_obat = $table_obat.id
                JOIN $table_adminuser AS user ON $table.id_user = user.id
                JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
                WHERE $table.id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($recipe) {
                if ($recipe['id'] == $id && $recipe['id_obat'] == $id_obat && $recipe['id_user'] == $id_user &&
                    $recipe['id_admin'] == $id_admin && $recipe['status'] == $status &&
                    $recipe['tanggal_resep_dibuat'] == $tanggalResep) {
                    ?>
                    <script>
                        alert("PDF Berhasil diunggah\nid : <?php echo $id ?> <?php echo $recipe['id'] ?>\nid obat : <?php echo $id_obat ?> <?php echo $recipe['id_obat'] ?>\nid user : <?php echo $id_user ?> <?php echo $recipe['id_user'] ?>\nid admin : <?php echo $id_admin ?> <?php echo $recipe['id_admin'] ?>\nstatus : <?php echo $status ?> <?php echo $recipe['status'] ?>\ntanggal resep : <?php echo $tanggalResep ?> <?php echo $recipe['tanggal_resep_dibuat'] ?>");
                    </script>
                    <?php
                    $_SESSION['recipe'] = 2;
                    $_SESSION['recipe_id'] = $id;
                } else {
                    ?>
                    <script>
                        alert("Data Tidak Sesuai\nid : <?php echo $id ?> <?php echo $recipe['id'] ?>\nid obat : <?php echo $id_obat ?> <?php echo $recipe['id_obat'] ?>\nid user : <?php echo $id_user ?> <?php echo $recipe['id_user'] ?>\nid admin : <?php echo $id_admin ?> <?php echo $recipe['id_admin'] ?>\nstatus : <?php echo $status ?> <?php echo $recipe['status'] ?>\ntanggal resep : <?php echo $tanggalResep ?> <?php echo $recipe['tanggal_resep_dibuat'] ?>")
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Gagal Mendapatkan Data")
                </script>
                <?php
            }
        }
    } else {
        ?>
        <script>
            alert("Gagal Unggah PDF");
        </script>
        <?php
    }
}
if ($_SESSION['recipe'] == 2) {
    $table = 'resep';
    $table_obat = "obat";
    $table_adminuser = "adminusers";
    $table_pembayaran = "pembayaran";
    $id = $_SESSION['recipe_id'];
    $sql = "SELECT $table.id, $table_obat.nama, $table_obat.harga,  $table_obat.stok, user.username AS user_username, admin.username AS admin_username, $table.status, $table.tanggal_resep_dibuat, $table.id_admin, $table.id_user, $table.id_obat
        FROM $table
        JOIN $table_obat ON $table.id_obat = $table_obat.id
        JOIN $table_adminuser AS user ON $table.id_user = user.id
        JOIN $table_adminuser AS admin ON $table.id_admin = admin.id
        WHERE $table.id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql_payment = "
        SELECT * FROM $table_pembayaran
    ";
    $stmt_payment = $conn->prepare($sql_payment);
    if ($stmt_payment->execute()) {
        $metode = $stmt_payment->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
