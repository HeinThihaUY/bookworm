<?php 
    include("confs/auth.php");
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="cat-list.php">Categories</a></li>
                    <li class="breadcrumb-item active">New Category</li>
                </ol>
                <div class="panel-header px-3 py-2">
                    <h3 class="mt-3 pb-2"><i class="fa fa-table" aria-hidden="true"></i> Adding New Category</h3>
                </div>
				<div class="container-fluid tb-border pt-3 pb-1">
					<form action="cat-add.php" class="form-group" method="post">
						<label for="name">Category Name *</label>
  						<input class="form-control" type="text" name="name" id="name" placeholder="Write category name" required>
  						<label for="summary">Summary </label>
  						<textarea name="summary" id="summary" class="form-control" placeholder="Write summary for this category" rows="10"></textarea>
  						<input class="btn btn-dark-grey" type="submit" value="Add Category">
					</form>
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