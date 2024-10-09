<?php
// Start session
session_start();

// Include database connection
include('db_config.php');

$error = '';

// Handle form submission
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the entered password
    $hashed_password = md5($password);

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $username;
        header('Location: dashboard.php'); // Redirect to dashboard
        exit();
    } else {
        // Login failed
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit" name="login">Login</button>
    </form>

    <?php if ($error != '') { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>
</body>
</html>
