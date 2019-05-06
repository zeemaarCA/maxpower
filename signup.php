<?php
session_start();
include 'functions.php';
if(isset($_POST['register'])){

  $ip = getIp();

  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];


  $hashed_password = password_hash($c_pass, PASSWORD_DEFAULT);



  $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address) values ('$ip','$c_name','$c_email','$hashed_password','$c_country','$c_city','$c_contact','$c_address')";

  $run_c = mysqli_query($con, $insert_c);
  $_SESSION['customer_id']=$c_id;
  $_SESSION['customer_name']=$c_name;
  $_SESSION['customer_email']=$c_email;
  $_SESSION['customer_address']=$c_address;
  $sel_cart = "select * from cart where ip_add='$ip'";

  $run_cart = mysqli_query($con, $sel_cart);

  $check_cart = mysqli_num_rows($run_cart);

  if($check_cart==0){

    echo "<script>alert('Account has been created successfully, Thanks!')</script>";
    echo "<script>window.open('profile.php','_self')</script>";

  }
  else {

    echo "<script>alert('Account has been created successfully, Thanks!')</script>";

    echo "<script>window.open('profile.php','_self')</script>";


  }
}

?>
