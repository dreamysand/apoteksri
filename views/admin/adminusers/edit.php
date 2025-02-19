<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Admin User</h1>
        <?php foreach ($result as $row): ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($row['gambar']); ?>">
                <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page']); ?>">

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="roles" class="block text-sm font-medium">Roles</label>
                    <select id="roles" name="roles" class="w-full px-4 py-2 border rounded-lg" required>
                        <option value="admin" <?php echo ($row['roles'] == "admin") ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?php echo ($row['roles'] == "user") ? 'selected' : ''; ?>>User</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium">Status</label>
                    <select id="status" name="status" class="w-full px-4 py-2 border rounded-lg" required>
                        <option value="active" <?php echo ($row['status'] == "active") ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo ($row['status'] == "inactive") ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium">Foto Profil (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" id="gambar" name="gambar" class="w-full px-4 py-2 border rounded-lg" onchange="handleImageUpload(event)">
                </div>

                <!-- Container untuk preview gambar yang akan dicrop -->
                <div class="mb-4">
                    <img id="profile-img" src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Preview Image" class="hidden w-48 h-48 object-cover rounded-lg mx-auto">
                </div>
                
                <button type="button" id="crop-btn" class="bg-green-500 text-white w-full px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 hidden mb-4">Crop Image</button>

                <!-- Hidden input untuk gambar yang telah di-crop -->
                <input type="hidden" name="cropped_image" id="cropped_image">

                <button type="submit" class="bg-green-500 text-white w-full px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4">Update Admin User</button>
                <button type="button" class="w-full bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300" onclick="insertBack()">Kembali</button>
                
            </form>
        <?php endforeach ?>
    </div>

    <!-- JavaScript untuk Cropper.js -->
    <script>
        let profilePicInput = document.getElementById('gambar');
        let profileImg = document.getElementById('profile-img');
        let cropBtn = document.getElementById('crop-btn');
        let cropper;

        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImg.src = e.target.result;
                    profileImg.classList.remove('hidden');
                    cropBtn.classList.remove('hidden');

                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(profileImg, {
                        aspectRatio: 1,
                        viewMode: 1,
                        autoCropArea: 1
                    });
                };
                reader.readAsDataURL(file);
            }
        }

        cropBtn.addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas({
                width: 150,
                height: 150
            });

            const croppedImageData = canvas.toDataURL();
            const croppedImageInput = document.getElementById('cropped_image');
            croppedImageInput.value = croppedImageData;

            profileImg.src = croppedImageData;
            cropBtn.classList.add('hidden');
        });
    </script>
</body>
</html>
