<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?msg=Please Login First');
}
include 'functions.php';


if(isset($_POST['update_address'])){

  //getting the text data from the fields

  // $update_id = $pro_id;

  $customer_id = $_POST['customer_id'];
  $customer_country = $_POST['customer_country'];
  $customer_city = $_POST['customer_city'];
  $customer_contact = $_POST['customer_contact'];
  $customer_address = $_POST['customer_address'];


  $update_profile = "UPDATE customers SET customer_id='$customer_id', customer_country='$customer_country', customer_city='$customer_city', customer_contact='$customer_contact', customer_address='$customer_address' WHERE customer_id='".$_SESSION['customer_id']."'";

  $run_profile = mysqli_query($con, $update_profile);

  if($run_profile){

    echo "<script>alert('Address has been updated!')</script>";

    echo "<script>window.open('checkout.php', '_self')</script>";

  }
}
 ?>
