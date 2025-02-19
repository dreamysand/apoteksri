<?php
session_start();
include 'functions/sessions/unlogined.php';
include 'functions/config/connection.php';
include 'functions/profile/views.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen pb-[200px] bg-fixed bg-no-repeat bg-center bg-cover bg-[#E7F4E4]">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>
    <div class="bg-fixed bg-no-repeat bg-center h-3/4 bg-cover" style="background-image: url('asset/background.svg')">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Profil <span class="text-[#4CDF12]">Pengguna</span></h1>
                <p class="text-xl mb-8">Lihat dan edit informasi profil Anda di sini.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-6 mt-12">
        <h1 class="text-4xl font-bold mb-6">Informasi Profil</h1>
        
        <?php foreach ($result as $user): ?>
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <div class="flex items-center mb-4">
                    <img src="<?php echo $user['gambar']; ?>" alt="Gambar Profil" class="w-24 h-24 rounded-full border-2 border-[#4CDF12] mr-4">
                    <div>
                        <h2 class="text-2xl font-semibold"><?php echo $user['username']; ?></h2>
                        <p class="text-lg"><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mb-6">
                <a href="edit.php?type=profile&id=<?php echo $user['id'] ?>" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Edit Profil</a>
            </div>
        <?php endforeach ?>
    </div>

    <footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>
