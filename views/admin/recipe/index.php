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
		<h1 class="text-4xl font-bold mb-6">Tabel Obat-Obatan</h1>
		<div class="mb-4">
	        <!-- Tombol Tambah Obat -->
	        <a href="insert.php?type=recipe&page=<?php echo $page; ?>" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Tambah Resep</a>
	    </div>
		<?php if (count($result) > 0): ?>
			<table id="tabelobat" class="min-w-full bg-white shadow-md rounded-lg text-center">
				<thead>
					<tr class="bg-green-500 text-white">
						<th class="py-2 px-4">ID</th>
						<th class="py-2 px-4">Obat</th>
						<th class="py-2 px-4">User</th>
						<th class="py-2 px-4">Admin</th>
						<th class="py-2 px-4">Status</th>
						<th class="py-2 px-4">Tanggal Resep</th>
						<th class="py-2 px-4">Aksi</th> <!-- Kolom baru untuk Aksi -->
					</tr>
				</thead>
				<?php foreach ($result as $row): 
					?>
					<tbody>
						<tr class="border-b">
							<td class="py-2 px-4"><?php echo $row['id'] ?></td>
							<td class="py-2 px-4"><?php echo $row['nama'] ?></td>
							<td class="py-2 px-4"><?php echo $row['user_username'] ?></td>
							<td class="py-2 px-4"><?php echo $row['admin_username'] ?></td>
							<td class="py-2 px-4"><?php echo $row['status'] ?></td>
							<td class="py-2 px-4"><?php echo $row['tanggal_resep_dibuat'] ?></td>
							<td class="py-2 px-4">
								<!-- Tombol Edit -->
								<?php if ($row['status'] == 'Diterima'): ?>
									<a href="table.php?type=recipe&printpdf=<?php echo $row['id']; ?>&page=<?php echo $page; ?>" class="text-blue-500 hover:text-blue-700 font-semibold">Cetak PDF</a>
								<?php elseif ($row['status'] == 'Belum Dikonfirmasi'): ?>
									<a href="#tabelobat" class="text-[#E40EC8] hover:text-[#B10C9B] font-semibold" onclick="acceptedRecipe(<?php echo $row['id'];?>);">Terima</a> 
									|
									<!-- Tombol Hapus -->
									<a href="#tabelobat" class="text-red-500 hover:text-red-700 font-semibold" onclick="deniedRecipe(<?php echo $row['id'];?>);">Tolak</a>
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
						<th class="py-2 px-4">Obat</th>
						<th class="py-2 px-4">User</th>
						<th class="py-2 px-4">Admin</th>
						<th class="py-2 px-4">Status</th>
						<th class="py-2 px-4">Tanggal Resep</th>
						<th class="py-2 px-4">Aksi</th> <!-- Kolom baru untuk Aksi -->
					</tr>
				</thead>
				<tbody>
					<tr class="border-b">
						<td class="py-2 px-4" colspan="7">Data Tidak Ada</td>
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

    <script>
    	function showDetail(id) {
            fetch(`get_data.php?type=recipe&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.error) {
                        document.getElementById('prescriptionId').value = data.id;
                        document.getElementById('prescriptionMedication').value = data.nama;
                        document.getElementById('prescriptionUser').value = data.user_username; // Tambahkan admin_username jika ada
                        document.getElementById('prescriptionIdAdmin').value = data.id_admin;
                        document.getElementById('prescriptionStatus').value = data.status;
                        document.getElementById('prescriptionDate').value = data.tanggal_resep_dibuat;
                        
                        // Tampilkan tampilan kasir
                        document.getElementById('prescriptionView').classList.remove('hidden');
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => {
                    console.error('Error fetching cashier data:', error);
                });
        }

    	function deniedRecipe(id) {
			const url = new URL(window.location.href);
		    url.searchParams.set('denied', id);
   	        history.pushState(null, '', url);
		}
		
		function acceptedRecipe(id) {
			const url = new URL(window.location.href);
		    url.searchParams.set('accepted', id);
   	        history.pushState(null, '', url);
		}

        function showDeleteAlert(id, page) {
            document.getElementById('deleteAlert').classList.remove('hidden');
            document.getElementById('deleteLink').setAttribute('href', 'delete.php?type=recipe&id='+id+'&page='+page);
        }

        function closeDeleteAlert() {
            document.getElementById('deleteAlert').classList.add('hidden');
        }
    </script>
</body>
</html>