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
          <h1>צור קשר</h1>
		 
        </div>
      </div> <!-- .et_pb_text -->
    </div> <!-- .et_pb_column -->

 <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
           <form method="post" action="contact-us-mail.php">
  <input style="margin-bottom: 10px;border-radius:0;" type="text" class="form-control1" id="fname" name="fname" placeholder="שם פרטי">
  <input style="margin-bottom: 10px;border-radius:0;" type="text" class="form-control1" id="lname" name="lname" placeholder="שם משפחה">
  <input style="margin-bottom: 10px;border-radius:0;" type="tel" class="form-control1" id="phone" name="phone" placeholder="מכשיר טלפון">
  <input style="margin-bottom: 10px;border-radius:0;" type="email" class="form-control1" id="email" name="email" placeholder="אימייל">
  <textarea style="margin-bottom: 10px;border-radius:0;" type="text" class="form-control1" rows="6" id="message" name="הוֹדָעָה" placeholder="Message"></textarea>
  <input class="book-activity-btn1" type="submit" value="שלח">
</form>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6">
          <p><strong>כתובת</strong>: <span>זכרון יעקב העבודה 16</span></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3362.720895589961!2d34.95818448482343!3d32.56029338103802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d096386df372d%3A0xbc301c63a641895f!2z15TXoteR15XXk9eUIDE2LCDXlteb16jXldefINeZ16LXp9eR!5e0!3m2!1siw!2sil!4v1618906845337!5m2!1siw!2sil" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
            
            
      </div>
  </div>

</section>




<?php include('includes/footer.inc.php') ?>