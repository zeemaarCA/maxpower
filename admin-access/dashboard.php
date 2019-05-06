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
              <!-- Messages dropdown-->
              <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                <ul aria-labelledby="notifications" class="dropdown-menu">
                  <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                      <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="msg-body">
                        <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                      <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="msg-body">
                        <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                      <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="msg-body">
                        <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                      </div>
                    </a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages </strong></a></li>
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
    <!-- Counts Section -->
    <section class="dashboard-counts section-padding">
      <div class="container-fluid">
        <div class="row">
          <!-- Count item widget-->
          <div class="col-xl-2 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-user"></i></div>
              <div class="name"><strong class="text-uppercase">New Customers</strong><span>Last 7 days</span>
                <div class="count-number"><?php echo total_customers(); ?></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-2 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-padnote"></i></div>
              <div class="name"><strong class="text-uppercase">Product Orders</strong><span>Last 5 days</span>
                <div class="count-number"><?php echo total_orders(); ?></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-2 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-check"></i></div>
              <div class="name"><strong class="text-uppercase">New Quotes</strong><span>Last 2 months</span>
                <div class="count-number">342</div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-2 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-bill"></i></div>
              <div class="name"><strong class="text-uppercase">New Invoices</strong><span>Last 2 days</span>
                <div class="count-number"><?php echo total_payments(); ?></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-2 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-list"></i></div>
              <div class="name"><strong class="text-uppercase">Open Cases</strong><span>Last 3 months</span>
                <div class="count-number">92</div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-2 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-list-1"></i></div>
              <div class="name"><strong class="text-uppercase">New Cases</strong><span>Last 7 days</span>
                <div class="count-number">70</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Header Section-->
    <hr>
    <!-- Statistics Section-->
    <section class="statistics">
      <div class="container-fluid">
        <div class="row d-flex">
          <div class="col-lg-6">
            <!-- Income-->
            <div class="card income text-center">
              <div class="icon"><i class="icon-line-chart"></i></div>
              <div class="number"><?php echo total_price_sum(); ?></div><strong class="text-primary">All Income</strong>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- User Actibity-->
            <div class="card user-activity">
              <h2 class="display h4">User Activity</h2>
              <div class="number">210</div>
              <h3 class="h4 display">Social Users</h3>
              <div class="progress">
                <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
              </div>
              <div class="page-statistics d-flex justify-content-between">
                <div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>
                <div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Updates Section -->

<!-- footer -->
<?php include 'footer.php'; ?>

<!-- footer -->

</body>

</html>
