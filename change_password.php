<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?msg=Please Login First');
}
include 'functions.php';


if(isset($_POST['update_password'])){

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$hashed_updated_password = password_hash($new_password, PASSWORD_DEFAULT);

$password_orignal = "SELECT customer_pass FROM customers WHERE customer_id='".$_SESSION['customer_id']."'";

$run_pass = mysqli_query($con, $password_orignal);
$row_pass=mysqli_fetch_array($run_pass);

$de_hash_pwd = password_verify($old_password, $row_pass['customer_pass']);

if ($de_hash_pwd != $old_password) {
  
      echo "<script>alert('You old password is wrong. Please try again!')</script>";
      echo "<script>window.open('profile.php', '_self')</script>";
}
elseif ($new_password != $confirm_password) {
  echo "<script>alert('Your Confirm password did not match the new password. Please try again!')</script>";
  echo "<script>window.open('profile.php', '_self')</script>";
}
else {
    $update_password = "UPDATE customers SET customer_pass='$hashed_updated_password'  WHERE customer_id='".$_SESSION['customer_id']."'";
  $run_password = mysqli_query($con, $update_password);

  if($run_password){

    echo "<script>alert('Password has been updated!')</script>";

    echo "<script>window.open('profile.php', '_self')</script>";

  }
}
}

  
?>
