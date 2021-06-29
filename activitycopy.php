<?php
//     @ob_start();
//     if(session_id() == '') {
//     session_start();
// }
   include ("../wp-load.php");
   get_header();

    include 'database.php';

?>
      <?php

        $sql = mysqli_query($connect,"select * from activities ");
        $rows = array();
        // while($r = mysqli_fetch_assoc($sql)) {
        //   // $rows[] = $r;
        // }
        // echo ($rows);
        ?>



        <link rel="stylesheet" type="text/css" href="style.css">

        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


      <link rel="stylesheet" type="text/css" href="form.css">
     <link rel="stylesheet" type="text/css" href="styless.css">

   <link rel="stylesheet" type="text/css" href="http://findnearby.biz/tamilpool/wp-content/uploads/custom-css-js/42.css?v=6845">

      <style>
          input[type="submit"], input[type="button"], button, button[type="submit"]{
              font-family: 'Poppins', sans-serif;
          }
      </style>
      <style>
          #progressbar li {
              text-align: center;
          }
      </style>
 <?php //include 'menu.php'; ?>
 <div class="row col-md-12 justify-content-center"  style="margin-top:10%; margin-bottom:5%;"   id="success" >

     <div class="col-md-7">
         <!-- <div class="card" style="margin-bottom:5%;"> -->

 <div class="card-header" style="background-color:#00477A">
     <h4 class="text-center text-light">Activity</h4>
   <ul id="progressbar" style="background-color:#00477A">
      <li class="active"></li>
      <li></li>
      <li></li>

   </ul>

 </div>
 <form method="POST" action="" id="fupform" name="form1" class="form-container container" >
    <div class="mt-3"></div>


             <fieldset>
               <div class="row" >
               <div class="col-md-4 list_container">
               <div class="card-body">
        <div style="width: 0; height: 0;margin-right:66%;">
          <i class="fa fa-long-arrow-up " style="font-size:3em;" aria-hidden="true"></i>
        </div>

                    <?php
                    $count=0;
                    while($r = mysqli_fetch_assoc($sql)) { ?>

                           <!-- <span class="span">&#8593;</span> -->
                     <!-- <button type="button" class="btn btn-primary add_more_button show " data-id="<?php //echo $r['id'] ?>" style="margin-left:246%; margin-bottom:10px;" ><?php echo $r['activity']; ?></button> -->

                  <div class="col-md-12">
                     <input style="visibility: visible; height: auto;width: 137px;margin: 0px;padding: 0; font-size: 18px; text-transform: uppercase;" id="activity<?=++$count?>"  type="button" data-id="<?php echo $r['id'] ?>"  name="activity" class="add_more_button show next-steps" value="<?php echo $r['activity']; ?>" />


                         </div>

                   <?php } ?>

                     </div>
                     <div style="width: 0; height: 0; margin-right:66%;">
                       <i class="fa fa-long-arrow-down" style="font-size:3em;" aria-hidden="true"></i>
                     </div>
                   </div>

                     <textarea id="para" class="col-md-4 display margin" style="height: 150px;"></textarea>

                      </div>

                        <div class="col-md-10 " style="margin-top:20px;">
                        <div class="row ">
                       <input class="col-md-3 block " style="margin-left:115px;"  id="date" autocomplete="family-name" type="text">
                        <input class="col-md-3 block"  id="time" autocomplete="family-name" type="text">
                          <input class="col-md-3 block"  id="endtime" autocomplete="family-name" type="text">
                            </div>

                            </div>

                <input style="visibility: visible; height: auto;width: 150px;margin: 333px;padding: 0;" id="firststep_1" type="button"  class="next action-button next-step" value="Next" />

             </fieldset>



             <fieldset class="container" style="display:none;">


               <!----------------- 1 ------------------------------>
               <div id="contact-details" class="section_1 form-tab visible">

                  <div class="clearfix"></div>
                  <div class="field required field-size-half nowrap">
                     <label for="">First name</label>
                     <i class="field-icon icon-name"></i><input name="first_name" id="first_name" autocomplete="given-name" type="text">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                  </div>
                  <div class="field required field-size-half nowrap ">
                     <label for="">Last name</label>
                     <i class="field-icon icon-name"></i><input name="last_name" id="last_name" autocomplete="family-name" type="text">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle">
                     </span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span>
                   </span>
                  </div>

                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Email Address</label>
                     <i class="field-icon icon-email"></i>
                     <input name="email" id="email" autocomplete="email" type="email">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle">
                     </span>
                     <span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required
                     </span></span>
                     <div id="emailSuggestion" style="display:none;"></div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Phone number</label>
                     <i class="field-icon icon-mobile"></i>
                     <input id="phone" name="phone" autocomplete="tel" data-type="input-textbox" class="form-textbox validate[required, Fill Mask]" size="30" maskvalue="(999)-999-9999" data-masked="true" value="" data-component="textbox" type="tel">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Zip code</label>
                     <i class="field-icon icon-location"></i>
                     <input id="zip_code" name="zip_code" type="text" autocomplete="postal-code" class="form-textbox validate[required, Fill Mask]" size="30" value="" pattern="[0-9]*" inputmode="numeric" maxlength="5">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle">
                     </i>Required</span></span>
                  </div>



                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Where did you hear about us?</label>
                     <i class="field-icon icon-location"></i>
                   <select tye="select" name="about_us" value="" id="about_us">
                       <option>XYZ</option>
                       <option>ABC</option>
                       <option>MNO</option>
                   </select>
                  </div>
                     <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Swim Lesson Agreement</label>

                     <textarea id="agreement" name="agreement" type="text" autocomplete="postal-code" class="form-textbox validate[required, Fill Mask]">
                     </textarea>
                  </div>
                  <br><br>
                     <div class="clearfix"></div>
                 <label >I have read and agree to the Liability Release, Assumption of Risk, and Policies. *<br>
                 <input type="checkbox" id="checkbox" name="vehicle1" value="yes" style="height: auto;"> YES
               </label><br>


                  <div class="clearfix"></div>

               </div>

               <input style="visibility: visible; height: auto;width: 150px;margin: 0px;padding: 0;"
               type="button" name="previous" class="previous action-button next-step" value="Previous" />

              <input style="visibility: visible; height: auto;width: 150px;margin: 15px;padding: 0; display: none" id="firststep_2" type="button"   data-id="<?php echo $r['id'] ?>" name="next" class="next action-button next-step"  value="Next"/>


             </fieldset>



             <fieldset id="laststep" class="container" style="display:none;">
                 <div class="clearfix"></div><br><br>

             <h4>How do you want to pay?</h4>
             <br>
             <div class="col-md-12">
             <table>

             <tr>
              <th>Activity Name</th>
              <th>Start Date</th>
              <th>Start Time</th>
              <th>End Time</th>

               </tr>

       <tbody id="summarytable"></tbody>

             </table>
             </div>

             <input style="visibility: visible; height: auto;width: 150px;margin: 00px; display:inline-block; padding: 0;" type="button" name="previous" class="previous action-button next-step" value="Previous" />

             <button style="visibility: visible; height: auto;width: 150px; display:inline-block;margin: 20px;padding: 0;" type="submit" id="butsave1" class="btn btn-primary next-step showes">Pay Now</button>



             </fieldset>

         <!-- </div> -->
         </form>
     </div>


 </div>

