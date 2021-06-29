<?php
//     @ob_start();
//     if(session_id() == '') {
//     session_start();
// }

// include ("../wp-load.php");
// get_header();

include 'database.php';
?>
<?php

$rows = array();
// while($r = mysqli_fetch_assoc($sql)) {
//   // $rows[] = $r;
// }
// echo ($rows);
?>

  <?php include('includes/header.inc.php') ?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<section class="banner-bg-gallery">

  <div class="container et_pb_slides .et_pb_container">
    <div class="et_pb_slide_content">
	<p></p>
    </div>
  </div>

</section>

<section class="lightbox-gallery">
 
  <div class="container">
    <div class="et_pb_column et_pb_column_4_4 et_pb_column_0    et_pb_css_mix_blend_mode_passthrough et-last-child">


      <div class="et_pb_module et_pb_text et_pb_text_0 et_pb_bg_layout_light  et_pb_text_align_center">


        <div class="text-center mb-5">
          <h1>גלריה</h1>
		  <p>קביעת שיעור בכמה צעדים פשוטים</p>
        </div>
      </div> <!-- .et_pb_text -->
    </div> <!-- .et_pb_column -->

 <div class="row photos">
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a class="shadow" href="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg" data-lightbox="photos"><img class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg"></a></div>
            
      </div>
  </div>

</section>




<?php include('includes/footer.inc.php') ?>