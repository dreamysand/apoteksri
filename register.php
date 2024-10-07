<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GURU DASHBOARD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#E7F4E4] flex items-center justify-center">
    <!-- Register Form -->
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-3xl font-bold text-center mb-6">REGISTER</h2>
        <form action="proses_register.php" method="POST" class="space-y-4">
            <!-- Username Input -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">USERNAME</label>
                <input type="text" id="username" name="username" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">EMAIL</label>
                <input type="email" id="email" name="email" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">PASSWORD</label>
                <input type="password" id="password" name="password" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Confirm Password Input -->
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">CONFIRM PASSWORD</label>
                <input type="password" id="confirm_password" name="confirm_password" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-[#73F1BD] text-white font-bold py-2 px-4 rounded-md w-full hover:bg-[#4ecf95]">REGISTER</button>
            </div>
        </form>
        <!-- Already Registered Link -->
        <div class="mt-4 text-center text-sm">
            <a href="login.php" class="text-blue-500 hover:underline">Sudah Punya Akun? Login di sini</a>
        </div>
    </div>
</body>
</html>
