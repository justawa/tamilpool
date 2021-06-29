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

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_category'])){
        $category = mysqli_real_escape_string($connect, $_POST['category']);

        $sql_insert_category = "insert into `category` (`name`) values('$category')";
        $result = mysqli_query($connect, $sql_insert_category);

        if($result){
            echo "<script>alert('Category added successfully')</script>";
        } else {
            echo "<script>alert('Failed to add category')</script>";
        }
    }

    if(isset($_GET['category_id'])){
        $category_id = mysqli_real_escape_string($connect, $_GET['category_id']);

        $selected_category = null;

        $sql_get_category = "select * from `category` where `id` = $category_id";
        $result_get_category = mysqli_query($connect, $sql_get_category);

        if(mysqli_num_rows($result_get_category) > 0){
            $selected_category = mysqli_fetch_assoc($result_get_category);
        }
    }
?>

<body>
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

            <form method="POST" action="" id="fupForm" name="form1">

              <div class="form-group row">
                <label class="col-md-3 readactivity">Category Name</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="category" id="category" <?php if($selected_category != null){ echo "value={$selected_category['name']}"; } ?> />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 readactivity">Agreement</label>
                <div class="col-md-9">
                  <textarea type="text" class="form-control" name="agreement" id="agreement" required></textarea>
                </div>
              </div>


                    <button type="submit" name="add_category" id="add-category" class="blue-btn-next">Edit Category</button>

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


<?php include 'js.php'; ?>







<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script>
    $("#form").on("submit", function() {

    })
</script>