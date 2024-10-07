<?php ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>USER DASHBOARD</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
		body {
			background: url("asset/background.svg");
		}
	</style>
</head>
<body class="relative min-h-screen pb-[200px] bg-fixed bg-no-repeat bg-center bg-cover">
	<!-- Navbar -->
	<?php include 'views/layout/navbar.php'; ?>
	
	<div class="p-6 w-auto h-2/4 pt-[10rem] flex justify-center items-center rounded-lg text-center md:col-span-2">
		<h1 class="text-4xl font-bold">SELAMAT DATANG PELANGGAN</h1>
	</div>

	<!-- Dashboard Content for Apotek Users -->
	<div class="mt-6 mx-2 p-2 bg-[#73F1BD] shadow rounded-lg">
		<div class="my-6 mx-2 grid grid-cols-1 md:grid-cols-3 gap-8">
			<!-- Card 1: Produk Obat -->
			<div class="bg-white p-6 rounded-lg shadow hover:scale-[1.05] transition ease-in-out duration-[100ms] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="h-[15em] w-[15em] mx-auto">
					<!-- Ikon Botol Obat -->
					<rect x="70" y="40" width="60" height="100" rx="10" ry="10" fill="#4CAF50" stroke="#2E7D32" stroke-width="3"/>
					<rect x="75" y="30" width="50" height="15" fill="#8D6E63" stroke="#5D4037" stroke-width="3"/>
					<rect x="75" y="75" width="50" height="30" fill="#FFEB3B" stroke="#FBC02D" stroke-width="2"/>
					<line x1="90" y1="85" x2="110" y2="85" stroke="red" stroke-width="3"/>
					<line x1="100" y1="75" x2="100" y2="95" stroke="red" stroke-width="3"/>
				</svg>
				<h3 class="text-2xl text-center font-semibold">Lihat Produk</h3>
			</div>

			<!-- Card 2: Riwayat Transaksi -->
			<div class="bg-white p-6 rounded-lg shadow hover:scale-[1.05] transition ease-in-out duration-[100ms] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="h-[15em] w-[15em] mx-auto">
				  <!-- Ikon Kartu Transaksi -->
				  <rect x="30" y="50" width="140" height="90" rx="10" ry="10" fill="#1976D2" stroke="#0D47A1" stroke-width="3"/>
				  <rect x="30" y="65" width="140" height="10" fill="#BBDEFB"/>
				  <rect x="50" y="90" width="20" height="20" rx="3" ry="3" fill="#FFC107"/>
				</svg>
				<h3 class="text-2xl text-center font-semibold">Riwayat Transaksi</h3>
			</div>

			<!-- Card 3: Informasi Kesehatan -->
			<div class="bg-white p-6 rounded-lg shadow hover:scale-[1.05] transition ease-in-out duration-[100ms] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="h-[15em] w-[15em] mx-auto">
				  <!-- Ikon Dokumen Informasi -->
				  <rect x="50" y="40" width="100" height="120" rx="5" ry="5" fill="#4CAF50" stroke="#388E3C" stroke-width="3"/>
				  <rect x="60" y="60" width="80" height="15" fill="#C8E6C9"/>
				  <rect x="60" y="85" width="80" height="8" fill="#C8E6C9"/>
				  <rect x="60" y="100" width="80" height="8" fill="#C8E6C9"/>
				  <rect x="60" y="115" width="80" height="8" fill="#C8E6C9"/>
				  <rect x="60" y="135" width="80" height="15" fill="#81C784"/>
				</svg>
				<h3 class="text-2xl text-center font-semibold">Unggah Resep</h3>
			</div>
		</div>
	</div>

	<footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
		<p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
	</footer>
</body>
</html>
