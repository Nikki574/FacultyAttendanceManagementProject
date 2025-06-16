<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update CL for all staff
$updateClQuery = "UPDATE staff SET cl_balance = cl_balance + 1";
$conn->query($updateClQuery);

echo "Monthly CL update successful!";

$conn->close();
?>
