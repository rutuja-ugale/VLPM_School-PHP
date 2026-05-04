<?php
session_start();

include '../db.php';

if(!$conn){
    die("Connection failed");
}

// form data
$email = $_POST['email'];
$password = $_POST['password'];

// check user
$query = "SELECT * FROM students WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    // ✅ session create
    $_SESSION['student'] = $email;

    // redirect to admission
    header("Location: admission.html");
    exit();

}else{

    // ❌ alert + back
    echo "<script>
            alert('Invalid Email or Password');
            window.location.href='login.html';
          </script>";
}
?>