<?php
include '../db.php';
if(!$conn){
    die("Connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$password = $_POST['password'];

// insert query
$query = "INSERT INTO students (name,email,mobile,address,password)
VALUES ('$name','$email','$mobile','$address','$password')";

if(mysqli_query($conn, $query)){

    echo "<script>
            alert('Registration Successful');
            window.location.href='login.html';
          </script>";

}else{
    echo "<script>
            alert('Error in Registration');
            window.history.back();
          </script>";
}
?>