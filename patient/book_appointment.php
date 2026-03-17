<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

$patient_id = $_SESSION['patient_id'];

if (isset($_POST['book'])) {
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, problem)
            VALUES ('$patient_id', '$doctor_id', '$date', '$time', '$problem')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Appointment Booked Successfully');</script>";
    } else {
        echo "<script>alert('Error booking appointment');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Book Appointment</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Schedule a Consultation</h2>
        <p>Select doctor, date, time, and describe your problem.</p>

        <form method="POST">
            <label>Select Doctor</label>
            <select name="doctor_id" required>
                <?php
                $doctors = mysqli_query($conn, "SELECT * FROM doctors");
                while ($row = mysqli_fetch_assoc($doctors)) {
                ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['name'] . " - " . $row['specialization']; ?>
                    </option>
                <?php } ?>
            </select>

            <label>Date</label>
            <input type="date" name="date" required>

            <label>Time</label>
            <input type="time" name="time" required>

            <label>Problem</label>
            <textarea name="problem" placeholder="Describe your problem" required></textarea>

            <div class="center">
                <button type="submit" name="book">Book Appointment</button>
            </div>
        </form>

        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>