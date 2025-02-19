<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <?php if (!isset($_SESSION['safetyquest']) || $_SESSION['safetyquest'] == 0){ ?>
            <h1 class="text-2xl font-bold mb-6">Log In</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-sm font-medium">Remember Me</label>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Lanjut</button>
            </form>
        <?php } elseif ($_SESSION['safetyquest'] == 1){?>
             <!-- Pertanyaan Keamanan -->
            <h2 class="text-xl font-semibold mb-4 mt-6">Pertanyaan Keamanan</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Pertanyaan 1 -->
                <div class="mb-4">
                    <label for="question_1" class="block text-sm font-medium">Pertanyaan Keamanan 1: Siapakah nama teman anda ?</label>
                    <input type="text" id="question_1" name="question_1" class="w-full px-4 py-2 border rounded-lg" placeholder="Jawaban Anda" required>
                </div>
                <!-- Pertanyaan 2 -->
                <div class="mb-4">
                    <label for="question_2" class="block text-sm font-medium">Pertanyaan Keamanan 2: Apa judul lagu favorit anda ?</label>
                    <input type="text" id="question_2" name="question_2" class="w-full px-4 py-2 border rounded-lg" placeholder="Jawaban Anda" required>
                </div>
                <!-- Pertanyaan 3 -->
                <div class="mb-4">
                    <label for="question_3" class="block text-sm font-medium">Pertanyaan Keamanan 3: Apa makanan favorit anda ?</label>
                    <input type="text" id="question_3" name="question_3" class="w-full px-4 py-2 border rounded-lg" placeholder="Jawaban Anda" required>
                </div>
                <!-- Pertanyaan 4 -->
                <div class="mb-4">
                    <label for="question_4" class="block text-sm font-medium">Pertanyaan Keamanan 4: Siapakah sosok yang menjadi idol anda ?</label>
                    <input type="text" id="question_4" name="question_4" class="w-full px-4 py-2 border rounded-lg" placeholder="Jawaban Anda" required>
                </div>
                <!-- Pertanyaan 5 -->
                <div class="mb-4">
                    <label for="question_5" class="block text-sm font-medium">Pertanyaan Keamanan 5: Apa film favorit anda ?</label>
                    <input type="text" id="question_5" name="question_5" class="w-full px-4 py-2 border rounded-lg" placeholder="Jawaban Anda" required>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Login</button>
            </form>
        <?php }?>
        <?php 
        if (isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['sesi1'])) {
            ?>
            <script>
                window.location.href = 'index.php';
            </script>
            <?php
        } elseif (isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['sesi2'])) {
            $_SESSION['safetyquest']=0;
            ?>
            <script>
                window.location.href = 'login.php';
            </script>
            <?php
        }
         ?>
        <form method="post" class="mt-4 text-center">
            <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-300" type="submit" name="<?php echo (!isset($_SESSION['safetyquest']) || $_SESSION['safetyquest'] == 0) ? 'sesi1' : 'sesi2'; ?>">
                Kembali
            </button>
        </form>
        <a href="register.php" class="text-[0.8rem] text-[#0A2DAE]">Don't Have Account? Register Here</a> |
        <a href="forgotpass.php" class="text-[0.8rem] text-[#0A2DAE]">Forgot Your Password</a><br>
    </div>
</body>
</html>