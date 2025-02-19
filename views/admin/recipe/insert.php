<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Tambah Resep</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="obat" class="block text-sm font-medium">obat</label>
                <input list="list_Obat" id="obat" name="obat" class="w-full px-4 py-2 border rounded-lg" required>
                    <datalist id="list_Obat">
                        <option value="" disabled selected>Pilih Obat</option>
                        <?php foreach ($result_obat as $row_obat): ?>
                            <option value="<?php echo $row_obat['id']; ?>"><?php echo $row_obat['nama']; ?></option>
                        <?php endforeach ?>
                    </datalist>
                </input>
            </div>
            <div class="mb-4">
                <label for="user" class="block text-sm font-medium">Pelanggan</label>
                <input list="list_User" id="user" name="user" class="w-full px-4 py-2 border rounded-lg" required>
                    <datalist id="list_User">
                        <option value="" disabled selected>Pilih Pelanggan</option>
                        <?php foreach ($result_user as $row_user): ?>
                            <option value="<?php echo $row_user['id']; ?>"><?php echo $row_user['username']; ?></option>
                        <?php endforeach ?>
                    </datalist>
                </input>
            </div>
            <input type="hidden" name="admin" value="<?php echo $_SESSION['id_adminusers'] ?>">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4">Tambah Obat</button>
            <button type="button" class="w-full bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300" onclick="insertBack()">Kembali</button>

        </form>
    </div>
</body>
</html>
