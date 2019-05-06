<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include '../includes/conn.php';
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
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
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item">
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                        <div class="notification-time"><small>4 minutes ago</small></div>
                      </div>
                    </a>
                  </li>
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
                    <!-- Messages dropdown-->
                    <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                      <ul aria-labelledby="notifications" class="dropdown-menu">
                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                          <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                          <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                            <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                            <div class="msg-body">
                              <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                            </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                              <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                              <div class="msg-body">
                                <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                              </div></a></li>
                              <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
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
                      <li class="breadcrumb-item active">Add New Product</li>
                    </ul>
                  </div>
                </div>
                <section class="forms">
                  <div class="container-fluid">
                    <!-- Page Header-->
                    <br>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header d-flex align-items-center">
                            <h4>Add New Product</h4>
                          </div>
                          <div class="card-body">
                            <p>Fill all the fields.</p>
                            <form action="insert_product.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Product Title</label>
                                <input type="text" placeholder="Product Name" name="product_title" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Product Category</label>
                                <select class="form-control" name="product_cat">
                                  <option value="">Select a Category</option>
                                  <?php
                                  $get_cats = "SELECT * FROM categories";
                                  $run_cats = mysqli_query($con, $get_cats);

                                  while ($row_cats = mysqli_fetch_array($run_cats)) {
                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_title'];
                                    echo "<option value='$cat_title'>$cat_title</option>";

                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" placeholder="Image" name="product_image" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" placeholder="Product Price" name="product_price" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="product_desc" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                <input type="submit" name="insert_post" value="Insert Product" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="card">
                          <div class="card-header d-flex align-items-center">
                            <h4>Modal Form</h4>
                          </div>
                          <div class="card-body text-center">
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Form in simple modal </button>
                            <!-- Modal-->
                            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                              <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title">Signin Modal</h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <form>
                                      <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email Address" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <input type="submit" value="Signin" class="btn btn-primary">
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <?php include 'footer.php'; ?>
                </html>
