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
          <h4>Item Summary</h4>
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
          $sql = 'SELECT * FROM `product_unit`';
          $send = mysqli_query($conn , $sql);
      ?> 
<!-- Table Content HTML Code Start -->
      <?php if(isset($Deletemsg)){ echo $Deletemsg; } ?>
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th>Sl No.</th>
            <th>Unit Name</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php while($data = mysqli_fetch_assoc($send)){ ?>
          <tr>
            <td> <?php echo $data['id'];?></td>
            <td><?php echo $data['unit_name']; ?></td>
            <td>
            <?php
              if($data['unit_status'] == 0){
                echo '<span class="badge badge-danger text-white">Inactive</span>';    
              }
              else if($data['unit_status'] == 1){
                echo '<span class="badge badge-success text-white">Active</span>';    
              }
            ?>
            </td>
            <td>
              <a href="items.php?status=updateunit&id=<?php echo $data['id']?>" class="btn btn-success">Update</a>
              <a href="items.php?status=deleteunit&id=<?php echo $data['id']?>" onclick="confirm('Are you sure want to delete this data?')" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>

<!-- Table Content HTML Code Start -->
      <?php
        }
        else if($_GET['status'] == 'additem'){

      ?>
<!-- Add User HTML Code Start-->

<?php  
  if(isset($_POST['addUnit'])){
    $name         = $_POST['name'];
    $status       = $_POST['status'];
    // echo $name . ' ' . $status ;
    $sql = "INSERT INTO `product_unit` (`unit_name` , `unit_status`) VALUES ('$name' , '$status')";
    if($send = mysqli_query($conn,$sql)){
      $msg = "Unit Added Successfully";
      header('location: items.php?status=manage');
    }
    else {
      $msg = "Erro Adding Units ".mysqli_error($conn);
    }
  }
?>
<h1>Add Units For Material</h1>
        <div class="row">
          <div class="col-lg-6">
              <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($msg)){ echo $msg; } ?>
              <div class="form-group">
                <label for="name">Unit Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="status">Select Status</label>
                <!-- <input type="text" name="phone" id="" class="form-control" placeholder=""> -->
                <select name="status" id="" class="form-control" required>
                  <option value="0" >Inactive</option>
                  <option value="1" >Active</option>
                </select>
              </div>
            <div class="form-group">
                <!-- <label for="updateBtn"> </label> -->
                <input type="submit" name="addUnit" id="" class="form-control btn btn-info" placeholder="">
            </div>
          </form>
        </div>
<!-- Add User HTML Code End-->
          <?php
        }else if(isset($_GET['status']) && $_GET['status'] == 'deleteunit' && isset($_GET['id'])){
          $id = $_GET['id'];
          $sql = "DELETE FROM `product_unit` WHERE `id` = '$id'";
          if($send = mysqli_query($conn, $sql)){
            header('location: items.php?status=manage');
          }
        }
        else if($_GET['status'] == 'updateunit'){
        ?>
        <!-- Update User HTML Code Start -->
        <?php 
        
        if(isset($_GET['status']) && $_GET['status'] == 'updateunit'){
          $id = $_GET['id'];
          $sql = "SELECT * FROM `product_unit` WHERE `id` = '$id'";
          $send = mysqli_query($conn , $sql);
          $data = mysqli_fetch_assoc($send);

          if(isset($_POST['updateBtn'])){
            $id           = $_POST['id'];
            $name         = $_POST['name'];
            $status       = $_POST['status'];
            // echo $id ." ".$name." ".$status;
            $sql = "UPDATE `product_unit` SET `unit_name` = '$name' , `unit_status` = '$status' WHERE `id` = '$id'";
          
            if($send = mysqli_query($conn, $sql)){
              $msg = "Unit Info Updated successfully";
              header('location: items.php?status=manage');
            }
            else{
              $msg = "Error updating".mysqli_error($conn);
            }
          }

        } 

        else {
          #error msg for showing data
        }
        ?>
        <h1>Update Unit Section</h1>
        <div class="row">
        <div class="col-lg-6">
              <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($msg)){ echo $msg; } ?>
              <input type="hidden" name="id" id="" value="<?php echo $data['id']; ?>">
              <div class="form-group">
                <label for="name">Unit Name</label>
                <input type="text" name="name" value="<?php echo $data['unit_name']; ?>" id="" class="form-control" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="status">Select Status</label>
                <!-- <input type="text" name="phone" id="" class="form-control" placeholder=""> -->
                <select name="status" id="" class="form-control" required>
                  <option value="0" <?php if($data['unit_status'] == 0){ echo "SELECTED"; } ?> >Inactive</option>
                  <option value="1" <?php if($data['unit_status'] == 1){ echo "SELECTED"; } ?> >Active</option>
                </select>
              </div>
            <div class="form-group">
                <!-- <label for="updateBtn"> </label> -->
                <input type="submit" name="updateBtn" id="" class="form-control btn btn-info" placeholder="">
            </div>
          </form>
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