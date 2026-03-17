<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['doctor_id'])) {
    header("Location: login.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

$sql = "SELECT appointments.*, patients.name AS patient_name 
        FROM appointments 
        JOIN patients ON appointments.patient_id = patients.id
        WHERE appointments.doctor_id = '$doctor_id'
        ORDER BY appointment_date DESC, appointment_time DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointments</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Doctor Appointments</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Patient Appointment Requests</h2>
        <p>Approve, reject, and add prescriptions for appointments.</p>

        <table>
            <tr>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Problem</th>
                <th>Status</th>
                <th>Action</th>
                <th>Prescription</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td><?php echo $row['problem']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a class="btn btn-secondary" href="update_status.php?id=<?php echo $row['id']; ?>&status=Approved">Approve</a>
                    <a class="btn btn-danger" href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected">Reject</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="add_prescription.php?appointment_id=<?php echo $row['id']; ?>&patient_id=<?php echo $row['patient_id']; ?>">Add</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>