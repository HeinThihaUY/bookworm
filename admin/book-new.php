<?php      
    include("confs/auth.php");
    include("confs/config.php");      
    $result = mysqli_query($conn, "SELECT id, name FROM categories");
    if(!$result){
    	echo "error occured";
    }
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
                    <li class="breadcrumb-item"><a href="book-list.php">Books</a></li>
                    <li class="breadcrumb-item active">New Books</li>
                </ol>
                <div class="panel-header px-3 py-2">
                    <h3 class="mt-3 pb-2"><i class="fa fa-book" aria-hidden="true"></i> Adding New Book</h3>
                </div>
                <div class="container-fluid tb-border pt-3 pb-1">
					<form action="book-add.php" class="form-group" method="post" enctype="multipart/form-data">
  					<label for="title">Book Title *</label>
  					<input class="form-control" type="text" name="title" id="title" placeholder="Write book title" required>

  					<label for="author">Author *</label>
  					<input class="form-control" type="text" name="author" id="author" placeholder="Write author name" required>

  					<label for="description">Description</label>
  					<textarea name="description" id="description" class="form-control" placeholder="Write description for this book" rows="8"></textarea>

  					<label for="categories">Category *</label>
  					<select name="category_id" id="categories" class="form-control" required>    
    					<option value="" selected disabled>-- Choose Category--</option>        
      					<?php while($row = mysqli_fetch_assoc($result)){ ?>
   					 	<option value="<?php echo $row['id'] ?>">      
      					<?php echo $row['name'] ?>    
    					</option>    
    					<?php } ?>  
  					</select> 

  					<label for="price">Price *</label>
  					<input class="form-control" type="number" step="0.01" name="price"  id="price" placeholder="Write price for book" required>

                    <label for="pages">Pages *</label>
                    <input class="form-control" type="number" name="pages" id="pages" placeholder="Write number of pages in book" required>

  					<label for="cover">Cover</label>
                    <!-- <label class="custom-file form-control ">
                        <input type="file" name="cover" id="cover">
                        <span class="custom-file-control"></span>
                    </label> -->
                    <input type="file" name="cover" class="form-control" id="cover" accept="image/*"><br>

  					<input class="btn btn-dark-grey" type="submit" value="Add Book">
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