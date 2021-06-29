<?php
	include 'database.php';



  if(isset($_POST['id'])){
$id= $_POST['id'];
$empid= $_POST['employee_id'];
//echo ($id);die();
	// $start_date=$_POST['start_date'];
	// $end_date=$_POST['end_date'];
 	 $start_houre=$_POST['start_houre'];
 	 $start_time=$_POST['start_time'];
	  $end_time=$_POST['end_time'];
	$day = $_POST['day'];

// echo json_encode($start_date);
// die();


$sql = mysqli_query($connect,"update activity set start_time='$start_time', end_time='$end_time', day='$day' where id='$id'");
	$con=	$connect->query($sql);
 // echo "<script> location.href='edit_activity.php'; </script>";
 // echo '<script>alert("Updated succesfully")</script>';
	 header("Location:edit_activity.php?id=$empid");
  }

?>
