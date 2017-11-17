<?php
  session_start();
  include("admin/confs/config.php");
  $email = $_SESSION['email'];
  $result = mysqli_query($conn, "SELECT * FROM customers WHERE email ='$email'");
  $profile = mysqli_fetch_assoc($result);

  $errors = array();
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if(preg_match("/\S+/", $_POST['username']) === 0){
    $errors['username'] = "* Username is required.";
  }
  
  if(count($errors) === 0){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $sql = "UPDATE customers SET username='$username', phone='$phone' WHERE email = '$email'";
    mysqli_query($conn, $sql);
    header("location: profile.php");
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
    
    <form class="login-form" action="profile-edit.php" method="post">
      <h4>Edit Profile</h4><hr>
      <input type="text" name="username" id="username" placeholder="Username *" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}else{echo $profile['username'];} ?>" required/>
      <?php if(isset($errors['username'])){echo "<p class='msg'>" .$errors['username']. "</p>"; } ?>

      <input type="tel" name="phone" id="phone" placeholder="Phone No " value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}else{echo $profile['phone'];} ?>" required/>
      <?php if(isset($errors['phone'])){echo "<p class='msg'>" .$errors['phone']. "</p>"; } ?>

      <input class="btn" type="submit" value="UPDATE">
      <p class="message"><a href="profile.php">Back</a></p>
    </form>
  </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="admin/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>