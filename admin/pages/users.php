<?php include('../inc/header.php'); ?>
    <!-- ########## START: LEFT PANEL ########## -->
<?php include('../inc/leftmenu.php'); ?>
    <!-- ########## END: LEFT PANEL ########## -->
    <!-- ########## START: HEAD PANEL ########## -->
<?php include('../inc/topbar.php'); ?>
    <!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->
    <!-- ########## START: RIGHT PANEL ########## -->
<?php include('../inc/rightbar.php'); ?>
    <!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Dashboard</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>
        <!-- br-pagebody -->
    <div class="br-pagebody">

      <?php if(isset($_GET['status'])){ 
        $status = $_GET['status'];
      } 
      else { 
        $status = 'manage';
      }
      ?>

      <?php 
      
        if($_GET['status'] == 'manage'){
          $sql = 'SELECT * FROM `users`';
          $send = mysqli_query($conn , $sql);
      ?> 
<!-- Table Content HTML Code Start -->
      <?php if(isset($Deletemsg)){ echo $Deletemsg; } ?>
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th>Sl No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Image</th>
            <th>Status</th>
            <th>Join Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php while($data = mysqli_fetch_assoc($send)){ ?>
          <tr>
            <td> <?php echo $data['id'];?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['phone']; ?></td>
            <td><?php echo $data['address']; ?></td>
            <td><?php 
                  if($data['role'] == 0){
                    echo '<span class="badge badge-success">Super Admin</span>';
                  }
                  else if($data['role'] == 1){
                    echo '<span class="badge badge-warning text-white">Accountant</span>'; 
                  }
                  else if($data['role'] == 2){
                    echo '<span class="badge badge-info text-white">Customer</span>'; 
                  }
                ?>
            </td>
            <td>
            <?php
              if(empty($data['image'])){
                  echo "No Image Found!";
              }
              else {
            ?>
                <img src="../assets/ProfileImage/<?php echo $data['image'];?>" alt="" srcset="" style="width: 40px; height: 40px; border-radius: 50%">
            <?php
              }
            ?>
            </td>
            <td>
            <?php
              if($data['status'] == 0){
                echo '<span class="badge badge-danger text-white">Inactive</span>';    
              }
              else if($data['status'] == 1){
                echo '<span class="badge badge-success text-white">Active</span>';    
              }
            ?>
            </td>
            <td><?php echo $data['j_date']; ?></td>
            <td>
              <a href="users.php?status=updateuser&id=<?php echo $data['id']?>" class="btn btn-success">Update</a>
              <a href="users.php?status=deleteuser&id=<?php echo $data['id']?>" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

<!-- Table Content HTML Code Start -->
      <?php
        }
        else if($_GET['status'] == 'adduser'){

      ?>
<!-- Add User HTML Code Start-->

<?php  
  if(isset($_POST['updateBtn'])){
    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $repassword   = $_POST['repassword'];
    $phone        = $_POST['phone'];
    $address      = $_POST['address'];
    $image        = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];
    $role         = $_POST['role'];
    $status       = $_POST['status'];

    // echo $name . ' ' . $email . ' ' . $password . '' . $repassword . ' ' . $phone . ' ' . $address . ' ' . $image. ' ' . $role . ' ' . $status;
    if($password == $repassword){
      $hassedpass = sha1($password);
      if( !empty($image) ){
        $image_name = rand(1,999999999999).$image;
        $sql = "INSERT INTO `users` (`name` , `email`, `password`, `phone`, `address`,`image` , `role` , `status` , `j_date`) VALUES ('$name' , '$email' , '$hassedpass' , '$phone' , '$address' ,'$image_name','$role','$status',now())";
        if($send = mysqli_query($conn , $sql)){
            move_uploaded_file($tmp_name, "../assets/ProfileImage/".$image_name); 
            header("Location: users.php?status=manage");         
        }
        else{
          $msg = "Could not send this query" . mysqli_error($conn);
        }
      }

    }
    else {
      $msg = "Password Didn't Matched! Try Again";
    }
  }
?>
<h1>Add User Section</h1>
        <div class="row">
          <div class="col-lg-6">
              <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($msg)){ echo $msg; } ?>
              <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="email">User Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="repassword">Confirm Password</label>
                <input type="password" name="repassword" id="" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="">
              </div>
            </div>
          <div class="col-lg-6">
              <div class="form-group">
                <label for="phone">Address</label>
                <input type="text" name="address" id="" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="image">Select Your Image</label>
                <!-- <input type="file" name="image" id="" class="custom-file-input" placeholder="">  -->
                <div class="custom-file">
                  <input type="file" name="image" id="file" class="custom-file-input">
                  <label class="custom-file-label"></label>
                </div>
              </div>
              <div class="form-group">
                <label for="role">Select User Role</label>
                <!-- <input type="text" name="phone" id="" class="form-control" placeholder=""> -->
                <select name="role" id="" class="form-control">
                  <option value="0">Super Admin</option>
                  <option value="1">Accountant</option>
                  <option value="2" SELECTED>Customer</option>
                </select>
              </div>
              <div class="form-group">
                <label for="status">User Status</label>
                <!-- <input type="text" name="address" id="" class="form-control" placeholder=""> -->
                <select name="status" id="" class="form-control">
                  <option value="0">Inactive</option>
                  <option value="1" SELECTED>Active</option>
                </select>
              </div>
              <div class="form-group">
                <label for="updateBtn">By Submitting This Query You'll Be Created A New User For This System !!</label>
                <input type="submit" name="updateBtn" id="" class="form-control btn btn-info" placeholder="">
              </div>
        </form>
          </div>
        </div>
