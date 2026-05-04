<?php
include '../db.php';
$result = mysqli_query($conn,"SELECT * FROM teachers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>View Teachers</title>

<style>
    body{
        font-family: Arial;
        background: #f2f2f2;
    }

    h2{
        text-align: center;
        margin-top: 20px;
    }

    .table-box{
        width: 90%;
        margin: 30px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #ccc;
    }

    table{
        width: 100%;
        border-collapse: collapse;
    }

    th, td{
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th{
        background: #007BFF;
        color: white;
    }

    tr:hover{
        background: #f1f1f1;
    }

    .btn{
        padding: 5px 10px;
        border: none;
        color: white;
        cursor: pointer;
        border-radius: 5px;
    }

    .delete{
        background: red;
    }

    .edit{
        background: orange;
    }
</style>

</head>

<body>

<h2>Teachers List 👨‍🏫</h2>

<div class="table-box">

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['phone']; ?></td>

        <td>
            <button class="btn edit">Edit</button>
            <button class="btn delete">Delete</button>
        </td>
    </tr>

    <?php } ?>

</table>

</div>

</body>
</html>