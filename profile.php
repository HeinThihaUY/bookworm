<?php
  session_start();
  include("admin/confs/config.php");
  $email = $_SESSION['email'];
  $result = mysqli_query($conn, "SELECT * FROM customers WHERE email ='$email'");
  $profile = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
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
    <form class="login-form" action="profile-edit.php">
      <h4>Profile</h4><hr>
      <div class="lb-left"><label>Username</label></div>
      <input type="text" id="name" value="<?php echo $profile['username']; ?>" disabled />
      <div class="lb-left"><label>Email</label></div>
      <input type="text" id="email" value="<?php echo $profile['email']; ?>" disabled />
      <div class="lb-left"><label>Phone</label></div>
      <input type="text" id="phone" value="<?php echo $profile['phone']; ?>" disabled />
      <input type="submit" value="Edit">
      <p class="message"><a href="index.php">Back</a></p>
    </form>
  </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="admin/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>