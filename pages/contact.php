<?php
$a=$_POST["name"];
$b=$_POST["email"];
$c=$_POST["message"];
$con = new mysqli("localhost", "root",  "", "vlp_admission_system") or die("Connection Failed");
echo "connected successfully";
$sql = "insert into contact(name,email,message) values('$a','$b','$c')";
if ($con->query($sql) === true) {
    echo "Data inserted successfully";
} else {
    echo "error";
}

$con->close();
?>