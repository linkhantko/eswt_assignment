<?php
	require 'connect.php';
	session_start();

	$id=$_POST['id'];
  $fstDate0=str_replace(" ", "-",$_POST['first_date']);
  $finalDate0=str_replace(" ", "-",$_POST['final_date']);

	$array_fstDate = explode("-",$fstDate0);
	$array_finalDate = explode("-",$finalDate0);
	if ($array_fstDate[0] <= $array_finalDate[0] ) {
	  $fstdate =  $fstDate0;
	  $finaldate = $finalDate0;
		$sql= "UPDATE deadlines SET first_date=:first_date,final_date=:final_date where id=:id";
		$stmt =$conn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->bindParam(':first_date',$fstdate);
		$stmt->bindParam(':final_date',$finaldate);

		$stmt->execute();

	header('location:deadline');
	}else if ($array_fstDate[0] > $array_finalDate[0]){
	      $_SESSION['dtg']= true;
	      header("Location:deadline");
	}


 ?>
