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
                    </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                        <div class="notification-time"><small>4 minutes ago</small></div>
                      </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                        <li><a rel="nofollow" href="#" class="dropdown-item">
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                            <div class="notification-time"><small>10 minutes ago</small></div>
                          </div></a></li>
                          <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
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
                  <li class="breadcrumb-item active">All Orders</li>
                </ul>
              </div>
            </div>
            <section>
              <div class="container-fluid">
                <!-- Page Header-->
                <header>
                  <h1 class="h3 display">Tables            </h1>
                </header>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>All Orders</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Customer Email</th>
                                <th>Product (S)</th>
                                <th>Quantity</th>
                                <th>Invoice No</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action <i class="fa fa-check"></i></th>
                              </tr>
                            </thead>
                            <?php


                            $get_c = "select * from customers";

                            $run_c = mysqli_query($con, $get_c);

                            $row_c = mysqli_fetch_array($run_c);

                            $c_id = $row_c['customer_id'];
                            $c_email = $row_c['customer_email'];
                            $c_name = $row_c['customer_name'];




                            $get_order = "SELECT * FROM orders WHERE c_id = '$c_id'";

                            $run_order = mysqli_query($con, $get_order);

                            $i = 0;

                            while ($row_order=mysqli_fetch_array($run_order)){

                              $order_id = $row_order['order_id'];
                              $qty = $row_order['qty'];
                              $pro_id = $row_order['p_id'];
                              $invoice_no = $row_order['invoice_no'];
                              $order_date = $row_order['order_date'];
                              $status = $row_order['status'];
                              $i++;

                              $get_pro = "select * from products where product_id='$pro_id'";
                              $run_pro = mysqli_query($con, $get_pro);

                              $row_pro=mysqli_fetch_array($run_pro);

                              $pro_title = $row_pro['product_title'];

                              ?>
                              <tbody>
                                <tr>
                                  <th scope="row"><?php echo $i;?></th>
                                  <th scope="row"><?php echo $c_email;?></th>
                                  <td><?php echo $pro_title;?></td>
                                  <td><?php echo $qty;?></td>
                                  <td><?php echo $invoice_no;?></td>
                                  <td><?php echo $order_date;?></td>
                                  <td><?php echo $status;?></td>
                                  <?php if ($status == 'Completed') {
                                    ?>
                                    <td>
                                      <i class="fa fa-check" style="color: #19c719;"></i>
                                      <?php
                                    }
                                    else {
                                      ?>
                                      <td><a style="color: orange;" href="confirm_order.php?confirm_order=<?php echo $order_id;?>"><i class="fa fa-check"></i> Complete Order</td>
                                        <?php
                                      }
                                      ?>
                                    </td>






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
