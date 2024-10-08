<?php
include 'functions/obat/detail.php';
?>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Obat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#E7F4E4] pb-[200px] relative">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>

    <div class="container mx-auto p-6 mt-12">
        <?php foreach ($result as $obat): ?>
           <h1 class="text-4xl font-bold mb-6 mt-[200px]">Detail Obat: <?php echo $obat['nama']; ?></h1>
            
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex justify-center">
                        <!-- Gambar obat -->
                        <img src="<?php echo $obat['gambar']; ?>" alt="<?php echo $obat['nama']; ?>" class="max-w-full h-auto rounded-lg">
                    </div>
                    <div>
                        <h2 class="text-3xl font-semibold mb-4"><?php echo $obat['nama']; ?></h2>
                        <p class="mb-2"><strong>Kategori:</strong> <a href="kategori.php"><?php echo $obat['kategori']; ?></a></p>
                        <p class="mb-2"><strong>Golongan:</strong> <?php echo $obat['golongan']; ?></p>
                        <p class="mb-2"><strong>Produsen:</strong> <?php echo $obat['produsen']; ?></p>
                        <p class="mb-2"><strong>Harga:</strong> Rp <?php echo number_format($obat['harga'], 0, ',', '.'); ?></p>
                        <p class="mb-2"><strong>Stok:</strong> <?php echo $obat['stok']; ?> buah</p>
                        <p class="mb-2"><strong>Khasiat:</strong> <?php echo $obat['khasiat']; ?></p>
                    </div>
                </div>
            </div> 
        <?php endforeach ?>
    </div>

    <footer class="mt-12 bg-[#101018] p-6 text-center absolute bottom-0 right-0 left-0">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>