<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

$patient_id = $_SESSION['patient_id'];

$sql = "SELECT appointments.*, doctors.name AS doctor_name, doctors.specialization
        FROM appointments
        JOIN doctors ON appointments.doctor_id = doctors.id
        WHERE appointments.patient_id = '$patient_id'
        ORDER BY appointment_date DESC, appointment_time DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Appointments</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>My Appointments</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Appointment History</h2>
        <p>View your booked consultations and prescription status.</p>

        <table>
            <tr>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Date</th>
                <th>Time</th>
                <th>Problem</th>
                <th>Status</th>
                <th>Prescription</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['specialization']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td><?php echo $row['problem']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a class="btn btn-secondary" href="view_prescription.php?appointment_id=<?php echo $row['id']; ?>">View</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>