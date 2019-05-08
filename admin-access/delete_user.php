<!-- delete user from database -->
<?php
include '../includes/conn.php';
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $delete_product = "DELETE FROM customers WHERE customer_id = '$del_id'";
  $run_delete = mysqli_query($con, $delete_product);
  if ($run_delete) {
    echo "<script>window.open('customers.php', '_self')</script>";
  }
}

?>