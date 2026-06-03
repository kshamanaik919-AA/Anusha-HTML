<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (name,email,contact,message)
VALUES ('$name','$email','$contact','$message')";

if(mysqli_query($conn,$sql)){
    echo "Message Sent Successfully!";
} else {
    echo "Error!";
}
?>