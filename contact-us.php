<?php
session_start();
include 'functions.php';
include 'header.php';
?>

  <header>
 <?php include 'menu.php'; ?>
  </header>
<!-- TODO: use email API -->
  <section class="cart-section h-100" id="targrtLink">
    <div class="contact-title">
      <h1>Contact Us</h1>
    </div>
    <div class="contact-wrapper container">
      <div class="row">
        <div class="col-lg-6 mx-auto contact-form">
          <form action="" class="signup-sec">
            <div class="row">
              <div class="form-field col-6">
                <input type="text" name="name" value="" placeholder="Your Name...">
              </div>
              <div class="form-field col-6">
                <input type="email" name="email" value="" placeholder="Your Email">
              </div>
              <div class="form-field col-12">
                <input type="text" name="subject" value="" placeholder="Subject">
              </div>
            </div>
            <div class="row">
              <div class="form-field col-12">
                <textarea name="msg" rows="6" cols="80" placeholder="Your Message"></textarea>
              </div>
            </div>
            <button type="submit">Send</button>
          </form>
        </div>
        <div class="col-lg-6">
            <div id="map"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->

  <!-- footer -->
  <?php include 'footer.php'; ?>
  <!-- footer -->
  <?php include 'scripts.php'; ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdc9BzbbBEerUMDGWVxwDcHJ87dMb02Rw&callback=initMap"
    async defer></script>
</body>
</html>
