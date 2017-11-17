<?php 
	session_start();
    if(!isset($_SESSION['cart'])) {
    header("location: index.php");
    exit();
    }
    include("admin/confs/config.php");
    $cart = 0;
    if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $qty) {
        $cart += $qty;
      }
    }
    $email = $_SESSION['email'];
    $user = mysqli_query($conn, "SELECT * from customers where email = '$email'");
    $user_info = mysqli_fetch_assoc($user);

    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $customer_id = $user_info['id'];
    $delivery_date = date('Y-m-d', strtotime('+4 days'));

    mysqli_query($conn, "INSERT INTO orders (destination, order_started_date, delivery_date, status, customer_id) VALUES ('$destination', now(),'$delivery_date', 0, '$customer_id')");
  	$order_id = mysqli_insert_id($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Checkout</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container my-5">
		<h5 class='alert alert-success return-msg mb-3' role='alert'>Your order has been submitted. We'll deliver the items soon. <a href="index.php">BookWorm Home</a></h5>
		<div class="container return-msg bg-white card-shadow">
			<div class="row bg-info text-white py-3">
				<h4 class="col-md-6">My Basket</h4>
				<h4 class="col-md-6 text-right"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <?php echo $cart ?> Items</4>
			</div>
			<div class="container">
				<div class="row mt-3">
				<?php 
					$total = 0;
        			foreach ($_SESSION['cart'] as $id => $qty) { 
        				mysqli_query($conn, "INSERT INTO order_details (order_id, book_id, qty) VALUES ($order_id,$id,$qty)");

          				$cart_result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
          				$cart_row = mysqli_fetch_assoc($cart_result);
          				$total += $cart_row['price'] * $qty;
				?>
					<div class="col-md-6"><p><?php echo $cart_row['title']; ?><span> x <?php echo $qty; ?></span></p></div>
					<p class="col-md-6 text-right">US$ <?php echo $cart_row['price'] * $qty ?></p>
				<?php } ?>
				</div>
				<div class="row">
					<div class="col-md-6"><p>Sub-total</span></p></div>
					<p class="col-md-6 text-right">US$ <?php echo $total; ?></p>
				</div>
				<div class="row">
					<div class="col-md-6"><p>Delivery</p></div>
					<p class="col-md-6 text-right">Free</p>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6"><p>Total</p></div>
					<p class="col-md-6 text-right text-info">US$<?php echo $total; ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php unset($_SESSION['cart']); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="admin/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>