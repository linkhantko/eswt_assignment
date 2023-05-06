<?php
require('../connect.php');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$role_id=1;
$rolename='Student';
$phone=$_POST['phone'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$status='Inactive';
$image=$_FILES['photo'];
$image_name =$image['name'];
$source_dir="images/";

$file_path =$source_dir.$image_name;
move_uploaded_file($image['tmp_name'], $file_path);

$sql_check="SELECT * from students where email=:email";
$stmt = $conn->prepare($sql_check);
$stmt ->bindParam(':email', $email);
$stmt ->execute();
$user_check = $stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Email already exist!!')</script>";
	echo "<script>location='login'</script>";
}
elseif($stmt->rowcount() <= 0)
{
$query = "INSERT INTO students (name,gender,email,password,phone,address,dob,photo,status,rolename,roleid) VALUES (:name,:gender,:email,:password,:phone,:address,:dob,:photo,:status,:rolename,:roleid)";

$stmt =$conn->prepare($query);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':photo', $file_path);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':rolename', $rolename);
$stmt->bindParam(':roleid', $role_id);
$stmt->execute();

session_start();
$_SESSION['reg_success']="Thank ! your account has been successfully created and new Signed In.";
header("Location:index");
}
?>
