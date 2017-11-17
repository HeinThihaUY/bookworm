<?php 
  session_start();
    include("admin/confs/config.php");
    $email = $_SESSION['email'];
    $user = mysqli_query($conn, "SELECT id, username from customers where email = '$email'");
    $user_info = mysqli_fetch_assoc($user);
    $userid = $user_info['id'];
    $order = mysqli_query($conn, "SELECT * FROM orders WHERE customer_id=$userid ORDER BY id DESC");
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
    <div class="container return-msg bg-white card-shadow">
      <div class="row bg-info bd-shadow text-white py-3">
        <h4 class="col-md-6"><?php echo $user_info['username'] ?></h4>
        <h4 class="col-md-6 text-right">Order History</4>
      </div>
      <div class="container">
        <?php while($order_info = mysqli_fetch_assoc($order)) { ?>
        <div class="row mt-3">
          <div class="col-md-6"><p>Order Date<br><?php echo $order_info['order_started_date'] ?></p></div>
          <p class="col-md-6 text-right">Delivery Date<br>
          <?php 
            if($order_info['status']){
              echo $order_info['delivery_date'];
            } else {
              echo "Processing";
            } 
            ?>
          </p>
        </div>
        <?php 
            $total = 0;
            $order_id = $order_info['id'];
            $item = mysqli_query($conn, "SELECT order_details.*, books.title, books.price FROM order_details LEFT JOIN books ON order_details.book_id = books.id WHERE order_details.order_id = $order_id");
            while($item_info = mysqli_fetch_assoc($item)) {
              $total += $item_info['price'] * $item_info['qty'];
        ?>
        <div class="row">
          <div class="col-md-6"><p><?php echo $item_info['title'] ?><span class="text-danger"> x <?php echo $item_info['qty'] ?></span></p></div>
          <p class="col-md-6 text-right">US$ <?php echo $item_info['price'] * $item_info['qty'] ?></p>
        </div>
        <?php 
          }
        ?>
        <div class="row text-info">
          <div class="col-md-6"><h6>Total : </h6></div>
          <h6 class="col-md-6 text-right">US$  <?php echo $total ?></h6>
        </div>
        <div class="row">
          <div class="col-md-6"><p>Order Status : </p></div>
          <p class="col-md-6 text-right">
          <?php
          if($order_info['status']){
              echo "<span class='badge badge-pill badge-success status text-white'>delivered</span>";
            } else {
              echo "<span class='badge badge-pill badge-warning status text-white'>processing</span>";
            } 
          ?>
          </p>
        </div>
        <hr>
        <?php } ?>
      </div>
    </div>
  </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="admin/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>