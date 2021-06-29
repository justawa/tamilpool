<?php
include 'database.php';

if(!empty($_GET['item_number']) && !empty($_GET['payment_cancelled']) && !empty($_GET['email'])){

    $item_number = $_GET['item_number'];  
    $payment_cancelled = $_GET['payment_cancelled']; 
    $email = $_GET['email'];

    $sql_select_activity_register = "select * from `activity_register` where id = $item_number and email = '$email' limit 1";
    $result_select_activity_register = mysqli_query($connect, $sql_select_activity_register);

    if(mysqli_num_rows($result_select_activity_register) > 0){

        $row = mysqli_fetch_assoc($result_select_activity_register);

        $sql_get_activity = mysqli_query($connect,"SELECT e.msg, e.activity, e.comment, e.instructor, e.price, e.reperation, e.activity_image, 
	 e.groupspot,  e.start_date, e.end_date, a.start_time, a.end_time, a.day FROM `activities` AS e INNER JOIN `activity` AS a ON e.id = a.employee_id where e.id={$row['activity_id']}");

        $data = [];
        if(mysqli_num_rows($sql_get_activity) > 0){
            while($r = mysqli_fetch_assoc($sql_get_activity))
            {
                $data[] = $r;
            }
        }

        $datacount=count($data);

        $subject = 'Payment Cancelled';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .=  'From: tamipool';
        $message = "Your payment for activity {$row['activity']} has been cancelled.";

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

        // $retval =  mail($email, $header, $message);
        $retval = mail($email, $subject, $message, $headers);

        if($retval) {
            mail("tami.pool1@gmail.com", $subject, $message, $headers);
            mail("server.js@gmail.com", $subject, $message, $headers);
        }
    }
}

?>

<div class="container">
    <div style="text-align: center">
        <h3>Your PayPal Transaction has been cancelled</h3>
    </div>
    <a href="index.php" class="btn-link">Go Back</a>
</div>