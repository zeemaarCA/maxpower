<!-- delete product from database -->
<?php
include '../includes/conn.php';
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $delete_product = "DELETE FROM products WHERE product_id = '$del_id'";
  $run_delete = mysqli_query($con, $delete_product);
  if ($run_delete) {
    echo "<script>window.open('tables.php', '_self')</script>";
  }
}

?>
