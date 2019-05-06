<?php
include '../includes/conn.php';
$pro_id = $_GET['edit'];
if(isset($_POST['update_product'])){

  //getting the text data from the fields

  $update_id = $pro_id;

  $product_title = $_POST['product_title'];
  $product_cat= $_POST['product_cat'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];

  //getting the image from the field
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp = $_FILES['product_image']['tmp_name'];

  move_uploaded_file($product_image_tmp,"../includes/product_images/$product_image");

  $update_product = "UPDATE products SET product_cat='$product_cat', product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image' WHERE product_id='$update_id'";

  $run_product = mysqli_query($con, $update_product);

  if($run_product){

    echo "<script>alert('Product has been updated!')</script>";

    // echo "<script>window.open('forms.php', '_self')</script>";

  }
}








?>