<!-- Add User HTML Code End-->
          <?php
        }else if(isset($_GET['status']) && $_GET['status'] == 'deleteuser' && isset($_GET['id'])){
          $id = $_GET['id'];
          $sql = "DELETE FROM `users` WHERE `id` = '$id'";
          $getImageDataSql = "SELECT * FROM `users` WHERE `id` = '$id'";
          $getImageDataSend = mysqli_query($conn,$getImageDataSql);
          $getImageData = mysqli_fetch_assoc($getImageDataSend);
          if($send = mysqli_query($conn,$sql)){
          unlink("../assets/ProfileImage/".$getImageData['image']);
          header("location: users.php?status=manage");
          $Deletemsg = '<span class="alert alert-danger">Record Deleted Successfully</span>';
          }
          else {
            echo "Error Deleting Record!".mysqli_error($conn);
          }
        }
        else if($_GET['status'] == 'updateuser'){
        ?>
        <!-- Update User HTML Code Start -->
        <?php 
        
        if(isset($_GET['status']) && $_GET['status'] == 'updateuser'){
          $id = $_GET['id'];
          $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
          $send = mysqli_query($conn , $sql);
          $data = mysqli_fetch_assoc($send);

          if(isset($_POST['updateBtn'])){
            $id           = $_POST['id'];
            $name         = $_POST['name'];
            $email        = $_POST['email'];
            $phone        = $_POST['phone'];
            $address      = $_POST['address'];
            $image        = $_FILES['image']['name'];
            $tmp_name     = $_FILES['image']['tmp_name'];
            $role         = $_POST['role'];
            $status       = $_POST['status'];
            if(empty($image)){
              #if Image Field is empty
              $sql = "UPDATE `users` SET  `name` = '$name', `email` = '$email',  `phone`= '$phone', `address` = '$address', `role` = '$role', `status` = '$status' WHERE `id` = '$id '";
              $send = mysqli_query($conn, $sql);
              $msg = "Record Update Successfully Without Image!!";
              header('location: users.php?status=manage');
            }else if(!empty($image)){
              #if Image Field is not empty
              $image_name = rand(1,999999999999).$image;
              $sql = "UPDATE `users` SET  `name` = '$name', `email` = '$email',  `phone`= '$phone', `address` = '$address', `image` = '$image_name' ,`role` = '$role', `status` = '$status' WHERE `id` = '$id '";
              if($send = mysqli_query($conn, $sql)){
                if(!empty($data['image'])){
                    unlink("../assets/ProfileImage/".$data['image']);
                    move_uploaded_file($tmp_name,"../assets/ProfileImage/".$image_name);
                    $msg = "Record Update Successfully With Image!!";
                    header('location: users.php?status=manage');
                }
                else if(empty($data['image'])){
                  move_uploaded_file($tmp_name,"../assets/ProfileImage/".$image_name);
                  $msg = "Record Update Successfully With Image!!";
                  header('location: users.php?status=manage');
                }

              }
            }
          }
          else
          {
            #error msg for update data
          }

        }   
        else {
          #error msg for showing data
        }

        ?>
        <h1>Update User Section</h1>
        <div class="row">
          <div class="col-lg-6">
              <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($msg)){ echo $msg; } ?>
                <input type="hidden" name="id" id="" value="<?php echo $data['id']; ?>" class="form-control">
              <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" id="" value="<?php echo $data['name']; ?>" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="email">User Email</label>
                <input type="text" name="email" id="" value="<?php echo $data['email']; ?>" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="" value="<?php echo $data['phone']; ?>" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="" value="<?php echo $data['address']; ?>" class="form-control" placeholder="">
              </div>
              <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="" value="" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="repassword">Confirm Password</label>
                <input type="password" name="repassword" id="" class="form-control" placeholder="">
              </div> -->

          </div>
          <div class="col-lg-6">
          <div class="form-group">
                <label for="role">Select User Role</label>
                <!-- <input type="text" name="phone" id="" class="form-control" placeholder=""> -->
                <select name="role" id="" class="form-control">
                  <option value="0" <?php if($data['role'] == 0){echo "SELECTED";} ?> >Super Admin</option>
                  <option value="1" <?php if($data['role'] == 1){echo "SELECTED";} ?> >Accountant</option>
                  <option value="2" <?php if($data['role'] == 2){echo "SELECTED";} ?> >Customer</option>
                </select>
              </div>
              <div class="form-group">
                <label for="status">User Status</label>
                <!-- <input type="text" name="address" id="" class="form-control" placeholder=""> -->
                <select name="status" id="" class="form-control">
                  <option value="0" <?php if($data['status'] == 0){echo "SELECTED";} ?>>Inactive</option>
                  <option value="1" <?php if($data['status'] == 1){echo "SELECTED";} ?>>Active</option>
                </select>
              </div>
              <div class="form-group">
              <!-- <img src="../assets/ProfileImage/<?php echo $data['image']; ?>" style="width:40px;height: 40px;" alt="" srcset=""> <br> -->
                <label for="image">Select Your Image</label>
                <!-- <input type="file" name="image" id="" class="custom-file-input" placeholder="">  -->
                <div class="custom-file">
                  <input type="file" name="image" id="file" class="custom-file-input">
                  <label class="custom-file-label"></label>
                </div>
              </div>
              <div class="form-group">
                <label for="name">By Submitting This Query, This User Information Will Be Updated By Given Records .</label>
                <input type="submit" name="updateBtn" id="" class="form-control btn btn-info" placeholder="">
              </div>
        </form>
          </div>
        </div>
        <!-- Update User HTML Code End -->
        <?php
        }
      ?>
    </div>
        <!-- Footer Includes Here -->
        <?php include('../inc/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('../inc/scripts.php'); ?>