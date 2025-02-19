<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <?php if (!isset($_SESSION['safetyquest']) || $_SESSION['safetyquest'] == 0){ ?>
            <h1 class="text-2xl font-bold mb-6">Register</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="securityquest" name="securityquest" class="mr-2 transform scale-125 border rounded-lg">
                    <label for="securityquest" class="text-sm font-medium" ondblclick="openSecurityQuestionExplanationAlert()">
                        <strong>Gunakan Pertanyaan Keamanan (Dianjurkan)</strong> Klik dua kali untuk info lebih lanjut
                    </label>
                </div>

                <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Lanjutkan</button>
            </form> 
        <?php }elseif ($_SESSION['safetyquest'] == 1) { ?>
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
                <button type="submit" class="w-full bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Lanjutkan</button>
            </form>

        <?php } ?>
        <?php 
        if (isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['sesi1'])) {
            ?>
            <script>
                window.location.href = 'login.php';
            </script>
            <?php
        } elseif (isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['sesi2'])) {
            $_SESSION['safetyquest']=0;
            $table = "adminusers";
            $sql = "DELETE FROM $table WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['last_id']);
            if ($stmt->execute()) {
                $stmt = null;
                $select_sql = "SELECT id FROM $table ORDER BY id ASC";
                $stmt = $conn->prepare($select_sql);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Disable auto-increment temporarily
                $conn->exec("ALTER TABLE $table AUTO_INCREMENT = 1");

                // Reset IDs from 1
                $new_id = 1;
                foreach ($rows as $row) {
                    $update_sql = "UPDATE $table SET id = :new_id WHERE id = :old_id";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->bindParam(':new_id', $new_id);
                    $update_stmt->bindParam(':old_id', $row['id']);
                    $update_stmt->execute();
                    $new_id++;
                }

                // Set auto-increment to start from the next new ID
                $reset_auto_increment_sql = "ALTER TABLE $table AUTO_INCREMENT = $new_id";
                $conn->exec($reset_auto_increment_sql);
            }
            ?>
            <script>
                window.location.href = 'register.php';
            </script>
            <?php
        }
         ?>
        <form method="post" class="mt-4 text-center">
            <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-300" type="submit" name="<?php echo (!isset($_SESSION['safetyquest']) || $_SESSION['safetyquest'] == 0) ? 'sesi1' : 'sesi2'; ?>">
                Kembali
            </button>
        </form>
        <a href="login.php" class="text-[0.8rem] text-[#0A2DAE]">Already Have Account? Log In Here</a>
    </div>

    <div id="securityQuestionExplanation" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-8 rounded-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Pertanyaan Keamanan</h2>
            <p class="text-xl mb-8">Sebuah metode untuk mengamankan akun anda dengan menggunakan metode mengajukan 5 pertanyaan</p>
            <!-- Tombol Tutup -->
            <button type="button" onclick="closeSecurityQuestionExplanationAlert()" class="mt-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                Tutup
            </button>
        </div>
    </div>
</body>
<script>
    function openSecurityQuestionExplanationAlert() {
        document.getElementById('securityQuestionExplanation').classList.remove('hidden');
    }
    function closeSecurityQuestionExplanationAlert() {
        document.getElementById('securityQuestionExplanation').classList.add('hidden');
    }
</script>
</html>
