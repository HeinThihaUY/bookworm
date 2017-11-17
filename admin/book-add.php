<?php
  include("confs/config.php");

  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $pages = $_POST['pages'];
  $category_id = $_POST['category_id'];
  
  $cover = $_FILES["cover"]["name"];
  $tmp = $_FILES["cover"]["tmp_name"];
  $type = $_FILES["cover"]["type"]; 

  $desc = mysqli_real_escape_string($conn, $description);

  if($cover) {
     if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png" || $type == "image/gif") {     
          move_uploaded_file($tmp, "covers/$cover");
      }
  }else{
    $cover = "no-cover.gif";
  }
  
  $sql = "INSERT INTO books (
    title, author, description, price, pages, category_id, 
    cover, created_date, modified_date
  ) VALUES (
    '$title', '$author', '$desc', '$price', '$pages',
    '$category_id', '$cover', now(), now()
  )";

  mysqli_query($conn, $sql);

  header("location: book-list.php");
?>