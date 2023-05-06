<?php
require('connect.php');
session_start();

$fstDate0=str_replace(" ", "-",$_POST['fstDate']);
$finalDate0=str_replace(" ", "-",$_POST['finalDate']);
$academicyear=$_POST['academicyear'];

$array_fstDate = explode("-",$fstDate0);
$array_finalDate = explode("-",$finalDate0);
if ($array_fstDate[0] <= $array_finalDate[0] ) {
  $fstDate =  $fstDate0;
  $finalDate = $finalDate0;


$query_check = "SELECT * FROM deadlines WHERE academicyear=:academicyear";
$stmt_check=$conn->prepare($query_check);
$stmt_check->bindParam(':academicyear',$academicyear);
$stmt_check->execute();

if ($stmt_check->rowCount() >0) {
    $_SESSION['alex']= true;

} else {
  $query = "INSERT INTO deadlines (first_date,final_date,academicyear) VALUES (:first_date,:final_date,:academicyear)";
  $stmt =$conn->prepare($query);
  $stmt->bindParam(':first_date', $fstDate);
  $stmt->bindParam(':final_date', $finalDate);
  $stmt->bindParam(':academicyear', $academicyear);
  $stmt->execute();
}

header("Location:deadline.php");
}else if ($array_fstDate[0] > $array_finalDate[0]){
      $_SESSION['dtg']= true;
      header("Location:register_date.php");
}
 ?>
