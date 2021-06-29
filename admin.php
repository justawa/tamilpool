<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
       header('location: admin_login.php'); 
    }

    include 'database.php';
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1, user-scalable=no">


<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="http://findnearby.biz/tamilpool/wp-content/uploads/custom-css-js/42.css?v=6845">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" />

<link rel="stylesheet" type="text/css" href="styless.css">
<link rel="stylesheet" type="text/css" href="form.css">


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<style>
  /* .content-desktop {
    display: block;
  }

  .content-mobile {
    display: none;
  } */

  @media screen and (max-width: 768px) {

    /* .content-desktop {
      display: none;
    }

    .content-mobile {
      display: block;
    } */

  }



  #add_field {
    display: block;
  }

  #add_field_mobileview {
    display: none;
  }

  @media screen and (max-width: 768px) {

    #add_field {
      display: none;
    }

    #add_field_mobileview {
      display: block;
    }

  }
</style>


<script>
  // if(document.referrer != 'http://findnearby.biz/tamilpool/wp-admin/'){
  //   window.location.href="http://findnearby.biz/tamilpool/wp-admin";
  // }

  //console.log(document.referrer);
</script>

<body>
  <!-- <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#070707; width:100%">

    <a type="button" href="http://findnearby.biz/tamilpool/wp-admin" style="color:#fff;
        font-size: 13px;">חזרה ללוח המחוונים</a>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <div class="ml-auto">
        <a href="logout.php" style="color:#fff;
               font-size: 13px;">להתנתק</a>

      </div>



    </div>
  </nav> -->

  <?php include('includes/admin-header.inc.php'); ?>

  <div class="container">
    <div class="row justify-content-center" style="margin-top:5%;" id="success">
      <div class="col-md-10">
        <div class="card">

          <!-- <div class="" style="background-color:#00477A; ">
            <div class="dropdown" style="  border-right: 1px solid #fff;
                        display: inline;
                        padding: 10px 30px;
                        float: left;">
              <button class="dropbtn ">Activity
              </button>

              <div class="dropdown-content">
                <a href="admin.php">create Activity</a>
                <a href="view_activity.php">View Activity</a>
              </div>
            </div>

            <div class="dropdown" style=" border-right: 1px solid #fff;
                    display: inline;
                    padding: 10px 30px;
                    float: left;">
              <a href="activity_detail_tableshow.php" type="button" class="dropbtn">User</a>

            </div>

            <div class="dropdown" style="  border-right: 1px solid #fff; display: inline; padding: 10px 30px; float: left;">
              <button class="dropbtn ">Category
              </button>

              <div class="dropdown-content">
                <a href="add-category.php">Add Category</a>
              </div>
            </div>

          </div> -->

          <?php include('includes/card-header.inc.php') ?>


          <div class="card-body" style="background-color:#eae7e7;">
            <div style="margin: auto;width: 60%;">
              <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
            </div>

            <form method="POST" action="" id="fupForm" name="form1">

              <div class="form-group row">
                <label class="col-md-3 readactivity">שם קטגוריה</label>
                <div class="col-md-9">
                  <select class="form-control" name="category" id="category">
                    <option value="">בחר קטגוריה</option>
                    <?php
                      $sql_get_all_category = "select * from `category` order by name";
                      $result_get_all_category = mysqli_query($connect, $sql_get_all_category);

                      if(mysqli_num_rows($result_get_all_category) > 0){
                        while($row = mysqli_fetch_assoc($result_get_all_category)){
                    ?>
                          <option value="<?=$row['id']?>"><?=$row['name']?></option>
                    <?php

                        }
                      }
                    ?>
                  </select>
                </div>
              </div>

              <!-- <div class="form-group row">
                <label class="col-md-3 readactivity">SubCategory Name</label>
                <div class="col-md-9">
                  <select class="form-control" name="subcategory" id="subcategory">
                  </select>
                </div>
              </div> -->

              <div class="form-group row">
                <label class="col-md-3 readactivity">שם הפעילות</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="activity" value="" id="activity">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">תמונה</label>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="file" class="form-control" name="activity_image" id="activity_image" />
                    </div>
                    <div class="col-md-6">

                      <img id="dynamic_activity_image" src="#" alt="Activity image preview" style="max-width: 100%; margin-top: 10px; display: none;" />
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">מספר חזרה</label>
                <div class="col-md-3">
                  <select type="select" class="form-control" name="reperation" value="" id="reperation">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>

                <label class="col-md-3 readactivity">מספר ספוט קבוצתי</label>
                <div class="col-md-3">
                  <select type="select" class="form-control" name="groupspot" value="" id="groupspot">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">הזן פרטים</label>
                <div class="col-md-9">
                  <textarea type="textarea" class="form-control" name="msg" id="msg"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">תגובה</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="comment" id="comment"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">אודות הקורס</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="about_course" id="about_course"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">תאריך התחלה</label>
                <div class="col-md-3">
                  <!-- <input type="date" class="form-control" name="start_date" id="start_date" /> -->
                  <input type="date" id="start_date" name="start_date" class="form-control" />
                </div>

                <label class="col-md-3 readactivity">תאריך סיום</label>
                <div class="col-md-3">
                  <!-- <input type="date" class="form-control" name="end_date" id="end_date" /> -->
                  <input type="date" id="end_date" name="end_date" class="form-control" />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">מַדְרִיך</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="instructor" id="instructor" />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">מחיר</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" name="price" id="price" />

                </div>
              </div>

              <div class="row" style="padding: 4%;">
                <div class="col-sm-6" id="new_chqs" style="width: 50%;float: left;">
                  <button type="button" id="butsave" class="blue-btn-next">צור פעילות: שלב 1 מתוך 2</button>
                </div>
              </div>
            </form>
          </div>

          <div id="activityblock" style="">

            <div class="row" id="desktop_activityblock" style="margin-top:10px; display:none;">
              <div class="col-md-12">
                <div class="table-responsive-md">
                  <form class="content-desktop" method="POST" action="" id="fupFormtable" name="form2">
                    <table>

                      <tr>
                        <!-- <th>Start Date</th> -->
                        <!-- <th>End Date</th> -->
                        <th>יְוֹם</th>
                        <th>שעת התחלה</th>
                        <th>זמן סיום</th>
                        <!-- <th>Total Hours</th> -->
                        <th></th>
                      </tr>


                      <tbody class="input_fields_container_part desktoptable">
                        <!-- <tr>
                          <td><input type="time" class="form-control" name="start_time[]" id="start_time" placeholder="start Time"></td>
                          <td><input type="time" class="form-control" name="end_time[]" id="end_time" placeholder="End Time"></td>

                          <td class=""><button type="button" class="btn btn-danger desktopdelete-row" style="padding: 0; background: transparent; color: red; border:0;"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                        </tr> -->
                      </tbody>
                    </table>
                    <input type="hidden" class="key" name="employee_id" value="">
                    <!-- <button class="blue-btn-previous add_more_button" id="add_field">Add More Fields</button> -->
                    <button type="submit" id="butsavetable1" class="blue-btn-next">צור פעילות: שלב 2 מתוך 2</button>

                  </form>
                </div>
              </div>
            </div>



            <div class="row" id="mobile_activityblock" style="margin-top:10px; display:none">
              <div class="col-md-12">
                <div class="table-responsive">
                  <form id="mobileFormSubmit" class="content-mobile">
                    <table>
                      <input type="hidden" name="employee_id" class="key" value="">
                      <tbody class="input_fields_container_part mobiletable">
                        <tr>
                          <th>תאריך התחלה</th>
                          <th>תאריך סיום</th>
                        </tr>

                        <tr>
                          <!-- <td><input type="date" class="form-control start_date " name="start_date[]"  placeholder="start date" value="" > -->
                          </td>
                          <!-- <td><input type="date" class="form-control start_date " name="end_date[]"  placeholder="End date" value="" ></td> -->
                        </tr>

                        <tr>
                          <th>שעת התחלה</th>
                          <th>זמן סיום</th>
                          <!-- <th>Total Hours</!--> -->

                        </tr>
                        <tr>
                          <td><input type="time" class="form-control" name="start_time[]" placeholder="start Time"></td>
                          <td><input type="time" class="form-control" name="end_time[]" placeholder="End Time"></td>
                          <!-- <td><input type="text" class="form-control" name="start_houre[]"  placeholder="hrs" value=""  ></td> -->
                          <input type="hidden" class="key" name="employee_id" value="">
                          <td class="">
                            <button type="button" class="btn btn-danger delete-row" style="padding: 0; background: transparent; color: red; border:0;">
                              <i class="fa fa-trash" aria-hidden="true"></i></button>
                          </td>
                        </tr>

                      </tbody>

                    </table>
                    <!-- <button class="blue-btn-previous add_more_mobileview" id="add_field_mobileview">Add More Fields</button> -->
                    <button type="submit" id="butsavetable2" class="blue-btn-next" style="width:42%;">צור פעילות: שלב 1 מתוך 2</button>
                  </form>
                </div>
              </div>
            </div>


            <div class="row" style="padding: 4%;">
              <div class="col-sm-6" id="new_chqs" style="width: 50%;float: left;">

                <!-- <button class="blue-btn-previous add_more_button" id="add_field" >Add More Fields</button> -->
                <!-- <button class="blue-btn-previous add_more_mobileview" id="add_field_mobileview" >Add More Fields</button> -->
                <!-- style="margin-left:49%; margin-bottom:10px;" -->
              </div>
              <div class="col-sm-6" style="width: 50%;float: left;">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  <!-- </div>
