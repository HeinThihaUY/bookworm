<?php
  include("confs/config.php");

  $id = $_POST['id'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $pages = $_POST['pages'];
  $category_id = $_POST['category_id'];
  
  $cover = $_FILES['cover']['name'];
  $tmp = $_FILES['cover']['tmp_name'];

  $desc = mysqli_real_escape_string($conn, $description);

  if($cover) {
    move_uploaded_file($tmp, "covers/$cover");
    $sql = "UPDATE books SET title='$title', author='$author',
      description='$desc', price='$price', pages='$pages', category_id='$category_id',
      cover='$cover', modified_date=now() WHERE id = $id";
  } else {
    $sql = "UPDATE books SET title='$title', author='$author',
      description='$desc', price='$price', pages='$pages', category_id='$category_id',
      modified_date=now() WHERE id = $id";
  }

  mysqli_query($conn, $sql);

  header("location: book-list.php");
?>
