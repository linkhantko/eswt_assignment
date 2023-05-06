<?php
require 'connect.php';
$id=$_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];

$sql= "UPDATE users SET name=:name, gender=:gender, phone=:phone, address=:address where id=:id";
$stmt =$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':gender',$gender);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
$stmt->execute();

$sql_m= "UPDATE managers SET name=:name, gender=:gender, phone=:phone, address=:address where id=:id";
$stmt_m =$conn->prepare($sql_m);
$stmt_m->bindParam(':id',$id);
$stmt_m->bindParam(':name',$name);
$stmt_m->bindParam(':gender',$gender);
$stmt_m->bindParam(':phone',$phone);
$stmt_m->bindParam(':address',$address);
$stmt_m->execute();

echo "<script>alert('Update Successful!')</script>";
header('location:M_profile');
 ?>
