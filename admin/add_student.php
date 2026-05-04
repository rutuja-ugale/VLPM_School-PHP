<?php
include '../db.php';

if(!$conn){
    die("Connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

$query = "INSERT INTO students(name,email,mobile,address)
VALUES('$name','$email','$mobile','$address')";

if(mysqli_query($conn,$query)){

    // SUCCESS → dashboard la redirect
    echo "<script>
            alert('Student Added Successfully');
            window.location.href='admin_dashboard.php';
          </script>";

}else{

    echo "<script>
            alert('Error while adding student');
            window.history.back();
          </script>";
}
?>