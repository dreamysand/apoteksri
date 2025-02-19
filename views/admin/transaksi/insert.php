<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Resep</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="obat" class="block text-sm font-medium text-gray-700">Obat</label>
                <select id="obat" name="obat" class="w-full px-4 py-2 border rounded-lg text-gray-800" onchange="updateData()" required>
                    <option value="" disabled selected>Pilih Obat</option>
                    <?php foreach ($result as $obat): ?>
                        <option value="<?php echo $obat['id']; ?>"><?php echo $obat['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="user" class="block text-sm font-medium text-gray-700">Pelanggan</label>
                <input list="list_User" id="user" name="user" class="w-full px-4 py-2 border rounded-lg text-gray-800" required>
                <datalist id="list_User">
                    <option value="" disabled selected>Pilih Pelanggan</option>
                    <?php foreach ($result_user as $row_user): ?>
                        <option value="<?php echo $row_user['id']; ?>"><?php echo $row_user['username']; ?></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="mb-4">
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" class="w-full px-4 py-2 border rounded-lg text-gray-800" value="1" min="0" max="" oninput="updateData()" required>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                <input type="text" id="harga" name="harga" class="w-full px-4 py-2 border rounded-lg text-gray-800" readonly>
            </div>
            <div class="mb-4">
                <label for="total_harga" class="block text-sm font-medium text-gray-700">Total Harga</label>
                <input type="text" id="total_harga" name="total_harga" class="w-full px-4 py-2 border rounded-lg text-gray-800" readonly>
            </div>
            <div class="mb-4">
                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select id="metode_pembayaran" name="metode_pembayaran" class="w-full px-4 py-2 border rounded-lg text-gray-800" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <?php foreach ($metode as $metode_pembayaran): ?>
                        <option value="<?php echo $metode_pembayaran['id']; ?>"><?php echo $metode_pembayaran['metode_pembayaran']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4">Tambah Transaksi</button>
            <button type="button" class="w-full bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300" onclick="insertBack()">Kembali</button>
        </form>
    </div>
</body>
<script>
    const hargaObat = <?php echo json_encode($harga_obat); ?>; // Mendapatkan harga obat dari PHP
    const stokObat = <?php echo json_encode($stok); ?>; // Mendapatkan harga obat dari PHP

    function updateData() {
        const obatId = document.getElementById('obat').value;
        const jumlahBarang = document.getElementById('jumlah');
        const hargaSatuanInput = document.getElementById('harga');
        const totalHargaInput = document.getElementById('total_harga');

        if (obatId) {
            const hargaSatuan = hargaObat[obatId] || 0;
            hargaSatuanInput.value = hargaSatuan;
            const totalHarga = hargaSatuan * jumlahBarang.value;
            totalHargaInput.value = totalHarga;
            jumlahBarang.setAttribute('max', stokObat[obatId]);
        } else {
            hargaSatuanInput.value = '';
            totalHargaInput.value = '';
        }
    }
</script>
</html>
