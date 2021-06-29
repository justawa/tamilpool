<?php
    session_start();
    if(!isset($_SESSION['admin_login'])){
       header('location: admin_login.php'); 
    }

    include 'database.php';
?>
<!doctype html>
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

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_testimonial'])){
        $testimonial = mysqli_real_escape_string($connect, $_POST['testimonial']);

        $sql_insert_testimonial = "insert into `testimonials` (`testimonial`) values('$testimonial')";
        $result = mysqli_query($connect, $sql_insert_testimonial);

        if($result){
            echo "<script>alert('Testimonial added successfully');</script>";
        } else {
            echo "<script>alert('Failed to add testimonial')</script>";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_testimonial'])){
        $testimonial = mysqli_real_escape_string($connect, $_POST['testimonial']);
        $id = mysqli_real_escape_string($connect, $_POST['id']);

        $sql_insert_testimonial = "update `testimonials` set `testimonial` = '$testimonial' WHERE `id` = $id";
        $result = mysqli_query($connect, $sql_insert_testimonial);

        if($result){
            echo "<script>alert('Testimonial updated successfully'); window.location.href='create-testimonial.php'</script>";
        } else {
            echo "<script>alert('Failed to update testimonial')</script>";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_testi'])){
        $id = mysqli_real_escape_string($connect, $_POST['id']);

        $sql_insert_coupon = "delete from `testimonials` WHERE `id` = $id ";
        $result = mysqli_query($connect, $sql_insert_coupon);

        if($result){
            echo "<script>alert('Testimonial deleted successfully'); window.location.href='create-testimonial.php'</script>";
        } else {
            echo "<script>alert('Failed to delete testimonial')</script>";
        }
    }
?>

<body>
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#070707; width:100%">

    <a type="button" href="admin.php" style="color:#fff;
        font-size: 13px;">חזרה ללוח המחוונים</a>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <div class="ml-auto">
        <a type="submit" style="color:#fff;
               font-size: 13px;">להתנתק</a>

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


                <?php
                  if(isset($_GET['edit']) && $_GET['edit'] && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql_get_testi = "select * from `testimonials` where `id` = $id";
                    $result_get_testi = mysqli_query($connect, $sql_get_testi);
                    
                    if(mysqli_num_rows($result_get_testi) > 0){
                      $row = mysqli_fetch_assoc($result_get_testi);
                    }   
                ?>

                <form method="POST" action="" id="fupForm" name="form1">
                <input type="hidden" name="id" value="<?=$id?>" />
                  <div class="form-group row">
                      <label class="col-md-3 readactivity">תְעוּדַת הוֹקָרָה</label>
                      <div class="col-md-9">
                      <textarea type="text" class="form-control" name="testimonial" id="testimonial"><?= $row['testimonial']?></textarea>
                      </div>
                  </div>
                  <button type="submit" name="edit_testimonial" id="edit-testimonial" class="blue-btn-next">עדכן המלצה</button>
                </form>
                <?php
                    } else {
                ?>

                <form method="POST" action="" id="fupForm" name="form1">
                  <div class="form-group row">
                      <label class="col-md-3 readactivity">תְעוּדַת הוֹקָרָה</label>
                      <div class="col-md-9">
                      <textarea type="text" class="form-control" name="testimonial" id="testimonial"></textarea>
                      </div>
                  </div>
                  <button type="submit" name="add_testimonial" id="add-testimonial" class="blue-btn-next">הוסף המלצה</button>
                </form>

                <?php
                    }
                ?>
              <div style="clear:both"></div>
              <hr/>
              <table class="table">
                <thead>
                  <tr>
                    <th>SNo</th>
                    <th>תְעוּדַת הוֹקָרָה</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_get_testi = "select * from `testimonials` order by id desc";
                  $result_get_testi = mysqli_query($connect, $sql_get_testi);
                  
                  if(mysqli_num_rows($result_get_testi) > 0){
                    $count = 1;
                      while($row = mysqli_fetch_assoc($result_get_testi)) {
                  ?>
                  <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $row['testimonial']?></td>
                    <td>
                      <a href="?edit=true&id=<?=$row['id']?>" class="btn btn-primary">לַעֲרוֹך</a>
                      <form method="post" style="display: inline-block">
                        <input type="hidden" name="id" value="<?=$row['id']?>" />
                        <button type="submit" name="delete_testi" class="btn btn-danger">לִמְחוֹק</button>
                      </form>
                    </td>
                  </tr>
                  <?php }} ?>
                </tbody>
              </table>

        </div>
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


<script src="https://cdn.tiny.cloud/1/258m8nfrpx8iycb6tbmgx6sem5qi7y0dvjqdelaqdjlljaz7/tinymce/5/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector:'textarea.tinymce',
				width: '100%',
				height: 300,
				plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table directionality emoticons template paste"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
		});

		</script>