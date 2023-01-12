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
                <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="settings.php">Security</a></li>
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
                </span> Dashboard/System users
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
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Users</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                        $rqu = "SELECT * FROM users";
	                      $result = mysqli_query($connection, $rqu);
                        while($r = mysqli_fetch_array($result)){
                            ?>
                          <tr>
                            <td>
                            <?php echo $r['username'] ;?>
                            </td>
                            <td> 
                            <?php echo $r['email'] ;?>
                          </td>
                            <td>
                            <?php echo $r['pass'] ;?>
                            </td>
                            <td>
                            <div class="mt-3">
                            <a class="btn btn-danger" href="Delete-user.php? id=<?php echo $r['id'];?>">DELETE</a>
                            </div>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                       </tbody>
                      </table>
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