 <?php

	require '../connect.php';
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];
  $status="Active";

	$sql = "SELECT * FROM students where email=:email and password=:password and status=:status";
	$stmt = $conn-> prepare($sql);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':status',$status);
	$stmt->execute();


	if($stmt->rowCount() <= 0) {

		$_SESSION['fail_login']="Wrong Password Please Try Again!";

		if(!isset($_COOKIE['loginCount'])){
		 $loginCount = 1;
		}
		else
		{
			$loginCount = $_COOKIE['loginCount'];
			$loginCount++;
		}

		setcookie('loginCount',$loginCount,time()+10);

		if ($loginCount >= 3) {
			#time_out
			header('location:404page');
			setcookie('loginCount','',time()-10);

			echo "<script type=\"text/javascript\">
					(function(){
							setTimeout(function(){
								location.href='login';
								},10000);
						})();
					</script>";
		}
		else
		{
			$_SESSION['fail_login']="Wrong Password! Please Try Again!";
			header('location:index');
		}


	}
	else
	{
		$user = $stmt->fetch(PDO::FETCH_ASSOC);


		$_SESSION['loginStudent'] = $user;

		$roleid = $user['roleid'];

		if($roleid == 1) {
			header('location:home');
		}
		elseif($roleid == 2)
		{
			header('location:index_m');
		}
	}




 ?>
