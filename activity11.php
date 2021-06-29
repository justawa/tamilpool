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

        $sql = mysqli_query($connect,"select * from employee ");
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

 <?php
 include 'database.php';
   $id= $_GET['id'];
   $sql = mysqli_query($connect,"SELECT e.activity,  a.start_date, a.start_time, a.end_time FROM `employee` AS e INNER JOIN `activity` AS a ON e.id = a.employee_id where e.id=$id ");
   $rows = array();
   // while($r = mysqli_fetch_assoc($sql)) {
   //   // $rows[] = $r;
   // }
   // echo ($rows);
   ?>

 <div class="row col-md-12 justify-content-center"  style="margin-top:7%; margin-bottom:5%;"   id="success" >

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



             <div id="laststep" class="container" >
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
<?php while($r = mysqli_fetch_assoc($sql)) { ?>
             <tr>
              <td><?php echo $r['activity']; ?></td>
              <td><?php echo $r['start_date']; ?></td>
              <td><?php echo $r['start_time']; ?></td>
              <td><?php echo $r['end_time']; ?></td>

             </tr>

<?php } ?>

             </table>
             </div>

             <input style="visibility: visible; height: auto;width: 150px;margin: 00px; display:inline-block; padding: 0;" type="button" name="previous" class="previous action-button next-step" value="Previous" />

             <button style="visibility: visible; height: auto;width: 150px; display:inline-block;margin: 20px;padding: 0;" type="submit" id="butsave1" class="btn btn-primary next-step showes">Pay Now</button>

             <!-- <button type="submit" id="butsave1"  class="btn btn-primary next-step showes" style="display: none" >Submit</button> -->

           </div>

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
                // var key = jQuery('#key').val();

                console.log(first_name);

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
                          	// 'key': key
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
