<?php
include 'database.php';

if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
    // Get transaction information from URL 
    $item_number = $_GET['item_number'];  
    $txn_id = $_GET['tx']; 
    $payment_gross = $_GET['amt']; 
    $currency_code = $_GET['cc']; 
    $payment_status = $_GET['st']; 
     
    // Get product info from the database 
    // $productResult = $db->query("SELECT * FROM products WHERE id = ".$item_number); 
    // $productRow = $productResult->fetch_assoc(); 
     
    // // Check if transaction data exists with the same TXN ID. 
    // $prevPaymentResult = $db->query("SELECT * FROM payments WHERE txn_id = '".$txn_id."'"); 
 
    // if($prevPaymentResult->num_rows > 0){ 
    //     $paymentRow = $prevPaymentResult->fetch_assoc(); 
    //     $payment_id = $paymentRow['payment_id']; 
    //     $payment_gross = $paymentRow['payment_gross']; 
    //     $payment_status = $paymentRow['payment_status']; 
    // }else{ 
    //     // Insert tansaction data into the database 
    //     $insert = $db->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')"); 
    //     $payment_id = $db->insert_id; 
    // }

    $sql_select_activity_register = "select * from `activity_register` where id = $item_number limit 1";
    $result_select_activity_register = mysqli_query($connect, $sql_select_activity_register);

    if(mysqli_num_rows($result_select_activity_register) > 0){
        $row = mysqli_fetch_assoc($result_select_activity_register);

        $sql_update_activity_register = "update `activity_register` set `payment_status` = 1, `txn_id` = '$txn_id', `amount` = '$payment_gross', `payment_type` = 'online' where id = $item_number";
        $result_update_activity_register = mysqli_query($connect, $sql_update_activity_register);

        $sql_get_activity = mysqli_query($connect,"SELECT e.msg, e.activity, e.comment, e.instructor, e.price, e.reperation, e.activity_image, 
	 e.groupspot,  e.start_date, e.end_date, a.start_time, a.end_time, a.day FROM `activities` AS e INNER JOIN `activity` AS a ON e.id = a.employee_id where e.id={$row['activity_id']}");

        $data = [];
        if(mysqli_num_rows($sql_get_activity) > 0){
            while($r = mysqli_fetch_assoc($sql_get_activity))
            {
                $data[] = $r;
            }
        }

        $subject = 'Payment Completed';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .=  'From: Activity';
        $message = "Your payment for activity {$row['activity']} completed successfully.";

        $message .="<h4>Activity Detail</h4>";

        for($i=0;$i<$datacount;$i++) {
            $message.="<p>מַדְרִיך: {$data[$i]['instructor']}</p>
                    <p>מחיר: " . 'ש"ח' . " {$data[$i]['price']}</p>
                    <p>יְוֹם: {$data[$i]['day']}</p>  
                <p>שעת התחלה: {$data[$i]['start_time']}</p>
                    <p>זמן סיום: {$data[$i]['end_time']}</p>
                    <hr/>
                ";
        }

        $retval =  mail($row['email'], $subject, $message, $headers);

        if($retval) {
            mail("tami.pool1@gmail.com", $subject, $message, $headers);
            mail("server.js@gmail.com", $subject, $message, $headers);
        }
    }

}
?>
<div class="container">
    <div style="text-align: center">
        <h3>Your PayPal Transaction is Successfull</h3>
    </div>
    <a href="index.php" class="btn-link">Go Back</a>
</div>