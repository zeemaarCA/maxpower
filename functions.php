<?php
include 'includes/conn.php';
// get ip address of User
function getIp() {
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  return $ip;
}

function cart()
{
  if (isset($_GET['add_cart'])) {
    global $con;
    $ip = getIp();
    $pro_id = $_GET['add_cart'];

    $check_pro = "SELECT * FROM cart WHERE c_id='".$_SESSION['customer_id']."' AND p_id='$pro_id'";

    $run_check = mysqli_query($con, $check_pro);
    if (mysqli_num_rows($run_check) > 0) {
      echo "<script>alert('This product already added')</script>";

    }
    else{
    $get_price_for_cart = "SELECT product_price FROM products WHERE product_id='$pro_id'";
    $run_get_price_for_cart = mysqli_query($con, $get_price_for_cart);
    $cart_item_price_array = mysqli_fetch_array($run_get_price_for_cart);

    $cart_item_price = $cart_item_price_array['product_price'];


    $insert_pro = "INSERT INTO cart (c_id,p_id,cart_price,ip_add,qty) VALUES ('".$_SESSION['customer_id']."','$pro_id','$cart_item_price','$ip',1)";
    $run_pro = mysqli_query($con, $insert_pro);

    echo "<script>window.open('cart.php', '_self')</script>";
  }

}
}
//getting total items in cart

function total_items()
{
  if (isset($_GET['add_cart'])) {
    global $con;
    $ip = getIp();
    $get_items = "SELECT * FROM cart WHERE c_id = '".$_SESSION['customer_id']."'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  }
  else {
    global $con;
    $ip = getIp();
    $get_items = "SELECT * FROM cart WHERE c_id = '".$_SESSION['customer_id']."'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  }
  echo $count_items;
}


//getting total customers

function total_customers()
{
  global $con;
  $ip = getIp();
  $get_items = "SELECT * FROM customers";
  $run_items = mysqli_query($con, $get_items);
  $count_items = mysqli_num_rows($run_items);
  echo $count_items;
}


//getting total orders

function total_orders()
{
  global $con;
  $ip = getIp();
  $get_items = "SELECT * FROM orders";
  $run_items = mysqli_query($con, $get_items);
  $count_items = mysqli_num_rows($run_items);
  echo $count_items;
}


//getting total payments

function total_payments()
{
  global $con;
  $ip = getIp();
  $get_items = "SELECT * FROM payments";
  $run_items = mysqli_query($con, $get_items);
  $count_items = mysqli_num_rows($run_items);
  echo $count_items;
}

//getting total cart Quantity

function total_cart_quantity()
{
  global $con;
  $get_cart_quantity = "SELECT * FROM cart";
  $run_cart_quantity = mysqli_query($con, $get_cart_quantity);
  $count_cart_quantity = mysqli_num_rows($run_cart_quantity);
  echo $count_cart_quantity;
}


// get total cart Price sum
function total_price_sum(){
  global $con;
  $total_amount = "SELECT payment_id, SUM(amount) AS amount FROM payments";
  $run_total_amount = mysqli_query($con, $total_amount);
  while ($pp_price = mysqli_fetch_array($run_total_amount)) {
    $amount = array($pp_price['amount']);
    $values = array_sum($amount);
  }
  echo "&euro;". $values;
}


// get total cart Price
function total_price(){
  $total = 0;
  global $con;
  $ip = getIp();
  $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
  $run_price = mysqli_query($con, $sel_price);
  while ($p_price = mysqli_fetch_array($run_price)) {
    $pro_id = $p_price['p_id'];
    $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_pro_price = mysqli_query($con, $pro_price);
    while ($pp_price = mysqli_fetch_array($run_pro_price)) {
      $product_price = array($pp_price['product_price']);
      $single_price = $pp_price['product_price'];
      $values = array_sum($product_price);
      $total += $values;
    }
  }
  echo "&euro;". $total;
}


function getCats()
{
  global $con;
  $get_cats = "SELECT * FROM categories";
  $run_cats = mysqli_query($con, $get_cats);

  while ($row_cats = mysqli_fetch_array($run_cats)) {
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<li>$cat_title</li>";

  }
}

function getPro()
{
  global $con;

  $get_pro = "SELECT * FROM products";
  $run_pro = mysqli_query($con, $get_pro);

  while ($row_pro = mysqli_fetch_array($run_pro)) {
    $pro_id = $row_pro['product_id'];
    $pro_cat = $row_pro['product_cat'];
    $pro_title = $row_pro['product_title'];
    $pro_price = $row_pro['product_price'];
    $pro_desc = $row_pro['product_desc'];
    $pro_image = $row_pro['product_image'];

    echo "

    <div class='col-lg-4'>
    <div class='product-box'>
    <div class='product-img'>
    <img src='includes/product_images/$pro_image' alt=''>
    <a class='ui red right corner label'>
    <i class='far fa-heart' title='Add to Wishlist'></i>
    </a>
    </div>
    <div class='product-content'>
    <h3>$pro_title</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, accusamus.</p>
    <div class='ui tag labels'>
    <a class='ui label'>
    &euro;$pro_price
    </a>
    </div>
    </div>
    <div class='product-btn'>
    <button>add to cart <i class='fas fa-cart-plus'></i></button>
    </div>
    </div>
    </div>

    ";

  }
}





?>
