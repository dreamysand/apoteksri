<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resep</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Upload Resep</h1>
        <form action="">
            <div class="mb-4">
                <label for="reserp" class="block text-sm font-medium">Pilih Resep</label>
                <input type="file" id="reserp" name="reserp" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white w-full px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Upload</button>
        </form>
    </div>
</body>
</html>
