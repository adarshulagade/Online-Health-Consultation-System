<?php
include("../config/db.php");

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $check_email = "SELECT * FROM patients WHERE email='$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists');</script>";
    } else {
        $sql = "INSERT INTO patients (name, email, password, phone, gender, age, address) 
                VALUES ('$name', '$email', '$password', '$phone', '$gender', '$age', '$address')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration successful'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registration failed');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Registration</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Patient Registration</h2>
        <div>
            <a href="../index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
    </div>

    <div class="container">
        <h2>Create Patient Account</h2>
        <p>Fill in your details to register in the system.</p>

        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter Name" required>

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <label>Phone</label>
            <input type="text" name="phone" placeholder="Enter Phone" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label>Age</label>
            <input type="number" name="age" placeholder="Enter Age" required>

            <label>Address</label>
            <textarea name="address" placeholder="Enter Address" required></textarea>

            <div class="center">
                <button type="submit" name="register">Register</button>
            </div>
        </form>

        <div class="links">
            <a class="back-link" href="login.php">Already registered? Login here</a>
        </div>
    </div>

</body>
</html>