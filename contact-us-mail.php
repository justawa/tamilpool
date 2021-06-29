<?php
if($_POST){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    $subject = 'Contact Form';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .=  'From: Activity';
    $message = "FirstName:" . " " . $fname .  "\n" . "LastName:" . " " . $lname .  "\n" . "Phone:" . " " . $phone .  "\n" . "Email:" . " " .  $email . "\n" . "Message:" . " " . $msg. "\n";


//send email
      $retval = mail('tami.pool1@gmail.com', $subject, $message, $headers);

    if ($retval) {
        mail('server.js@gmail.com', $subject, $message, $headers);
        echo "<script>alert('תודה, קיבלנו את פנייתך'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('שליחת ההודעה נכשלה. אנא נסה לאחר זמן מה.'); window.location.href='index.php';</script>";
    }
}