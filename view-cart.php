<?php 
    session_start();
    if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])) {
    header("location: noitems.php");
    exit();
    }
    include("admin/confs/config.php");
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);

    $total = 0;
    $cart = 0;
    if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $qty) {
        $cart += $qty;
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BookWorm</title>

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

	<div class="container-fluid mt-5 pt-5">
		<h3 class="pl-3 mb-3">Your Basket</h3>

    <div class="container-fluid bg-white card-shadow my-3">
      <div class="row">
        <h5 class="mt-3 col-sm-12 col-md-12 col-lg-6"><i class="fa fa-fw fa-shopping-basket" aria-hidden="true"></i> You have <?php echo $cart ?> items in your basket.</h5>
        <h5 class="text-right mt-2 col-sm-12 col-md-12 col-lg-6"><a class="btn btn-primary mr-3" href="index.php">Continue Shopping</a> - Or - <a class="btn btn-info ml-3" href="#address">Order Now</a></h5>
      </div>
    </div>

		<div class="container-fluid bg-white card-shadow">
			 <div class="row">
        <h5 class="mt-4 pl-4 col-sm-12 col-md-12 col-lg-6">Shopping Basket Details</h5>
        <h5 class="text-right mt-3 mb-0 col-sm-12 col-md-12 col-lg-6"><a class="btn btn-danger" href="empty-cart.php"><i class="fa fa-fw fa-cart-arrow-down" aria-hidden="true"></i> Empty Cart</a></h5>
      </div>
      <hr>
      <?php 
        foreach ($_SESSION['cart'] as $id => $qty) { 
          $cart_result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
          $cart_row = mysqli_fetch_assoc($cart_result);
          $total += $cart_row['price'] * $qty;
      ?>
			<div class="row">
				<div class="col-md-6">
					<img class="img-fluid rounded float-left mr-4" src="admin/covers/<?php echo $cart_row['cover'] ?>" style="width: 8em;" alt="Card image cap">
					<div class="py-2">
						<h5><a href="book-detail.php?id=<?php echo $cart_row['id'] ?>"><?php echo $cart_row['title'] ?></a></h5>
						<p><?php echo $cart_row['author'] ?></p>
						<h5>US$<?php echo $cart_row['price'] ?></h5>
					</div>
				</div>
				<div class="col-md-6">
          <div class="pull-right">
            <label>Quantity</label>
            <form class="form-inline" action="change-qty.php" method="post">
              <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $cart_row['id'] ?>">
              <input type="number" class="form-control mr-2" style="width: 5em;" name="qty" id="qty" value="<?php echo $qty ?>" required>
              <input type="submit" class="btn btn-primary" value="update">
            </form>
            <p class="lead">US$<?php echo $cart_row['price'] * $qty ?></p>
            <form action="remove-item.php" method="get">
              <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id ?>">
              <input type="submit" class="btn btn-danger" value="remove">
            </form>
          </div>
				</div>
			</div>
       <hr>
       <?php } ?>
		</div>

    <div class="container-fluid bg-white mb-3 pb-3 card-shadow">
      <div class="row px-2 pt-3">
        <h5 class="col-6 col-md-6 text-right">Delivery Cost :</h5>
        <h5 class="col-5 col-md-5 text-right">Free</h5>
        <h5 class="col-6 col-md-6 text-right text-info">Total :</h5>
        <h5 class="col-5 col-md-5 text-right text-info">US$<?php echo $total ?></h5>
      </div>
      <h5 class="px-2 pt-3" id="address">Destination Address</h5><hr>
      <?php if(isset($_SESSION['email'])) { 
        echo "<form class='form-inline' action='checkout.php' method='post'>
        <textarea name='destination' id='destination' class='form-control' rows='2' cols='50' placeholder='Write destination address' required></textarea>
        <input type='submit' class='btn btn-info ml-3 mt-3' value='Order'>
      </form>";
      } else {
        echo "<form class='form-inline' action='signin.php' method='post'>
        <textarea name='destination' id='destination' class='form-control' rows='2' cols='50' placeholder='Write destination address' required></textarea>
        <input type='submit' class='btn btn-info ml-3 mt-3' value='Order'>
      </form>";
      }
      ?>
      
    </div>

    
      
    
	</div>

	   <!-- Footer -->
    <footer class="py-3 bg-main">
      <div class="container-fluid">
        <p class="m-0 text-center text-white">Copyright &copy; BookWorm <?php echo date('Y') ?></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="admin/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>