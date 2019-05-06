<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?msg=Please Login First');
}
include 'functions.php';
include 'header.php';
?>
<body>

	
	<header>
		<?php include 'menu.php'; ?>
</header>
		<!-- <div class="back-logo">
		<h1>Vigorizante</h1>
	</div> -->
	<div class="paypal-section">
		<div class="container text-center">
		<div class="row justify-content-center">
			<section class="cart-section" id="targrtLink">
				<div class="container paypal-results">
					<?php
					$total = 0;

					global $con;

					$ip = getIp();

					$sel_price = "select * from cart where ip_add='$ip'";

					$run_price = mysqli_query($con, $sel_price);

					while ($p_price = mysqli_fetch_array($run_price)) {

						$pro_id = $p_price['p_id'];
						$qtyd = $p_price['qty'];


						$pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
						$run_pro_price = mysqli_query($con, $pro_price);
						while ($pp_price = mysqli_fetch_array($run_pro_price)) {
							$product_price = array($pp_price['product_price']);
							$single_price = $pp_price['product_price'];
							$product_id = $pp_price['product_id'];
							$product_title = $pp_price['product_title'];
							$total_qty_price = $single_price * $qtyd;
							$values = array_sum($product_price);
							$mega_total = $values * $qtyd;
							$total += $mega_total;


						}


					}

					// getting Quantity of the product
					$get_qty = "select * from cart where p_id='$pro_id'";

					$run_qty = mysqli_query($con, $get_qty);

					$row_qty = mysqli_fetch_array($run_qty);

					$qty = $row_qty['qty'];
					$single_price *= $qty;


					// this is about the customer
					$user = $_SESSION['customer_email'];

					$get_c = "select * from customers where customer_email='$user'";

					$run_c = mysqli_query($con, $get_c);

					$row_c = mysqli_fetch_array($run_c);

					$c_id = $row_c['customer_id'];
					$c_email = $row_c['customer_email'];
					$c_name = $row_c['customer_name'];


					//payment details from paypal


					$amount = $_GET['amt'];

					$currency = $_GET['cc'];

					$trx_id = $_GET['tx'];

					// $invoice = mt_rand();

					$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					. 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
					. '0123456789'); // and any other characters
					shuffle($seed); // probably optional since array_is randomized; this may be redundant
					$invoice = '';
					foreach (array_rand($seed, 8) as $k) $invoice .= $seed[$k];

					if ($trx_id) {

						$cart_items= "select * from cart where c_id='$c_id'";
						$run_cart_items = mysqli_query($con, $cart_items);
						while ($cart_items_item = mysqli_fetch_array($run_cart_items)) {
							$xpro_id = $cart_items_item['p_id'];
							$xcustomer_id = $cart_items_item['c_id'];
							$xqty = $cart_items_item['qty'];
							$xprice = $cart_items_item['cart_price'];

							// inserting the order into table
							$insert_order = "insert into orders (p_id, c_id, qty, single_order_price, invoice_no, order_date,status) values ('$xpro_id','$xcustomer_id','$xqty','$xprice','$invoice',NOW(),'in Progress')";

							$run_order = mysqli_query($con, $insert_order);

							//inserting the payment to table



							$insert_payment = "insert into payments (invoice_id,amount,single_payment_price,customer_id,product_id,trx_id,currency,payment_date) values ('$invoice','$amount','$xprice','$xcustomer_id','$xpro_id','$trx_id','$currency',NOW())";

							$run_payment = mysqli_query($con, $insert_payment);


						}


						// insert multiple orders into database
						$insert_multiple_orders = "insert into orders_main (p_id, c_id, customer_name, product_name, qty, order_date) values ('$pro_id','$c_id','$c_name','$product_title','$qty', NOW())";

						$run_main_order = mysqli_query($con, $insert_multiple_orders);

						// create notifcations


						//removing the products from cart
						$empty_cart = "DELETE FROM cart WHERE c_id = $c_id";
						$run_cart = mysqli_query($con, $empty_cart);

					}

					if ($trx_id) {

						?>

						<div class="paypal-notification">
							<div class="success-img">
								<img src="assets/img/paypal_success_icon.png" alt="">
								<h3>Thank You...!</h3>
							</div>
							<h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
							<p>Your Payment was successful, Please go to your account to see your order
								history.</p>
								<a href="profile.php" class="btn-paypal">Go to your account</a>
							</div>
						<?php } else {
							?>

							<div class="paypal-notification">
								<div class="success-img">
									<img src="assets/img/paypal_canel_icon.png" alt="">
									<h3>Payment was failed</h3>

								</div>
								<h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
								<p>Your Payment was not successful, Please go to our shop and try again..</p>
								<a href="products.php" class="primary-btn">Go to Shop</a>
							</div>

						<?php } ?>
					</div>
				</section>

			</div>
			</div>
			</div>

			<?php
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <admin@excaliburgold.de>' . "\r\n";

			$subject = "Order Details";

			$message = "
			<html>
			<p>

			Hello dear <b style='color:blue;'>$c_name</b> you have ordered some products on our website vigorizante.com, please find your order details, your order will be processed shortly. Thank you!</p>

			<table width='600' align='center' bgcolor='#FFCC99' border='2'>

			<tr align='center'><td colspan='6'><h2>Your Order Details from Vigorizante</h2></td></tr>

			<tr align='center'>
			<th><b>S.N</b></th>
			<th><b>Product Name</b></th>
			<th><b>Quantity</b></th>
			<th><b>Paid Amount</th></th>
			<th>Invoice No</th>
			</tr>

			<tr align='center'>
			<td>1</td>
			<td>$product_title</td>
			<td>$qty</td>
			<td>$amount</td>
			<td>$invoice</td>
			</tr>

			</table>

			<h3>Please go to your account and see your order details!</h3>

			<h2> <a href='http://zeemaar.com/vigorizante'>Click here</a> to login to your account</h2>

			<h3> Thank you for your order @ - Vigorizante</h3>

			</html>

			";

			mail($c_email,$subject,$message,$headers);


			?>

			<?php include 'footer.php'; ?>


			<?php include 'scripts.php'; ?>
		</body>
		</html>
