<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>
    
    <!-- Tabel Transaksi -->
    <div class="container mx-auto mt-12">
        <h1 class="text-4xl font-bold text-center mb-8">Transaksi Obat</h1>
        <div class="bg-white shadow-md rounded-lg p-4">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Pelanggan</th>
                        <th class="px-4 py-2 text-left">Obat</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Total Harga</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Budi</td>
                        <td class="border px-4 py-2">Paracetamol</td>
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2">Rp 20.000</td>
                        <td class="border px-4 py-2">Belum Dikonfirmasi</td>
                        <td class="border px-4 py-2">
                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Konfirmasi</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2">Siti</td>
                        <td class="border px-4 py-2">Aspirin</td>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Rp 10.000</td>
                        <td class="border px-4 py-2">Belum Dikonfirmasi</td>
                        <td class="border px-4 py-2">
                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Konfirmasi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
