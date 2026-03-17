<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['doctor_id'])) {
    header("Location: login.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

if (isset($_POST['submit'])) {
    $appointment_id = $_POST['appointment_id'];
    $patient_id = $_POST['patient_id'];
    $prescription_text = $_POST['prescription_text'];

    $sql = "INSERT INTO prescriptions (appointment_id, doctor_id, patient_id, prescription_text)
            VALUES ('$appointment_id', '$doctor_id', '$patient_id', '$prescription_text')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Prescription added successfully'); window.location='view_appointments.php';</script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$appointment_id = $_GET['appointment_id'];
$patient_id = $_GET['patient_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Prescription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Add Prescription</h2>
        <div>
            <a href="view_appointments.php">Appointments</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Write Prescription</h2>
        <p>Add medicine and instructions for the patient.</p>

        <form method="POST">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

            <label>Prescription</label>
            <textarea name="prescription_text" rows="6" placeholder="Write prescription here" required></textarea>

            <div class="center">
                <button type="submit" name="submit">Save Prescription</button>
            </div>
        </form>

        <a class="back-link" href="view_appointments.php">Back to Appointments</a>
    </div>

</body>
</html>