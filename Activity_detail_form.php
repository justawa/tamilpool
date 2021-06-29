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
        include 'database.php';
         $id= $_GET['id'];
        $sql = mysqli_query($connect,"select * from activity_register  WHERE id='$id'");
        $rows = array();
         $result = mysqli_fetch_assoc($sql) ;
        //   // $rows[] = $r;
        // }
        // echo ($rows);

        ?>

      <link rel="stylesheet" type="text/css" href="style.css">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


      <link rel="stylesheet" type="text/css" href="styless.css">

    <link rel="stylesheet" type="text/css" href="form.css">



 <?php include 'menu.php'; ?>
 <div class="row col-md-12 justify-content-center"  style="margin-top:5%;"   id="success" >

     <div class="col-md-6">
         <div class="card" style="margin-bottom:5%;">
 <div class="line"></div>
 <div class="card-header" style="background-color:#f4dbf9">
   <h4>Activity</h4>
 </div>
 <form method="POST" action="" id="fupform" name="form1" class="form-container container" >


             <fieldset id="laststep" class="container">


               <!----------------- 1 ------------------------------>
               <div id="contact-details" class="section_1 form-tab visible">

                  <div class="clearfix"></div>


                  <div class="field required field-size-half nowrap">
                     <label for="">First name</label>
                     <i class="field-icon icon-name"></i><input name="first_name" id="first_name" autocomplete="given-name" type="text" value="<?php echo $result['first_name']; ?>">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                  </div>

                  <div class="field required field-size-half nowrap ">
                     <label for="">Last name</label>
                     <i class="field-icon icon-name"></i><input name="last_name" id="last_name" autocomplete="family-name" type="text" value="<?php echo $result['last_name']; ?>">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle">
                     </span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Email Address</label>
                     <i class="field-icon icon-email"></i><input name="email" id="email" autocomplete="email" type="email" value="<?php echo $result['email']; ?>">
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
                     <input id="phone" name="phone" autocomplete="tel" data-type="input-textbox" class="form-textbox validate[required, Fill Mask]" size="30" maskvalue="(999)-999-9999" data-masked="true" value="<?php echo $result['phone']; ?>" data-component="textbox" type="tel">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Zip code</label>
                     <i class="field-icon icon-location"></i>
                     <input id="zip_code" name="zip_code" type="text" autocomplete="postal-code" class="form-textbox validate[required, Fill Mask]" size="30" value="<?php echo $result['zip_code']; ?>" pattern="[0-9]*" inputmode="numeric" maxlength="5">
                     <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle">
                     </i>Required</span></span>
                  </div>



                  <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Where did you hear about us?</label>
                     <i class="field-icon icon-location"></i>
                   <select tye="select" name="about_us"value="<?php echo $result['about_us']; ?>" id="about_us">
                     <option>XYZ</option>
                       <option>ABC</option>
                       <option>MNO</option>
                   </select>
                  </div>
                     <div class="clearfix"></div>
                  <div class="field required field-size-full">
                     <label for="">Swim Lesson Agreement</label>

                     <textarea id="agreement" name="agreement" type="text" autocomplete="postal-code" class="form-textbox validate[required, Fill Mask]" size="30" value="<?php echo $result['agreement']; ?>"  >
                     </textarea>
                  </div>
                  <br><br>
                     <div class="clearfix"></div>
                 <label>I have read and agree to the Liability Release, Assumption of Risk, and Policies. *
                 </label><br>
                 <input type="checkbox" name="vehicle1" value="Bike"> YES<br>
                     <!-- <button type="submit" id="butsave" class="btn btn-primary next-step showes">Submit</button> -->



                    <!-- <input style="visibility: visible; height: auto;width: 200px;margin: 15px;padding: 0;" id="firststep_1" type="button" name="next" class="next action-button next-step"  value="Next"/> -->

               </div>


             </fieldset>


         </div>
         </form>
     </div>


 </div>


 <?php
  get_footer();
   ?>
<?php include 'js.php'; ?>
<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
    var activity = $('#activity').val();
		var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        	var phone = $('#phone').val();
        	var email = $('#email').val();
          	var zip_code = $('#zip_code').val();
            	var about_us = $('#about_us').val();
              	var agreement = $('#agreement').val();

                console.log('hie');

		if(activity!="" && first_name!="" && last_name!="" && email!="" && phone!="" && zip_code!="" && about_us!="" && agreement!=""){
			$.ajax({
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
				},

				cache: false,
				success: function(dataResult){

          console.log(dataResult);
					var dataResult = JSON.parse(dataResult);
          // $('#key').val(dataResult.id);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						  // $('#fupForm').find('input:text').val('');
						//  $("#success").show();
						// $('#success').html('Data added successfully !');

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
});
</script>
