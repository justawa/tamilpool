<?php

$development_mode = false;

if($development_mode){
  $username = "root";
  $password = "";
  $dbname= "seontkao_tamilpool";
} else {
  $username = "root";
  $password = "";
  $dbname= "seontkao_tamilpool";
}

$localhost = "localhost";

$connect = new mysqli($localhost,$username,$password,$dbname);
if($connect->connect_error)
{
  die("connection failed : " . $connect->connect_error);
}

mysqli_set_charset($connect,"UTF8");
 ?>
