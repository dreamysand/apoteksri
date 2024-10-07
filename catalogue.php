<?php ?>
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
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
            </div>
        </div>

        <div class="flex justify-between mt-[5rem] items-end">
            <h3 class="text-[2.5rem] font-bold text-gray-800">Kategori Produk</h3>
        </div>
        
        <div class="overflow-x-auto p-4">
            <div class="flex space-x-6 w-max">
                <!-- Card 1: Produk -->
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <ellipse cx="32" cy="32" rx="28" ry="14" fill="#FFD700" stroke="#D4AF37" stroke-width="2"/>
                      <line x1="4" y1="32" x2="60" y2="32" stroke="#FFFFFF" stroke-width="2"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Tablet</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="12" y="18" width="40" height="28" rx="14" ry="14" fill="#FF4500" stroke="#FF6347" stroke-width="2"/>
                      <line x1="32" y1="18" x2="32" y2="46" stroke="#FFFFFF" stroke-width="2"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Kapsul</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="20" y="16" width="24" height="36" fill="#FF69B4" stroke="#FF1493" stroke-width="2"/>
                      <rect x="28" y="8" width="8" height="8" fill="#FFFACD" stroke="#FFD700" stroke-width="2"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Sirup</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="16" y="24" width="32" height="24" fill="#87CEEB" stroke="#4682B4" stroke-width="2"/>
                      <polygon points="16,24 32,12 48,24" fill="#ADD8E6" stroke="#4682B4" stroke-width="2"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Salep</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="22" y="20" width="20" height="30" fill="#32CD32" stroke="#228B22" stroke-width="2"/>
                      <polygon points="32,10 22,20 42,20" fill="#98FB98" stroke="#228B22" stroke-width="2"/>
                      <circle cx="32" cy="10" r="2" fill="#008000"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Tetes</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="18" y="14" width="28" height="38" fill="#B0E0E6" stroke="#4682B4" stroke-width="2"/>
                      <rect x="26" y="8" width="12" height="6" fill="#FFFFFF" stroke="#4682B4" stroke-width="2"/>
                      <line x1="26" y1="34" x2="38" y2="34" stroke="#ED0909" stroke-width="4"/>
                      <line x1="32" y1="28" x2="32" y2="40" stroke="#ED0909" stroke-width="4"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Antiseptik</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="20" y="12" width="24" height="40" fill="#FFA500" stroke="#FF8C00" stroke-width="2"/>
                      <rect x="26" y="6" width="12" height="6" fill="#FFF5EE" stroke="#FFA500" stroke-width="2"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Vitamin</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <rect x="22" y="16" width="20" height="36" fill="#00BFFF" stroke="#1E90FF" stroke-width="2"/>
                      <rect x="16" y="8" width="32" height="8" fill="#ADD8E6" stroke="#1E90FF" stroke-width="2"/>
                      <rect x="26" y="52" width="12" height="6" fill="#1E90FF"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-center text-gray-800">Inhaler</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <!-- Stetoskop -->
                      <circle cx="25" cy="25" r="5" fill="#87CEEB" stroke="#4682B4" stroke-width="1"/>
                      <line x1="25" y1="25" x2="25" y2="50" stroke="#4682B4" stroke-width="2"/>
                      <line x1="25" y1="50" x2="35" y2="60" stroke="#4682B4" stroke-width="2"/>
                      <line x1="25" y1="50" x2="15" y2="60" stroke="#4682B4" stroke-width="2"/>
                      <!-- Termometer -->
                      <rect x="60" y="30" width="15" height="40" fill="#FFFAF0" stroke="#FFD700" stroke-width="1"/>
                      <rect x="65" y="35" width="5" height="30" fill="#FF6347" stroke="#FF4500" stroke-width="1"/>
                      <!-- Tensimeter -->
                      <circle cx="25" cy="75" r="10" fill="#E6E6FA" stroke="#DDA0DD" stroke-width="2"/>
                      <line x1="25" y1="75" x2="50" y2="75" stroke="#4682B4" stroke-width="2"/>
                      <rect x="50" y="70" width="15" height="10" fill="#87CEEB" stroke="#4682B4" stroke-width="1"/>
                    </svg>         
                    <h3 class="text-xl font-semibold text-center text-gray-800">Alat Kesehatan</h3>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="h-[200px] w-full object-cover mb-4 rounded-md">
                      <!-- Popok Bayi -->
                      <rect x="10" y="10" width="30" height="30" fill="#E6E6FA" stroke="#DDA0DD" stroke-width="1"/>
                      <path d="M10 20 Q25 30 40 20" fill="#F8F8FF" stroke="#DDA0DD" stroke-width="1"/>
                      <!-- Masker -->
                      <rect x="60" y="10" width="30" height="10" fill="#87CEEB" stroke="#4682B4" stroke-width="1"/>
                      <line x1="60" y1="15" x2="50" y2="15" stroke="#4682B4" stroke-width="1"/>
                      <line x1="90" y1="15" x2="100" y2="15" stroke="#4682B4" stroke-width="1"/>
                      <!-- Tisu Basah -->
                      <rect x="10" y="50" width="30" height="20" fill="#FFFACD" stroke="#FFD700" stroke-width="1"/>
                      <circle cx="25" cy="55" r="5" fill="#FFFAF0" stroke="#FFD700" stroke-width="1"/>
                      <!-- Desinfektan -->
                      <rect x="60" y="50" width="25" height="25" fill="#B0E0E6" stroke="#4682B4" stroke-width="1"/>
                      <rect x="65" y="45" width="15" height="5" fill="#FFFFFF" stroke="#4682B4" stroke-width="1"/>
                    </svg> 
                    <h3 class="text-xl font-semibold text-center text-gray-800">Lainnya</h3>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-[5rem] items-end">
            <h3 class="text-[2.5rem] font-bold text-gray-800">Obat Tablet</h3>
            <h3 class="text-[1.5rem] font-bold text-[#3AAF0C] underline"><a href="">Lihat Semuanya</a></h3>
        </div>
        
        <div class="overflow-x-auto p-4">
            <div class="flex space-x-6 w-max">
                <!-- Card 1: Produk -->
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
                <div class="bg-white p-6 w-[300px] flex-none rounded-lg shadow-lg transform hover:scale-105 transition ease-in-out duration-300 cursor-pointer border border-gray-200">
                    <img src="asset/product1.jpg" alt="Produk 1" class="h-[200px] w-full object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Obat Batuk</h3>
                    <p class="text-center text-gray-500">Rp 25.000</p>
                    <button class="mt-4 bg-[#3AAF0C] text-white px-4 py-2 rounded-full w-full hover:bg-blue-600 transition duration-300">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="absolute bottom-0 right-0 left-0 bg-[#101018] p-6 text-center">
        <p class="text-white">&copy; 2024 Apotek Sri. All Right Reserved</p>
    </footer>
</body>
</html>
