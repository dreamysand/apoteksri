<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Anggota & Admin</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">
	<!-- Navbar -->
	<?php include 'views/layout/navbar.php'; ?>

	<div class="container mx-auto p-6">
		<h1 class="text-4xl font-bold mb-6">Daftar Anggota & Admin</h1>

		<table class="min-w-full bg-white shadow-md rounded-lg">
			<thead>
				<tr class="bg-blue-500 text-white">
					<th class="py-2 px-4">ID Pengguna</th>
					<th class="py-2 px-4">Nama Pengguna</th>
					<th class="py-2 px-4">Email</th>
					<th class="py-2 px-4">Peran</th>
					<th class="py-2 px-4">Aksi</th> <!-- Kolom untuk aksi -->
				</tr>
			</thead>
			<tbody>
				<tr class="border-b">
					<td class="py-2 px-4">A001</td>
					<td class="py-2 px-4">Budi Santoso</td>
					<td class="py-2 px-4">budi@example.com</td>
					<td class="py-2 px-4">Admin</td>
					<td class="py-2 px-4">
						<!-- Tombol Edit -->
						<a href="edit_pengguna.php?id=A001" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a> 
						|
						<!-- Tombol Hapus -->
						<a href="hapus_pengguna.php?id=A001" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</a>
					</td>
				</tr>
				<tr class="border-b">
					<td class="py-2 px-4">M002</td>
					<td class="py-2 px-4">Ani Yulianto</td>
					<td class="py-2 px-4">ani@example.com</td>
					<td class="py-2 px-4">Anggota</td>
					<td class="py-2 px-4">
						<!-- Tombol Edit -->
						<a href="edit_pengguna.php?id=M002" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a> 
						|
						<!-- Tombol Hapus -->
						<a href="hapus_pengguna.php?id=M002" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</a>
					</td>
				</tr>
				<!-- Tambahkan data pengguna lainnya -->
			</tbody>
		</table>
	</div>
</body>
</html>
