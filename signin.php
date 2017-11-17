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

    <form class="login-form" action="login.php" method="post">
      <h4>Welcome!</h4><hr>
      <input type="text" name="email" id="email" placeholder="email"/>
      <input type="password" name="password" id="password" placeholder="password"/>

      <input type="submit" value="LOGIN">
      <?php if(isset($_GET['message'])){ echo "<p class='msg'>" .$_GET['message']. "</h2>"; } ?>
      <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
      <p class="message"><a href="" class="forgotmessage">Forgot your passowrd?</a></p>
    </form>
  </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="admin/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready( function(){
      $('.message a.forgotmessage').click(function(){
        var mail = prompt("Enter your current email?");
        if(mail != null){
          alert("We have sent code to "+mail);
        }
      }); 
    });
  </script>
</body>
</html>