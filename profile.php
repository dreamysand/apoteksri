<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen pb-[200px] bg-fixed bg-no-repeat bg-center bg-cover bg-[#E7F4E4]">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>

    <!-- Container Profile -->
    <div class="flex justify-center items-center mt-[200px]">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[90%] md:w-[50%]">
            <!-- Profile Image -->
            <div class="flex flex-col items-center">
                <img class="w-32 h-32 rounded-full border-4 border-gray-300" src="asset/profile-placeholder.svg" alt="Profile Picture">
                <h2 class="mt-4 text-2xl font-bold">Nama Pengguna</h2>
                <p class="text-gray-500">email@example.com</p>
            </div>
            
            <!-- Form Edit Profile -->
            <div class="mt-6">
                <form action="update-profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" value="Nama Pengguna">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" value="email@example.com">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Password">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2" for="profile_picture">Foto Profil</label>
                        <input class="w-full" id="profile_picture" type="file" name="profile_picture">
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>
