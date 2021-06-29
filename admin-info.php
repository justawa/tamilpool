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


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_admin'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $id = mysqli_real_escape_string($connect, $_POST['id']);

        $sql_insert_coupon = "UPDATE `admins` SET `email` = '$email', `password` = '$password' WHERE `id` = $id";
        $result = mysqli_query($connect, $sql_insert_coupon);

        if($result){
            echo "<script>alert('Info updated successfully'); window.location.href='admin-info.php'</script>";
        } else {
            echo "<script>alert('Failed to update info')</script>";
        }
    }
?>

<body>
  <?php include('includes/admin-header.inc.php'); ?>

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
                    $id = $_SESSION['admin_id'];
                    $sql_get_testi = "select * from `admins` where `id` = $id";
                    $result_get_testi = mysqli_query($connect, $sql_get_testi);
                    
                    if(mysqli_num_rows($result_get_testi) > 0){
                        $row = mysqli_fetch_assoc($result_get_testi);
                    }
                ?>
                <form method="POST" action="" >
                <input type="hidden" name="id" value="<?=$id?>" />
                <div class="form-group row">
                    <label class="col-md-3 readactivity">אימייל</label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="email" id="email" value="<?=$row['email']?>" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 readactivity">סיסמה</label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="password" id="password" value="<?=$row['password']?>" />
                    </div>
                </div>


                <button type="submit" name="edit_admin" id="edit-admin" class="blue-btn-next">עדכון</button>

                </form>

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