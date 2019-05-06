<?php
session_start();
include 'functions.php';
include 'header.php';
?>
<body>
  <div class="main-logo">
  </div>
  <header id="header">
    <?php
    include 'menu.php';
    ?>
    <div class="container header-content">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="header-product-img">
            <img src="assets/img/max-caps.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="header-text">
            <h1>the best selling <br> 100% natural <br> sex supplement</h1>
          </div>
          <div class="header-btn">
            <a href="#">read more</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- sample product section -->
  <section class="sample-product" id="samp-pro">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class=title-heading>
            <h1>max power +</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo dolore cum similique, quis unde aspernatur
              eum commodi repellendus fugit soluta in deserunt asperiores, recusandae fugiat voluptatem accusamus
              officiis quia inventore!</p>
            <a href="#" class="btn-max">read more</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="product-img">
            <img src="assets/img/max-caps.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- sample product section -->
  <!-- promo-section -->
  <div class="promo-section" id="promo-sec">
    <div class="container">
      <div class="row">
        <div class="title-heading">
          <h1>free promo pack</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea quidem molestias veritatis eum minima culpa
            perspiciatis autem quas blanditiis voluptatum quae, alias adipisci. Eveniet, totam modi quasi doloremque
            debitis illum odit, nobis repellat labore dignissimos expedita ducimus, iste nisi est. totam modi quasi
            doloremque debitis illum odit, nobis repellat labore dignissimos expedita ducimus</p>
        </div>
      </div>
      <div class="row promo-product">
        <div class="col-lg-6">
          <img src="assets/img/max-caps.png" alt="">
          <div class="promo-btn">
            <a href="#" class="btn-max">free trial</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- promo-section -->
  <!-- toast -->
  <div class="container-toast">
    <div class="rectangle">
      <div class="notification-text">
        <i class="fas fa-exclamation-circle"></i>
        <span>&nbsp;&nbsp;Please Login First to add item.&nbsp;&nbsp;</span><i class="fas fa-times" id="close-trigger"></i>
      </div>
    </div>
  </div>
  <!-- toast -->
  <!-- best-sellers -->
  <div class="best-sellers" id="best-sell">
    <div class="container">
      <div class="product-title">
        <h1>best sellers</h1>
      </div>
      <div class="row">
        <?php
        $get_pro = "SELECT * FROM products";
        $run_pro = mysqli_query($con, $get_pro);
        while ($row_pro = mysqli_fetch_array($run_pro)) {
          $pro_id = $row_pro['product_id'];
          $pro_cat = $row_pro['product_cat'];
          $pro_title = $row_pro['product_title'];
          $pro_price = $row_pro['product_price'];
          $pro_desc = $row_pro['product_desc'];
          $pro_image = $row_pro['product_image'];
          cart();
          if (!isset($_SESSION['customer_name'])) {
            ?>
            <div class="col-lg-4">
              <div class="product-box">
                <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                <div class="product-box-content">
                  <h4><?php echo $pro_title; ?></h4>
                  <div class="addtocart-btn">
                    <a href="javascript:void(0)" class="trigger-toast">add to cart</a>
                  </div>
                  <h4>&euro;<?php echo $pro_price; ?></h4>
                </div>
              </div>
            </div>
          <?php
        } else {
          ?>
            <div class="col-lg-4">
              <div class="product-box">
                <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                <div class="product-box-content">
                  <h4><?php echo $pro_title; ?></h4>
                  <div class="addtocart-btn">
                    <a href="index.php?add_cart=<?php echo $pro_id; ?>">add to cart</a>
                  </div>
                  <h4>&euro&euro;<?php echo $pro_price; ?></h4>
                </div>
              </div>
            </div>
          <?php
        }
      } ?>
      </div>
    </div>
  </div>
  <!-- best-sellers -->
  <!-- certificate -->
  <div class="certificates" id="certi">
    <div class="container">
      <div class="certificate-title">
        <h1>accreditation</h1>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-4">
          <img src="assets/img/sanidad.jpg" alt="">
        </div>
        <div class="col-lg-4">
          <img src="assets/img/logo-aecosan.jpg" alt="">
        </div>
        <div class="col-lg-4">
          <img src="assets/img/efsa.jpg" alt="">
        </div>
      </div>
      <div class="certificate-text">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempora molestiae, animi aperiam sit hic
          impedit nam ad suscipit, unde nisi dignissimos deleniti neque, illo, rem necessitatibus aliquam. Pariatur,
          doloremque quis illo numquam animi aliquam nesciunt distinctio natus reiciendis dolores. Pariatur, doloremque
          quis illo numquam animi aliquam nesciunt distinctio natus reiciendis dolores.</p>
      </div>
    </div>
  </div>
  <!-- certificate -->
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <!-- footer -->
  <?php
  include 'modals.php';
  include 'scripts.php';
  ?>
</body>
</html>