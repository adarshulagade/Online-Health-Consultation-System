<?php
include("../config/db.php");
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM doctors WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['doctor_id'] = $row['id'];
        $_SESSION['doctor_name'] = $row['name'];

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
    <title>Doctor Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Doctor Login</h2>
        <div>
            <a href="../index.php">Home</a>
        </div>
    </div>

    <div class="container">
        <h2>Login to Doctor Account</h2>
        <p>Enter doctor credentials to access appointment management.</p>

        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <div class="center">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>

</body>
</html>