<?php //include 'footer.php'; ?>

<?php
 get_footer();
  ?>
<?php include 'js.php'; ?>


<script>
// jQuery(document).ready(function() {
	jQuery(document).on('submit', '#fupform', function(e) {
    e.preventDefault();
		jQuery("#butsave1").attr("disabled", "disabled");
  var activity = jQuery("#fupform").find('.active-activity').val();
		var first_name = jQuery('#first_name').val();
        var last_name = jQuery('#last_name').val();
        	var phone = jQuery('#phone').val();
        	var email = jQuery('#email').val();
          	var zip_code = jQuery('#zip_code').val();
            	var about_us = jQuery('#about_us').val();
              	var agreement = jQuery('#agreement').val();
              //  var key = jQuery('#key').val();

                console.log(email);

		if(activity!="" && first_name!="" && last_name!="" && email!="" && phone!="" && zip_code!="" && about_us!="" && agreement!=""){
			jQuery.ajax({
				url: "activity_register.php",
				type: "POST",
        // contentType: "application/json; charset=utf-8",
				data: {
          activity: activity,
					first_name: first_name,
		       	last_name: last_name,
              	email: email,
                phone: phone,
                	zip_code: zip_code,
                    	about_us: about_us,
                        	agreement: agreement,
                      //    	key: key
				},

				cache: false,
				success: function(dataResult){

          console.log(dataResult);
					var dataResult = JSON.parse(dataResult);
           jQuery('#activity').val(dataResult.id);
					if(dataResult.statusCode==200){
						jQuery("#butsave1").removeAttr("disabled");
						  // jQuery('#fupForm').find('input:text').val('');
						//  jQuery("#success").show();
						// jQuery('#success').html('Data added successfully !');

					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
		}
		else{
			 alert('Please fill all the field !');
		}
	});
// });
</script>
