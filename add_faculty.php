<?php
require('connect.php');

$name=$_POST['faculty'];

$sql_check="SELECT * from faculties where faculty=:faculty";
$stmt = $conn->prepare($sql_check);
$stmt ->bindParam(':faculty', $name);
$stmt ->execute();
$user_check = $stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Faculties is already exist!!')</script>";
	echo "<script>location='faculties'</script>";
}
elseif($stmt->rowcount() <= 0)
{

$query = "INSERT INTO faculties (faculty) VALUES (:faculty)";
$stmt =$conn->prepare($query);
$stmt->bindParam(':faculty', $name);

$stmt->execute();

header("Location:faculties");
}
?>
