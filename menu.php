    <div class="login_signup-btn">
        <div class="inner-menu-div d-flex">
          <div class="user_info">
            <?php if (!isset($_SESSION['customer_name'])) {
        				 ?>
            <span><a href="javascript:void(0)" data-toggle="modal" data-target="#login">Login / </a></span><span><a
                href="javascript:void(0)" data-toggle="modal" data-target="#signup">Signup</a></span>
            <?php }
        			else {
        				?>
            <span><a href="profile.php"><?php echo $_SESSION['customer_name']; ?> / </a></span><span><a
                href="logout.php">Logout</a></span>
            <?php } ?>
          </div>
          <div class="cart-icon">
            <?php if (!isset($_SESSION['customer_name'])) {
        				echo "";
        			}
        				else {
        					?>
            <a href="cart.php"><i class="fas fa-cart-arrow-down"></i><span
                class="cart-qty"><?php echo total_cart_quantity(); ?></span></a>
            <?php
        				}
        				 ?>
        
          </div>
        </div>
    </div>
    <div class="button_container" id="toggle">
      <span class="top"></span>
      <span class="middle"></span>
      <span class="bottom"></span>
    </div>

    <div class="overlay" id="overlay">
      <nav class="overlay-menu">
        <ul>
          <li><a href="index.php">home</a></li>
          <li><a href="products.php">products</a></li>
          <li><a href="contact-us.php">contact us</a></li>
          <li><a href="about-us.php">about us</a></li>
          <li><a href="faq.php">FAQ's</a></li>
          <li><a href="terms.php">terms and conditions</a></li>
          <li><a href="privacy.php">privacy policy</a></li>
        </ul>
      </nav>
    </div>