<?php

require 'connect.php';

$id = $_GET['id'];

$sql="DELETE from deadlines where id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:deadline');
?>
