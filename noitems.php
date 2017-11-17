<?php 
    session_start();
    include("admin/confs/config.php");
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    $cart = 0;
    if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $qty) {
      $cart += $qty;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Not Found</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark nav-color fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <!-- <img src="http://placehold.it/300x60?text=Logo" width="150" height="30" alt=""> -->
        BookWorm
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
          <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="navbar-collapse collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mt-2 mt-lg-0">
          <li class="nav-item dropdown text-center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php while($row = mysqli_fetch_assoc($result)){ ?>
              <a class="dropdown-item" href="category-detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']?></a>
              <?php } ?>
            </div>
          </li>
        </ul>
        <form class="form-group ml-lg-4 mr-auto my-lg-0" role="search" action="search-result.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-info" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <ul class="nav navbar-nav">
          <li class="nav-item mr-lg-4">
            <a class="nav-link btn btn-info" href="view-cart.php"><i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i><?php echo $cart ?> items</a>
          </li>
          <?php if(!isset($_SESSION['email'])){
            echo "<li class='nav-item text-center'>
            <a class='nav-link' href='signin.php'><i class='fa fa-sign-in mr-2' aria-hidden='true'></i>Sign In</a>
          </li>";
            }else{
              $email = $_SESSION['email'];
              $user = mysqli_query($conn, "SELECT * from customers where email = '$email'");
              $name = mysqli_fetch_assoc($user);
              echo "<li class='nav-item dropdown mr-4 text-center'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <i class='fa fa-user-circle-o' aria-hidden='true'></i> ".$name['username']."
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='profile.php'><i class='fa fa-user mr-1' aria-hidden='true'></i> Profile</a>
              <a class='dropdown-item' href='change-password.php'><i class='fa fa-cog mr-1' aria-hidden='true'></i> Change Password</a>
              <a class='dropdown-item' href='order-history.php'><i class='fa fa-history mr-1' aria-hidden='true'></i> Order History</a>
              <a class='dropdown-item' href='logout.php'><i class='fa fa-sign-out mr-1' aria-hidden='true'></i> Logout</a>
            </div>
          </li>";
            } ?>
        </ul>
      </div>
    </div>
    </nav>

	<div class="container no-items">
		<h5 class='text-center bg-white card-shadow' role='alert'><i class="fa fa-fw fa-shopping-basket" aria-hidden="true"></i><br>There is no items in your cart<br><a href="index.php">Continue Shopping</a></h5>
        
	</div>
	
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="admin/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>