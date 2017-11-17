<?php
    include("confs/auth.php");
    include("confs/config.php");
    $sql = "SELECT orders.*, customers.username, customers.phone, customers.email FROM orders LEFT JOIN customers ON orders.customer_id = customers.id ORDER BY orders.id DESC";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "error_occured";
    }
    $i = 0; //increment for no
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customers</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Plugin CSS -->
    <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="datatables/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div id="wrapper">
            <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        BookWorm
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">
                    Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="book-list.php">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">
                    Books</span>
                    </a>
                </li>
                <li>
                    <a href="cat-list.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">
                    Categories</span>
                    </a>
                </li>
                <li>
                    <a href="order-list.php">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                    <span class="nav-link-text">
                    Orders</span>
                    </a>
                    </a>
                </li>
                <li>
                    <a href="customer-list.php">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">
                    Customers</span>
                    </a>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                    <i class="fa fa-fw fa-sign-out"></i>
                    <span class="nav-link-text">
                    Logout</span>
                    </a>
                    </a>
                </li>
            </ul>
        </div>
        
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar" id="mainNavbar">
            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            </nav>
            <div class="section my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
                <div class="mb-3 tb-border">
                    <div class="panel-header px-3 py-2">
                        <h3 class="mt-3 pb-2"><i class="fa fa-list-alt" aria-hidden="true"></i> Order Lists</h3>
                    </div>
                    <div class="card-body">
                      <table id="orderlist" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead class="tb-header">
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Order Date</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                            <th>Order Items</th>
                            <th>Action</th>
                            <th>Order</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                          <td><?php echo ++$i ?></td>
                          <td><?php echo $row['username'] ?></td>
                          <td><?php echo $row['phone'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><p class="text-wrap"><?php echo $row['destination'] ?></p></td>
                          <td><?php echo $row['order_started_date'] ?></td>
                          <td><?php echo $row['delivery_date'] ?></td>
                            <?php 
                            if($row['status']) {
                                echo "<td><span class='badge badge-pill badge-success status'>Delivered</span></td>";
                            }else{
                                echo "<td><span class='badge badge-pill badge-warning status'>Todo</span></td>";
                            }
                            ?>
                          <td><a href="view-items.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">View Items</a></td>
                          <?php
                            if($row['status']) {
                                echo "<td><a class='btn btn-warning status' href='order-status.php?id=".$row['id']."&status=0'>Undo</a></td>";
                            }else{
                                echo "<td><a class='btn btn-dark status' href='order-status.php?id=".$row['id']."&status=1'>Deliver</a></td>";
                            }
                            ?>
                          <td><a class="btn btn-danger" href="order-del.php?id=<?php echo $row['id'] ?>">Cancel</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                      </table>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="jquery/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="datatables/jquery.dataTables.js"></script>
  <script src="datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="datatables/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="datatables/responsive.bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
    var table = $('#orderlist').DataTable();
    } );
    </script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>