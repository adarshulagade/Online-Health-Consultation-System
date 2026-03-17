<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Patient Panel</h2>
        <div>
            <a href="../index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['patient_name']; ?>!</h2>
        <p>Manage your appointments and prescriptions here.</p>

        <div class="card-grid">
            <div class="card">
                <h3>Book Appointment</h3>
                <p>Choose a doctor and schedule a consultation.</p>
                <a class="btn" href="book_appointment.php">Book Now</a>
            </div>

            <div class="card">
                <h3>My Appointments</h3>
                <p>Check appointment dates, status, and doctor details.</p>
                <a class="btn btn-secondary" href="view_appointments.php">View Appointments</a>
            </div>

            <div class="card">
                <h3>Logout</h3>
                <p>Sign out securely from your patient account.</p>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>