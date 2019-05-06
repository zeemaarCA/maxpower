<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?loginmsg=Please Login First to add items in cart');
  echo "<script>window.open('index.php?loginmsg=Please Login First to add items in cart','_self')</script>";
}
include 'functions.php';
include 'header.php';
?>
<?php
$total = 0;
global $con;
$ip = getIp();
$sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
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
  }
}
?>
<header>
  <?php include 'menu.php'; ?>
</header>


<section class="cart-section" id="targrtLink">
  <div class="container">
    <div class="cart-title">
      <h1>Confirmation</h1>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table cart-table mb-0">
          <thead>
            <tr>
              <th scope="col" width="35%">Product</th>
              <th scope="col">Price</th>
              <th scope="col" width="29%">Quantity</th>
              <th scope="col">total</th>
            </tr>
          </thead>
          <?php
          $total = 0;
          global $con;
          $ip = getIp();
          $sel_price = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "' ";
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
                    <form class="form">
                      <div class="form-group">
                        <div class="input-group">
                          <?php echo $qtyd ?>
                          <?php
                          if (isset($_POST['update_cart'])) {
                            if (isset($_POST['qty'])) {
                              $qty = $_POST['qty'];
                              $pro_id_cart_qty = $_POST['pro_id_cart_qty'];
                              $array = array_combine($qty, $pro_id_cart_qty);
                              foreach ($array as $q => $i) {
                                $update_qty = "UPDATE cart SET qty = '$q' WHERE p_id = '$i'";
                                $run_qty = mysqli_query($con, $update_qty);
                                // header("location: cart.php?mes=Update cart sucessfully");
                                echo ("<script>location.href = 'cart.php?mes=Update cart sucessfully'</script>");
                              }
                              $total = $total * $qtyd;
                            }
                          }
                          ?>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td>&euro;<?php echo $total_qty_price; ?></td>
                </tr>
              <?php }
          } ?>
          </tbody>
        </table>
      </div>
    </div>
    <br><br>
    <div class="content-box">
      <div class="box-title">
        <h3>cart total</h3>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h4>cart subtotal</h4>
          <h4>Delivery</h4>
          <h4>order total</h4>
        </div>
        <div class="col-lg-6 text-right">
          <h4>&euro;<?php echo $total; ?></h4>
          <h4>&euro;0</h4>
          <h4>&euro;<?php echo $total; ?></h4>
        </div>
      </div>
    </div>
    <div class="content-box">
      <div class="box-title">
        <h3>shipping billing address</h3>
        <a href="#">edit</a>
      </div>
      <div class="row">
        <p>current shopping address</p>
        <ul>
          <?php
              $get_customer = "SELECT * FROM customers WHERE customer_email = '".$_SESSION['customer_email']."'";
              $run_customer = mysqli_query($con, $get_customer);

              while ($row_customer = mysqli_fetch_array($run_customer)) {
                $customer_id = $row_customer['customer_id'];
                $customer_name = $row_customer['customer_name'];
                $customer_email = $row_customer['customer_email'];
                $customer_country = $row_customer['customer_country'];
                $customer_city = $row_customer['customer_city'];
                $customer_contact = $row_customer['customer_contact'];
                $customer_address = $row_customer['customer_address'];
                ?>
          <li><?php echo $customer_name; ?></li>
          <li><?php echo $customer_email; ?></li>
          <li><?php echo $customer_city; ?></li>
          <li><?php echo $customer_country; ?></li>
          <li><?php echo $customer_contact; ?></li>
          <li><?php echo $customer_address; ?></li>
           <?php } ?>
        </ul>
      </div>
    </div>
    <div class="content-box">
      <div class="box-title">
        <h3>payment method</h3>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-4">
          <img src="assets/img/checkoutb1.png" alt="">
        </div>
        <div class="col-lg-8">
          <p class="mb-0">PayPal</p>
        </div>
      </div>
    </div>
    <div class="bottom-btn">
      <div class="row">
        <div class="col-lg-6 col-6">
          <a href="#" class="float-left">back</a>
        </div>
        <div class="col-lg-6 col-6">
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="zmt@gmail.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Power Max + Products">
            <input type="hidden" name="item_number" value="<?php echo $pro_id ?>">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">

            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value="http://excaliburgold.de/max-power/paypal_success.php">
            <input type="hidden" name="cancel_return" value="http://excaliburgold.de/max-power/paypal_cancel.php">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="0">

            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png"
              alt="Buy now with PayPal" border="0" name="submit">

          </form>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- footer -->
<?php include 'scripts.php'; ?>
</body>

</html>