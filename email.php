<?php
if (isset($_POST['email'])) {

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('mail.excaliburgold.de', 25))
  ->setUsername('admin@excaliburgold.de')
  ->setPassword('alovep116')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo([$_POST['email'] => 'A Ammar'])
  ->setBody('Here is the message itself')
  ;

// Send the message
if ($mailer->send($message == TRUE)) {
  echo 'email has been sent';
}
else {
  echo 'some kind of error';
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email function</title>
</head>

<form action="" method="post">
  <input type="email" name="email" id="" placeholder="Enter Email">
  <input type="submit" value="Send" name="submit">
</form>
<body>
  
</body>
</html>