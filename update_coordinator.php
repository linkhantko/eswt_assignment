<?php
	require 'connect.php';

	$id=$_POST['id'];
	$OldPhoto = $_POST['OldPhoto'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$faculties_id = $_POST['faculties'];
	$NewPhoto = $_FILES['photo'];
	$image_name =$NewPhoto['name'];

	if ($NewPhoto['size'] >0) {
		$source_dir="images/";
		$file_name =mt_rand(10000,9999999);
		$file_exe_array = explode('.',$image_name);
		$file_exe = $file_exe_array[1];

		// var_dump($file_exe_array); die();

		$file_path =$source_dir.$image_name;

		move_uploaded_file($NewPhoto['tmp_name'], $file_path);
	}
	else
	{
		$file_path =$OldPhoto;
	}

	$sql= "UPDATE users SET photo=:photo, name=:name, gender=:gender, phone=:phone, address=:address where id=:id";
	$stmt =$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':gender',$gender);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':photo',$file_path);
	$stmt->execute();

	$sql1= "UPDATE coordinators SET photo=:photo, name=:name, gender=:gender, phone=:phone, faculties_id=:faculties_id, address=:address where id=:id";
	$stmt1 =$conn->prepare($sql1);
	$stmt1->bindParam(':id',$id);
	$stmt1->bindParam(':name',$name);
	$stmt1->bindParam(':gender',$gender);
	$stmt1->bindParam(':phone',$phone);
	$stmt1->bindParam(':address',$address);
	$stmt1->bindParam(':photo',$file_path);
  $stmt1->bindParam(':faculties_id',$faculties_id);
	$stmt1->execute();

	header('location:coordinator');
 ?>
