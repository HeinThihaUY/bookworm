<?php
  include("confs/auth.php");
  include("confs/config.php");
  $sql = "SELECT * from customers";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "error occurred";
  }
  $i=0;
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
            <div class="section mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
                <div class="mb-3 tb-border">
                    <div class="panel-header px-3 py-2">
                        <h3 class="mt-3 pb-2"><i class="fa fa-list-alt" aria-hidden="true"></i> Customer Lists</h3>
                    </div>
                    <div class="card-body">
                      <table id="example" class="table table-striped dt-responsive normal" cellspacing="0" width="100%">
                      <thead class="tb-header">
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Code</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                          <td><?php echo ++$i ?></td>
                          <td><?php echo $row['username'] ?></td>
                          <td><?php echo $row['password'] ?></td>
                          <td><?php echo $row['salt'] ?></td>
                          <td><?php echo $row['phone'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><a class="btn btn-danger" href="customer-del.php?id=<?php echo $row['id'] ?>">Delete</a></td>
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
  
  // DataTable initialisation
    $('#example').DataTable(
        {
          "paging": true,
          "autoWidth": true,
          "buttons": []
        }
      );
    });
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