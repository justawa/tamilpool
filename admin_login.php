<?php
  session_start();
  if(isset($_SESSION['admin_login'])){
      header('location: admin.php'); 
  }
  include 'database.php';
?>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from `admins` where `email` = '$email' and password = '$password'";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['admin_login'] = true;
          $_SESSION['admin_id'] = $row['id'];
          echo "<script>alert('Login Successful'); window.location.href='admin.php';</script>";
        } else {
          echo "<script>alert('Invalid email or password');</script>";
        }
    }
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="jumbotron">
  <form method="post">

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>
</div>