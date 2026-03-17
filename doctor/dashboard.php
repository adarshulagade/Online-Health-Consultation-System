<?php
session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Doctor Panel</h2>
        <div>
            <a href="../index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Welcome Doctor, <?php echo $_SESSION['doctor_name']; ?>!</h2>
        <p>View appointments, update status, and add prescriptions.</p>

        <div class="card-grid">
            <div class="card">
                <h3>Appointments</h3>
                <p>Check all patient appointment requests and manage them.</p>
                <a class="btn" href="view_appointments.php">View Appointments</a>
            </div>

            <div class="card">
                <h3>Logout</h3>
                <p>End your current doctor session safely.</p>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>