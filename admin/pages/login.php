<?php include('../inc/dbconnection.php'); ?>
<?php  
  if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hassedpass = sha1($password);
    // $msg = $email . ' ' . $hassedpass;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $get_user = mysqli_query($conn,$sql);
    // $data = mysqli_fetch_assoc($get_user);
    // while($data = mysqli_fetch_assoc($get_user)){
    //   if($data['email'] == $email){

    //     if($data['status'] == 0 || $data['role'] == 1 || $data['role'] == 2){
    //       $msg = "Sorry Youre Not Eligable To Log In This Admin Panel, Please Contact With Your Admin!";
    //     }
    //     else{

    //       if($data['password'] == $hassedpass){
    //         session_start();
    //         $_SESSION['id'] = $data['id'];
    //         $_SESSION['user_name'] = $data['name'];
    //         $_SESSION['user_email'] = $data['email'];
    //         header('location: dashboard.php');
    //         // $msg = 'Credential Matched & session id is '. $SESSION['id'];
    //       }
    //       else {
    //         $msg = 'Your Login Credintails Are Invalid';
    //       }
    //     }
      
    //   }
    //   else{
    //     alert('No User Found With This Email, Please Enter A Valid One');
    //   }
    // }

    if(($row = mysqli_num_rows($get_user)) == 0){
      $msg = "No User's Found, Please Enter A Valid One";
    }else{
      // $get_user = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($get_user);
      if($data['role'] == 1 || $data['role'] == 2 || $data['status'] == 0 ){
        $msg = "You're Not Eligeble To Log In This Admin Panel";
      }else{
        if($data['password'] == $hassedpass){
          session_start();
          $_SESSION['id'] = $data['id'];
          $_SESSION['user_name'] = $data['name'];
          $_SESSION['user_email'] = $data['email'];
          header('location: dashboard.php');
        }else{
          $msg = "You've Entered A Wrong Password, Please Try Again!";
        }
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

    <title>Inventory Plus</title>
    <link rel="shortcut icon" href="https://mehedihasannayem.com/favicon.png" type="image/x-icon">


    <!-- vendor css -->
    <link href="../assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bracket.css">
  </head>

  <body>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hello Visitor!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p> This is a test project made with raw PHP & Mysql database. </p> 
          <p> To Login Super Admin account use the folowing credentials -   </p> <br>
          <ul>
            <li>Email : nayemmh66@gmail.com</li>
            <li>Password : nayemmh66@gmail.com</li>
          </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->


    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v" id="main">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Inventory <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">A Inventory Management System for Brick manufacturing company</div>
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



    <script>
            window.onload = () => {            
          };   
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../assets/lib/jquery/jquery.min.js"></script>
    <script src="../assets/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="../assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
