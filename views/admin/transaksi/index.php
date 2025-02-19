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
	        <!-- Tombol Tambah Obat -->
	        <a href="insert.php?type=transaksi&page=<?php echo $page; ?>" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Tambah Transaksi</a>
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
						<th class="py-2 px-4">Aksi</th> <!-- Kolom baru untuk Aksi -->
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
							<td class="py-2 px-4">
								<!-- Tombol Edit -->
								<?php if ($row['status'] == 'Diterima'): ?>
									<a href="table.php?type=transaksi&cashier=<?php echo $row['id'] ?>" class="text-blue-500 hover:text-blue-700 font-semibold">Cetak Struk</a>
								<?php elseif ($row['status'] == 'Belum Dikonfirmasi'): ?>
									<a href="#" class="text-[#E40EC8] hover:text-[#B10C9B] font-semibold" onclick="showCashierView(<?php echo $row['id'];?>)">Terima</a> 
									|
									<!-- Tombol Hapus -->
									<a href="#" class="text-red-500 hover:text-red-700 font-semibold" onclick="deniedTransaction(<?php echo $row['id'];?>)">Tolak</a>
									|
									<a href="#tabelobat" class="text-red-500 hover:text-red-700 font-semibold" onclick="showDeleteAlert(<?php echo $row['id'];?>, <?php echo $page; ?>);">Hapus</a>
								<?php elseif ($row['status'] == 'Ditolak'): ?>
									<!-- Tombol Hapus -->
									<a href="#tabelobat" class="text-red-500 hover:text-red-700 font-semibold" onclick="showDeleteAlert(<?php echo $row['id'];?>, <?php echo $page; ?>);">Hapus</a>
								<?php endif ?>
							</td>
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
						<th class="py-2 px-4">Aksi</th> <!-- Kolom baru untuk Aksi -->
					</tr>
				</thead>
				<tbody>
					<tr class="border-b">
						<td class="py-2 px-4" colspan="13">Data Tidak Ada</td>
					</tr>
					<!-- Tambahkan data obat lainnya -->
				</tbody>
			</table>
		<?php endif ?>
	</div>
	<div class="mt-6 flex justify-center">
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

    <div id="deleteAlert" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi Penghapusan</h2>
            <p class="mb-6">Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak bisa dibatalkan.</p>
            <div class="flex justify-end space-x-4">
                <button class="bg-gray-300 text-black px-4 py-2 rounded-md" onclick="closeDeleteAlert()">Batal</button>
                <a href="" id="deleteLink" class="bg-red-500 text-white px-4 py-2 rounded-md">Hapus</a>
            </div>
        </div>
    </div>

	<div id="cashierView" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[1000]">
	    <div class="bg-white p-8 rounded-lg w-full max-w-lg">
	        <h2 class="text-2xl font-bold mb-4">Tampilan Kasir</h2>
	        <form method="post" id="cashierForm" action="table.php?type=transaksi&cashier">
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
	                <input id="payBalance" name="pay_balance" type="number" class="w-full p-2 border border-gray-300 rounded" min="0" value="0" oninput="" required>
	            </div>
	            <div class="mb-4">
	                <label class="block font-semibold">Kembalian:</label>
	                <input id="returnBalance" name="return_balance" type="text" readonly value="">
	            </div>
	            <!-- Tombol Konfirmasi Pembayaran -->
	            <button id="submitButton" type="button" onclick="downloadAndRedirect()" class="mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
	                Konfirmasi Pembayaran
	            </button>
	            <!-- Tombol Tutup -->
	            <button type="button" onclick="closeCashierView()" class="mt-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
	                Tutup
	            </button>
	        </form>
	    </div>
	</div>

    <script>
        // Function to show payment alert
        function downloadAndRedirect() {
            // 1. Unduh PDF
            const form = document.getElementById("cashierForm");
            form.submit();

            // 2. Redirect setelah beberapa detik
            setTimeout(function() {
                window.location.href = "table.php?type=transaksi&page=<?php echo $page ?>";
            }, 500); // Redirect setelah 3 detik
        }
        function showCashierView(id) {
		    fetch(`get_data.php?type=transaksi&id=${id}`)
		        .then(response => response.json())
		        .then(data => {
		            if (!data.error) {
		                // Isi form dengan data yang diterima
		                document.getElementById('transactionId').value = data.id;
						document.getElementById('userUsername').value = data.user_username;
						document.getElementById('adminId').value = <?php echo $_SESSION['id_adminusers'] ?>; // Tambahkan admin_username jika ada
						document.getElementById('medication').value = data.nama;
						document.getElementById('medicationAmount').value = data.jumlah_obat;
						document.getElementById('paymentMethod').value = data.metode_pembayaran;
						document.getElementById('transactionDate').value = data.tanggal_transaksi;
						document.getElementById('totalPrice').value = data.total_harga;
						updateHarga(data.total_harga);
						document.getElementById('payBalance').setAttribute('oninput', 'updateHarga(' + data.total_harga + ')');

		                // Tampilkan tampilan kasir
		                document.getElementById('cashierView').classList.remove('hidden');
		            } else {
		                alert(data.error);
		            }
		        })
		        .catch(error => {
		            console.error('Error fetching cashier data:', error);
		        });
		}

		function deniedTransaction(id) {
			const url = new URL(window.location.href);
		    url.searchParams.set('denied', id);
   	        history.pushState(null, '', url);
		}
        function updateHarga(hargaObat) {
        	payBalance = document.getElementById('payBalance').value;
            let returnBalance = payBalance - hargaObat;
            if (returnBalance<0) {
            	document.getElementById('submitButton').classList.add('hidden');
            } else {
            	document.getElementById('submitButton').classList.remove('hidden');
            }
            document.getElementById('returnBalance').value = returnBalance; // Format rupiah
        }
        // Function to close payment alert
        function closeCashierView() {
            document.getElementById('cashierView').classList.add('hidden');
        }
        function showDeleteAlert(id, page) {
            document.getElementById('deleteAlert').classList.remove('hidden');
            document.getElementById('deleteLink').setAttribute('href', 'delete.php?type=transaksi&id='+id+'&page='+page);
        }

        function closeDeleteAlert() {
            document.getElementById('deleteAlert').classList.add('hidden');
        }
    </script>
</body>
</html>