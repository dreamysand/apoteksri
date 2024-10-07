<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - GURU DASHBOARD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#E7F4E4] flex items-center justify-center">
    <!-- Forgot Password Form -->
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-3xl font-bold text-center mb-6">FORGOT PASSWORD</h2>
        <form action="proses_forgot_password.php" method="POST" class="space-y-4">
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">EMAIL</label>
                <input type="email" id="email" name="email" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-[#73F1BD] text-white font-bold py-2 px-4 rounded-md w-full hover:bg-[#4ecf95]">RESET PASSWORD</button>
            </div>
        </form>
        <!-- Back to Login Link -->
        <div class="mt-4 text-center text-sm">
            <a href="login.php" class="text-blue-500 hover:underline">Kembali ke Login</a>
        </div>
    </div>
</body>
</html>
