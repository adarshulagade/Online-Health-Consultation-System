<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT appointments.*, patients.name AS patient_name, doctors.name AS doctor_name
        FROM appointments
        JOIN patients ON appointments.patient_id = patients.id
        JOIN doctors ON appointments.doctor_id = doctors.id
        ORDER BY appointment_date DESC, appointment_time DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>All Appointments</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>System Appointment Records</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Problem</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td><?php echo $row['problem']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>