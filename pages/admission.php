<?php
$a=$_POST["sname"];
$b=$_POST["pname"];
$c=$_POST["email"];
$d=$_POST["phone"];
$e=$_POST["course"];
$f=$_POST["document1"];
$g=$_POST["document2"];
$h=$_POST["document3"];
$i=$_POST["document4"];

$con = new mysqli("localhost", "root",  "", "vlp_admission_system") or die("Connection Failed");
echo "connected successfully";
$sql = "insert into admission(sname,pname,email,phone,course,document1,document2,document3,document4) values('$a','$b','$c','$d','$e','$f','$g','$h','$i')";
if ($con->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "error";
}

$con->close();
?>