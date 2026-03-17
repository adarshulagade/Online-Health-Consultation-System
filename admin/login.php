<?php
session_start();
include("../config/db.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Admin Login</h2>
        <div>
            <a href="../index.php">Home</a>
        </div>
    </div>

    <div class="container">
        <h2>Login to Admin Panel</h2>
        <p>Access patients, doctors, and appointments records.</p>

        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter Username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <div class="center">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>

</body>
</html>