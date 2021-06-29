<?php
	include 'database.php';

  if($_POST){

	// $start_date=$_POST['start_date'];
	// $end_date=$_POST['end_date'];
	 //  $start_houre=$_POST['start_houre'];
	 $days = $_POST['days'];
 	 $start_time=$_POST['start_time'];
 	 $end_time=$_POST['end_time'];
	 $employee_id=$_POST['key'];

//  $message ="<table><thead><tr><th>Start Date</th><th>End Date</th><th>Start Time</th><th>End Time</th></tr></thead>";

for($i=0;$i<count($start_time);$i++)
{
	// $sql = "INSERT INTO `activity`(`start_date`, `end_date`, `start_houre`, `start_time`, `end_time`,`employee_id`)
	// VALUES ('{$start_date[$i]}','{$end_date[$i]}','{$start_houre[$i]}','{$start_time[$i]}','{$end_time[$i]}','$employee_id')";

	$sql = "INSERT INTO `activity`(`day`, `start_time`, `end_time`,`employee_id`)
	VALUES ('{$days[$i]}', '{$start_time[$i]}','{$end_time[$i]}','$employee_id')";


	$con=	$connect->query($sql);

	// $message.="<tr>
	// <td>{$start_date[$i]}</td>
	// <td>{$end_date[$i]}</td>
	// <td>{$start_time[$i]}</td>
	// <td>{$end_time[$i]}</td>
	// </tr>";


}
//    $message.="</table>";

    if ($con=== True) {

			// $sql = mysqli_query($connect, "select * from activities where id=$employee_id");
 			//  $r = mysqli_fetch_assoc($sql);

		// 	  $to_email ='nisha.rafat.786@gmail.com';
    	//   $subject = 'Admin Details';
        // $headers = 'MIME-Version: 1.0' . "\r\n";
		// 	 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//   	$headers .= 'From: Admin';


		// 				 $message.="<div>Activity Name: {$r['activity']}</div>
		// 				<div>No. of Repeat: {$r['reperation']}</div>
		// 				 <div>No of Groupspot: {$r['groupspot']}</div>
		// 				<div>Activity Detail: {$r['msg']}</div>";




		//   mail($to_email, $subject, $message, $headers);


      echo json_encode(array("statusCode"=>200));
      // echo "data added succesfully";
    }
    else {
      echo json_encode(array("statusCode"=>201));
    }

  }

?>
