		<?php 
		// Ambil query getnya
		$query_string = $_SERVER['QUERY_STRING']; 

		// Di Parse buat dapetin array dari query getnya
		parse_str($query_string, $query_params);

		// Ngehapus array page biar bisa di isi kembali atau diperbarui 
		unset($query_params['page']);

		// Buat query HTTP tanpa parameter page
		$new_query_string = http_build_query($query_params);
		?>
<html lang="en" class="scroll-smooth">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabel Obat-Obatan</title>
	<link rel="icon" href="asset/logo.svg" type="image/svg+xml">
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen pb-[200px] bg-fixed bg-no-repeat bg-center bg-cover bg-[#E7F4E4]">
	<!-- Navbar -->
	<?php include 'views/layout/navbar.php'; ?>

	<div class="bg-fixed bg-no-repeat bg-center h-3/4 bg-cover" style="background-image: url('asset/background.svg')">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Tabel Obat di Apotek <span class="text-[#4CDF12]">Sri</span></h1>
                <p class="text-xl mb-8">Tabel Berisi Keterangan Obat-Obatan Dalam Apotek</p>
                <a href="#tabelobat" class="bg-[#3AAF0C] text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Lihat Tabel</a>
            </div>
        </div>
    </div>
	<div class="container mx-auto p-6 mt-12">
		<h1 class="text-4xl font-bold mb-6">Tabel Transaksi</h1>
		<div class="mb-4">
			<form action="" method="GET">
			    <label for="tahun">Pilih Tahun:</label>
			    <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
			    <input type="number" name="tahun" id="tahun" min="2000" max="2100" value="<?php echo isset($_GET['tahun']) ? $_GET['tahun'] : date('Y') ?>" required>

			    <!-- Input Bulan -->
			    <label for="bulan">Pilih Bulan:</label>
			    <select name="bulan" id="bulan">
			        <option value="">Semua Bulan</option>
			        <option value="1" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '1') || (!isset($_GET['bulan']) && date('m') == '1') ? 'selected' : ''; ?>>Januari</option>
			        <option value="2" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '2') || (!isset($_GET['bulan']) && date('m') == '2') ? 'selected' : ''; ?>>Februari</option>
			        <option value="3" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '3') || (!isset($_GET['bulan']) && date('m') == '3') ? 'selected' : ''; ?>>Maret</option>
			        <option value="4" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '4') || (!isset($_GET['bulan']) && date('m') == '4') ? 'selected' : ''; ?>>April</option>
			        <option value="5" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '5') || (!isset($_GET['bulan']) && date('m') == '5') ? 'selected' : ''; ?>>Mei</option>
			        <option value="6" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '6') || (!isset($_GET['bulan']) && date('m') == '6') ? 'selected' : ''; ?>>Juni</option>
			        <option value="7" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '7') || (!isset($_GET['bulan']) && date('m') == '7') ? 'selected' : ''; ?>>Juli</option>
			        <option value="8" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '8') || (!isset($_GET['bulan']) && date('m') == '8') ? 'selected' : ''; ?>>Agustus</option>
			        <option value="9" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '9') || (!isset($_GET['bulan']) && date('m') == '9') ? 'selected' : ''; ?>>September</option>
			        <option value="10" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '10') || (!isset($_GET['bulan']) && date('m') == '10') ? 'selected' : ''; ?>>Oktober</option>
			        <option value="11" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '11') || (!isset($_GET['bulan']) && date('m') == '11') ? 'selected' : ''; ?>>November</option>
			        <option value="12" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == '12') || (!isset($_GET['bulan']) && date('m') == '12') ? 'selected' : ''; ?>>Desember</option>
			    </select>

			    <!-- Input Tanggal -->
			    <label for="tanggal">Pilih Tanggal:</label>
			    <select name="tanggal" id="tanggal">
			        <option value="" <?php echo (!isset($_GET['tanggal']) || $_GET['tanggal'] == '') ? 'selected' : ''; ?>>Semua Tanggal</option>
			        <?php
			            // Ambil nilai bulan dan tahun dari GET jika ada
			            $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
			            $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
			            $tanggalSelected = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('d'); // Ambil tanggal yang dipilih

			            // Jika bulan dan tahun ada, buat daftar tanggal
			            if ($bulan) {
			                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // Mengetahui jumlah hari dalam bulan
			                for ($i = 1; $i <= $daysInMonth; $i++) {
			                    $selected = ($i == $tanggalSelected) ? 'selected' : '';
			                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
			                }
			            }
			        ?>
			    </select>

			    <!-- Tombol Submit -->
			    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Filter</button>
			</form>
			<a href="table.php?<?php echo $new_query_string; ?>&printpdf&page=<?php echo $page; ?>" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Cetak Laporan</a>


	    </div>
		<?php if (count($result) > 0): ?>
			<table id="tabelobat" class="min-w-full bg-white shadow-md rounded-lg text-center">
				<thead>
					<tr class="bg-green-500 text-white">
						<th class="py-2 px-4">ID</th>
						<th class="py-2 px-4">User</th>
						<th class="py-2 px-4">Admin</th>
						<th class="py-2 px-4">Id Resep</th>
						<th class="py-2 px-4">Obat</th>
						<th class="py-2 px-4">Jumlah Obat</th>
						<th class="py-2 px-4">Metode Pembayaran</th>
						<th class="py-2 px-4">Total Harga</th>
						<th class="py-2 px-4">Status</th>
						<th class="py-2 px-4">Tanggal Transaksi</th>
						<th class="py-2 px-4">Uang Bayar</th>
						<th class="py-2 px-4">Uang Kembalian</th>
					</tr>
				</thead>
				<?php foreach ($result as $row): 
					?>
					<tbody>
						<tr class="border-b">
							<td class="py-2 px-4"><?php echo $row['id'] ?></td>
							<td class="py-2 px-4"><?php echo $row['user_username'] ?></td>
							<td class="py-2 px-4"><?php echo $row['admin_username'] ?></td>
							<td class="py-2 px-4"><?php echo $row['id_resep'] ?></td>
							<td class="py-2 px-4"><?php echo $row['nama'] ?></td>
							<td class="py-2 px-4"><?php echo $row['jumlah_obat'] ?></td>
							<td class="py-2 px-4"><?php echo $row['metode_pembayaran'] ?></td>
							<td class="py-2 px-4"><?php echo $row['total_harga'] ?></td>
							<td class="py-2 px-4"><?php echo $row['status'] ?></td>
							<td class="py-2 px-4"><?php echo $row['tanggal_transaksi'] ?></td>
							<td class="py-2 px-4"><?php echo $row['uang_bayar'] ?></td>
							<td class="py-2 px-4"><?php echo $row['uang_kembalian'] ?></td>
						</tr>
						<!-- Tambahkan data obat lainnya -->
					</tbody>
				<?php endforeach ?>
			</table>
		<?php else: ?>
			<table id="tabelobat" class="min-w-full bg-white shadow-md rounded-lg text-center">
				<thead>
					<tr class="bg-green-500 text-white">
						<th class="py-2 px-4">ID</th>
						<th class="py-2 px-4">User</th>
						<th class="py-2 px-4">Admin</th>
						<th class="py-2 px-4">Id Resep</th>
						<th class="py-2 px-4">Obat</th>
						<th class="py-2 px-4">Jumlah Obat</th>
						<th class="py-2 px-4">Metode Pembayaran</th>
						<th class="py-2 px-4">Total Harga</th>
						<th class="py-2 px-4">Status</th>
						<th class="py-2 px-4">Tanggal Transaksi</th>
						<th class="py-2 px-4">Uang Bayar</th>
						<th class="py-2 px-4">Uang Kembalian</th>
					</tr>
				</thead>
				<tbody>
					<tr class="border-b">
						<td class="py-2 px-4" colspan="12">Data Tidak Ada</td>
					</tr>
					<!-- Tambahkan data obat lainnya -->
				</tbody>
			</table>
		<?php endif ?>
	</div>
	<div class="mt-6 flex justify-center">

		<?php if ($total_pages >= 1): ?> 
		    <ul class="inline-flex space-x-2">
		        <?php if ($page > 1): ?>
		            <li><a href="table.php?<?php echo $new_query_string; ?>&page=<?php echo $page - 1; ?>" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded">Previous</a></li>
		        <?php endif; ?>

		        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
		            <li><a href="table.php?<?php echo $new_query_string; ?>&page=<?php echo $i; ?>" class="px-3 py-1 rounded <?php echo $i == $page ? 'bg-green-500 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?>"><?php echo $i; ?></a></li>
		        <?php endfor; ?>

		        <?php if ($page < $total_pages): ?>
		            <li><a href="table.php?<?php echo $new_query_string; ?>&page=<?php echo $page + 1; ?>" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded">Next</a></li>
		        <?php endif; ?>
		    </ul>
		<?php endif; ?>
	</div>
    <footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>