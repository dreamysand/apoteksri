<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Anggota & Admin</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative pb-[100px] min-h-screen bg-gray-100">
	<!-- Navbar -->
	<?php include 'views/layout/navbar.php'; ?>

	<div class="bg-fixed bg-no-repeat bg-center h-3/4 bg-cover" style="background-image: url('asset/background.svg')">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Daftar Admin & User di Apotek <span class="text-[#4CDF12]">Sri</span></h1>
                <p class="text-xl mb-8">Tabel Berisi Keterangan Admin & User Dalam Apotek</p>
                <a href="#tabelobat" class="bg-[#3AAF0C] text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Lihat Tabel</a>
            </div>
        </div>
    </div>
	<div class="container mx-auto p-6 mt-12">
		<h1 class="text-4xl font-bold mb-6">Daftar Admin & User</h1>
		<div class="mb-4">
	        <!-- Tombol Tambah Kategori -->
	        <a href="insert.php?type=adminusers&page=<?php echo $page; ?>" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Tambah Pengguna</a>
	    </div>
	    <?php if (count($result) > 0): ?>
	    	<table id="tabeladminusers" class="min-w-full bg-white shadow-md rounded-lg">
				<thead>
					<tr class="bg-green-500 text-white">
						<th class="py-2 px-4">ID</th>
						<th class="py-2 px-4">Username</th>
						<th class="py-2 px-4">Email</th>
						<th class="py-2 px-4">Password</th>
						<th class="py-2 px-4">Roles</th>
						<th class="py-2 px-4">Status</th>
						<th class="py-2 px-4">Action</th> <!-- Kolom untuk aksi -->
					</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $row): ?>
						<tr class="border-b text-center">
							<td class="py-2 px-4"><?php echo $row['id'] ?></td>
							<td class="py-2 px-4"><?php echo $row['username'] ?></td>
							<td class="py-2 px-4"><?php echo $row['email'] ?></td>
							<td class="py-2 px-4"><?php echo $row['password'] ?></td>
							<td class="py-2 px-4"><?php echo $row['roles'] ?></td>
							<td class="py-2 px-4"><?php echo $row['status'] ?></td>
							<td class="py-2 px-4">
								<!-- Tombol Edit -->
								<a href="edit.php?type=adminusers&id=<?php echo $row['id'] ?>&page=<?php echo $page;?>" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a> 
								|
								<!-- Tombol Hapus -->
								<a href="#tabeladminusers" class="text-red-500 hover:text-red-700 font-semibold" onclick="showDeleteAlert(<?php echo $row['id'];?>, <?php echo $page; ?>);">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
	    <?php else: ?>
	    	<table class="min-w-full bg-white shadow-md rounded-lg">
				<thead>
					<tr class="bg-blue-500 text-white">
						<th class="py-2 px-4">ID</th>
						<th class="py-2 px-4">Username</th>
						<th class="py-2 px-4">Email</th>
						<th class="py-2 px-4">Password</th>
						<th class="py-2 px-4">Roles</th>
						<th class="py-2 px-4">Status</th>
						<th class="py-2 px-4">Action</th> <!-- Kolom untuk aksi -->
					</tr>
				</thead>
				<tbody>
					<tr class="border-b">
						<td class="py-2 px-4" colspan="7">Tidak Ada Data</td>
					</tr>
				</tbody>
			</table>
	    <?php endif ?>
	</div>
	<div class="mt-6 flex justify-center">
		<?php if ($total_pages >= 1): ?> 
			<ul class="inline-flex space-x-2">
				<?php if ($page > 1): ?>
					<li><a href="table.php?type=adminusers&page=<?php echo $page - 1; ?>" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded">Previous</a></li>
				<?php endif; ?>

				<?php for ($i = 1; $i <= $total_pages; $i++): ?>
					<li><a href="table.php?type=adminusers&page=<?php echo $i; ?>" class="px-3 py-1 rounded <?php echo $i == $page ? 'bg-green-500 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?>"><?php echo $i; ?></a></li>
				<?php endfor; ?>

				<?php if ($page < $total_pages): ?>
					<li><a href="table.php?type=adminusers&page=<?php echo $page + 1; ?>" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded">Next</a></li>
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
        function showDeleteAlert(id, page) {
            document.getElementById('deleteAlert').classList.remove('hidden');
            document.getElementById('deleteLink').setAttribute('href', 'delete.php?type=adminusers&id='+id+'&page='+page);
        }

        function closeDeleteAlert() {
            document.getElementById('deleteAlert').classList.add('hidden');
        }
    </script>
</body>
</html>