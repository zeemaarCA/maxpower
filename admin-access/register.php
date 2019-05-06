<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>ZMT</span><strong class="text-primary">Register</strong></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            <form class="text-left form-validate">
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerUsername" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="register-email" type="email" name="registerEmail" required data-msg="Please enter a valid email address" class="input-material">
                <label for="register-email" class="label-material">Email Address      </label>
              </div>
              <div class="form-group-material">
                <input id="register-password" type="password" name="registerPassword" required data-msg="Please enter your password" class="input-material">
                <label for="register-password" class="label-material">Password        </label>
              </div>
              <div class="form-group text-center">
                <input id="register" type="submit" value="Register" class="btn btn-primary">
              </div>
            </form><small>Already have an account? </small><a href="index.php" class="signup">Login</a>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
<?php include 'footer.php'; ?>
  </body>
</html>
