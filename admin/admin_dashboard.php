<?php
include "../db.php";

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.html");
    exit();
}

// counts from DB (optimized)
$students   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM students"))[0];
$teachers   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM teachers"))[0];
$admissions = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM admissions"))[0];

$paid    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM admissions WHERE payment_status='paid'"))[0];
$pending = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM admissions WHERE payment_status='pending'"))[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f4f4;
        }
        .header {
            background: #007BFF;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #333;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 12px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #575757;
        }
        .main {
            margin-left: 220px;
            padding: 20px;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            width: 200px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 0px 8px #ccc;
            transition: 0.3s;
        }
        .card h3 a{
            text-decoration: none;
            text-decoration-line: none;
            color: #333;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .count {
            font-size: 22px;
            font-weight: bold;
            color: #007BFF;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>Admin Dashboard</h2>
</div>

<div class="sidebar">
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="add_student.html">Add Student</a>
    <a href="view_students.php">View Students</a>
    <a href="add_teacher.html">Add Teacher</a>
    <a href="view_teachers.php">View Teachers</a>
    <a href="payment.html">Payments</a>
    <a href="admin_logout.php">Logout</a>
</div>

<div class="main">
    <h3>Welcome Admin 👋</h3>

    <div class="cards">
        <div class="card">
            <h3><a href="./view_students.php">Students</a></h3>
            <div class="count"><?php echo $students; ?></div>
        </div>

        <div class="card">
            <h3><a href="./view_teachers.php">Teachers</a></h3>
            <div class="count"><?php echo $teachers; ?></div>
        </div>

        <div class="card">
            <h3>Admissions</h3>
            <div class="count"><?php echo $admissions; ?></div>
        </div>

        <div class="card">
            <h3>Paid</h3>
            <div class="count"><?php echo $paid; ?></div>
        </div>

        <div class="card">
            <h3>Pending</h3>
            <div class="count"><?php echo $pending; ?></div>
        </div>
    </div>
</div>

</body>
</html>