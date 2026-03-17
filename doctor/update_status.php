<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['doctor_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE appointments SET status='$status' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: view_appointments.php");
        exit();
    } else {
        echo "Error updating status";
    }
}
?>