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
      <h4>Inventory Management</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <!-- br-pagebody -->
  <div class="br-pagebody">

    <?php if (isset($_GET['status'])) {
      $status = $_GET['status'];
    } else {
      $status = 'manage';
    }
    ?>

    <?php

    if ($_GET['status'] == 'manage') {
      $sql = 'SELECT * FROM `production_history`';
      $send = mysqli_query($conn, $sql);



    ?>
      <!-- Table Content HTML Code Start -->
      <?php if (isset($Deletemsg)) {
        echo $Deletemsg;
      } ?>
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th>Sl No.</th>
            <th>Naterial Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Current STOCK</th>
            <th>Date</th>
            <th>Note</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 0; while ($data = mysqli_fetch_assoc($send)) { ?>
            <tr>
              <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['title']; ?></td>
              <td><?php echo $data['quantity']; ?></td>
              <td><?php echo $data['unit_price']." BDT"; ?></td>
              <td><?php 
                    echo $data['quantity']*$data['unit_price']." BDT";
                  ?>
               </td>
               <td> <?php echo $count = $count + $data['quantity']; ?> </td>
              <td><?php echo $data['date']; ?></td>
              <td><?php echo $data['note']; ?></td>
              <td>
                <a href="inventory.php?status=updateInventory&id=<?php echo $data['id'] ?>" class="btn btn-success">Update</a>
                <a href="inventory.php?status=deleteInventory&id=<?php echo $data['id'] ?>" onclick="confirm('Are you sure want to delete this data?')" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <!-- Table Content HTML Code Start -->
    <?php
    } else if ($_GET['status'] == 'addToInventory') {

    ?>
      <!-- Add User HTML Code Start-->

      <?php
      if (isset($_POST['addInventory'])) {
        $name       = $_POST['name'];
        $product_id = $_POST['product_id'];
        $quantity   = $_POST['quantity'];
        $price      = $_POST['price'];
        $date       = $_POST['date'];
        $note       = $_POST['note'];
        // echo $name . ' ' . $status ;
        $sql = "INSERT INTO `production_history` (`title` , `product_id` ,`quantity` , `unit_price` , `date`  , `note`) VALUES ('$name' , '$product_id' ,'$quantity' , '$price' , '$date' , '$note')";
        if ($send = mysqli_query($conn, $sql)) {
          $msg = "Unit Added Successfully";
          header('location: inventory.php?status=manage');
        } else {
          $msg = "Erro Adding Units " . mysqli_error($conn);
        }
      }
      ?>
      <h1>Add Some Inventory</h1>
      <div class="row">
        <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($msg)) {
              echo $msg;
            } ?>
            <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" required>
              <select name="product_id" id="" class="form-control mt-2">
                  <option value="1">Bricks</option>
                  <option value="2">Pickets</option>
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="price">Per Unit Prize</label>
              <input type="text" name="price" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="date">Production Date</label>
              <input type="date" name="date" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              <input type="text" name="note" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <!-- <label for="updateBtn"> </label> -->
              <input type="submit" name="addInventory" id="" class="form-control btn btn-info" placeholder="">
            </div>
          </form>
        </div>
      </div>
      <!-- Add User HTML Code End-->
    <?php
    } else if (isset($_GET['status']) && $_GET['status'] == 'deleteInventory' && isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "DELETE FROM `production_history` WHERE `id` = '$id'";
      if ($send = mysqli_query($conn, $sql)) {
        header('location: inventory.php?status=manage');
      } else {
        echo mysqli_error($conn);
      }
    } else if ($_GET['status'] == 'updateInventory') {
    ?>
      <!-- Update User HTML Code Start -->
      <?php

      if (isset($_GET['status']) && $_GET['status'] == 'updateInventory') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `production_history` WHERE `id` = '$id'";
        $send = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($send);

        if (isset($_POST['upInventory'])) {
          $id       = $_POST['id'];
          $name       = $_POST['name'];
          $quantity   = $_POST['quantity'];
          $price      = $_POST['price'];
          $date       = $_POST['date'];
          $note       = $_POST['note'];
          // echo $id ." ".$name." ".$status;
          $sql = "UPDATE `production_history` SET `title` = '$name' , `quantity` = '$quantity' , `unit_price` = '$price' , `date` = '$date' , `note` ='$note' WHERE `id` = '$id'";

          if ($send = mysqli_query($conn, $sql)) {
            $msg = "Purchase Info Updated successfully";
            header('location: inventory.php?status=manage');
          } else {
            $msg = "Error updating" . mysqli_error($conn);
          }
        }
      } else {
        #error msg for showing data
      }
      ?>
      <h1>Update Inventory</h1>
      <div class="row">
      <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($msg)) {
              echo $msg;
            } ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" name="name" value="<?php echo $data['title']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="price">Per Unit Prize</label>
              <input type="text" name="price" value="<?php echo $data['unit_price']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="date">Production Date</label>
              <input type="date" name="date" value="<?php echo $data['date']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              <input type="text" name="note" value="<?php echo $data['note']; ?>" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <!-- <label for="updateBtn"> </label> -->
              <input type="submit" name="upInventory" id="" class="form-control btn btn-info" placeholder="">
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