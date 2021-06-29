<?php
error_reporting(E_ALL);
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php';

// include 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// include 'vendor/phpmailer/phpmailer/src/Exception.php';

include 'database.php';

if($_POST){
       $id=$_POST['id'];
	 $activity=$_POST['activity'];
     $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
	$zip_code=$_POST['zip_code'];
	$parent_name = $_POST['parent_name'];
	 $about_us=$_POST['about_us'];
		 // $agreement=$_POST['agreement'];
	 $signature=$_POST['signature'];
	//$groupspot = $_POST['name1'];
	$any_comment = $_POST['any_comment'];

  // $activity_id=$_POST['key'];
  $payment_type_value = $_POST['payment_type_value'];

    $sql = "INSERT INTO `activity_register` (`activity_id`, `activity`, `first_name`, `last_name`, `email`, `phone`, `parent_name`, `zip_code`, `about_us`,  `signature`, `date_of_signin`, `payment_type`, `comment`) VALUES ('$id', '$activity', '$first_name', '$last_name', '$email', '$phone',  '$parent_name', '$zip_code', '$about_us', '$signature', CURDATE(), 'offline', '$any_comment')";



    if ($connect->query($sql) === True) {
$last_insert = mysqli_insert_id($connect);
$sql = mysqli_query($connect,"SELECT e.msg, e.activity, e.comment, e.instructor, e.price, e.reperation, e.activity_image, 
	 e.groupspot,  e.start_date, e.end_date, a.start_time, a.end_time, a.day FROM `activities` AS e INNER JOIN `activity` AS a ON e.id = a.employee_id where e.id=$id");
	 
	 

$data = [];
if(mysqli_num_rows($sql) > 0){
	 while($r = mysqli_fetch_assoc($sql))
	 {
		 $data[] = $r;
	 }


}


		$sql = "UPDATE activities SET groupspot= groupspot-1 WHERE  id=$id";
			$is_updated = mysqli_query($connect,	$sql );


  	$to_email =$_POST['email'];
 	$activity=$_POST['activity'];
	$subject = 'Activity Details';
	$first_name=$_POST['first_name'];
	$about_us=$_POST['about_us'];
	$last_name=$_POST['last_name'];
	$phone=$_POST['phone'];
	$zip_code=$_POST['zip_code'];
 	$headers = 'MIME-Version: 1.0' . "\r\n";
  	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  	$headers .= 'From: tamipool';
	//$headers .= "Bcc: server.js@gmail.com, tami.pool1@gmail.com";



		// $to_email1 = 'nishant@gmail.com';
		// $activity1 = $_POST['activity'];
		// $subject1 = 'Activity Details';
		// $first_name1 = $_POST['first_name'];
		// $about_us1 = $_POST['about_us'];
		// $last_name1 = $_POST['last_name'];
		// $phone1 = $_POST['phone'];
		// $zip_code1 = $_POST['zip_code'];
		// $headers1 = 'MIME-Version: 1.0' . "\r\n";
		// $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// $headers1 .= 'From: tamil';

 //$message ="User Name:" . " " . $first_name . " " . $last_name . "\n" . "Activity Name:" . " " .  $activity . "\n" . "Zip code:" . " " . $zip_code . "\n" . " Contact No.:" . " " .  $phone . "\n" . "About Us.:" . " " .  $about_us ."\n";
 
	//$message1 = "User Name:" . " " . $first_name1 . " " . $last_name1 . "\n" . "Activity Name:" . " " .  $activity1 . "\n" . "Zip code:" . " " . $zip_code1 . "\n" . " Contact No.:" . " " .  $phone1 . "\n" . "About Us.:" . " " .  $about_us1 . "\n";

$datacount=count($data);

	// $message= "<table><tbody><tr>
  //           <td>$activity</td>
	// 					  <td>$data['reperation']</td>
	// 						  <td>$data['groupspot']</td>
	//
	// 											<td>$first_name</td>
	// 											<td>$last_name</td>
	// 											<td>$phone</td>
	// 											<td>$zip_code</td>
	// </tr>";

	// $sandbox_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	// $live_url = '';

	// $postData = array(
	// 	'business' => 'tami.pool1@gmail.com',
	// 	'item_name' => 'Camera',
	// 	'item_number' => 'CAM#N1',
	// 	'amount' => '10',
	// 	'no_shipping' => '1',
	// 	'currency_code' => 'USD',
	// 	'notify_url' => 'http://sitename/paypal-payment-gateway-integration-in-php/notify.php',
	// 	'cancel_return' => 'http://sitename/paypal-payment-gateway-integration-in-php/cancel.php',
	// 	'return' => 'http://sitename/paypal-payment-gateway-integration-in-php/return.php',
	// 	'cmd' => '_xclick'
	// );

	// curl_setopt_array($ch, array(
	// CURLOPT_URL => $sandbox_url,
	// CURLOPT_RETURNTRANSFER => true,
	// CURLOPT_POST => true,
	// CURLOPT_POSTFIELDS => $postData,
	// CURLOPT_FOLLOWLOCATION => true,
	// CURLOPT_RETURNTRANSFER => true,
	// ));

// $message = "<table style='width: 100%'>
// <tr><th>{$activity}</th></tr>
// </table>";

// $message = "<table style='width: 100%'>
// <tr><th>Instructor</th><td>{$data[$i]['instructor']}</td></tr>
// <tr><th>Price</th><td>${$data[$i]['price']}</td></tr>
// </table>";

// $message.="<table>
// <thead><tr><th>Day</th><th>Start Time</th><th>End Time</th></tr></thead>";
// 	for($i=0;$i<$datacount;$i++){
// 		$message.="<tr>
// 		      <td>{$data[$i]['day']}</td>  
// 		      <td>{$data[$i]['start_time']}</td>
// 				 <td>{$data[$i]['end_time']}</td></tr>";
// 	}
// $message.="</table>";
// $messge.="<hr/>";
// $message.="<table style='width: 100%'><tbody>
//     <tr><th>First Name</th><td>{$first_name}</td></tr>
//     <tr><th>Last Name</th><td>{$last_name}</td></tr>
//     <tr><th>Phone No.</th><td>{$phone}</td></tr>
//     <tr><th>Zipcode</th><td>{$zip_code}</td></tr>
// </tbody></table>";

$message = "<p>תודה רבה שנרשמתם ל״מים של תמי״. 
בטוחה שתהיה לכם חוויה איכותית, מקצועית ונעימה. 

** במידה והתשלום התבצע במזומן, נדרש להסדירו תוך 48 שעות מרגע קבלת מייל זה. 
במידה והתשלום לא יוסדר ההרשמה תבוטל באופן אוטומטי.</p>";

	for($i=0;$i<$datacount;$i++){
		$message.="<p>מַדְרִיך: {$data[$i]['instructor']}</p>
				<p>מחיר: " . 'ש"ח' . " {$data[$i]['price']}</p>
				<p>יְוֹם: {$data[$i]['day']}</p>  
		    <p>שעת התחלה: {$data[$i]['start_time']}</p>
				<p>זמן סיום: {$data[$i]['end_time']}</p>
				<hr/>
			";
	}
$message.="<p>שם פרטי: {$first_name}</p>
    <p>שם משפחה: {$last_name}</p>
    <p>בטלפון: {$phone}</p>
    <p>גיל: {$zip_code}</p>";


$message.="<p>*במידה והתשלום התבצע במזומן, נדרש להסדירו תוך 48 שעות מרגע קבלת מייל זה. במידה והתשלום לא יוסדר ההרשמה תבוטל באופן אוטומטי *
</p>";

// echo json_encode($message);
// echo json_encode($data);

//print_r($data);

	mail($to_email, $subject, $message, $headers);
	mail('tami.pool1@gmail.com', $subject, $message, $headers);
	mail('server.js@gmail.com', $subject, $message, $headers);

//mail($to_email1, $subject1, $message, $headers1);

	echo json_encode(array("statusCode"=>200, "last_id" => $last_insert));
    }
    else {
      echo json_encode(array("statusCode"=>201, "error" => $connect->error));
    }
    mysqli_close($connect);
  }

?>
