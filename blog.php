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
<section class="banner-bg-gallery">

  <div class="container et_pb_slides .et_pb_container">
    <div class="et_pb_slide_content">
	<p></p>
    </div>
  </div>

</section>

<section>
 
  <div class="container">
    <div class="et_pb_column et_pb_column_4_4 et_pb_column_0    et_pb_css_mix_blend_mode_passthrough et-last-child">


      <div class="et_pb_module et_pb_text et_pb_text_0 et_pb_bg_layout_light  et_pb_text_align_center">


        <div class="text-center mb-5">
          <h1>גלריה</h1>
		  <p>קביעת שיעור בכמה צעדים פשוטים</p>
        </div>
      </div> <!-- .et_pb_text -->
    </div> <!-- .et_pb_column -->

 <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
            <div class=" shadow p-3">
			<a target="blank" href="blog-inner.php"><img style="margin-bottom:10px;" class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg">
			<h4>Lorem Ipsum</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
			</a>
			</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-4">
            <div class=" shadow p-3">
			<a target="blank" href="blog-inner.php"><img style="margin-bottom:10px;" class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg">
			<h4>Lorem Ipsum</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
			</a>
			</div>
			</div>
            <div class="col-sm-6 col-md-4 col-lg-4">
            <div class=" shadow p-3">
			<a target="blank" href="blog-inner.php"><img style="margin-bottom:10px;" class="img-fluid" src="img/240_F_91303372_GgADOHxqKvzv2NKmnkNGzkzNje3XwdK3.jpg">
			<h4>Lorem Ipsum</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
			</a>
			</div>
			</div>
            
      </div>
  </div>

</section>




<?php include('includes/footer.inc.php') ?>