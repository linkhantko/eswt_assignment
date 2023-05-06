<?php
require('connect.php');

$articleID=$_POST['articleid'];
$year=$_POST['academicyear'];

$sql_check="SELECT * from magazines where article_id=:article_id";
$stmt = $conn->prepare($sql_check);
$stmt ->bindParam(':article_id', $articleID);
$stmt ->execute();
$user_check = $stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Magazine already exist!!')</script>";
	echo "<script>location='C_article'</script>";
}
elseif($stmt->rowcount() <= 0)
{

$query = "INSERT INTO magazines (article_id, academicyear) VALUES (:article_id,:academicyear)";

$stmt =$conn->prepare($query);
$stmt->bindParam(':article_id', $articleID);
$stmt->bindParam(':academicyear', $year);
$stmt->execute();

header("Location:C_article");
}
?>
