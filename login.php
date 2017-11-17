<?php
	session_start();
	include("admin/confs/config.php");
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$email = mysqli_real_escape_string($conn, $email);
	$sql = "SELECT password, salt FROM customers WHERE email = '$email';";
	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows($query) < 1){
		$message = "Username and Password not found!";
		header("location: signin.php?message=". $message);
	}else{
		$row = mysqli_fetch_assoc($query);
	$hash = hash('sha256', $row['salt'] . hash('sha256', $password) );
	if($hash != $row['password']){
    	$message = "Incorrect Password!";
		header("location: signin.php?message=". $message);
		}else{
		// session_regenerate_id ();
		$_SESSION['email'] = $email;
		header("location: index.php");
		}
	}
?>