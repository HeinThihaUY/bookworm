<?php
    include("confs/auth.php");
    include("confs/config.php");
    $book = mysqli_query($conn, "SELECT id FROM books");
    $totalbook = mysqli_num_rows($book);

    $category = mysqli_query($conn, "SELECT id FROM categories");
    $totalcat = mysqli_num_rows($category);

    $customer = mysqli_query($conn, "SELECT id FROM customers");
    $totalcustomer = mysqli_num_rows($customer);

    $order = mysqli_query($conn, "SELECT id FROM orders");
    $totalorder = mysqli_num_rows($order);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Dashboard</li>
                </ol>
                <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a class="card-link" href="book-list.php">
                    <div class="card text-white tb-border bg-info mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-9 text-right">
                                    <div class="huge"><?php echo $totalbook ?></div>
                                    <div>Books</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                     <a class="card-link" href="cat-list.php">
                    <div class="card text-white tb-border bg-success mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-table fa-5x"></i>
                                </div>
                                <div class="col-9 text-right">
                                    <div class="huge"><?php echo $totalcat ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                     <a class="card-link" href="order-list.php">
                    <div class="card text-white tb-border bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-9 text-right">
                                    <div class="huge"><?php echo $totalorder ?></div>
                                    <div>Orders</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                     <a class="card-link" href="customer-list.php">
                    <div class="card text-white tb-border bg-warning mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-9 text-right">
                                    <div class="huge"><?php echo $totalcustomer ?></div>
                                    <div>Customers</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>