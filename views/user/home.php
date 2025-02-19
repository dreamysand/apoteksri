<?php
include 'functions/config/connection.php';
include 'functions/user/home/views.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Apotek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #ffffff;
        }
    </style>
</head>
<body class="relative min-h-screen pb-[200px]">
    <!-- Navbar -->
    <?php include 'views/layout/navbar.php'; ?>

    <!-- Hero Section with Parallax -->
    <div class="bg-fixed bg-no-repeat bg-center h-3/4 bg-cover" style="background-image: url('asset/background.svg')">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Selamat Datang di Apotek <span class="text-[#4CDF12]">Sri</span></h1>
                <p class="text-xl mb-8">Temukan obat dan vitamin terbaik untuk kesehatan Anda</p>
                <a href="#products" class="bg-[#3AAF0C] text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Lihat Produk</a>
            </div>
        </div>
    </div>
    <div class="mt-10 mx-6 flex justify-center">
        <form action="submit_apotek.php" method="POST" class="flex items-center">
            <label for="apotek" class="text-xl font-bold mr-4">Lokasi Apotek:</label>
            <select id="apotek" name="apotek" class="p-2 border border-gray-300 rounded-lg mr-4">
                <option value="sri">Pondok Kopi</option>
                <option value="nusantara">MANA AJALAH</option>
                <option value="sehat">MANA AJALAH</option>
                <option value="k24">MANA AJALAH</option>
            </select>

            <!-- Tombol Submit dengan gambar peta -->
            <button type="submit" class="bg-[#3AAF0C] border-none p-0 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">  
                  <!-- Folded map -->
                  <path d="M8 12 L24 8 L40 12 L56 8 V56 L40 52 L24 56 L8 52 Z" fill="#FFFFFF" />
                  <path d="M8 12 L8 52 L24 56 L24 16 Z" fill="#F3EBEB" />
                  <path d="M40 12 L40 52 L56 56 V8 Z" fill="#F3E6E6" />
                  
                  <!-- Location pin -->
                  <circle cx="32" cy="28" r="6" fill="#F00808" />
                  <path d="M32 34 Q36 40 32 46 Q28 40 32 34 Z" fill="#F00808" />
                  
                  <!-- Pin center -->
                  <circle cx="32" cy="28" r="2.5" fill="#F8EBEB" />
                </svg>


            </button>
        </form>
    </div>

    <!-- Produk Section -->
    <div id="products" class="mt-10 mx-6">
        <h2 class="text-4xl font-bold text-center mb-6 text-gray-800">Daftar Produk Apotek</h2>

        <!-- Container untuk produk dengan overflow-x -->
        <div class="flex justify-between mt-[5rem] items-end">
            <h3 class="text-[2.5rem] font-bold text-gray-800">Tersedia di Lokasi Anda</h3>
            <h3 class="text-[1.5rem] font-bold text-[#3AAF0C] underline"><a href="">Lihat Semuanya</a></h3>
        </div>
        
        <div class="overflow-x-auto p-4">
            <div class="flex space-x-6 w-max">
                <!-- Card 1: Produk -->
                <?php foreach ($result as $row): ?>
                    <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200" onclick="window.location.href='table.php?type=obat&id=<?php echo $row['id']; ?>&page=<?php echo $page; ?>'">
                        <img src="<?php echo $row['gambar']; ?>" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                        <h3 class="text-xl font-semibold text-center text-gray-800"><?php echo $row['nama']; ?></h3>
                        <p class="text-center text-gray-500">Rp <?php echo $row['harga']; ?></p>
                        <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="flex justify-between mt-[5rem] items-end">
            <h3 class="text-[2.5rem] font-bold text-gray-800">Kategori Produk</h3>
        </div>
        
        <div class="overflow-x-auto p-4">
            <div class="flex space-x-6 w-max">
                <!-- Card 1: Produk -->
                <?php foreach ($kategori as $row): ?>
                    <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                        <?php include $row['gambar']; ?>
                        <h3 class="text-xl font-semibold text-center text-gray-800"><?php echo $row['kategori']; ?></h3>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <?php foreach ($kategori as $row): ?>
            <div class="flex justify-between mt-[5rem] items-end">
                <h3 class="text-[2.5rem] font-bold text-gray-800"><?php echo $row['kategori'] ?></h3>
                <h3 class="text-[1.5rem] font-bold text-[#3AAF0C] underline"><a href="">Lihat Semuanya</a></h3>
            </div>
            <?php 
            $table = "obat";
            $table_kategori = "kategori";
            $table_golongan = "golongan";
            $kategori = $row['kategori'];
            $limit = 8;

            $page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
            $offset = ($page - 1) * $limit;

            $sql_total_data = "SELECT COUNT(*) FROM $table";
            $stmt = $conn->prepare($sql_total_data);
            $stmt->execute();
            $total_data_row = $stmt->fetchColumn();
            $stmt = null;

            $total_pages = ceil($total_data_row/$limit);

            $sql = "SELECT $table.id, $table.nama, $table_kategori.kategori, $table_golongan.golongan, $table.produsen, $table.harga, $table.stok, $table.gambar 
                FROM $table
                JOIN $table_kategori ON $table.kategori_id = $table_kategori.id
                JOIN $table_golongan ON $table.golongan_id = $table_golongan.id
                WHERE $table_kategori.kategori = :kategori
                LIMIT :limit OFFSET :offset
                "; 
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':kategori', $kategori, PDO::PARAM_STR);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null; ?>
            <div class="overflow-x-auto p-4">
                <div class="flex space-x-6 w-max">
                    <!-- Card 1: Produk -->
                    <?php foreach ($result as $row): ?>
                       <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                            <img src="<?php echo $row['gambar'] ?>" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                            <h3 class="text-xl font-semibold text-center text-gray-800"><?php echo $row['nama'] ?></h3>
                            <p class="text-center text-gray-500">Rp <?php echo $row['harga'] ?></p>
                            <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                        </div> 
                    <?php endforeach ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    
    <footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>
