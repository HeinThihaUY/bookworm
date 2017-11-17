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
  // pagination
  $limit = 8;
  if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
    $next = $page+1;
    $prev = $page-1;
  } else { 
    $page=1;
    $next = $page+1;
    $prev = 0;
  }  
  $start = ($page-1) * $limit; 
  $total = mysqli_query($conn, "SELECT id FROM books"); 
  $total_records = mysqli_num_rows($total);
  $book= mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC LIMIT $start, $limit");

  $forNotFound = mysqli_num_rows($book);
  if($forNotFound <= 0){
    header("location: index.php");
  }

  $total_pages = ceil($total_records / $limit);  
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

    <header class="text-white bg-image">
      <div class="container welcome-text">
        <h1>Welcome to BookWorm</h1>
        <p class="lead">A New Place To Find Pleasure</p>
      </div>
    </header>

    
    <div class="container-fluid mb-3">
      <div class="container-fluid bd-shadow pt-3 pb-1 mt-3">
      <h3>Newest Books</h3><hr>
      <div class="row">
        <?php 
          while ($book_row = mysqli_fetch_assoc($book)) { 
          // if($book_row['id'] != $book_detail['id']){
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="book-more rounded mb-4">
              <a href="book-detail.php?id=<?php echo $book_row['id'] ?>">
              <div class="card-body">
                <img class="img-fluid rounded mx-auto d-block" src="admin/covers/<?php echo $book_row['cover'] ?>" style="width: 16em; height: 16em;" alt="Card image cap">
              </div>
              </a>
              <div class="card-footer bg-grey">
                <h5 class="card-title text-detail"><?php echo $book_row['title'] ?></h5>
                <div class="row">
                  <p class="card-text col-6 col-md-6"><a class="btn btn-info" href="add-to-cart.php?id=<?php echo $book_row['id'] ?>&qty=1&location=3&code=<?php echo $page ?>">Cart <i class="fa fa-fw fa-cart-plus" aria-hidden="true"></i></a></p>
                  <h5 class="text-info col-6 col-md-6">US$ <?php echo $book_row['price'] ?></h5>
                </div>
              </div>
            
            </div>
        </div>
        <?php } ?>
      </div>
      <?php  
        $pagLink = "<nav><ul class='pagination justify-content-center'>";  
        if($prev < 1){
          $pagLink .= "<li class='page-item disabled'><a class='page-link' href='index.php?page='".$prev."'>Prev</a></li>";
        }else{
          $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$prev."'>Prev</a></li>";
        }
        for ($i=1; $i<=$total_pages; $i++) {  
            if($i == $page){
              $pagLink .= "<li class='page-item active'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>"; 
            }else{
              $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>"; 
            }
                      
        };  
        if($next > $total_pages){
            $pagLink .= "<li class='page-item disabled'><a class='page-link' href='index.php?page=".$next."'>Next</a></li>";
        }else{
            $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$next."'>Next</a></li>";
        }
        echo $pagLink . "</ul></nav>";  
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
