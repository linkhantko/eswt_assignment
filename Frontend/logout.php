<?php
	session_start();
	session_destroy();

	echo "<script>alert('Logout Succesful')</script>";
	echo "<script>location='index'</script>";
 ?>
