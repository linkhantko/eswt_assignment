<?php

require 'connect.php';

$id = $_GET['id'];

$sql="DELETE from users where id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$sql1="DELETE from coordinators where id=:id";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':id',$id);
$stmt1->execute();

header('location:coordinator');
?>
