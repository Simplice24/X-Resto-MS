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
              <span class="mdi mdi-account-circle mdi-24px"></span>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $_SESSION["name"];  ?></p>
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
              <span class="mdi mdi-account-circle mdi-24px"></span>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION["name"]; ?></span>
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
                <li class="nav-item"><a class="nav-link" href="System-sales.php">Record Sales</a></li>
                <li class="nav-item"><a class="nav-link" href="System-purchases.php">Record Purchases</a></li>
                  <li class="nav-item"><a class="nav-link" href="System-users.php">System Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="register-user.php">Register new user</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Profile</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Security</a></li>
                </ul>
              </div>
            </li>
          </ul>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard/Profile update
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <!-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> -->
                  </li>
                </ul>
              </nav>
            </div>

            <?php
            $profile=$connection->prepare("SELECT * FROM users WHERE id=?");
            $profile->bind_param('s',$_SESSION["id"]);
            $profile->execute();
            $result=$profile->get_result();
            $row=$result->fetch_assoc();
            ?>

            <div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4><?php echo $row["username"] ;?></h4>
									<p class="text-secondary mb-1"><?php echo $row["position"] ;?></p>
									<p class="text-muted font-size-sm">Contact: <?php echo $row["phone"] ;?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
            <form action="" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="fullname" value=<?php echo $row["fullname"] ;?>>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="username" value=<?php echo $row["username"] ;?>>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="email" value=<?php echo $row["email"] ;?>>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="phone" value=<?php echo $row["phone"] ;?>>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                <button type="submit" name="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4">Save changes</button>
								</div>
							</div>
						</div>
          </form>
<?php
  if(isset($_POST["submit"])){
    $fullname=$_POST["fullname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $stmt=$connection->prepare("UPDATE users SET fullname=?, username=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param('sssss',$fullname,$username,$email,$phone,$_SESSION["id"]);
    $stmt->execute();
  }
  ?>
					</div>
        </div>
				</div>
			</div>
		</div>
	</div>
 
            
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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