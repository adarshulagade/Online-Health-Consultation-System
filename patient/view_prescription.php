<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

$appointment_id = $_GET['appointment_id'];
$patient_id = $_SESSION['patient_id'];

$sql = "SELECT prescriptions.*, doctors.name AS doctor_name
        FROM prescriptions
        JOIN doctors ON prescriptions.doctor_id = doctors.id
        WHERE prescriptions.appointment_id = '$appointment_id'
        AND prescriptions.patient_id = '$patient_id'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Prescription Details</h2>
        <div>
            <a href="view_appointments.php">My Appointments</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Doctor Prescription</h2>

        <?php if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); ?>
            
            <div class="card">
                <h3>Doctor: <?php echo $row['doctor_name']; ?></h3>
                <p><strong>Prescription:</strong></p>
                <p><?php echo $row['prescription_text']; ?></p>
            </div>

        <?php } else { ?>
            <div class="card">
                <h3>No Prescription Yet</h3>
                <p>The doctor has not added any prescription for this appointment.</p>
            </div>
        <?php } ?>

        <a class="back-link" href="view_appointments.php">Back to My Appointments</a>
    </div>

</body>
</html>