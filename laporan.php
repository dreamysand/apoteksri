<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Hari Ini</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

	<!-- Navbar -->
	<?php include 'views/layout/navbar.php'; ?>
	
	<div class="p-6 w-full h-full flex flex-col items-center">
		<h1 class="text-3xl font-bold mb-8">Laporan Hari Ini</h1>
		
		<div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
			<!-- Div untuk laporan transaksi hari ini -->
			<div class="bg-white p-6 rounded-lg shadow-lg">
				<h2 class="text-2xl font-semibold mb-4">Laporan Transaksi Hari Ini</h2>
				<!-- Tombol Cetak Laporan Transaksi -->
				<button onclick="cetakLaporanTransaksi()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
					Cetak Laporan Transaksi
				</button>
				<!-- Tempat Laporan Transaksi -->
				<div id="laporan-transaksi" class="mt-4">
					<!-- Data Transaksi akan di-load dan ditampilkan di sini -->
					<p>Tidak ada transaksi untuk hari ini.</p>
				</div>
			</div>

			<!-- Div untuk laporan produk hari ini -->
			<div class="bg-white p-6 rounded-lg shadow-lg">
				<h2 class="text-2xl font-semibold mb-4">Laporan Produk Hari Ini</h2>
				<!-- Tombol Cetak Laporan Produk -->
				<button onclick="cetakLaporanProduk()" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
					Cetak Laporan Produk
				</button>
				<!-- Tempat Laporan Produk -->
				<div id="laporan-produk" class="mt-4">
					<!-- Data Produk akan di-load dan ditampilkan di sini -->
					<p>Tidak ada laporan produk untuk hari ini.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="absolute bottom-0 left-0 right-0 bg-gray-800 text-center p-4 text-white">
		<p>&copy; 2024 Apotek Sri. All Right Reserved</p>
	</footer>

	<!-- JavaScript untuk cetak laporan -->
	<script>
		function cetakLaporanTransaksi() {
			// Fungsi cetak laporan transaksi
			window.print();
		}

		function cetakLaporanProduk() {
			// Fungsi cetak laporan produk
			window.print();
		}
	</script>

</body>
</html>
