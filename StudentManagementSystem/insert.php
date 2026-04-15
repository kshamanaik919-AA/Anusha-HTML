<?php
include 'db.php';

// Form data
$name = $_POST['name'];
$dob = $_POST['dob'];
$parent = $_POST['parent'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$class = $_POST['class'];
$address = $_POST['address'];

// Photo upload
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
move_uploaded_file($tmp, "uploads/".$photo);

// 🔥 Registration ID (SP02001 format)
$prefix = "SP";
$class_code = str_pad($class, 2, "0", STR_PAD_LEFT);

$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM students WHERE class='$class'");
$row = mysqli_fetch_assoc($result);

$serial = $row['total'] + 1;
$serial_code = str_pad($serial, 3, "0", STR_PAD_LEFT);

$reg_id = $prefix . $class_code . $serial_code;

// 🔐 Password = DOB
$password = $dob;

// Insert into DB
$sql = "INSERT INTO students 
(reg_id,password,name,dob,parent_name,email,contact,class,address,photo)
VALUES 
('$reg_id','$password','$name','$dob','$parent','$email','$contact','$class','$address','$photo')";

if(mysqli_query($conn,$sql)){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admission Successful</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #445f8b, #8f75a8);
            color: white;
            text-align: center;
            padding-top: 100px;
        }
        .box {
            background: white;
            color: black;
            padding: 30px;
            width: 350px;
            margin: auto;
            border-radius: 10px;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>🎉 Admission Successful</h2>

    <p><b>Registration ID:</b></p>
    <h3><?php echo $reg_id; ?></h3>

    <p><b>Password :</b></p>
    <h3><?php echo $password; ?></h3>

    <a href="login.html">Go to Login</a>
</div>

</body>
</html>

<?php
} else {
    echo "Error!";
}
?>