<?php
include 'database.php';

$coupon = $_REQUEST['coupon'];

$sql_get_testi = "select * from `coupons` where `name` = '$coupon'";
$result_get_testi = mysqli_query($connect, $sql_get_testi);
                
if(mysqli_num_rows($result_get_testi) > 0){
    $row = mysqli_fetch_assoc($result_get_testi);
    echo json_encode(["success" => true, "message" => "coupon applied!", "discount" => $row['discount']]);
    return;
}

echo json_encode(["success" => false, "message" => "coupon does not exist"]);

?>