<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <base href="" />
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Max Power + Checkout</title>
  <link rel="shortcut icon" type="image/png" href="favicon.ico" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/custom/style.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/slick-theme.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>

  <header>
    <div class="button_container" id="toggle">
      <span class="top"></span>
      <span class="middle"></span>
      <span class="bottom"></span>
    </div>

    <div class="overlay" id="overlay">
      <nav class="overlay-menu">
        <ul>
          <li><a href="home.html">home</a></li>
          <li><a href="products.html">products</a></li>
          <li><a href="contact-us.html">contact us</a></li>
          <li><a href="about-us.html">about us</a></li>
          <li><a href="faq.html">FAQ's</a></li>
          <li><a href="terms.html">terms and conditions</a></li>
          <li><a href="privacy.html">privacy policy</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="cart-section" id="targrtLink">
    <div class="container">
      <div class="cart-title">
        <h1>Checkout</h1>
      </div>
      <div class="container cart-popup position-relative confirmation cart">
        <div class="content-box">
          <div class="box-title">
            <h3>WHERE SHOULD WE DELIVER YOUR ORDER?</h3>
          </div>
          <div class="contact-form">
            <form action="#">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="text" id="name" placeholder="FIRST AND LAST NAME" required="true">
                  </div>
                  <div class="form-group">
                    <input type="email" id="eemail" placeholder="Email" required="true">
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="">
                      <option value="0">United Arab Emirates</option>
                      <option value="1">England</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="number" id="number" placeholder="MOBILE NUMBER" required="true">
                  </div>
                  <div class="form-group">
                    <textarea placeholder="ADDRESS" class="w-100" required="true"></textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="number" id="number" placeholder="RESIDENCE NUMBER" required="true">
                  </div>
                  <div class="form-group">
                    <input type="number" id="code" placeholder="POST CODE" required="true">
                  </div>
                  <div class="form-group">
                    <input type="text" id="city" placeholder="LOCALITY/CITY" required="true">
                  </div>
                  <div class="form-group">
                    <input type="text" id="country" placeholder="COUNTRY" required="true">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="w-40">create address</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>



        <div class="content-box">
          <div class="box-title">
            <h3>WHERE SHOULD WE DELIVER YOUR ORDER?</h3>
          </div>
          <div class="address col-lg-12">
            <div class="row">
              <div class="col-lg-5">
                <p>current shopping address</p>
                <ul>
                  <li>KK</li>
                  <li>dubai 055415155</li>
                  <li>00000 - dubai</li>
                  <li>Albania</li>
                </ul>
                <a href="#" data-toggle="modal" data-target="#edit-shipping" data-dismiss="modal">Edit</a>
              </div>
              <div class="col-lg-7">
                <p>Please select the address where you want this order to be delivered</p>
                <select class="form-control border" name="addrs">
                  <option value="0">Kk   dubai, 0561458489  00000 - dubai Albania</option>
                  <option value="1">Ammar   dubai, 0561458489  00000 - dubai Albania</option>
                  <option value="2">Harif   dubai, 0561458489  00000 - dubai Albania</option>
                </select>
                <a href="#" data-toggle="modal" data-target="#add-shipping" data-dismiss="modal">add new address</a>
              </div>
            </div>
          </div>
        </div>

        <div class="content-box">
          <div class="box-title">
            <h3>shipping method</h3>
          </div>
          <div class="method col-lg-12">
            <div class="row align-items-center">
              <div class="col-lg-4">
                <div class="custom-control custom-radio">
                  <input type="radio" id="ups-radio" name="customRadio" class="custom-control-input" checked>
                  <label class="custom-control-label" for="ups-radio"><img src="assets/img/ups.png" alt=""></label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="ems-radio" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="ems-radio"><img src="assets/img/ems.png" alt=""></label>
                </div>
              </div>
              <div class="col-lg-8 sh-note">
                <div class="ups-text">
                  <h3>ups</h3>
                  <h3>international courier (1 to 3 days)</h3>
                </div>
                <br>
                <div class="ems-text">
                  <h3>ems</h3>
                  <h3>EMS Express Delivery(3 to 5 days)</h3>
                </div>
              </div>
            </div>
            <div class="row shipping-free align-items-center">
              <div class="col-lg-12">
                <h2>Shipping is Free for This Month</h2>
              </div>
            </div>
          </div>
        </div>


        <div class="content-box">
          <div class="box-title">
            <h3>Payments Method</h3>
          </div>
          <div class="method col-lg-12">
            <div class="row align-items-center">
              <div class="col-lg-4">
                <div class="custom-control custom-radio">
                  <input type="radio" id="paypal" name="customRadio3" class="custom-control-input" checked>
                  <label class="custom-control-label" for="paypal"><img src="assets/img/checkoutb1.png" alt=""></label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="visa" name="customRadio3" class="custom-control-input">
                  <label class="custom-control-label" for="visa"><img src="assets/img/checkoutb5.png" alt=""></label>
                </div>
              </div>
              <div class="col-lg-8 sh-note">
                <div class="ups-text">
                  <p>CREDIT CARD, VISA, MASTERCARD AND PAYPAL
                    AFTER PLACING THE ORDER YOU WILL BE REDIRECTED TO OUR PAYMENT PAGE.<br>
                    THE ORDER WILL BE DISPATCHED AFTER PAYMENT HAS BEEN MADE.</p>
                  </div>
                  <br>
                  <div class="ems-text">
                    <p>PRICES ARE DISPLAYED IN YOUR LOCAL CURRENCY, BUT PAYMENT IS CHARGED IN EUROS.<br>
                      PLEASE NOTE THAT SOME CREDIT CARD PROVIDERS MAY CHARGE CURRENCY CONVERSION FEES.</p>
                      <p class="theme-text">
                        PLEASE NOTE THAT SOME CREDIT CARD PROVIDERS MAY CHARGE CURRENCY CONVERSION FEES.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bottom-btn">
              <div class="row">
                <div class="col-lg-6 col-6">
                  <a href="#" class="float-left">back</a>
                </div>
                <div class="col-lg-6 col-6">
                  <button type="submit">next</button>
                </div>
              </div>
            </div>
          </div>


        </div>
      </section>

  <!-- edit shipping address -->
  <div class="modal fade bd-example-modal-lg" id="edit-shipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog all-modals-style modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container position-relative popup-inner">
            <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
            <div class="row align-items-center">
              <div class="popup-title">
                <h4>edit address</h4>
              </div>
              <div class="general-form">
                <form action="#">
                  <div class="form-group">
                    <input type="text" id="name" placeholder="FIRST AND LAST NAME" required="true">
                  </div>
                  <div class="form-group">
                    <input type="email" id="eemail" placeholder="Email" required="true">
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="">
                      <option value="0">United Arab Emirates</option>
                      <option value="1">England</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="number" id="number" placeholder="MOBILE NUMBER" required="true">
                  </div>
                  <div class="form-group">
                    <textarea placeholder="ADDRESS" required="true"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="number" id="number" placeholder="RESIDENCE NUMBER" required="true">
                  </div>
                  <div class="form-group">
                    <input type="number" id="code" placeholder="POST CODE" required="true">
                  </div>
                  <div class="form-group">
                    <input type="text" id="city" placeholder="LOCALITY/CITY" required="true">
                  </div>
                  <div class="form-group">
                    <input type="text" id="country" placeholder="COUNTRY" required="true">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="w-40">update address</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- add shipping address -->
  <div class="modal fade bd-example-modal-lg" id="add-shipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog all-modals-style modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container position-relative popup-inner">
            <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
            <div class="row align-items-center">
              <div class="popup-title">
                <h4>Add address</h4>
              </div>
            </div>
            <div class="general-form">
              <form action="#">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" placeholder="FIRST AND LAST NAME" required="true">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="eemail" placeholder="Email" required="true">
                </div>
                <div class="form-group">
                  <select class="form-control" name="">
                    <option value="0">United Arab Emirates</option>
                    <option value="1">England</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="number" placeholder="MOBILE NUMBER" required="true">
                </div>
                <div class="form-group">
                  <textarea class="form-control" placeholder="ADDRESS" required="true"></textarea>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="number" placeholder="RESIDENCE NUMBER" required="true">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="code" placeholder="POST CODE" required="true">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="city" placeholder="LOCALITY/CITY" required="true">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="country" placeholder="COUNTRY" required="true">
                </div>
                <div class="form-group">
                  <button type="submit" class="w-40">add address</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <!-- footer -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-links">
            <h4>contact us</h4>
            <ul>
              <li><a href="mailto:info@vigorizante.com">info@vigorizante.com</a></li>
              <li><a href="#">+9741 263 562</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-links">
            <h4>Explore</h4>
            <ul>
              <li><a href="about-us.html">about us</a></li>
              <li><a href="contact-us.html">contact us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-links">
            <h4>legal</h4>
            <ul>
              <li><a href="privacy.html">privacy policy</a></li>
              <li><a href="terms.html">terms and conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <i class="fab fa-facebook circle-icon"></i>
        <i class="fab fa-twitter circle-icon"></i>
        <i class="fab fa-instagram circle-icon"></i>
      </div>
      <div class="footer-logo">
        <img src="assets/img/main-logo.png" alt="">
      </div>
      <div class="copyright">
        <p>&copy; 2018 maxpower+. All Rights Reserved</p>
      </div>
    </div>
  </footer>
  <!-- footer -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/onScreen.js"></script>
  <script src="assets/js/my.js"></script>
  <script>
  new WOW().init();
  </script>
  </body>
  </html>
