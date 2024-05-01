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
      <h4>Item Purchase Summary</h4>
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
      $sql = 'SELECT * FROM `purchase_material` ORDER BY `purchase_date` DESC';
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
            <th>Cost</th>
            <th>Material Purchase Date</th>
            <th>Note</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_assoc($send)) { ?>
            <tr>
              <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['item_name']; ?></td>
              <td><?php
                  $unitId = $data['unit_id'];
                  $Unitsql = "SELECT * FROM `product_unit` WHERE `id` = '$unitId'";
                  $U_send = mysqli_query($conn, $Unitsql);
                  $unit = mysqli_fetch_assoc($U_send);
                  echo $data['quantity'] . " " . $unit['unit_name'];
                  ?>
              </td>
              <td><?php echo $data['unit_price']; ?></td>
              <td><?php echo $data['quantity'] * $data['unit_price'] . " BDT"; ?></td>
              <td><?php echo $data['purchase_date']; ?></td>
              <td><?php echo $data['note']; ?></td>
              <td>
                <a href="purchase.php?status=updatepurchase&id=<?php echo $data['id'] ?>" class="btn btn-success">Update</a>
                <a href="purchase.php?status=deletepurchase&id=<?php echo $data['id'] ?>" onclick="confirm('Are you sure want to delete this data?')" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <!-- Table Content HTML Code Start -->
    <?php
    } else if ($_GET['status'] == 'addPurchase') {

    ?>
      <!-- Add User HTML Code Start-->

      <?php
      if (isset($_POST['addPurchase'])) {
        $name       = $_POST['name'];
        $quantity   = $_POST['quantity'];
        $unit_id    = $_POST['unit_name'];
        $price      = $_POST['price'];
        $date       = $_POST['date'];
        $note       = $_POST['note'];
        // echo $name . ' ' . $status ;
        $sql = "INSERT INTO `purchase_material` (`item_name` , `quantity` , `unit_id` , `unit_price` , `purchase_date` , `note`) VALUES ('$name' , '$quantity' , '$unit_id' , '$price' , '$date' , '$note')";
        if ($send = mysqli_query($conn, $sql)) {
          $msg = "Unit Added Successfully";
          header('location: purchase.php?status=manage');
        } else {
          $msg = "Erro Adding Units " . mysqli_error($conn);
        }
      }
      ?>
      <h1>Add Material Purchase History</h1>
      <div class="row">
        <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($msg)) {
              echo $msg;
            } ?>
            <div class="form-group">
              <label for="name">Material Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="unit_name">Unit</label>
              <!-- <input type="text" name="unit_name" id="" class="form-control" placeholder="" required> -->
              <select name="unit_name" id="" class="form-control">
                <?php
                $Unitsql = "SELECT * FROM `product_unit` WHERE `unit_status` = 1";
                $U_send = mysqli_query($conn, $Unitsql);
                while ($unit = mysqli_fetch_assoc($U_send)) { ?>
                  <option value="<?php echo $unit['id']; ?>"> <?php echo $unit['unit_name']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="price">Per Unit Prize</label>
              <input type="text" name="price" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="date">Purchase Date</label>
              <input type="date" name="date" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              <input type="text" name="note" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <!-- <label for="updateBtn"> </label> -->
              <input type="submit" name="addPurchase" id="" class="form-control btn btn-info" placeholder="">
            </div>
          </form>
        </div>
      </div>
      <!-- Add User HTML Code End-->
    <?php
    } else if (isset($_GET['status']) && $_GET['status'] == 'deletepurchase' && isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "DELETE FROM `purchase_material` WHERE `id` = '$id'";
      if ($send = mysqli_query($conn, $sql)) {
        header('location: purchase.php?status=manage');
      } else {
        echo mysqli_error($conn);
      }
    } else if ($_GET['status'] == 'updatepurchase') {
    ?>
      <!-- Update User HTML Code Start -->
      <?php

      if (isset($_GET['status']) && $_GET['status'] == 'updatepurchase') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `purchase_material` WHERE `id` = '$id'";
        $send = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($send);

        if (isset($_POST['updatePurchase'])) {
          $name       = $_POST['name'];
          $quantity   = $_POST['quantity'];
          $unit_id    = $_POST['unit_name'];
          $price      = $_POST['price'];
          $date       = $_POST['date'];
          $note       = $_POST['note'];
            // echo $id ." ".$name." ".$status;
          $sql = "UPDATE `purchase_material` SET `item_name` = '$name' , `quantity` = '$quantity' ,`unit_id` = '$unit_id', `unit_price` = '$price' , `purchase_date` = '$date' , `note` ='$note' WHERE `id` = '$id'";

          if ($send = mysqli_query($conn, $sql)) {
            $msg = "Purchase Info Updated successfully";
            header('location: purchase.php?status=manage');
          } else {
            $msg = "Error updating" . mysqli_error($conn);
          }
        }
      } else {
        #error msg for showing data
      }
      ?>
      <h1>Update Purchase Section</h1>
      <div class="row">
        <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($msg)) {
              echo $msg;
            } ?>
            <div class="form-group">
              <label for="name">Material Name</label>
              <input type="text" name="name" value="<?php echo $data['item_name']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="unit_name">Unit</label>
              <!-- <input type="text" name="unit_name" id="" class="form-control" placeholder="" required> -->
              <select name="unit_name" id="" class="form-control">
                <?php
                $Unitsql = "SELECT * FROM `product_unit` WHERE `unit_status` = 1";
                $U_send = mysqli_query($conn, $Unitsql);
                while ($unit = mysqli_fetch_assoc($U_send)) { ?>
                  <option value="<?php echo $unit['id']; ?>" <?php if ($unit['id'] == $data['unit_id']) {
                                                                echo "SELECTED";
                                                              } ?>> <?php echo $unit['unit_name']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="price">Per Unit Prize</label>
              <input type="text" name="price" value="<?php echo $data['unit_price']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="date">Purchase Date</label>
              <input type="date" name="date" value="<?php echo $data['purchase_date']; ?>" id="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              <input type="text" name="note" value="<?php echo $data['note']; ?>" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <!-- <label for="updateBtn"> </label> -->
              <input type="submit" name="updatePurchase" id="" class="form-control btn btn-info" placeholder="">
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