</div> -->
</body>

</html>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<?php include 'js.php'; ?>







<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




<script src="js/moment.js"></script>


<script>
  function instructorvalidateForm() {

    var z = document.forms["form1"]["instructor"].value;
    if (!z.match(/^[a-zA-Z]+$/)) {
      alert("Instructor name must be in the string")
    }

  }


  function pricevalidateForm() {
    var z = document.forms["form1"]["price"].value;
    if (!z.match(/^\d+/)) {
      alert("Please enter numeric value in Price")
    }
  }

  // $('#price').on('keyup', function() {
  //   pricevalidateForm();
  // })


  // $('#instructor').on('keyup', function() {
  //   instructorvalidateForm();
  // })
</script>




<script>

</script>

<script>
  function readImageURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#dynamic_activity_image').css('display', 'block');
        $('#dynamic_activity_image').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#activity_image").change(function() {
    readImageURL(this);
  });
</script>

<script>
  $(document).ready(function() {
    var max_fields_limit = 20;
    var x = 3;


    $('#add_field').click(function(e) {
      e.preventDefault();
      if (x < max_fields_limit) {
        x++;
        $('.desktoptable').append(`<tr class="remove_field">
              <td>
                <label>
                  <input type="checkbox" name="days[]" value="monday" /> יוֹם שֵׁנִי
                </label>
                <label>
                  <input type="checkbox" name="days[]" value="tuesday" /> יוֹם שְׁלִישִׁי
                </label>
                <label>
                  <input type="checkbox" name="days[]" value="wednesday" /> יום רביעי
                </label>
                <label>
                  <input type="checkbox" name="days[]" value="thursday" /> יוֹם חֲמִישִׁי
                </label>
                <label>
                  <input type="checkbox" name="days[]" value="friday" /> יוֹם שִׁישִׁי
                </label>
                <label>
                  <input type="checkbox" name="days[]" value="saturday" /> יום שבת
                </label>
                <label>
                  <input type="checkbox" name="days[]" value="sunday" /> יוֹם רִאשׁוֹן
                </label>
              </td>
              <td><input type="time" class="form-control" name="start_time[]" id="start_time" placeholder="start Time" ></td>
                <td>  <input type="time" class="form-control" name="end_time[]" id="end_time" placeholder="End Time"></td>
               <td><button type="button" class="btn btn-danger desktopdelete-row" style="padding: 0; background: transparent; color: red; border: 0;"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
              </tr>`);
        //add input field
      }
    });
    $(document).on("click", ".desktopdelete-row", function(e) { //user click on remove text links
      e.preventDefault();
      $(this).parent().parent().remove();
      x--;
    })

  });
