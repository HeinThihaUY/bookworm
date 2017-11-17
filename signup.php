<?php
  include("admin/confs/config.php");
  
  $errors = array();
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if(preg_match("/\S+/", $_POST['username']) === 0){
    $errors['username'] = "* Username is required.";
  }
  if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
    $errors['email'] = "* Not a valid e-mail address.";
  }
  if(preg_match("/.{8,}/", $_POST['password']) === 0){
    $errors['password'] = "* Password Must Contain at least 8 Chanacters.";
  }
  if(strcmp($_POST['password'], $_POST['confirm_password'])){
    $errors['confirm_password'] = "* Passwords do not much.";
  }
  
  if(count($errors) === 0){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $password = hash('sha256', $_POST['password']);
    function createSalt(){
        $string = md5(uniqid(rand(), true));
        return substr($string, 0, 3);
    }
    $salt = createSalt();
    $password = hash('sha256', $salt . $password);
    
    $search_query = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email'");
    $num_row = mysqli_num_rows($search_query);
    if($num_row >= 1){
      $errors['email'] = "Email address is unavailable.";
    }else{
      $sql = "INSERT INTO customers(username, password, salt, phone, email) VALUES ('$username', '$password', '$salt', '$phone', '$email')";
      $query = mysqli_query($conn, $sql);
      header("location: signin.php");
    }
  }
  }
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
    
    <form class="login-form" action="signup.php" method="post">
      <h4>Sign Up For Free</h4><hr>

      <input type="text" name="username" id="username" placeholder="Username *" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" required/>
      <?php if(isset($errors['username'])){echo "<p class='msg'>" .$errors['username']. "</p>"; } ?>

      <input type="email" name="email" id="email" placeholder="Email Address *" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required/>
      <?php if(isset($errors['email'])){echo "<p class='msg'>" .$errors['email']. "</p>"; } ?>

      <input type="tel" name="phone" id="phone" placeholder="Phone No " value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>" required/>
      <?php if(isset($errors['phone'])){echo "<p class='msg'>" .$errors['phone']. "</p>"; } ?>

      <input type="password" name="password" id="password" placeholder="Password *" required/>
      <?php if(isset($errors['password'])){echo "<p class='msg'>" .$errors['password']. "</p>"; } ?>

      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password *" required/>
      <?php if(isset($errors['confirm_password'])){echo "<p class='msg'>" .$errors['confirm_password']. "</p>"; } ?>

      <input class="btn" type="submit" value="SIGNUP">
      <p class="message">Already registered? <a href="signin.php">Sign In</a></p>
      <p class="message"><a href="signin.php">Back</a></p>
    </form>

  </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="admin/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>