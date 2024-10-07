<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Konfirmasi Resep</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>
    
    <!-- Tabel Konfirmasi Resep -->
    <div class="container mx-auto mt-12">
        <h1 class="text-4xl font-bold text-center mb-8">Konfirmasi Resep</h1>
        <div class="bg-white shadow-md rounded-lg p-4">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Pasien</th>
                        <th class="px-4 py-2 text-left">Resep</th>
                        <th class="px-4 py-2 text-left">Dokter</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Ali</td>
                        <td class="border px-4 py-2">Resep Paracetamol 500mg</td>
                        <td class="border px-4 py-2">Dr. Ahmad</td>
                        <td class="border px-4 py-2">2024-10-06</td>
                        <td class="border px-4 py-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Konfirmasi Resep</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2">Dina</td>
                        <td class="border px-4 py-2">Resep Ibuprofen 400mg</td>
                        <td class="border px-4 py-2">Dr. Siti</td>
                        <td class="border px-4 py-2">2024-10-06</td>
                        <td class="border px-4 py-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Konfirmasi Resep</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
