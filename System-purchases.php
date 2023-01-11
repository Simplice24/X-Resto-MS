<?php
  session_start();
  if(!isset($_SESSION["id"])){
    header("location:login.php");
  }
  include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
  
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  
    <link rel="stylesheet" href="assets/css/style.css">
   
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <?php
    if($_SESSION["name"])
    ?>
    
   
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.php">X-Restaurant</a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php">X-Restaurant</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><span class="mdi mdi-account-circle mdi-24px"></span><?php echo $_SESSION["name"];  ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            

            <li class="nav-item dropdown">
              
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                
                <div class="dropdown-divider"></div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
             
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
            
            </li>
          </ul>
          
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><span class="mdi mdi-account-circle mdi-24px"></span><?php echo $_SESSION["name"]; ?></span>
                  <span class="text-secondary text-small">Restaurant Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Actions</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="System-users.php"> System Users </a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="#"> Update records </a></li> -->
                  <li class="nav-item"> <a class="nav-link" href="register-user.php"> Register new user </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Recording</h6>
                </div><br>
                <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" href="System-sales.php">Sales </a><br><br>
                <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" href="System-purchases.php">Purchase </a><br><br>
                <!-- <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" href="#">New user </a> -->
              
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard/ Purchase recording
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <!-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> -->
                  </li>
                </ul>
              </nav>
            </div>
          
            <div class="row">
            <div class="container-scroller">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <!-- <div class="brand-logo">
                  <img src="assets/images/logo.svg">
                </div> -->
                <h4>Purchase recording</h4>
                <form class="pt-3" action="" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="product-name" placeholder="Product name" required/>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="category" placeholder="Category" required/>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" id="exampleInputEmail1" name="quantity" placeholder="Quantity" required/>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" id="exampleInputPassword1" name="cost" placeholder="Cost" required/>
                  </div>
                  <div class="form-group">
                    <input type="date" class="form-control form-control-lg" id="exampleInputPassword2" name="date" placeholder="Date" required/>
                  </div>
                  <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4">Record purchase</button>
                  </div>
                </form>
                <?php
   if(isset($_POST["submit"])){
	    $Product_name = $_POST['product-name'];
		  $Quantity = $_POST['quantity'];
      $Category= $_POST['category'];
      $Cost = $_POST['cost'];
		  $Date =$_POST['date'];
      
      $stmt1=$connection->prepare("SELECT * FROM stock WHERE productName=? and category=?");
      $stmt1->bind_param('ss',$Product_name,$Category);
      $stmt1->execute();
      $result=$stmt1->get_result();
      while($row=$result->fetch_assoc()){
         if($row["productName"]>0){
          $UpdatedQty=$row["quantity"]+$Quantity;
          $UpdatedCost=$row["cost"]+$Cost;
          $stmt2=$connection->prepare("UPDATE stock set quantity=?, cost=? WHERE productName=? and category=?");
          $stmt2->bind_param('ssss',$UpdatedQty,$UpdatedCost,$Product_name,$Category);
          $stmt2->execute();
         }
      }
      $query2="INSERT INTO stock (id, productName, category, quantity,cost, entryDate) 
      VALUES('','$Product_name','$Category',$Quantity,$Cost, '$Date')";
      $r2= mysqli_query($connection,$query2);
      if(!$r2){
        echo "Failed ".mysqli_error($connection);
      }
      $query1= "INSERT INTO purchases (id, productName, category, quantity, cost, entryDate)
		  VALUES ('','$Product_name','$Category',$Quantity,$Cost, '$Date')";
		  $r1 = mysqli_query($connection, $query1); 
	    if(!$r1){
			echo "Failed ".mysqli_error($connection);
		}else{
			echo "Purchase recorded";
		}
    }
	   ?>
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © X-Restaurant 2023</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>