<html>
<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_activity_status'])) {
  $id = $_POST['id'];
  // echo ($id);
  $status = $_POST['status'];


  $sql = mysqli_query($connect, "UPDATE activities SET status='$status' WHERE id=$id");
}



// $sql = mysqli_query($connect,"select msg from employee where id=$id");
// $sql = mysqli_query($connect, "SELECT e.activity,e.id, e.groupspot, e.reperation, e.status ,e.end_date, e.start_date, a.start_time, a.end_time FROM `activities` AS e INNER JOIN `activity` AS a ON e.id = a.employee_id ");
// $rows = array();

$sql = mysqli_query($connect, "select * from activities order by id desc ");


?>


<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="styless.css">
<link rel="stylesheet" type="text/css" href="form.css">


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


  <div class="col-md-12">
    <div class="row justify-content-center" style="margin-top:5%; margin-bottom:3%;">
      <div class="card">
        <!-- <div class="card-header" style="background-color:#00477A; ">
          <div class="dropdown" style="  border-right: 1px solid #fff;
             display: inline;
             padding: 10px 30px;
             float: left;">
            <button class="dropbtn">Activity</button>
            <div class="dropdown-content">
              <a href="admin.php">create Activity</a>
              <a href="view_activity.php">View Activity</a>

            </div>
          </div>

          <div class="dropdown" style="  border-right: 1px solid #fff;
         display: inline;
         padding: 10px 30px;
         float: left;">
            <a href="activity_detail_tableshow.php" type="button" class="dropbtn">User</a>

          </div>
        </div> -->
        <?php include('includes/card-header.inc.php') ?>
        <!-- <div class="col-md-8"> -->
        <table style="margin-top:2%;">

          <tr>
            <th>S.No.</th>
            <th>Name</th>
            <th></th>
          </tr>

          <?php
          $count = 0;
          while ($r = mysqli_fetch_assoc($sql)) { ?>
            <tr>
              <td><?php echo ++$count; ?></td>
              <td><?php echo $r['name']; ?></td>
              <td><a href="edit-category.php?category_id=<?php echo $r['id']; ?>" type="button" class="btn btn-info">Edit</a>
            </tr>
          <?php } ?>

        </table>
        <!-- </div> -->
      </div>
    </div>
  </div>
</body>

</html>