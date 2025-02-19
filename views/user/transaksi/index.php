<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link rel="icon" href="asset/logo.svg" type="image/svg+xml">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen pb-[200px] bg-fixed bg-no-repeat bg-center bg-cover bg-[#E7F4E4]">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>

    <div class="container mx-auto p-6 mt-12">
    <h1 class="text-4xl font-bold mb-6 mt-[5rem]">Riwayat Transaksi</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($result as $transaction): ?>
            <!-- Dummy Data Transaksi 1 -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="<?php echo $transaction['gambar']; ?>" alt="Obat <?php echo $transaction['id'] ?>" class="w-full h-32 object-cover rounded-t-lg">
                <h2 class="text-lg font-bold mt-2"><?php echo $transaction['nama'] ?></h2>
                <p class="text-gray-600"><?php echo $transaction['total_harga'] ?></p>
                <p class="text-gray-600"><?php echo $transaction['tanggal_transaksi'] ?></p>
                <div class="flex justify-between mt-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg" onclick="showDetail(<?php echo $transaction['id'] ?>)">Rincian</button>
                    <?php if ($transaction['status'] == 'Diterima'): ?>
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg" onclick="printReceipt(<?php echo $transaction['id'] ?>)">Cetak Struk</button>
                    <?php endif ?>
                </div>
            </div>
    <?php endforeach ?>
    </div>      
    <div id="detailTransaction" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[1000]">
        <div class="bg-white p-8 rounded-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Detail Transaksi</h2>
            <form method="post" action="table.php?type=transaksi&cashier">
                <!-- Informasi Transaksi -->
                <div class="mb-4">
                    <label class="block font-semibold">ID Transaksi:</label>
                    <input id="transactionId" name="id" type="number" readonly value="">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">User:</label>
                    <input id="userUsername" name="user_username" type="text" readonly value="">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Id Admin:</label>
                    <input id="adminId" name="id_admin" type="number" readonly value="">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Obat:</label>
                    <input id="medication" name="obat" type="text" readonly value="">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Jumlah Obat:</label>
                    <input id="medicationAmount" name="jumlah_obat" type="number" readonly value="">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Metode Pembayaran:</label>
                    <input id="paymentMethod" name="metode_pembayaran" type="text" readonly value="">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Tanggal Transaksi:</label>
                    <input id="transactionDate" name="tanggal_transaksi" type="text" readonly value="">
                </div>
                <!-- Total Pembayaran -->
                <div class="mb-4">
                    <label class="block font-semibold">Total Harga:</label>
                    <input id="totalPrice" name="total_harga" type="number" readonly value="">
                </div>
                <!-- Input Uang Pembayaran dan Kembalian -->
                <div class="mb-4">
                    <label for="pay_balance" class="block font-semibold">Uang Pembayaran:</label>
                    <input id="payBalance" name="pay_balance" type="number" readonly required>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Kembalian:</label>
                    <input id="returnBalance" name="return_balance" type="text" readonly value="">
                </div>
                <!-- Tombol Tutup -->
                <button type="button" onclick="closeDetail()" class="mt-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Tutup
                </button>
            </form>
        </div>
    </div>

<script>
    function showDetail(id) {
        fetch(`get_data.php?type=transaksi&id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    // Isi form dengan data yang diterima
                    document.getElementById('transactionId').value = data.id;
                    document.getElementById('userUsername').value = data.user_username;
                    document.getElementById('adminId').value = data.id_admin; // Tambahkan admin_username jika ada
                    document.getElementById('medication').value = data.nama;
                    document.getElementById('medicationAmount').value = data.jumlah_obat;
                    document.getElementById('paymentMethod').value = data.metode_pembayaran;
                    document.getElementById('transactionDate').value = data.tanggal_transaksi;
                    document.getElementById('totalPrice').value = data.total_harga;
                    document.getElementById('payBalance').value = data.uang_bayar;
                    document.getElementById('returnBalance').value = data.uang_kembalian;

                    // Tampilkan tampilan kasir
                    document.getElementById('detailTransaction').classList.remove('hidden');
                } else {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error fetching cashier data:', error);
            });
    }

    function closeDetail() {
        document.getElementById('detailTransaction').classList.add('hidden');
    }

    function printReceipt(id) {
        window.location.href = `table.php?type=transaksi&printpdf=${id}`;
    }
</script>


    <footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>