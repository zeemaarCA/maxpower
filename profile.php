<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?loginmsg=Please Login First to add items in cart');
  echo "<script>window.open('index.php?loginmsg=Please Login First to add items in cart','_self')</script>";
}
include 'functions.php';
include 'header.php';
?>

<header>
  <?php include 'menu.php'; ?>
</header>

<section class="cart-section" id="targrtLink">
  <div class="container">
    <div class="cart-title">
      <h1>Your Account</h1>
    </div>
    <?php
    $get_customer = "SELECT * FROM customers WHERE customer_email = '" . $_SESSION['customer_email'] . "'";
    $run_customer = mysqli_query($con, $get_customer);

    while ($row_customer = mysqli_fetch_array($run_customer)) {
      $customer_id = $row_customer['customer_id'];
      $customer_name = $row_customer['customer_name'];
      $customer_email = $row_customer['customer_email'];
      $customer_pass = $row_customer['customer_pass'];
      $customer_country = $row_customer['customer_country'];
      $customer_city = $row_customer['customer_city'];
      $customer_contact = $row_customer['customer_contact'];
      $customer_address = $row_customer['customer_address'];
      ?>
      <div class="content-box">
        <div class="box-title">
          <h3>Customer Profile</h3>
        </div>
        <div class="form-deliver col-lg-12">
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">FIRST AND LAST NAME</label>
                <p class="profile-p"><?php echo $customer_name; ?></p>
              </div>
              <div class="form-group col-md-6">
                <label for="number">Email</label>
                <p class="profile-p"><?php echo $customer_email ?></p>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="street">Country</label>
                <p class="profile-p"><?php echo $customer_country ?></p>
              </div>
              <div class="form-group col-md-6">
                <label for="address">City</label>
                <p class="profile-p"><?php echo $customer_city ?></p>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="code">Contact Number</label>
                <p class="profile-p"><?php echo $customer_contact ?></p>
              </div>
              <div class="form-group col-md-6">
                <label for="city">Street Address</label>
                <p class="profile-p"><?php echo $customer_address ?></p>
              </div>
            </div>
            <div class="text-right mr-3">
              <a href="#" class="update-profile" data-toggle="modal" data-target="#updateprofile"><i
                  class="fas fa-pencil-alt"></i> update</a>
              <a href="#" data-toggle="modal" data-target="#changePass" class="update-profile"><i class="fa fa-cog"></i> change password</a>
            </div>
          </form>
        </div>
      </div>
<?php } ?>
      <div class="content-box">
        <div class="box-title">
          <h3>Order History</h3>
        </div>
        <div class="address col-lg-12">
          <div class="row">
            <table class="table cart-table">
              <thead>
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Product (S)</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Invoice No</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <?php
              $user = $_SESSION['customer_email'];

              $get_c = "select * from customers where customer_email='$user'";

              $run_c = mysqli_query($con, $get_c);

              $row_c = mysqli_fetch_array($run_c);

              $c_id = $row_c['customer_id'];
              $c_email = $row_c['customer_email'];
              $c_name = $row_c['customer_name'];




              $get_order = "SELECT * FROM orders WHERE c_id = '$c_id'";

              $run_order = mysqli_query($con, $get_order);

              $count_orders = mysqli_num_rows($run_order);

              $order_quantity = $count_orders;
              if ($order_quantity > 0) {
                $i = 0;

                while ($row_order=mysqli_fetch_array($run_order)){

                  $order_id = $row_order['order_id'];
                  $qty = $row_order['qty'];
                  $pro_id = $row_order['p_id'];
                  $invoice_no = $row_order['invoice_no'];
                  $order_date = $row_order['order_date'];
                  $status = $row_order['status'];
                  $i++;

                  $get_pro = "select * from products where product_id='$pro_id'";
                  $run_pro = mysqli_query($con, $get_pro);

                  $row_pro=mysqli_fetch_array($run_pro);

                  $pro_title = $row_pro['product_title'];

                  ?>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $i;?></th>
                  <td><?php echo $pro_title;?></td>
                  <td><?php echo $qty;?></td>
                  <td><?php echo $invoice_no;?></td>
                  <td><?php echo $order_date;?></td>
                  <td><?php echo $status;?></td>
                </tr>
              </tbody>
              <?php }
              }
              else {
                echo "Currently You have no order.";
              }
              ?>
            </table>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- footer -->

  <!-- footer -->
   <!-- update profile -->
   <div class="modal fade bd-example-modal-lg" id="updateprofile" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered all-modals-style" role="document">
       <div class="modal-content">
         <div class="modal-body">
           <div class="container popup-inner position-relative">
             <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
             <div class="row align-items-center">
               <div class="popup-title">
                 <h4>Update Profile</h4>
               </div>
               <div class="general-form">
                 <form action="update_profile.php" method="post" id="change_profile">
                   <div class="form-group">
                     <input type="text" name="customer_name" value="<?php echo $customer_name; ?>"
                       placeholder="Full Name...">
                   </div>
                   <div class="form-group">
                     <select class="" name="customer_country" title="Please select something!">
                       <option value="" selected>Select Your Country...</option>
                       <option value="Afghanistan">Afghanistan</option>
                       <option value="Albania">Albania</option>
                       <option value="Algeria">Algeria</option>
                       <option value="American Samoa">American Samoa</option>
                       <option value="Andorra">Andorra</option>
                       <option value="Angola">Angola</option>
                       <option value="Anguilla">Anguilla</option>
                       <option value="Antartica">Antarctica</option>
                       <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                       <option value="Argentina">Argentina</option>
                       <option value="Armenia">Armenia</option>
                       <option value="Aruba">Aruba</option>
                       <option value="Australia">Australia</option>
                       <option value="Austria">Austria</option>
                       <option value="Azerbaijan">Azerbaijan</option>
                       <option value="Bahamas">Bahamas</option>
                       <option value="Bahrain">Bahrain</option>
                       <option value="Bangladesh">Bangladesh</option>
                       <option value="Barbados">Barbados</option>
                       <option value="Belarus">Belarus</option>
                       <option value="Belgium">Belgium</option>
                       <option value="Belize">Belize</option>
                       <option value="Benin">Benin</option>
                       <option value="Bermuda">Bermuda</option>
                       <option value="Bhutan">Bhutan</option>
                       <option value="Bolivia">Bolivia</option>
                       <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                       <option value="Botswana">Botswana</option>
                       <option value="Bouvet Island">Bouvet Island</option>
                       <option value="Brazil">Brazil</option>
                       <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                       <option value="Brunei Darussalam">Brunei Darussalam</option>
                       <option value="Bulgaria">Bulgaria</option>
                       <option value="Burkina Faso">Burkina Faso</option>
                       <option value="Burundi">Burundi</option>
                       <option value="Cambodia">Cambodia</option>
                       <option value="Cameroon">Cameroon</option>
                       <option value="Canada">Canada</option>
                       <option value="Cape Verde">Cape Verde</option>
                       <option value="Cayman Islands">Cayman Islands</option>
                       <option value="Central African Republic">Central African Republic</option>
                       <option value="Chad">Chad</option>
                       <option value="Chile">Chile</option>
                       <option value="China">China</option>
                       <option value="Christmas Island">Christmas Island</option>
                       <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                       <option value="Colombia">Colombia</option>
                       <option value="Comoros">Comoros</option>
                       <option value="Congo">Congo</option>
                       <option value="Congo">Congo, the Democratic Republic of the</option>
                       <option value="Cook Islands">Cook Islands</option>
                       <option value="Costa Rica">Costa Rica</option>
                       <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                       <option value="Croatia">Croatia (Hrvatska)</option>
                       <option value="Cuba">Cuba</option>
                       <option value="Cyprus">Cyprus</option>
                       <option value="Czech Republic">Czech Republic</option>
                       <option value="Denmark">Denmark</option>
                       <option value="Djibouti">Djibouti</option>
                       <option value="Dominica">Dominica</option>
                       <option value="Dominican Republic">Dominican Republic</option>
                       <option value="East Timor">East Timor</option>
                       <option value="Ecuador">Ecuador</option>
                       <option value="Egypt">Egypt</option>
                       <option value="El Salvador">El Salvador</option>
                       <option value="Equatorial Guinea">Equatorial Guinea</option>
                       <option value="Eritrea">Eritrea</option>
                       <option value="Estonia">Estonia</option>
                       <option value="Ethiopia">Ethiopia</option>
                       <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                       <option value="Faroe Islands">Faroe Islands</option>
                       <option value="Fiji">Fiji</option>
                       <option value="Finland">Finland</option>
                       <option value="France">France</option>
                       <option value="France Metropolitan">France, Metropolitan</option>
                       <option value="French Guiana">French Guiana</option>
                       <option value="French Polynesia">French Polynesia</option>
                       <option value="French Southern Territories">French Southern Territories</option>
                       <option value="Gabon">Gabon</option>
                       <option value="Gambia">Gambia</option>
                       <option value="Georgia">Georgia</option>
                       <option value="Germany">Germany</option>
                       <option value="Ghana">Ghana</option>
                       <option value="Gibraltar">Gibraltar</option>
                       <option value="Greece">Greece</option>
                       <option value="Greenland">Greenland</option>
                       <option value="Grenada">Grenada</option>
                       <option value="Guadeloupe">Guadeloupe</option>
                       <option value="Guam">Guam</option>
                       <option value="Guatemala">Guatemala</option>
                       <option value="Guinea">Guinea</option>
                       <option value="Guinea-Bissau">Guinea-Bissau</option>
                       <option value="Guyana">Guyana</option>
                       <option value="Haiti">Haiti</option>
                       <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                       <option value="Holy See">Holy See (Vatican City State)</option>
                       <option value="Honduras">Honduras</option>
                       <option value="Hong Kong">Hong Kong</option>
                       <option value="Hungary">Hungary</option>
                       <option value="Iceland">Iceland</option>
                       <option value="India">India</option>
                       <option value="Indonesia">Indonesia</option>
                       <option value="Iran">Iran (Islamic Republic of)</option>
                       <option value="Iraq">Iraq</option>
                       <option value="Ireland">Ireland</option>
                       <option value="Israel">Israel</option>
                       <option value="Italy">Italy</option>
                       <option value="Jamaica">Jamaica</option>
                       <option value="Japan">Japan</option>
                       <option value="Jordan">Jordan</option>
                       <option value="Kazakhstan">Kazakhstan</option>
                       <option value="Kenya">Kenya</option>
                       <option value="Kiribati">Kiribati</option>
                       <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of
                       </option>
                       <option value="Korea">Korea, Republic of</option>
                       <option value="Kuwait">Kuwait</option>
                       <option value="Kyrgyzstan">Kyrgyzstan</option>
                       <option value="Lao">Lao People's Democratic Republic</option>
                       <option value="Latvia">Latvia</option>
                       <option value="Lebanon">Lebanon</option>
                       <option value="Lesotho">Lesotho</option>
                       <option value="Liberia">Liberia</option>
                       <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                       <option value="Liechtenstein">Liechtenstein</option>
                       <option value="Lithuania">Lithuania</option>
                       <option value="Luxembourg">Luxembourg</option>
                       <option value="Macau">Macau</option>
                       <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                       <option value="Madagascar">Madagascar</option>
                       <option value="Malawi">Malawi</option>
                       <option value="Malaysia">Malaysia</option>
                       <option value="Maldives">Maldives</option>
                       <option value="Mali">Mali</option>
                       <option value="Malta">Malta</option>
                       <option value="Marshall Islands">Marshall Islands</option>
                       <option value="Martinique">Martinique</option>
                       <option value="Mauritania">Mauritania</option>
                       <option value="Mauritius">Mauritius</option>
                       <option value="Mayotte">Mayotte</option>
                       <option value="Mexico">Mexico</option>
                       <option value="Micronesia">Micronesia, Federated States of</option>
                       <option value="Moldova">Moldova, Republic of</option>
                       <option value="Monaco">Monaco</option>
                       <option value="Mongolia">Mongolia</option>
                       <option value="Montserrat">Montserrat</option>
                       <option value="Morocco">Morocco</option>
                       <option value="Mozambique">Mozambique</option>
                       <option value="Myanmar">Myanmar</option>
                       <option value="Namibia">Namibia</option>
                       <option value="Nauru">Nauru</option>
                       <option value="Nepal">Nepal</option>
                       <option value="Netherlands">Netherlands</option>
                       <option value="Netherlands Antilles">Netherlands Antilles</option>
                       <option value="New Caledonia">New Caledonia</option>
                       <option value="New Zealand">New Zealand</option>
                       <option value="Nicaragua">Nicaragua</option>
                       <option value="Niger">Niger</option>
                       <option value="Nigeria">Nigeria</option>
                       <option value="Niue">Niue</option>
                       <option value="Norfolk Island">Norfolk Island</option>
                       <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                       <option value="Norway">Norway</option>
                       <option value="Oman">Oman</option>
                       <option value="Pakistan">Pakistan</option>
                       <option value="Palau">Palau</option>
                       <option value="Panama">Panama</option>
                       <option value="Papua New Guinea">Papua New Guinea</option>
                       <option value="Paraguay">Paraguay</option>
                       <option value="Peru">Peru</option>
                       <option value="Philippines">Philippines</option>
                       <option value="Pitcairn">Pitcairn</option>
                       <option value="Poland">Poland</option>
                       <option value="Portugal">Portugal</option>
                       <option value="Puerto Rico">Puerto Rico</option>
                       <option value="Qatar">Qatar</option>
                       <option value="Reunion">Reunion</option>
                       <option value="Romania">Romania</option>
                       <option value="Russia">Russian Federation</option>
                       <option value="Rwanda">Rwanda</option>
                       <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                       <option value="Saint LUCIA">Saint LUCIA</option>
                       <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                       <option value="Samoa">Samoa</option>
                       <option value="San Marino">San Marino</option>
                       <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                       <option value="Saudi Arabia">Saudi Arabia</option>
                       <option value="Senegal">Senegal</option>
                       <option value="Seychelles">Seychelles</option>
                       <option value="Sierra">Sierra Leone</option>
                       <option value="Singapore">Singapore</option>
                       <option value="Slovakia">Slovakia (Slovak Republic)</option>
                       <option value="Slovenia">Slovenia</option>
                       <option value="Solomon Islands">Solomon Islands</option>
                       <option value="Somalia">Somalia</option>
                       <option value="South Africa">South Africa</option>
                       <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                       <option value="Span">Spain</option>
                       <option value="SriLanka">Sri Lanka</option>
                       <option value="St. Helena">St. Helena</option>
                       <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                       <option value="Sudan">Sudan</option>
                       <option value="Suriname">Suriname</option>
                       <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                       <option value="Swaziland">Swaziland</option>
                       <option value="Sweden">Sweden</option>
                       <option value="Switzerland">Switzerland</option>
                       <option value="Syria">Syrian Arab Republic</option>
                       <option value="Taiwan">Taiwan, Province of China</option>
                       <option value="Tajikistan">Tajikistan</option>
                       <option value="Tanzania">Tanzania, United Republic of</option>
                       <option value="Thailand">Thailand</option>
                       <option value="Togo">Togo</option>
                       <option value="Tokelau">Tokelau</option>
                       <option value="Tonga">Tonga</option>
                       <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                       <option value="Tunisia">Tunisia</option>
                       <option value="Turkey">Turkey</option>
                       <option value="Turkmenistan">Turkmenistan</option>
                       <option value="Turks and Caicos">Turks and Caicos Islands</option>
                       <option value="Tuvalu">Tuvalu</option>
                       <option value="Uganda">Uganda</option>
                       <option value="Ukraine">Ukraine</option>
                       <option value="United Arab Emirates">United Arab Emirates</option>
                       <option value="United Kingdom">United Kingdom</option>
                       <option value="United States">United States</option>
                       <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                       </option>
                       <option value="Uruguay">Uruguay</option>
                       <option value="Uzbekistan">Uzbekistan</option>
                       <option value="Vanuatu">Vanuatu</option>
                       <option value="Venezuela">Venezuela</option>
                       <option value="Vietnam">Viet Nam</option>
                       <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                       <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                       <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                       <option value="Western Sahara">Western Sahara</option>
                       <option value="Yemen">Yemen</option>
                       <option value="Yugoslavia">Yugoslavia</option>
                       <option value="Zambia">Zambia</option>
                       <option value="Zimbabwe">Zimbabwe</option>
                     </select>
                   </div>
                   <div class="form-group">
                     <input type="text" name="customer_city" value="<?php echo $customer_city ?>" placeholder="City">
                   </div>
                   <div class="form-group">
                     <input type="number" name="customer_contact" value="<?php echo $customer_contact ?>"
                       placeholder="Mobile Number">
                   </div>
                   <div class="form-group">
                     <input type="text" name="customer_address" value="<?php echo $customer_address ?>"
                       placeholder="Your Address">
                   </div>
                   <input type="submit" name="update_profile" value="Update Profile" class="update-profile">
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

  <!-- change password -->
<div class="modal fade bd-example-modal-lg" id="changePass" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered all-modals-style" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container popup-inner position-relative">
          <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
          <div class="row align-items-center">
            <div class="popup-title">
              <h4>Change Password</h4>
            </div>
            <div class="general-form">
              <form action="change_password.php" method="post" id="change_password">
                <div class="form-group">
                  <input type="password" name="old_password" value="" placeholder="Old Password">
                </div>
                <div class="form-group">
                  <input type="password" name="new_password" value="" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" name="confirm_password" value="" placeholder="Confirm Password">
                </div>
                <input type="submit" name="update_password" value="Update Password" class="update-profile">
              </form>
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