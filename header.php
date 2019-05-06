<?php
$file_name = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    switch($file_name)  {
        case 'index.php':
            $title = 'Max Power Home';
            break;
        case 'products.php':
            $title = 'Max Power Products';
            break;
        case 'cart.php':
            $title = 'Max Power Cart';
            break;
        case 'contact-us.php':
            $title = 'Max Power Contact Us';
            break;
				case 'paypal_cancel.php':
						$title = 'Payment Cancelled';
						break;
				case 'paypal_success.php':
						$title = 'Payment Successful';
						break;
				case 'privacy.php':
						$title = 'Max Power Privacy Policy';
						break;
				case 'terms.php':
						$title = 'Max Power Terms & Conditions';
						break;
        case 'profile.php':
            $title = 'Max Power Profile';
            break;
        case 'contact.php':
            $title = 'Max Power Contact us';
            break;
        case 'checkout.php':
            $title = 'Max Power Checkout';
            break;
						default:
        $title = "Home";
}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <base href="" />
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php echo $title ?></title>
  <link rel="shortcut icon" type="image/png" href="favicon.ico" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/custom/style.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/slick-theme.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>