<?php
session_start();
include "../db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){

    $_SESSION['admin'] = $email;

    header("Location: admin_dashboard.php");
    exit();

} else {

    echo "<script>
            alert('Invalid Email or Password');
            window.location.href='admin_login.html';
          </script>";
}
?>