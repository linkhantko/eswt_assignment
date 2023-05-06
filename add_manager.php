<?php
require('connect.php');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$role_id=2;
$rolename='Marketing Manager';
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$image=$_FILES['photo'];
$image_name =$image['name'];
$source_dir="images/";
$file_name =mt_rand(10000,9999999);
$file_exe_array =$image_name;
$file_exe = $file_exe_array[1];
$file_path =$source_dir.$image_name;
move_uploaded_file($image['tmp_name'], $file_path);


$sql_check="SELECT * from users where email=:email";
$stmt = $conn->prepare($sql_check);
$stmt ->bindParam(':email', $email);
$stmt ->execute();
$user_check = $stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Email already exist!!')</script>";
	echo "<script>location='manager'</script>";
}
elseif($stmt->rowcount() <= 0)
{
$query = "INSERT INTO users (name,email,password,role_id,rolename,phone,address,gender,photo) VALUES (:name,:email,:password,:role_id,:rolename,:phone,:address,:gender,:photo)";

$stmt =$conn->prepare($query);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':role_id', $role_id);
$stmt->bindParam(':rolename', $rolename);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':photo', $file_path);
$stmt->execute();

$query1 = "INSERT INTO managers (id,name,email,phone,address,gender,photo,rolename,roleid) VALUES (:id,:name,:email,:phone,:address,:gender,:photo,:rolename,:roleid)";

$id=$conn->lastInsertId();

$stmt1 =$conn->prepare($query1);
$stmt1->bindParam(':id', $id);
$stmt1->bindParam(':name', $name);
$stmt1->bindParam(':email', $email);
$stmt1->bindParam(':phone', $phone);
$stmt1->bindParam(':address', $address);
$stmt1->bindParam(':gender', $gender);
$stmt1->bindParam(':photo', $file_path);
$stmt1->bindParam(':rolename', $rolename);
$stmt1->bindParam(':roleid', $role_id);
$stmt1->execute();


header("Location:manager");

}
?>
