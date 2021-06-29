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

    <a type="button" href="admin.php" style="color:#fff;
       font-size: 13px;">חזרה ללוח המחוונים</a>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <div class="ml-auto">
        <a type="submit" style="color:#fff;
              font-size: 13px;">להתנתק</a>

      </div>



    </div>
  </nav>


  <div class="col-md-12">
    <div class="row justify-content-center" style="margin-top:5%; margin-bottom:3%;">
      <div class="card">
        <?php include('includes/card-header.inc.php') ?>







        <!-- <div class="col-md-8"> -->
        <table style="margin-top:2%;">

          <tr>
            <th>S.No.</th>
            <th>שם הפעילות</th>
            <th>ספוט קבוצתי</th>
            <th>נפרדות</th>
            <th>תאריך התחלה</th>
            <th>תאריך סיום</th>
            <th>שעת התחלה - זמן סיום</th>
            <th></th>



          </tr>

          <?php
            $count = 0;
            while ($r = mysqli_fetch_assoc($sql)) { 
            
            $sql_get_activity = "select * from `activity` where `employee_id` = {$r['id']}";

            $result = mysqli_query($connect, $sql_get_activity);
          ?>
            <tr>
              <td><?php echo ++$count; ?></td>

              <td><?php echo $r['activity']; ?></td>
              <td><?php echo $r['groupspot']; ?></td>
              <td><?php echo $r['reperation']; ?></td>
              <td><?php echo $r['start_date']; ?></td>
              <td><?php echo $r['end_date']; ?></td>
              <td>
                <?php
                  while($activity = mysqli_fetch_assoc($result)){
                    echo $activity['day'] . " => " . $activity['start_time'] . ' - ' . $activity['end_time'] . "<br/>";
                  }
                
                ?>
              </td>
              <td>
                <form method="POST">
                  <input type="hidden" name="status" value="<?php echo $r['status'] == 1 ? 0 : 1 ?>">
                  <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                  <!-- <td><a href="http://findnearby.biz/tamilpool/activity/activity_detail_form.php?id=<?php echo $r['id']; ?>" type="buttton"  class="btn btn-info" >OPEN</a>
    </td> -->
                  <button type="submit" name="change_activity_status" class="btn btn-info"><?php echo  $r['status'] == 1 ? 'Deactivate' : 'Activate' ?>
                  </button>


                </form>
              </td>

              <td><a href="edit_activity.php?id=<?php echo $r['id']; ?>" type="button" class="btn btn-info">לַעֲרוֹך</a>

            </tr>


          <?php } ?>

        </table>
        <!-- </div> -->
      </div>
    </div>
  </div>
</body>

</html>