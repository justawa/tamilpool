<?php
	include 'database.php';



  if(isset($_POST['id'])){
	$id= $_POST['id'];
	$category=$_POST['category'];
	$activity=$_POST['activity'];
	$activity_image=$_POST['activity_image'];
	$reperation=$_POST['reperation'];
	$groupspot=$_POST['groupspot'];
	$msg=$_POST['msg'];
	$comment=$_POST['comment'];
	$about_course=$_POST['about_course'];
	$start_date = $_POST['start_date'];
	$end_date=$_POST['end_date'];
	$instructor=$_POST['instructor'];
	$price=$_POST['price'];


	$sql = mysqli_query($connect, "update activities set `activity`='$activity', `activity_image`='$activity_image', `groupspot`='$groupspot', `reperation`='$reperation', `msg`='$msg', `comment` = '$comment', `about_course`='$about_course', `start_date`='$start_date', `end_date`='$end_date', `instructor`='$instructor', `price`='$price', `category_id`='$category'  where id='$id'");

	$con = $connect->query($sql);

	echo "<script> window.location.href='edit_activity.php?id=$id';</script>";
	// header("Location:edit_activity.php?id=$id");
	}

?>
