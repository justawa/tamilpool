<?php
include 'database.php';

$category = $_REQUEST['category'];

$sql_get_testi = "select * from `subcategory` where `category_id` = '$category'";
$result_get_testi = mysqli_query($connect, $sql_get_testi);
                
if(mysqli_num_rows($result_get_testi) > 0){
    $subcategories = [];
    while($row = mysqli_fetch_assoc($result_get_testi)){
      $subcategories[] = $row;
    }
    echo json_encode(["data" => $subcategories]);
    return;
}

echo json_encode([ "data" => [] ]);

?>