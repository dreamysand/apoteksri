<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Obat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#E7F4E4] pb-[200px] relative">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>

    <div class="container mx-auto p-6 mt-12">
        <?php foreach ($result as $obat): ?>
           <h1 class="text-4xl font-bold mb-6 mt-[200px]">Detail Obat: <?php echo $obat['nama']; ?></h1>
            
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex justify-center">
                        <!-- Gambar obat -->
                        <img src="<?php echo $obat['gambar']; ?>" alt="<?php echo $obat['nama']; ?>" class="max-w-full h-auto rounded-lg">
                    </div>
                    <div>
                        <h2 class="text-3xl font-semibold mb-4"><?php echo $obat['nama']; ?></h2>
                        <p class="mb-2"><strong>Kategori:</strong> <a href="kategori.php"><?php echo $obat['kategori']; ?></a></p>
                        <p class="mb-2"><strong>Golongan:</strong> <?php echo $obat['golongan']; ?></p>
                        <p class="mb-2"><strong>Perlu Resep:</strong> <?php echo $obat['perlu_resep']; ?></p>
                        <p class="mb-2"><strong>Produsen:</strong> <?php echo $obat['produsen']; ?></p>
                        <p class="mb-2"><strong>Harga:</strong> Rp <?php echo number_format($obat['harga'], 0, ',', '.'); ?></p>
                        <p class="mb-2"><strong>Stok:</strong> <?php $stok = ($obat['stok']>0) ? $obat['stok']. " Buah" : "Stok Kosong"; echo $stok;?></p>
                        <p class="mb-2"><strong>Khasiat:</strong> <?php echo $obat['khasiat']; ?></p>

                        <!-- Tombol Beli -->
                        <?php if (isset($_COOKIE['admin']) || isset($_COOKIE['user'])): ?>
                            <?php if ($obat['stok']>0 && $obat['perlu_resep'] == "Tidak"): ?>
                                <button 
                                    onclick="showPaymentAlert('<?php echo $obat['harga']?>')"
                                    class="mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Beli Sekarang
                                </button>
                            <?php elseif ($obat['stok']>0 && $obat['perlu_resep'] == 'Ya'): ?>
                                <button 
                                    onclick="window.location.href='table.php?type=recipe'"
                                    class="mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Upload Resep
                                </button>
                            <?php endif ?>
                        <?php else: ?>
                            <?php if ($obat['stok']>0 && $obat['perlu_resep'] == "Tidak"): ?>
                                <button 
                                    onclick="window.location.href='login.php'"
                                    class="mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Beli Sekarang
                                </button>
                            <?php elseif ($obat['stok']>0 && $obat['perlu_resep'] == 'Ya'): ?>
                                <button 
                                    onclick="window.location.href='login.php'"
                                    class="mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Upload Resep
                                </button>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            </div> 
        <?php endforeach ?>
    </div>

    <!-- Hidden Payment Alert -->
    <div id="paymentAlert" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-8 rounded-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Pilih Metode Pembayaran</h2>
            <form method="post" action="">
                <input type="hidden" name="payment">
                <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['id_adminusers'] ?>">
                <?php foreach ($result as $obat): ?>
                    <input type="hidden" id="idObat" name="idObat" value="<?php echo $obat['id'] ?>">
                    <input type="hidden" id="needRecipe" name="needRecipe" value="<?php echo $obat['perlu_resep'] ?>">
                <?php endforeach ?>
                <label for="jumlahBarang" class="block mb-2">Jumlah Barang</label>
                <input type="number" id="jumlahBarang" name="jumlahBarang" class="w-full p-2 border border-gray-300 rounded" value="1" min="1" oninput="updateHarga()">
                
                <label for="paymentMethod" class="block mb-2">Metode Pembayaran:</label>
                <select id="paymentMethod" name="paymentMethod" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <?php 
                    foreach ($metode as $metodePembayaran): ?>
                        <option value="<?php echo $metodePembayaran['id']; ?>"><?php echo $metodePembayaran['metode_pembayaran']; ?></option>
                    <?php endforeach; ?>    
                </select>
                <input type="hidden" name="harga" id="hargaTotal" value="">
                <p class="mt-4"><strong>Total Pembayaran:</strong> <span id="totalHarga"></span></p>

                <!-- Tombol Bayar -->
                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Pesan
                </button>

                <!-- Tombol Tutup -->
                <button type="button" onclick="closePaymentAlert()" class="mt-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Tutup
                </button>
            </form>
        </div>
    </div>

    <footer class="mt-12 bg-[#101018] p-6 text-center absolute bottom-0 right-0 left-0">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>

    <script>
        let hargaObat = 0;
        // Function to show payment alert
        function showPaymentAlert(obatHarga) {
            hargaObat = obatHarga;
            document.getElementById('paymentAlert').classList.remove('hidden');
            updateHarga();
        }
        function updateHarga() {
            let jumlahBarang = document.getElementById('jumlahBarang').value;
            let totalHarga = hargaObat * jumlahBarang;
            document.getElementById('totalHarga').innerText = totalHarga.toLocaleString('id-ID'); // Format rupiah
            document.getElementById('hargaTotal').value = totalHarga;
        }
        // Function to close payment alert
        function closePaymentAlert() {
            document.getElementById('jumlahBarang').value = 1;
            document.getElementById('paymentAlert').classList.add('hidden');
        }

        // Function to handle payment (you can customize this as needed)
        function bayar() {
            alert('Pembayaran berhasil! Terima kasih telah berbelanja.');
            closePaymentAlert();
            window.location.href = 'payment.php';
        }
        function recipe() {
            window.location.href = 'uploadrecipe.php'
        }
    </script>
</body>
</html>