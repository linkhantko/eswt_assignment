<?php

	$connection=mysqli_connect("localhost","root","","magazine_db");

  $_HOST="localhost";
	$_DbName="magazine_db";
	$_User="root";
	$_Password="";

	//connection
	try{
		$conn=new PDO('mysql:host='.$_HOST.';dbname='.$_DbName,$_User,$_Password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		// echo "succcess";

	}catch(PDOExpection $e)
	{
		echo $e->getMessage();
	}

 ?>
