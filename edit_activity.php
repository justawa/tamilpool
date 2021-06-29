<html>


<?php
include 'database.php';
if ($_GET) {
  $id = $_GET['id'];
  $sql = mysqli_query($connect, "select * from activities WHERE id='$id'");
  // $sql = mysqli_query($connect,"SELECT e.msg, e.activity, e.reperation, e.groupspot,  a.start_date, a.end_date, a.start_time, a.end_time FROM `activities` AS e INNER JOIN `activity` AS a ON e.id = a.employee_id where e.id=$id");
  //

  $rows = array();
  $result = mysqli_fetch_assoc($sql);

  //   // $rows[] = $r;
  // }
  // echo ($rows);
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="http://findnearby.biz/tamilpool/wp-content/uploads/custom-css-js/42.css?v=6845">
<link rel="stylesheet" type="text/css" href="styless.css">
<link rel="stylesheet" type="text/css" href="form.css">





<!-- <script>
    if(document.referrer != 'http://findnearby.biz/tamilpool/wp-admin/'){
      window.location.href="http://findnearby.biz/tamilpool/wp-admin";
    }

    console.log(document.referrer);
</script> -->

<body id="edit">
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#070707; width:100%">

    <a type="button" href="http://findnearby.biz/tamilpool/wp-admin" style="color:#fff;
        font-size: 13px;">Back To Dashboard</a>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <div class="ml-auto">
        <a type="submit" style="color:#fff;
               font-size: 13px;">Logout</a>

      </div>

    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center" style="margin-top:5%;" id="success">
      <div class="col-md-10">
        <div class="card">

          <?php include('includes/card-header.inc.php') ?>


          <div class="card-body" style="background-color:#eae7e7;">
            <div style="margin: auto;width: 60%;">
              <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
            </div>

            <form method="POST" action="update_activity.php" id="fupForm" name="form1">

              <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

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

              <div class="form-group row">
                <label class="col-md-3 readactivity">שם הפעילות</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="activity" value="<?php echo $result['activity']; ?>" id="activity">
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

                      <img id="dynamic_activity_image" src="<?php echo $result['activity_image']; ?>" alt="Activity image preview" style="max-width: 100%; margin-top: 10px; display: none;" />
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">מספר חזרה</label>
                <div class="col-md-3">
                  <select type="select" class="form-control" name="reperation" value="" id="reperation">
                    <option <?php if ($result['reperation'] == 1) echo "selected"; ?> value="1">1</option>
                    <option <?php if ($result['reperation'] == 2) echo "selected"; ?> value="2">2</option>
                    <option <?php if ($result['reperation'] == 3) echo "selected"; ?> value="3">3</option>
                    <option <?php if ($result['reperation'] == 4) echo "selected"; ?> value="4">4</option>
                    <option <?php if ($result['reperation'] == 5) echo "selected"; ?> value="5">5</option>
                  </select>
                </div>

                <label class="col-md-3 readactivity">מספר ספוט קבוצתי</label>
                <div class="col-md-3">
                  <select type="select" class="form-control" name="groupspot" value="" id="groupspot">
                    <option <?php if ($result['groupspot'] == 1) echo "selected"; ?> value="1">1</option>
                    <option <?php if ($result['groupspot'] == 2) echo "selected"; ?> value="2">2</option>
                    <option <?php if ($result['groupspot'] == 3) echo "selected"; ?> value="3">3</option>
                    <option <?php if ($result['groupspot'] == 4) echo "selected"; ?> value="4">4</option>
                    <option <?php if ($result['groupspot'] == 5) echo "selected"; ?> value="5">5</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">הזן פרטים</label>
                <div class="col-md-9">
                  <textarea type="textarea" class="form-control" name="msg" id="msg"><?php echo $result['msg']; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">תגובה</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="comment" id="comment"><?php echo $result['comment']; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">אודות הקורס</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="about_course" id="about_course"><?php echo $result['about_course']; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">תאריך התחלה</label>
                <div class="col-md-3">
                  <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo $result['start_date']; ?>" />
                </div>

                <label class="col-md-3 readactivity">תאריך סיום</label>
                <div class="col-md-3">
                  <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo $result['end_date']; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">מַדְרִיך</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="instructor" id="instructor" value="<?php echo $result['instructor']; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">מחיר</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" name="price" id="price" value="<?php echo $result['price']; ?>" />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4" style="margin-left:25%;">
                  <button type="submit" id="" class="blue-btn-next" style="float:left;">עדכון</button>
                </div>
              </div>

            </form>

            <div id="activityblock">
              <!-- <form method="POST" action="" id="fupFormtable" name="form2" > -->

              <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <!-- <th>Start Date</th> -->
                        <!-- <th>End Date</th> -->
                        <th>יְוֹם</th>
                        <th>שעת התחלה</th>
                        <th>זמן סיום</th>
                        <!-- <th>Total Hours</th> -->
                        <th></th>
                      </tr>
                      <tbody class="input_fields_container_part">


                        <?php
                        //include 'database.php';
                        if ($_GET) {
                          $id = $_GET['id'];
                          $sql = mysqli_query($connect, "select * from activity  WHERE employee_id='$id'");
                          $rows = array();


                          //   // $rows[] = $r;
                          // }
                          // echo ($rows);
                        }
                        ?>



                        <?php while ($r = mysqli_fetch_assoc($sql)) { ?>
                          <form method="post" action="update_activitydetails.php">
                            <tr>

                              <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                              <input type="hidden" name="employee_id" value="<?php echo $r['employee_id']; ?>">
                              <!-- <td>
                                <input type="date" class="form-control start_date " name="start_date" id="start_date" placeholder="start date" value="<?php echo $r['start_date']; ?>"></td> -->
                              <!--<td>
                       <input type="date" class="form-control start_date " name="end_date" id="start_date" placeholder="End date" value="<?php echo $r['start_date']; ?>"></td> -->


                              <td><input type="text" class="form-control" name="day" id="day" placeholder="רביעי - 28 אפריל 2021" value="<?php echo $r['day']; ?>"></td>

                              <td><input type="time" class="form-control" name="start_time" id="start_time" placeholder="start Time" value="<?php echo $r['start_time']; ?>"></td>
                              <td><input type="time" class="form-control" name="end_time" id="end_time" placeholder="End Time" value="<?php echo $r['end_time']; ?>"></td>


                              <!-- <input type=" hidden" class="form-control" name="employee_id" id="key" value=""> -->
                              <!-- <td class=""><button type="button" class="btn btn-danger delete-row" style="padding: 0; background: transparent; color: red; border: 0;"><i class="fa fa-trash" aria-hidden="true"></i></button></td> -->
                              <td class=""><button type="submit" class="btn btn-info">עדכון</button></td>
                            </tr>
                          </form>
                        <?php } ?>



                      </tbody>


                    </table>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-8" id="new_chqs">
                            <button class="blue-btn-previous add_more_button" style="margin-left:49%; margin-bottom:10px;">Add More Fields</button>
                            </div> -->



              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4" style="margin-left:25%;">
                  <!-- <button type="button" id="butsavetable" class="blue-btn-next">Update
                                  </button> -->


                </div>
              </div>
              <!-- </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php //include 'js.php'; 
?>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
  $(document).on("click", ".delete-row", function(e) { //user click on remove text links
    e.preventDefault();
    $(this).parent().parent().remove();
    x--;
  })
</script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
    var max_fields_limit      = 20;
    var x = 3;




    $('.add_more_button').click(function(e){
        e.preventDefault();
        if(x < max_fields_limit){
            x++;
            $('.input_fields_container_part').append(`<tr class="remove_field">
                <td>
                  <input type="date" class="form-control" name="start_date[]" id="start_date" placeholder="start date" value=""></td>
              <td>  <input type="time" class="form-control" name="start_time[]" id="start_time" placeholder="start Time" value="22:53:05"></td>
                <td>  <input type="time" class="form-control" name="end_time[]" id="end_time" placeholder="End Time" value="22:53:05"></td>
                      <td><input type="text" class="form-control" name="start_houre[]" id="start_houre" placeholder="hrs:mins:sec" value=""></td>
               <td><button type="button" class="btn btn-danger delete-row" style="padding: 0; background: transparent; color: red; border: 0;"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
              </tr>`); //add input field
        }
    });
    $(document).on("click",".delete-row", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent().parent().remove(); x--;
    })

});
</script> -->