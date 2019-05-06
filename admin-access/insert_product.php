<?php
include '../includes/conn.php';

if (isset($_POST['insert_post'])) {
  $product_title = $_POST['product_title'];
  $product_cat = $_POST['product_cat'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  // getting images
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp = $_FILES['product_image']['tmp_name'];

  move_uploaded_file($product_image_tmp,"../includes/product_images/$product_image");


  $insert_product = "INSERT INTO products (product_cat,product_title,product_price,product_desc,product_image) VALUES ('$product_cat','$product_title','$product_price','$product_desc','$product_image')";

  $insert_pro = mysqli_query($con, $insert_product);
  if ($insert_pro) {
    echo "<script>alert('Product has been added!')</script>";
    echo "<script>window.open('forms.php', '_self')</script>";
  }
}

 ?>
