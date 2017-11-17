<?php
  include("confs/config.php");

  $id = $_GET['id'];
  $sql = "DELETE FROM customers WHERE id = $id";
  mysqli_query($conn, $sql);
  header("location: customer-list.php");
?>