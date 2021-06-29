<?php
	include 'database.php';

function dateDiffInDays($date1, $date2) 
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);
      
    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

if($_POST){

	$id=$_POST['id'];
	//$sql = mysqli_query($connect,"select msg from employee where id=$id");
 	$sql = mysqli_query($connect,"SELECT e.msg, e.activity, e.comment, e.about_course, e.instructor, e.price, e.reperation, e.activity_image, 
	 e.groupspot,  e.start_date, e.end_date, a.start_time, a.end_time, a.day, c.agreement FROM `activities` AS e 
     INNER JOIN `activity` AS a ON e.id = a.employee_id
     INNER JOIN `category` AS c ON c.id = e.category_id where e.id=$id");

	 if($sql){
		if (mysqli_num_rows($sql) > 0) {
			$data = [];
			while ($r = mysqli_fetch_assoc($sql)) {
				$dateDiff = dateDiffInDays($r['start_date'], $r['end_date']);
				$r['days'] = $dateDiff+1;
				$data[] = $r;
			}
			echo json_encode($data);
		}
	

	 }
 
else{
	echo mysqli_error($connect);
}




	// $sql = mysqli_query($connect,"SELECT e.msg, e.activity, e.reperation, e.groupspot,  a.start_date, a.start_time, a.end_time, r.first_name, r.phone, r.zip_code
	// 	 FROM `activities` AS e INNER JOIN `activity` AS a INNER JOIN `activity_register` AS r ON e.id = a.employee_id AND e.activity = r.activity where e.id=$id");
	//  $r = mysqli_fetch_assoc($sql);
	//  echo json_encode($r);
}



?>
