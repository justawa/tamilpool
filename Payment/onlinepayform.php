<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online|Pay</title>
    <style>
    h2{
        display=flex;
    }
    
    </style>
</head>
<body>
<?php

$userid="56c09c134111815c";
$pagecode="a7eaf004bfef";
?>
    <h2> Online Payment</h2>
    <form action="payscript.php" method="post">
    <input type="text" name="firstname" placeholder=" firstname" /> <br> <br>
    <input type="text" name="lastname" placeholder=" lastname" /><br> <br>
    <input type="email" name="email" placeholder=" email" /><br> <br>
    <input type="tel" name="phone" placeholder=" phone"/><br> <br>
    <input type="submit" name="submit" placeholder="PayNow"/><br> <br>
    
    </form>

</body>
</html>