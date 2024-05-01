<?php include('../../admin/inc/dbconnection.php'); ?>
<?php  
  if(isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hassedpass = sha1($password);
    // $msg = $email . ' ' . $hassedpass;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $get_user = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($get_user);
      if($data['status'] == 0 || $data['role'] == 1 || $data['role'] == 2){
        $msg = "Sorry Youre Not Eligable To Log In This Admin Panel, Please Contact With Your Admin!";
      }
      else{
        if($data['password'] == $hassedpass){
          session_start();
          $_SESSION['id'] = $data['id'];
          $_SESSION['user_name'] = $data['name'];
          $_SESSION['user_email'] = $data['email'];
          header('location: users.php?status=manage');
          // $msg = 'Credential Matched & session id is '. $SESSION['id'];
        }
        else {
          $msg = 'Your Login Credintails Are Invalid';
        }
      }   
        

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Inventory Plus</title>

    <!-- vendor css -->
    <link href="../../admin/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../../admin/assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../../admin/assets/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal"> <img src="https://www.kindpng.com/picc/m/678-6782690_thumb-image-lego-brick-vector-hd-png-download.png" alt="" srcset="" style="width: 300px; height: 300px; border-radius: 50%"> </div>
        <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div>
      <form action="" method="POST">
        <?php 
        if(isset($msg)){
          echo $msg;
        }
        ?>
        <div class="form-group">
          <input name="email" type="email" class="form-control" placeholder="Enter your email">
        </div><!-- form-group -->
        <div class="form-group">
          <input name="password" type="password" class="form-control" placeholder="Enter your password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <input type="submit" name="loginBtn" class="btn btn-info btn-block" value="Sign In">
        <!-- <button type="submit" class="btn btn-info btn-block">Sign In</button> -->
        </form>
        <div class="mg-t-60 tx-center">Not yet a member? <a href="registration.php" class="tx-info">Sign Up</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="../../admin/assets/lib/jquery/jquery.min.js"></script>
    <script src="../../admin/assets/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="../../admin/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
