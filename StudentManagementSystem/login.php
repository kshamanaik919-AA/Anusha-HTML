<?php
session_start();
include 'db.php';

$reg_id = $_POST['reg_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE reg_id='$reg_id' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1){
    $_SESSION['reg_id'] = $reg_id;
    header("Location: dashboard.php");
} else {
    echo "Invalid Login!";
}
?>