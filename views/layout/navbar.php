<nav class="bg-[#101018] text-white p-4 fixed top-0 left-0 right-0 z-[997]">
        <div class="flex justify-between items-center">
            <?php include 'views/layout/logo.php'; ?>
            <button id="sidebarToggle" class="text-white">
                <!-- Icon Burger Menu -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </nav>
    <div id="overlay"></div>
    <aside id="sidebar" class="fixed top-0 left-0 h-full bg-[#101018] text-white p-6">
        <nav>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms] active">Dashboard</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms]">Admin</a>
            <a href="kategori.php" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms]">Kategori Obat</a>
            <a href="golongan.php" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms]">Golongan Obat</a>
            <a href="obat.php" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms]">Obat-obatan</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms]">Transaksi</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition ease-in-out duration-[150ms]">Laporan</a>
            <a href="#" class="flex items-center bg-[#EF1010] py-2 px-4 rounded hover:bg-[#9F0909] absolute bottom-10 transition ease-in-out duration-[150ms]"><svg fill="#ffffff" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="w-[1.5rem] h-[1.5rem] mr-[10px]"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.207 9H5V7h7.136L11.05 5.914 12.464 4.5 16 8.036l-3.536 3.535-1.414-1.414L12.207 9zM10 4H8V2H2v12h6v-2h2v4H0V0h10v4z" fill-rule="evenodd"></path></g></svg>Log Out</a>
        </nav>
    </aside>

    <style>
        #sidebar {
            width: 250px;
            background-color: #101018;
            position: fixed;
            top: 0;
            bottom: 0;
            left: -250px;
            transition: left 0.3s ease;
            z-index: 999;
        }

        #sidebar.active {
            left: 0;
        }
        #sidebar a.active {
            background: #7BC7A2;
            color: black;
        }

        /* Overlay */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        #overlay.active {
            display: block;
        }
    </style>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const mainContent = document.getElementById('mainContent');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            mainContent.classList.toggle('shifted');
        });

        document.getElementById('overlay').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const mainContent = document.getElementById('mainContent');

            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            mainContent.classList.remove('shifted');
        });
    </script>