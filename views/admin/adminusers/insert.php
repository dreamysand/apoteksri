<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Tambah Pengguna Baru</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="text" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="roles" class="block text-sm font-medium">Roles</label>
                <select id="roles" name="roles" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="" disabled selected>Pilih Roles</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4">Tambah Pengguna</button>
            <button type="button" class="w-full bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300" onclick="insertBack()">Kembali</button>
        </form>
    </div>
</body>
</html>