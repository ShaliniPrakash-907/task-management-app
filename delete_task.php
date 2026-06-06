<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = "DELETE FROM tasks WHERE id='$id' AND user_id='$user_id'";
mysqli_query($conn, $query);

header("Location: dashboard.php");
exit();
?>