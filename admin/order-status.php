<?php
  include("confs/config.php");
  $id = $_GET['id'];
  $status = $_GET['status'];

  mysqli_query($conn, "UPDATE orders SET status=$status WHERE id=$id");
  header("location: order-list.php");
?>