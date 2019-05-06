<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include '../functions.php';
if (isset($_GET['confirm_order'])) {
  $get_order_id = $_GET['confirm_order'];
  $order_status = 'Completed';
  $update_order_status = "UPDATE orders SET status = '$order_status' WHERE order_id = '$get_order_id'";
  $run_update_order_status = mysqli_query($con,$update_order_status);
  if ($run_update_order_status) {
    echo "<script>swal('Order was updated!')</script>";
    header('Location:orders.php');
  }
}

?>
