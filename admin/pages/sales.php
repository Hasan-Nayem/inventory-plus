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
      <h4>Sells Management</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <?php 
      
        if(isset($_GET['status'])){

          if($_GET['status'] == 'manage'){

              $sql = "SELECT * FROM `sells_history`";
              $send = mysqli_query($conn, $sql);
            ?>
    <!-- Sales History Table Start -->
    <table class="table table-stripped text-center">
      <thead>
        <tr>
          <th>Name of The Customer</th>
          <th>Email</th>
          <th>Phone No.</th>
          <th>Address</th>
          <th>Sold Product</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($data = mysqli_fetch_assoc($send)){ ?>
        <tr>
          <td> <?php echo $data['c_name']; ?> </td>
          <td><?php echo $data['c_email']; ?></td>
          <td><?php echo $data['c_phone']; ?></td>
          <td><?php echo $data['c_address']; ?></td>
          <td><?php 
              if($data['product_id'] == 1){
                ?> <span class="badge badge-dark text-white p-2"> Bricks </span> <?php
              }else if($data['product_id'] == 2){
              ?>  <span class="badge badge-info text-white p-2"> Pickets </span> <?php }
              ?>
          </td>
          <td><?php echo $data['quantity']; ?></td>
          <td><?php echo $data['unit_price'] * $data['quantity']; ?></td>
          <td><?php echo $data['date']; ?></td>
          <td>
            <a href="#" class="btn btn-success">Update</a>
            <a href="print.php?id=<?php echo $data['id']; ?>" class="btn btn-warning text-white">Show</a>
            <a href="#" class="btn btn-danger disabled">Delete</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <!-- Sales History Table End -->
    <?php




          }
          else if($_GET['status'] == 'addSalesHistory'){
            ?>
    <!-- Add Sales  -->
    <h4 class="text-center"> Production History At A Glance </h4>
    <div class="row border p-4">
      <div class="col-lg-6">
      <?php
        #for total bricks count 
        $bSql = "SELECT * FROM `sells_history` WHERE `product_id` = 1";
        $bSend = mysqli_query($conn,$bSql);
        $subTotal = 0;
        while($row = mysqli_fetch_array($bSend)){
          $subTotal = $subTotal + $row['quantity'];
        }
          $sql = "SELECT * FROM `production_history` WHERE `product_id` = 1";
          $send = mysqli_query($conn,$sql);
          $total = 0;
          $total_price = 0;
          $count = 0;
          while ($p_data = mysqli_fetch_assoc($send)) {
            $total = $total + $p_data['quantity'];
            $total_price = $total_price + $p_data['unit_price'];
            $count = $count + 1;
          }
          // echo "Total Price : " . $total ." ";
           $bricks_unit_price = $total_price / $count;
      ?>
      
              <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Inventroy Amount</th>
                      <th>Average Unit Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Bricks</td>
                      <td><?php echo $total; ?> PCs</td>
                      <td><?php echo $total_price / $count; ?> BDT</td>
                    </tr>
                    <tr>
                      <td>Total Sold - </td>
                      <td><?php echo  $subTotal; ?> PCs</td>
                    </tr>
                    <tr>
                      <td>Bricks In Inventory- </td>
                      <td> 
                        <?php 
                          if($total < 1000){ ?> 
                            <span class="badge badge-danger text-white py-2"> <?php echo $total - $subTotal;?> PC's</span>
                          <?php
                          }else if($total > 1000){ ?> 
                            <span class="badge badge-success text-white py-2"> <?php echo $total - $subTotal;?> PC's </span> 
                            <?php
                          } 
                        ?>                        
                      </td>
                    </tr>
                  </tbody>
              </table>
      </div>
      <div class="col-lg-6">
      <?php 
        #for total pickets count 
        $PSql = "SELECT * FROM `sells_history` WHERE `product_id` = 2";
        $PSend = mysqli_query($conn,$PSql);
        $subTotal = 0;
        while($row = mysqli_fetch_array($PSend)){
          $subTotal = $subTotal + $row['quantity'];
        }

          $sql = "SELECT * FROM `production_history` WHERE `product_id` = 2";
          $send = mysqli_query($conn,$sql);
          $total = 0;
          $total_price = 0;
          $count = 0;
          while ($p_data = mysqli_fetch_assoc($send)) {
            $total = $total + $p_data['quantity'];
            $total_price = $total_price + $p_data['unit_price'];
            $count = $count + 1;
          }
          // echo "Total Price : " . $total ." ";
          $picket_unit_price = $total_price / $count;
      ?>
      <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Inventroy Amount</th>
                      <th>Average Unit Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Pickets</td>
                      <td><?php echo $total;?> PCs</td>
                      <td><?php echo $total_price / $count;?> BDT</td>
                    </tr>
                    <tr>
                      <td>Total Sold - </td>
                      <td><?php echo  $subTotal; ?> PCs</td>
                    </tr>
                    <tr>
                      <td>Pickets In Inventory- </td>
                      <td> 
                        <?php 
                          if($total < 1000){ ?> 
                            <span class="badge badge-danger text-white py-2"> <?php echo $total - $subTotal;?> PC's</span>
                          <?php
                          }else if($total > 1000){ ?> 
                            <span class="badge badge-success text-white py-2"> <?php echo $total - $subTotal;?> PC's </span> 
                            <?php
                          } 
                        ?>                        
                      </td>
                    </tr>
                  </tbody>
              </table>
      </div>
    </div>
    <!-- ----------------------------------- -->
    <!-- ----------------------------------- -->
    <!-- ----------------------------------- -->
    <?php  
            
              if(isset($_POST['submitBtn'])){
                  $name = $_POST['c_name'];
                  $email = $_POST['c_email'];
                  $address = $_POST['c_address'];
                  $phone = $_POST['c_phone'];
                  $product = $_POST['product_id'];
                  $quantity = $_POST['quantity'];
                  $unit_price = $_POST['u_price'];

                  $select_unit_price = 0;

                  echo $bricks_unit_price;

                  if($product == 1){ //Setting Bricks Unit Price
                    if($unit_price == null){
                      $select_unit_price = $bricks_unit_price;
                    }else {
                      $select_unit_price = $unit_price;
                    }
                  }else if($product == 2){
                    if($unit_price == null){
                      $select_unit_price = $picket_unit_price;
                    }else {
                      $select_unit_price = $unit_price;
                    }
                  }

                  // if($product == 1){
                  //   if($unit_price == 0){
                  //     $unit_price = $bricks_unit_price;
                  //   }else if($unit_price != null){
                  //     $unit_price = $p_data['unit_price'];
                  //   }
                  // }
                  // else if($product == 2){
                  //   if($unit_price == 0){
                  //     $unit_price = $picket_unit_price;
                  //   }else if($unit_price != null){
                  //     $unit_price = $p_data['unit_price'];
                  //   }
                  // }
                  
                  // Debug Here
                  // echo $name . " " . $email . " " . $address . " " . $phone . " " . $product . " " . $quantity." Unit Price is =  ".$select_unit_price;
                  $sql = "INSERT INTO `sells_history` (`c_name`,`c_email`,`c_phone`,`c_address`, `product_id`,`quantity`,`unit_price`,`date`) VALUES ('$name', '$email', '$phone','$address','$product','$quantity' ,'$select_unit_price',now())";
                  $send = mysqli_query($conn,$sql);
                  header('location: sales.php?status=manage');
                }
            
    ?>
    <div class="row mt-4 border p-4">
      <div class="col-lg-6">
        <form action="" method="post" class="">
          <div class="form-group">
            <label for="c_name">Customer Name</label>
            <input type="text" name="c_name" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="c_email">Email</label>
            <input type="text" name="c_email" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="c_phone">Phone Number</label>
            <input type="text" name="c_phone" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="c_address">Address</label>
            <input type="text" name="c_address" id="" class="form-control">
          </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="product_id">Selling Product(s)</label>
          <select name="product_id" id="" class="form-control">
                  <option value="1">Bricks</option>
                  <option value="2">Pickets</option>
          </select>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="text" name="quantity" id="" class="form-control">
        </div>
        <div class="form-group">
          <label for="u_price">Unit Price  <span class="badge badge-danger text-white py-2 ">Leave Blank To Price On Average Unit Price</span></label>
          <input type="text" name="u_price" id="" class="form-control">
        </div>
        <div class="form-group">
          <label for="submitBtn">Proceed Sell This Item</label>
          <input type="submit" name="submitBtn" id="" class="form-control btn btn-info" placeholder="" value="Checkout">
        </div>
        </form>
      </div>
    </div>
    <?php
          }
          else if($_GET['status'] == 'update'){
            echo "update Pages";
          }
          
        }
      ?>
  </div>
  <!-- br-pagebody -->
  <!-- Footer Includes Here -->
  <?php include('../inc/footer.php'); ?>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php include('../inc/scripts.php'); ?>