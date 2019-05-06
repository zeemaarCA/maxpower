<?php
session_start();
include 'functions.php';
include 'header.php';
?>

<body>

  <header>
    <?php include 'menu.php'; ?>
  </header>
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
  <div class="products-section-wrapper" id="targrtLink">
    <div class="container product-area">
      <div class="products-title">
        <h1>All Products</h1>
      </div>
      <div class="container product-tabs">
        <div class="row justify-content-center">
          <div class="cat-btns w-100 text-center">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item col">
                <a class="nav-link active" data-toggle="tab" href="#p1">Sachets</a>
              </li>
              <li class="nav-item col">
                <a class="nav-link" data-toggle="tab" href="#p2">Capsules</a>
              </li>
              <li class="nav-item col">
                <a class="nav-link" data-toggle="tab" href="#p3">Bottles</a>
              </li>
              <li class="nav-item col">
                <a class="nav-link" data-toggle="tab" href="#p4">Candies</a>
              </li>
              <li class="nav-item col">
                <a class="nav-link" data-toggle="tab" href="#p5">Combo's</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php

      if (isset($_GET['add_cart'])) {
        cart();
      }

      ?>
      <div class="container tab-content products-box">
        <!-- sachets -->
        <div class="tab-pane active" id="p1">
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

              if (!isset($_SESSION['customer_name'])) {
                ?>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                  </div>
                  <div class="product-name">
                    <h5><?php echo $pro_title; ?></h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;<?php echo $pro_price; ?></button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="javascript:void()" class="trigger-toast">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
                            <?php
              }
              else {

                ?>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                  </div>
                  <div class="product-name">
                    <h5><?php echo $pro_title; ?></h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;<?php echo $pro_price; ?></button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="products.php?add_cart=<?php echo $pro_id; ?>">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
        <!-- capsules -->
        <div class="tab-pane" id="p2">
          <div class="row">
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/max-caps.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>capsules</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/max-caps.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>capsules</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/max-caps.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>capsules</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- bottle -->
        <div class="tab-pane" id="p3">
          <div class="row">
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/vigo-bottle.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>bottles</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/vigo-bottle.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>bottles</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/vigo-bottle.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>bottles</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- candy -->
        <div class="tab-pane" id="p4">
          <div class="row">
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/vigo-candy.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>candies</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/vigo-candy.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>candies</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/vigo-candy.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>candies</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- combo -->
        <div class="tab-pane" id="p5">
          <div class="row">
            <!--combo sachet -->
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/sachets/Vigorizante_5sachets.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>5 Sachets</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/sachets/Vigorizante_10sachets.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>10 Sachets</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/sachets/Vigorizante_20sachets.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>20 Sachets</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/sachets/Vigorizante_30+5sachets.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>30 Sachets + 5 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/sachets/Vigorizante_40+10sachets.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>40 Sachets + 10 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/sachets/Vigorizante_60+20_sachets.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>60 Sachets + 20 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- combo-caps -->
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/capsules/VIGORIZANTE_CAPS_2.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>2 Capsules</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/capsules/Vigorizante_10caps.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>10 Capsules</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/capsules/vigorizante_20caps.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>20 Capsules</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/capsules/VIGORIZANTE_CAPS_30+5BONUS.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>30 caps + 5 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/capsules/VIGORIZANTE_CAPS_40+10BONUS.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>40 caps + 10 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/capsules/VIGORIZANTE_CAPS_60+20BONUS.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>60 caps + 20 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- combo bottles -->
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/bottles/Vigorizante_bottle_60+20capsule.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>60 caps + 20 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/bottles/Vigorizante_bottle_120+60capsule.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>120 caps + 60 bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- combo dual -->
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/dual/vigorizante_10+10combos.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>10 caps + 10 sachets</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/dual/vigorizante_20+20combo.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>20 caps + 20 sachets</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/dual/vigorizante_30+10combo.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>30 caps & 10 Bonus + 30 sachets & 10 Bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/dual/Vigorizante_combo_40+20.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>40 caps & 20 Bonus + 40 sachets & 20 Bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product-bg">
                <div class="product-box">
                  <div class="product-img">
                    <img src="assets/img/combo/dual/Vigorizante_60+30caps.png" alt="">
                  </div>
                  <div class="product-name">
                    <h5>60 caps & 30 Bonus + 60 sachets & 30 Bonus</h5>
                  </div>
                  <div class="price-wishlist row">
                    <div class="col">
                      <button class="product-price">&euro;14.99</button>
                    </div>
                    <div class="col">
                      <button class="wishlist"><i class="fas fa-heart"></i></button>
                    </div>
                  </div>
                  <div class="addtocart-btn">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- footer -->
    <?php include 'scripts.php'; ?>
</body>

</html>