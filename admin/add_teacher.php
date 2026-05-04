<?php
include '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];

$query = "INSERT INTO teachers(name,email,subject,phone)
VALUES('$name','$email','$subject','$phone')";

if(mysqli_query($conn,$query)){
    echo "Teacher Added Successfully";
    header("Location: view_teachers.php");
}else{
    echo "Error";
}
?>