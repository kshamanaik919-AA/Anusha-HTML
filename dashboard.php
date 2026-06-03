<?php
session_start();
include 'db.php';

if(!isset($_SESSION['reg_id'])){
    header("Location: login.html");
    exit();
}

$reg_id = $_SESSION['reg_id'];

// Student details
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE reg_id='$reg_id'"));

// Marks
$marks = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM marks WHERE reg_id='$reg_id'"));

// Attendance
$att = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM attendance WHERE reg_id='$reg_id'"));

// Timetable
$timetable = mysqli_query($conn, "SELECT * FROM timetable WHERE class='{$student['class']}'");

// Notifications
$notes = mysqli_query($conn, "SELECT * FROM notifications");

// Teacher
$teacher = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM teachers WHERE class='{$student['class']}'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>

<style>
body {
    font-family: Arial;
    margin: 0;
    background: #f4f6f9;
}

/* Navbar */
.navbar {
    background: #1e3a8a;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logout button */
.logout-btn {
    background: red;
    color: white;
    padding: 8px 15px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
}

.logout-btn:hover {
    background: darkred;
}

/* Container */
.container {
    padding: 20px;
}

/* Cards */
.card {
    background: white;
    padding: 15px;
    margin: 15px 0;
    border-radius: 10px;
    box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
}

/* Profile image */
img {
    border-radius: 50%;
    margin-bottom: 10px;
}
/* Profile layout */
.profile-box {
    display: flex;
    align-items: center;
    gap: 20px;
}

.profile-box img {
    border-radius: 50%;
    border: 3px solid #1e3a8a;
}

.profile-details p {
    margin: 5px 0;
    font-size: 16px;
}
.timetable {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.timetable th {
    background: #1e3a8a;
    color: white;
    padding: 10px;
    text-align: center;
}

.timetable td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.timetable tr:nth-child(even) {
    background: #f2f2f2;
}

.timetable tr:hover {
    background: #e0e7ff;
}
</style>

</head>

<body>

<!-- Navbar -->
<div class="navbar">
    <h2>🎓 Student Dashboard</h2>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="container">

<!-- Profile -->
<div class="card profile-card">
    <h3>👤 Profile</h3>

    <div class="profile-box">
        <img src="uploads/<?php echo $student['photo']; ?>" width="120">

        <div class="profile-details">
            <p><b>Name:</b> <?php echo $student['name']; ?></p>
            <p><b>Reg ID:</b> <?php echo $student['reg_id']; ?></p>
            <p><b>Class:</b> <?php echo $student['class']; ?></p>
            <p><b>Contact:</b> <?php echo $student['contact']; ?></p>
        </div>
    </div>
</div>

<!-- Marks -->
<div class="card">
    <h3>📊 Marks</h3>
    <?php if($marks){ ?>
        Sub1: <?php echo $marks['subject1']; ?><br>
        Sub2: <?php echo $marks['subject2']; ?><br>
        Sub3: <?php echo $marks['subject3']; ?><br>
        Sub4: <?php echo $marks['subject4']; ?><br>
        Sub5: <?php echo $marks['subject5']; ?><br>
    <?php } else { echo "No marks available"; } ?>
</div>

<!-- Attendance -->
<div class="card">
    <h3>📈 Attendance</h3>
    <?php if($att && $att['total_days'] > 0){ 
        $percent = ($att['present_days']/$att['total_days'])*100;
    ?>
        Total Days: <?php echo $att['total_days']; ?><br>
        Present: <?php echo $att['present_days']; ?><br>
        Percentage: <?php echo round($percent,2); ?>%
    <?php } else { echo "No attendance data"; } ?>
</div>

<!-- Timetable -->
<div class="card">
    <h3>📅 Timetable</h3>

    <table class="timetable">
        <tr>
            <th>Day</th>
            <th>Subject 1</th>
            <th>Subject 2</th>
            <th>Subject 3</th>
            <th>Subject 4</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($timetable)){ ?>
        <tr>
            <td><?php echo $row['day']; ?></td>
            <td><?php echo $row['subject1']; ?></td>
            <td><?php echo $row['subject2']; ?></td>
            <td><?php echo $row['subject3']; ?></td>
            <td><?php echo $row['subject4']; ?></td>
        </tr>
        <?php } ?>
    </table>

</div>

<!-- Notifications -->
<div class="card">
    <h3>📢 Notifications</h3>
    <?php while($n = mysqli_fetch_assoc($notes)){ ?>
        - <?php echo $n['message']; ?><br>
    <?php } ?>
</div>

<!-- Teacher -->
<div class="card">
    <h3>👩‍🏫 Class Teacher</h3>
    <?php if($teacher){ ?>
        <b>Name:</b> <?php echo $teacher['name']; ?><br>
        <b>Contact:</b> <?php echo $teacher['contact']; ?><br>
        <b>Email:</b> <?php echo $teacher['email']; ?><br>
    <?php } else { echo "No teacher assigned"; } ?>
</div>

</div>

</body>
</html>