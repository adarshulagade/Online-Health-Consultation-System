<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM patients");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patients</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Patients List</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Registered Patients</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['age']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>