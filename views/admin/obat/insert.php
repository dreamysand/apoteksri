<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Tambah Obat Baru</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium">Nama Obat</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium">Kategori</label>
                <select id="kategori" name="kategori" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <?php foreach ($result_kategori as $row_kategori): ?>
                        <option value="<?php echo $row_kategori['id']; ?>"><?php echo $row_kategori['kategori']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="golongan" class="block text-sm font-medium">Golongan</label>
                <select id="golongan" name="golongan" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="" disabled selected>Pilih Golongan</option>
                    <?php foreach ($result_golongan as $row_golongan): ?>
                        <option value="<?php echo $row_golongan['id']; ?>"><?php echo $row_golongan['golongan']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="produsen" class="block text-sm font-medium">Produsen</label>
                <input type="text" id="produsen" name="produsen" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium">Harga</label>
                <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium">Stok</label>
                <input type="number" id="stok" name="stok" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="khasiat" class="block text-sm font-medium">Khasiat</label>
                <textarea id="khasiat" name="khasiat" rows="4" class="w-full px-4 pt-2 pb-20 border rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium">Gambar Obat</label>
                <input type="file" id="gambar" name="gambar" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4">Tambah Obat</button>
            <button type="button" class="w-full bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300" onclick="insertBack()">Kembali</button>

        </form>
    </div>
</body>
</html>
