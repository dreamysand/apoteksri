<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Tambah Kategori Baru</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium">Kategori Obat</label>
                <input type="text" id="kategori" name="kategori" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium">Gambar Obat</label>
                <input type="file" id="gambar" name="gambar" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4">Tambah Kategori</button>
            <button type="button" class="w-full bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300" onclick="insertBack()">Kembali</button>
        </form>
    </div>
</body>
</html>
