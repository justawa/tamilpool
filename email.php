<?php
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    $header = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header =  'From: Activity';
    $message = "User Name:" . " " . $name .  "\n" . "Email:" . " " .  $email . "\n" . "Message:" . " " . $msg. "\n";


//send email
      $retval =  mail('server.js@gmail.com', $header, $message);

    if ($retval) {
        echo "Email sent successfully...";
    } else {
        echo "Email could not be sent...";
    }
}
