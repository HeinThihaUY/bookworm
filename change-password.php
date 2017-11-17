<?php
  session_start();
  include("admin/confs/config.php");
  $email = $_SESSION['email'];
  $result = mysqli_query($conn, "SELECT * FROM customers WHERE email ='$email'");
  $profile = mysqli_fetch_assoc($result);

  $errors = array();
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if(preg_match("/.{8,}/", $_POST['password']) === 0){
    $errors['password'] = "* Password Must Contain at least 8 Chanacters.";
  }
  if(strcmp($_POST['password'], $_POST['confirm_password'])){
    $errors['confirm_password'] = "* Passwords do not much.";
  }
  
  if(count($errors) === 0){
    $pass = hash('sha256', $_POST['password']);
    $password = hash('sha256', $profile['salt'] . $pass);
    $sql = "UPDATE customers SET password='$password' WHERE email = '$email'";
    mysqli_query($conn, $sql);
    header("location: index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update User Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="signin">
  <div class="login-page">
  <div class="form">
    
    <form class="login-form" action="change-password.php" method="post">
      <h4>Change Password</h4><hr>

      <input type="password" name="password" id="password" placeholder="Password *" required/>
      <?php if(isset($errors['password'])){echo "<p class='msg'>" .$errors['password']. "</p>"; } ?>

      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password *" required/>
      <?php if(isset($errors['confirm_password'])){echo "<p class='msg'>" .$errors['confirm_password']. "</p>"; } ?>

      <input class="btn" type="submit" value="CHANGE">
      <p class="message"><a href="index.php">Back</a></p>
    </form>
  </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="admin/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>