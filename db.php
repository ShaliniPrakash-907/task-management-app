<?php
$conn = mysqli_connect("localhost", "root", "", "task_management");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>