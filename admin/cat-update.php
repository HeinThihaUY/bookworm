<?php
  include("confs/config.php");

  $id = $_POST['id'];
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $summary = mysqli_real_escape_string($conn, $_POST['summary']);

  $sql = "UPDATE categories SET name='$name', summary='$summary' WHERE id = '$id'";
  $test = mysqli_query($conn, $sql);
  if(!$test){
  	echo "error occured";
  }
  header("location: cat-list.php");
?>

