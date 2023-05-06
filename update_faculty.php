<?php 
	require 'connect.php';

	$id=$_POST['id'];
	$faculty = $_POST['faculty'];

	$sql= "UPDATE faculties SET faculty=:faculty where id=:id";
	$stmt =$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':faculty',$faculty);
	$stmt->execute();

	header('location:faculties');
 ?>