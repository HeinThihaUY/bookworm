<html>
<head>
	<title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="bg-main">
  <div class="page-content container">
        <div class="login-wrapper">
              <div class="box">
                  <div class="content-wrap">
                      <h6 style="color: #263238;">Sign In</h6>
                      <?php if(isset($_GET['message'])){ echo "<p style='color: #ff0000;'>" .$_GET['message']. "</h2>"; } ?>
                      <form action="login.php" method="post">
                      <input class="form-control" type="text" id="name" name="name" placeholder="Username">
                      <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                      <input class="btn btn-dark-grey" type="submit" value="Login">
                      </form>   
                  </div>      
              </div>
        </div>
      
  </div>
</body>
</html>