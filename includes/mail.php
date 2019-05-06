<?php
    $toEmail = "admin@excaliburgold.de";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $email_msg = $_POST['email_msg'];
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
       if(mail($toEmail, $_POST["content"], $email_msg, $headers)) {
           print "<p class='success'>Thanks for contacting us. We will contact you as soon as possible.</p>";
       } else {
           print "<p class='Error'>Problem in Sending Mail.</p>";
       }


 ?>
