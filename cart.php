<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?loginmsg=Please Login First to add items in cart');
  echo "<script>window.open('index.php?loginmsg=Please Login First to add items in cart','_self')</script>";
}
include 'functions.php';
include 'header.php';

if (isset($_POST['update_cart'])) {
  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pro_id_cart_qty = $_POST['pro_id_cart_qty'];
    $array = array_combine($pro_id_cart_qty, $qty);
    foreach ($array as $i => $q) {
      $single_fetch_price = "SELECT product_price FROM products WHERE product_id = '$i'";
      $run_single_fetch_price = mysqli_query($con, $single_fetch_price);
      $product_pricex = mysqli_fetch_assoc($run_single_fetch_price);

      $final_total_price_db = $q * $product_pricex['product_price'];
      $update_qty = "UPDATE cart SET qty = '$q', cart_price = '$final_total_price_db' WHERE p_id = '$i' AND c_id = '" . $_SESSION['customer_id'] . "'";
      $run_qty = mysqli_query($con, $update_qty);
    }
    // header("location: cart.php?mes=Update cart sucessfully");
    echo ("<script>location.href = 'cart.php?mes=Update cart sucessfully'</script>");
    $total = $total * $qtyd;
  }
}
?>


<header>
  <?php include 'menu.php'; ?>
  <?php
  if (isset($_GET['add_cart'])) {
    cart();
  }
  ?>
</header>

<section class="cart-section" id="targrtLink">
  <div class="container">
    <p class="bg-success text-white p-2 d-none <?php if (@$_GET['mes']) {
                                                  echo 'd-block';
                                                }; ?>">
      <?php if (@$_GET['mes']) {
        echo "Cart has been successfully upadated";
      }; ?>
    </p>
    <div class="cart-title">
      <h1>Cart</h1>
    </div>
    <?php
    $get_items = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
    $cart_item_qty = $count_items;
    if ($cart_item_qty == 0) {

      ?>
      <div class="content-box">
        <div class="box-title">
          <h3>Shopping Cart</h3>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p>Your shopping cart is empty.</p>
          </div>
          <div class="col-lg-6 text-right">
            <a href="products.php">Add products to cart</a>
          </div>
        </div>
      </div>


    <?php } else {

    ?>
      <div class="row mx-0">
        <div class="table-responsive">
          <form class="w-100" action="" method="post" enctype="multipart/form-data">
            <table class="table cart-table mb-0">
              <thead>
                <tr>
                  <th scope="col" width="35%">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col" width="29%">Quantity</th>
                  <th scope="col">total</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <?php
              $total = 0;
              global $con;
              $ip = getIp();
              $sel_price = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
              $run_price = mysqli_query($con, $sel_price);
              while ($p_price = mysqli_fetch_array($run_price)) {
                $pro_id = $p_price['p_id'];
                $qtyd = $p_price['qty'];
                // echo $qtyd;
                $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
                $run_pro_price = mysqli_query($con, $pro_price);
                while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                  $product_price = array($pp_price['product_price']);
                  $single_price = $pp_price['product_price'];
                  $product_title = $pp_price['product_title'];
                  $product_image = $pp_price['product_image'];
                  $total_qty_price = $single_price * $qtyd;
                  $values = array_sum($product_price);
                  $mega_total = $values * $qtyd;
                  $total += $mega_total;

                  ?>
                  <tbody>
                    <tr>
                      <td>
                        <div class="item-img">
                          <img src="includes/product_images/<?php echo $product_image; ?>" alt="">
                          <p><?php echo $product_title; ?></p>
                        </div>
                      </td>
                      <td>&euro;<?php echo $single_price; ?></td>
                      <td>
                        <div class="form">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="hidden" name="pro_id_cart_qty[]" value="<?php echo $pro_id; ?>">
                              <div class="quantity-spinner">
                                <button type="button" class="minus btn-inc-dec">
                                  <span class="fa fa-minus"></span>
                                </button>
                                <input type="text" name="qty[]" value="<?php echo $qtyd ?>" class="prod_qty input-number">
                                <button type="button" class="plus btn-inc-dec">
                                  <span class="fa fa-plus"></span>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>&euro;<?php echo $total_qty_price; ?></td>
                      <td><a href="cart.php?del=<?php echo $pro_id; ?>" class="remove" onClick="return confirm('Delete This item?')" name="del_product"><i class="far fa-times-circle"></i>
                      </td>
                    </tr>
                  <?php }
              } ?>
              </tbody>
            </table>
        </div>
      </div>
      <div class="duo-btn">
        <div class="row">
          <div class="col-lg-6">
            <a href="products.php">back to store</a>
          </div>
          <div class="col-lg-6">
            <input type="submit" class="primary-btn float-right" name="update_cart" value="update cart">
          </div>
        </div>
      </div>
      </form>
      <div class="content-box">
        <div class="box-title">
          <h3>cart total</h3>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <h4>cart subtotal</h4>
            <h4>order total</h4>
          </div>
          <div class="col-lg-6 text-right">
            <h4>&euro;<?php echo $total; ?></h4>
            <h4>&euro;<?php echo $total; ?></h4>
          </div>
          <div class="col-lg-12">
            <a href="checkout.php">checkout</a>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</section>
<?php
$ip = getIp();
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $delete_product = "DELETE FROM cart WHERE p_id = '$del_id' AND ip_add = '$ip'";
  $run_delete = mysqli_query($con, $delete_product);
  if ($run_delete) {
    echo "<script>window.open('cart.php', '_self')</script>";
  }
}

?>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- footer -->
<?php include 'scripts.php'; ?>
</body>

</html>