<?php
include("../config/db.php");
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patients WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['patient_id'] = $row['id'];
        $_SESSION['patient_name'] = $row['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Patient Login</h2>
        <div>
            <a href="../index.php">Home</a>
        </div>
    </div>

    <div class="container">
        <h2>Login to Patient Account</h2>
        <p>Enter your email and password to continue.</p>

        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <div class="center">
                <button type="submit" name="login">Login</button>
            </div>
        </form>

        <div class="links">
            <a class="back-link" href="register.php">New user? Register here</a>
        </div>
    </div>

</body>
</html>