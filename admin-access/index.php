<?php
session_start();
  include 'head.php';

?>
<!DOCTYPE html>
<html>

  <body>
    <div class="page login-page">
      <p class="bg-success text-white p-2 d-none custom-toast <?php if(@$_GET['msg']){echo 'd-block';};?>"><?php if(@$_GET['msg']){echo "Logged Out";}; ?></p>
      <p class="bg-danger text-white p-2 d-none custom-toast <?php if(@$_GET['err']){echo 'd-block';};?>"><i class="fa fa-exclamation-circle"></i> <?php if(@$_GET['err']){echo "Email or Password are incorrect!";}; ?></p>
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>ZMT</span><strong class="text-primary">Login</strong></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            <form method="post" action="backend/login.php" class="text-left form-validate" id="admin_login">
              <div class="form-group-material">
                <input id="login-username" type="text" name="email" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
							<div class="form-group text-center"><button type="submit" id="login" name="login" class="btn btn-primary">Login</button>
              </div>
            </form><a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>
          </div>

        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
  </body>
</html>
