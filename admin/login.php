<?php
  session_start();

  $name = $_POST['name'];
  $password = $_POST['password'];

  if($name == "admin" and $password == "123") {
    $_SESSION['auth'] = true;
    header("location: dashboard.php");
  } else {
  	$message = "Login Failed";
    header("location: index.php?message=". $message);
  }
?>
