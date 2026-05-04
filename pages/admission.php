<?php
session_start();

include '../db.php';

if(!$conn){
    die("Connection failed");
}

// login check (important 🔐)
if(!isset($_SESSION['student'])){
    header("Location: login.html");
    exit();
}

// form data
$sname = $_POST['sname'];
$pname = $_POST['pname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];

// file upload
$photo = $_FILES['document1']['name'];
$aadhar = $_FILES['document2']['name'];
$record = $_FILES['document3']['name'];
$birth = $_FILES['document4']['name'];

$tmp1 = $_FILES['document1']['tmp_name'];
$tmp2 = $_FILES['document2']['tmp_name'];
$tmp3 = $_FILES['document3']['tmp_name'];
$tmp4 = $_FILES['document4']['tmp_name'];

// folder ensure करा
if(!is_dir("uploads")){
    mkdir("uploads");
}

// move files
move_uploaded_file($tmp1, "uploads/".$photo);
move_uploaded_file($tmp2, "uploads/".$aadhar);
move_uploaded_file($tmp3, "uploads/".$record);
move_uploaded_file($tmp4, "uploads/".$birth);

// 🚫 CHECK: already admission?
$check = mysqli_query($conn,"SELECT * FROM admissions WHERE email='$email'");

if(mysqli_num_rows($check) > 0){

    echo "<script>
            alert('You have already applied for admission');
            window.location.href='payment.html';
          </script>";

}else{

    // insert
    $query = "INSERT INTO admissions 
    (student_name,parent_name,email,phone,course,photo,aadhar,records,birth_certificate,payment_status)
    VALUES 
    ('$sname','$pname','$email','$phone','$course','$photo','$aadhar','$record','$birth','pending')";

    if(mysqli_query($conn,$query)){

        // save admission id (🔥 important for payment)
        $_SESSION['admission_email'] = $email;

        header("Location: payment.html");
        exit();

    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>