</script>


<script>
  $(document).ready(function() {
    $('#butsave').on('click', function() {
      $("#butsave").attr("disabled", "disabled");
      var category = $('#category option:selected').val();
      var activity = $('#activity').val();
      var activitylogo = $("#activity_image").val();
      var groupspot = $('#groupspot').val();
      var reperation = $('#reperation').val();
      var msg = $('#msg').val();
      var comment = $('#comment').val();
      var about_course = $('#about_course').val();
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      var instructor = $('#instructor').val();
      var price = $('#price').val();
      var form = $('#fupForm');
      //console.log(form);
      var data = new FormData(form[0]);
      var shouldContinue = true;

      // if(category == '') {
      //  alert(category) 
      // }

      // if(activity == '') {
      //   alert("activity");
      // }
 
      // if(activitylogo == ''){
      //   alert("activitylogo");
      // } 
      
      // if(groupspot == '') {
      //   alert("groupspot");
      // } 
      
      // if(reperation == '') {
      //   alert("reperation");
      // } 
      
      // if(msg == ''){
      //   alert("msg");
      // } 
      
      // if(comment == ''){
      //   alert("comment");
      // } 
      
      // if(about_course == ''){
      //   alert("about_course");
      // } 
      
      // if(start_date == ''){
      //   alert("start_date");
      // } 
      
      // if(end_date == ''){
      //   alert("end_date");
      // } 
      
      // if(instructor == ''){
      //   alert("instructor");
      // } 
      
      // if(price == '') {
      //   alert("price");
      // }

      if (category == '' || activity == '' || activitylogo == '' || groupspot == '' || reperation == '' || msg == '' || comment == '' || about_course == '' || start_date == '' || end_date == '' || instructor == '' || price == '') {
        shouldContinue = false;
        alert("Please fill all the field");
        $("#butsave").removeAttr("disabled");
      }

      // if (shouldContinue) {
      //   var z = instructor.trim();
      //   if (!z.match(/^[a-zA-Z]+$/)) {
      //     alert("Instructor name must be in the string");
      //     shouldContinue = false;
      //     $("#butsave").removeAttr("disabled");

      //   }
      // }

      if (shouldContinue) {
        var y = price;
        console.log(y);
        if (!y.match(/^\d+/)) {
          alert("Please enter numeric value in Price");
          shouldContinue = false;
          $("#butsave").removeAttr("disabled");
        }
      }


      moment.locale('he');
      start_date = moment(start_date);
      end_date = moment(end_date);

      var diff = end_date.diff(start_date, 'days');

      // console.log (data);
      if (shouldContinue) {
        $.ajax({
          url: "save.php",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,


          cache: false,
          success: function(dataResult) {

            // console.log(dataResult);
            var dataResult = JSON.parse(dataResult);
            $('.key').val(dataResult.id);
            if (dataResult.statusCode == 200) {
              // $("#butsave").removeAttr("disabled");
              //$('#fupForm').find('input:text').disabled = true;
              document.getElementById("activity").disabled = true;
              document.getElementById("reperation").disabled = true;
              document.getElementById("groupspot").disabled = true;
              document.getElementById("msg").disabled = true;

              $('#butsave').hide();

              moment(start_date.add(-1, 'days'));
              for (var i = 0; i < diff + 1; i++) {
                // console.log('start',start_date);
                var mydate = moment(start_date.add(1, 'days')).format('dddd - DD MMMM YYYY');

                // var mydate = moment(start_date.add(1, 'days')).format('LL');
                // console.log('my',mydate);
                // var myday = moment(mydate).format('dddd');
                $(".desktoptable").append(`
                    <tr class="remove_field">
                      <td>
                        <input type="text" class="form-control" name="day[]" value="${mydate}" readonly/>
                      </td>
                      <td><input type="time" class="form-control" name="start_time[]" id="start_time" placeholder="start Time" ></td>
                        <td>  <input type="time" class="form-control" name="end_time[]" id="end_time" placeholder="End Time"></td>
                        <td><button type="button" class="btn btn-danger delete-row-dates">לִמְחוֹק</button></td>
                      </tr>
                  `);
              }



              //  <td>
              //         <button type="button" class="btn btn-danger desktopdelete-row" style="padding: 0; background: transparent; color: red; border: 0;"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

              $('#desktop_activityblock').show();

              // if (window.matchMedia("(max-width: 479px)").matches) {
              //   $('#mobile_activityblock').show();
              //   $('#desktop_activityblock').hide();
              //   // The viewport is less than 768 pixels wide
              //   //document.write("This is a  mobile device.");
              // } else {
              //   $('#desktop_activityblock').show();
              //   $('#mobile_activityblock').hide();
              //   // The viewport is at least 768 pixels wide
              //   //document.write("This is a  tablet or desktop.");
              // }

            } else if (dataResult.statusCode == 201) {
              alert("Error occured !");
              $("#butsave").removeAttr("disabled");
            }

          }
        });
      }

      // else {
      //   alert('Please fill all the field !');
      //   $("#butsave").removeAttr("disabled");
      // }
    });
  });
