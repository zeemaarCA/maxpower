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
    <?php include 'menu.php'; ?>=
  </header>

  <div class="paypal-section">
    <div class="container text-center">
      <div class="row justify-content-center">
        <section class="cart-section" id="targrtLink">
          <div class="container paypal-results">
            <div class="paypal-notification">
              <div class="success-img">
              <img src="assets/img/paypal_canel_icon.png" alt="">
              <h3>Payment was cancelled</h3>
              </div>
              <h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
              <p>Your Payment was not successful, Please go to our shop and try again.</p>
              <a href="products.php" class="primary-btn">Go to Shop</a>
            </div>
          </div>
          </section>

        </div>
      </div>
    </div>
<br><br>
    <?php include 'footer.php'; ?>


    <?php include 'scripts.php'; ?>
  </body>
  </html>
