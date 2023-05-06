<?php
require('connect.php');

$C_ID=$_POST['coordinator_id'];
$A_ID=$_POST['articleid'];
$cmd=$_POST['comment'];



$query = "INSERT INTO comments (coordinator_id,article_id,comment) VALUES (:coordiantor_id,:article_id,:comment)";

$stmt =$conn->prepare($query);
$stmt->bindParam(':coordiantor_id', $C_ID);
$stmt->bindParam(':article_id', $A_ID);
$stmt->bindParam(':comment', $cmd);
$stmt->execute();

header("Location:C_article.php");

?>