</script>


<script>
  $(document).ready(function() {

    $(document).on("click", ".delete-row-dates", function() {
      $(this).parent().parent().remove();
    });

    $('#fupFormtable').on('submit', function(e) {
      e.preventDefault();
      var commonform = $(this);

      common_form_submit(commonform);

    });

    $("#mobileFormSubmit").on("submit", function(e) {
      e.preventDefault();
      var commonform = $(this);
      common_form_submit(commonform);
    })


    function common_form_submit(commonform) {

      $('button[type="submit"]', commonform).attr("disabled", "disabled");

      // var end_date = $('input[name="end_date[]"]', commonform).map(function() {
      //   return this.value;
      // }).get();
      //   var start_date = commonform.find('input[name="start_date[]"]').map(function() {
      //     return this.value;
      //   }).get();
      // var start_houre = commonform.find('input[name="start_houre[]"]').map(function() {
      //   return this.value;
      // }).get();
      var days = commonform.find('input[name="day[]"]').map(function() {
        return this.value;
      }).get();
      var start_time = commonform.find('input[name="start_time[]"]').map(function() {
        return this.value;
      }).get();
      var end_time = commonform.find('input[name="end_time[]"]').map(function() {
        return this.value;
      }).get();

      var key = $('input[name="employee_id"]', commonform).val();
      // console.log(key);
      // console.log(start_date);

      shouldContinue = true;

      // console.log(start_time);

      // console.log(days);
      // console.log(start_time);
      // console.log(end_time);

      for (var i = 0; i < days.length; i++) {
        if (days[i] == '') {
          shouldContinue = false;
        }
      }

      for (var i = 0; i < start_time.length; i++) {
        if (start_time[i] == '') {
          shouldContinue = false;
        }
      }

      for (var i = 0; i < end_time.length; i++) {
        if (end_time[i] == '') {
          shouldContinue = false;
        }
      }

      if (shouldContinue) {
        $.ajax({
          url: "table_save.php",
          type: "POST",
          data: {
            'days[]': days,
            'start_time[]': start_time,
            'end_time[]': end_time,
            'key': key
          },

          cache: false,
          success: function(dataResult) {

            var dataResult = JSON.parse(dataResult);

            console.log(dataResult);


            if (dataResult.statusCode == 200) {
              // $('button[type="submit"]', commonform).+removeAttr("disabled");
              $('#fupFormtable').find('input:text').val('');


              //  $("#success").show();
              // $('#success').html('Data added successfully !');
              alert('Created Activity successfully');
              location.reload(true);

            } else if (dataResult.statusCode == 201) {
              alert("Some error occured!");
              $('button[type="submit"]', commonform).removeAttr("disabled");
            }

          }
        });
      } else {
        alert('Please provide all fields');
        $('button[type="submit"]', commonform).removeAttr("disabled");
      }
    }

  });
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#start_date").datepicker({
      minDate: 0,
      dateFormat: 'yy-mm-dd',
      onSelect: function(date) {
        $("#end_date").datepicker('option', 'minDate', date);
      }
    });
    $("#end_date").datepicker({
      dateFormat: 'yy-mm-dd'
    });
  });

  // $("#category").on("change", function() {
  //   var category = $("#category").val();
  //   $("#subcategory").html('')
  //   $.ajax({
  //     type: "POST",
  //     url: "fetch_subcategory.php",
  //     data: {
  //       category: category
  //     },
  //     success: function(response) {
  //       response = JSON.parse(response)
  //       for(let i=0; i<response.data.length; i++) {
  //         $("#subcategory").append(`<option value="${response.data[i].id}">${response.data[i].name}</option>`);
  //       }
  //     }
  //   })
  // })
</script>