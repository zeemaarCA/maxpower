<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include 'head.php';
include '../functions.php';
$pro_id = $_GET['edit'];

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
              <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">SuperFit Max</strong></div>
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
                  <li class="breadcrumb-item active">Edit Products</li>
                </ul>
              </div>
            </div>
            <section>
              <div class="container-fluid">
                <!-- Page Header-->
                <header>
                  <h1 class="h3 display">Edit Products</h1>
                </header>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h4>Edit Product</h4>
                      </div>
                      <?php
                      $get_pro = "SELECT * FROM products WHERE product_id = '$pro_id'";
                      $run_pro = mysqli_query($con, $get_pro);

                      while ($row_pro = mysqli_fetch_array($run_pro)) {
                        $pro_id = $row_pro['product_id'];
                        $pro_cat = $row_pro['product_cat'];
                        $pro_title = $row_pro['product_title'];
                        $pro_price = $row_pro['product_price'];
                        $pro_desc = $row_pro['product_desc'];
                        $pro_image = $row_pro['product_image'];
                        cart();

                        ?>
                        <div class="card-body">
                          <p>Fill all the fields.</p>
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Product Title</label>
                              <input type="text" placeholder="Product Name" name="product_title" value="<?php echo $pro_title; ?>" class="form-control">
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
                                  echo "<option value='$cat_id'>$cat_title</option>";

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
                              <input type="number" placeholder="Product Price" name="product_price" value="<?php echo $pro_price; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Product Description</label>
                              <textarea name="product_desc" class="form-control" value=""><?php echo $pro_desc; ?></textarea>
                            </div>
                            <div class="form-group">
                              <input type="submit" name="update_product" value="Update Product" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <?php
            if(isset($_POST['update_product'])){

              //getting the text data from the fields

              // $update_id = $pro_id;

              $product_title = $_POST['product_title'];
              $product_cat= $_POST['product_cat'];
              $product_price = $_POST['product_price'];
              $product_desc = $_POST['product_desc'];

              //getting the image from the field
              $product_image = $_FILES['product_image']['name'];
              $product_image_tmp = $_FILES['product_image']['tmp_name'];

              move_uploaded_file($product_image_tmp,"../includes/product_images/$product_image");

              $update_product = "UPDATE products SET product_cat='$product_cat', product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image' WHERE product_id='$pro_id'";

              $run_product = mysqli_query($con, $update_product);

              if($run_product){

                echo "<script>alert('Product has been updated!')</script>";

                echo "<script>window.open('tables.php', '_self')</script>";

              }
            }
             ?>
            <?php include 'footer.php'; ?>
          </body>
          </html>
