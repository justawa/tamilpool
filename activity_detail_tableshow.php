<html>
<?php
include 'database.php';



  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_comment'])){
    $id = mysqli_real_escape_string($connect, $_POST['row_id']);
    $comment = mysqli_real_escape_string($connect, $_POST['comment']);

    $sql_update_comment = "update `activity_register` set `comment`='$comment' where `id` = $id";
    $result = mysqli_query($connect, $sql_update_comment);

    if($result){
        echo "<script>alert('Comment updated successfully')</script>";
    } else {
        echo "<script>alert('Failed to update comment')</script>";
    }
  }

  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_payment'])){
    $id = mysqli_real_escape_string($connect, $_POST['row_id']);
    $status = 1;

    $sql_update_payment_status = "update `activity_register` set `payment_status`='$status' where `id` = $id";
    $result = mysqli_query($connect, $sql_update_payment_status);

    if($result){
        echo "<script>alert('Payment updated successfully')</script>";
    } else {
        echo "<script>alert('Failed to update payment')</script>";
    }
  }

  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_activity_register'])){
    $id = mysqli_real_escape_string($connect, $_POST['row_id']);
    $activity_id = mysqli_real_escape_string($connect, $_POST['activity_id']);
    $status = 1;

    $sql_delete = "delete from `activity_register` where `id` = $id";
    $result_delete = mysqli_query($connect, $sql_delete);

    $result_update = null;
    if($result_delete){
      $sql_update = "update `activities` set `groupspot` = groupspot + 1 where `id` = $activity_id";
      $result_update = mysqli_query($connect, $sql_update);
    }

    if($result_update){
        echo "<script>alert('activity deleted successfully')</script>";
    } else {
        echo "<script>alert('Failed to delete activity')</script>";
    }
  }

$sort_by="id desc";
if(isset($_GET['sort_by'])) {
    $sort_by=$_GET['sort_by'];
}

$sql = mysqli_query($connect, "select activity_register.*, activity_register.comment as remarks, activity_register.id as registered_id, activities.* from activity_register, activities where activity_register.activity_id = activities.id order by activity_register.$sort_by");
$rows = array();
// while($r = mysqli_fetch_assoc($sql)) {
//   // $rows[] = $r;
// }
// echo ($rows);
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
      <div class="card" style="border: none">
        <!-- <div class="col-md-8"> -->
        <div class="container">
            <form class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sort By</label>
                        <select name="sort_by" class="form-control">
                            <option value="id asc" <?php if($sort_by=="id asc") echo 'selected="selected"' ?>>Default</option>
                            <option value="first_name asc" <?php if($sort_by=="first_name asc") echo 'selected="selected"' ?>>FirstName Asc</option>
                            <option value="first_name desc" <?php if($sort_by=="first_name desc") echo 'selected="selected"' ?>>FirstName Desc</option>
                            <option value="last_name asc" <?php if($sort_by=="last_name asc") echo 'selected="selected"' ?>>LastName Asc</option>
                            <option value="last_name desc" <?php if($sort_by=="last_name desc") echo 'selected="selected"' ?>>LastName Desc</option>
                            <option value="date_of_signin asc" <?php if($sort_by=="date_of_signin asc") echo 'selected="selected"' ?>>Date Asc</option>
                            <option value="date_of_signin desc" <?php if($sort_by=="date_of_signin desc") echo 'selected="selected"' ?>>Date Desc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <?php include('includes/card-header.inc.php') ?>
        <table class="table table-condensed">

          <tr>
            <th>S.No.</th>
            <th>קטגוריה</th>
            <th>שם הפעילות</th>
            <th>תאריך התחלה</th>
            <th>תאריך סיום</th>
            <th>שעת התחלה - זמן סיום</th>
            <th>תַאֲרִיך</th>
            <th>מחיר</th>
            <th>מַדְרִיך</th>
            <th>שֵׁם</th>
            <th>אימייל</th>
            <th>מספר טלפון</th>
            <th>גיל </th>
            <!-- <th>Aggrement</th> -->
            <!-- <th>Date of sign in Agreement</th> -->
            <th>תַשְׁלוּם</th>
            <th>הערות</th>
            <th>פעולה</th>
          </tr>
          <?php
          $count = 0;
          while ($r = mysqli_fetch_assoc($sql)) { 
            $sql_get_activity = "select * from `activity` where `employee_id` = {$r['id']}";

            $result = mysqli_query($connect, $sql_get_activity);
          ?>
            <tr>
              <td><?php echo ++$count; ?></td>
              <td>
                <?php
                  $sql_get_category = "select * from `category` where `id` = {$r['category_id']}";

                  $result_category = mysqli_query($connect, $sql_get_category);
                  $category = mysqli_fetch_assoc($result_category);

                  echo $category['name'];
                ?>
              </td>
              <td><?php echo $r['activity']; ?></td>
              <td><?php echo $r['start_date']; ?></td>
              <td><?php echo $r['end_date']; ?></td>
              <td>
                <?php
                  while($activity = mysqli_fetch_assoc($result)){
                    echo $activity['day'] . " => " . $activity['start_time'] . ' - ' . $activity['end_time'] . "<br/>";
                  }
                ?>
              </td>
              <td><?php echo $r['date_of_signin']; ?></td>
              <td><?php echo $r['price']; ?></td>
              <td><?php echo $r['instructor']; ?></td>
              <td><?php echo $r['first_name'] . ' ' . $r['last_name']; ?></td>
              <td><?php echo $r['email']; ?></td>
              <td><?php echo $r['phone']; ?></td>
              <td><?php echo $r['zip_code']; ?></td>
              <td><?php
                if($r['payment_type'] == 'online'){
                  if($r['payment_status'] == 1){
                    echo "Online";
                  } else {
                    echo "NA";
                  }
                } else {
                  echo "Offline";
                }
              ?></td>
              <td>
                <form method="post">
                  <input type="hidden" name="row_id" value="<?=$r['registered_id']?>" />
                  <div class="form-group">
                  <textarea name="comment"><?php echo $r['remarks']; ?></textarea>
                  </div>
                  <button type="submit" name="update_comment" class="btn btn-primary btn-block">עדכון</button>
                </form>
              </td>
              <td>
                <?php if( $r['payment_type'] == 'offline') { ?>
                <?php if( $r['payment_status'] == 0 ){ ?>
                <form method="POST">
                  <input type="hidden" name="row_id" value="<?=$r['registered_id']?>" />
                  <button type="submit" name="update_payment" class="btn btn-primary btn-block">סמן בתשלום</button>
                </form>
                <?php } else {
                  echo "שולם";
                } ?>
                <?php } ?>
              </td>
              <td>
                <?php if( $r['payment_type'] == 'offline') { ?>
                  <form method="post">
                  <input type="hidden" name="row_id" value="<?=$r['registered_id']?>" />
                  <input type="hidden" name="activity_id" value="<?=$r['id']?>" />
                  <button type="submit" name="delete_activity_register" class="btn btn-danger">Delete</button>
                  </form>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>

        </table>
        <!-- </div> -->
      </div>
    </div>
  </div>
</body>

</html>