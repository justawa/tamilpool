<?php
	include 'database.php';
  if($_POST){
    $category = $_POST['category'];
    $activity=$_POST['activity'];
    $groupspot=$_POST['groupspot'];
    $reperation=$_POST['reperation'];
    $msg=$_POST['msg'];
    $comment = $_POST['comment'];
    $about_course = $_POST['about_course'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $instructor = $_POST['instructor'];
    $price = $_POST['price'];

  $cover_image = '';


  if ($_FILES['activity_image']['error']) {
    echo json_encode(array("statusCode"=>201));
    die;
  } else {
    if (!$_FILES['activity_image']['error']) {
      $activity_image = md5($_FILES['activity_image']['name'] . rand()) . ".png";
      $cover = "activity_image/" . basename($activity_image);
      //$cover_image = $_FILES['cover']['name'];
      if (move_uploaded_file($_FILES['activity_image']['tmp_name'], $cover)) {
        $msgs = " Cover uploaded";
      }
    }
    //print $business_logo;

  }


    $sql = "INSERT INTO `activities`( `activity`, `groupspot`, `total_groupspot`,`reperation`,`msg`, `comment`, `about_course`, `start_date`, `end_date`, `instructor`, `price`, `activity_image`, `category_id`) VALUES ('$activity','$groupspot','$groupspot','$reperation','$msg', '$comment', '$about_course', '$start_date', '$end_date', '$instructor', '$price','$activity_image', '$category')";
    if ($connect->query($sql) === True) {

			 $last_id = $connect->insert_id;

		//
	 	//   $activity=$_POST['activity'];
   	// $to_email ='nisha.rafat.786@gmail.com';
	 	//  	$subject = 'Activity Details';
  	//  $groupspot=$_POST['groupspot'];
    //      $reperation=$_POST['reperation'];
    //        $msg=$_POST['msg'];
		//
	 	//  	$headers = 'From: Admin';
	 	//  	$message = "Activity Name:" . " " . $activity . "\n\n" . "Group Spot:" . " " . $groupspot . "\n\n" . "Repeat:" . " " .  $reperation . "\n\n" . $_POST['message'];
		//
  	// mail($to_email, $subject, $message,  $headers);



  echo json_encode(array("statusCode"=>200,'id'=> $last_id));




    }
    else {
      echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($connect);
  }
  ?>
