<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Admin Panel</h2>
        <div>
            <a href="../index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Welcome Admin, <?php echo $_SESSION['admin']; ?>!</h2>
        <p>Manage all records from one place.</p>

        <div class="card-grid">
            <div class="card">
                <h3>Patients</h3>
                <p>View all registered patients in the system.</p>
                <a class="btn" href="view_patients.php">View Patients</a>
            </div>

            <div class="card">
                <h3>Doctors</h3>
                <p>Check doctor records and professional details.</p>
                <a class="btn btn-secondary" href="view_doctors.php">View Doctors</a>
            </div>

            <div class="card">
                <h3>Appointments</h3>
                <p>Monitor all appointments across the system.</p>
                <a class="btn btn-warning" href="view_appointments.php">View Appointments</a>
            </div>

            <div class="card">
                <h3>Logout</h3>
                <p>Sign out from the admin panel.</p>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>