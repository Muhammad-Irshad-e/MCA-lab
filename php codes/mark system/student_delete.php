<?php
include 'connection.php';
if (!isset($_GET['roll']) || empty($_GET['roll'])) {
    die("Error: Roll Number not provided.");
}
$roll = $_GET['roll'];

$query = "DELETE FROM Students WHERE Roll_No = '$roll'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Student deleted successfully'); window.location.href='edit_student.php';</script>";
} 
?>
