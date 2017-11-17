<?php
  include("confs/config.php");

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $summary = mysqli_real_escape_string($conn, $_POST['summary']);

  $sql = "INSERT INTO categories (name, summary) VALUES ('$name', '$summary')";

  mysqli_query($conn, $sql);

  header("location: cat-list.php");
?>