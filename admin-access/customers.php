<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include 'head.php';
include '../functions.php';
?>

<body>
  <!-- Side Navbar -->
  <?php
  include 'nav.php';
  ?>
  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="dashboard.php" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Max Power</strong></div>
              </a></div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Notifications dropdown-->
              <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                <ul aria-labelledby="notifications" class="dropdown-menu">
                  <li><a rel="nofollow" href="#" class="dropdown-item">
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                        <div class="notification-time"><small>4 minutes ago</small></div>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item">
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                        <div class="notification-time"><small>4 minutes ago</small></div>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item">
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                        <div class="notification-time"><small>4 minutes ago</small></div>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item">
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                        <div class="notification-time"><small>10 minutes ago</small></div>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications </strong></a></li>
                </ul>
              </li>

              <!-- username -->
              <li class="nav-item"><a href="javascript:void(0)" class="nav-link logout"> <span class="d-none d-sm-inline-block"><?php echo $_SESSION['user_email']; ?></span><i class="fa fa-user"></i></a></li>
              <!-- Log out-->
              <li class="nav-item"><a href="backend/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">All Customers</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header>
          <h1 class="h3 display">Tables</h1>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>All Products</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Customer ID</th>
                        <th>Customer IP</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Password</th>
                        <th>Customer Country</th>
                        <th>Customer City</th>
                        <th>Customer Contact</th>
                        <th>Customer Address</th>
                        <th>Delete <i class="fa fa-trash"></i></th>
                      </tr>
                    </thead>
                    <?php
                    $get_cus = "SELECT * FROM customers";
                    $run_cus = mysqli_query($con, $get_cus);

                    while ($row_cus = mysqli_fetch_array($run_cus)) {
                      $cus_id = $row_cus['customer_id'];
                      $cus_ip = $row_cus['customer_ip'];
                      $cus_name = $row_cus['customer_name'];
                      $cus_email = $row_cus['customer_email'];
                      $cus_pass = $row_cus['customer_pass'];
                      $cus_country = $row_cus['customer_country'];
                      $cus_city = $row_cus['customer_city'];
                      $cus_contact = $row_cus['customer_contact'];
                      $cus_address = $row_cus['customer_address'];

                      ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $cus_id; ?></th>
                          <td><?php echo $cus_ip; ?></td>
                          <td><?php echo $cus_name; ?></td>
                          <td><?php echo $cus_email; ?></td>
                          <td><?php echo $cus_pass; ?></td>
                          <td><?php echo $cus_country; ?></td>
                          <td><?php echo $cus_city; ?></td>
                          <td><?php echo $cus_contact; ?></td>
                          <td><?php echo $cus_address; ?></td>
                          <td><a href="delete_user.php?del=<?php echo $cus_id; ?>" onClick="return confirm('Delete This item?')" class="del-icon"><i class="fa fa-trash"></i></td>
                        </tr>
                      </tbody>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>