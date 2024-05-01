<?php include('../inc/header.php'); ?>
    <!-- ########## START: LEFT PANEL ########## -->
<?php
// function area 
function add(){

}


?>
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

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Total Inventory</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>01</td>
            <td>Bricks</td>
            <td>
                <?php 
                    $sql = "(SELECT SUM(quantity) AS totalQuantity FROM production_history WHERE `product_id` = 1) - (SELECT SUM(quantity) AS totalQuantity FROM production_history WHERE `product_id` = 1)";
                    $send = mysqli_query($conn, $sql);
                    // var_dump($send);
                    $res = mysqli_fetch_assoc($send);        
                    echo    $res['totalQuantity'];     
                ?>
            </td>
        </tr>
    </tbody>
</table>



     <!-- br-pagebody -->
        <!-- Footer Includes Here -->
<?php include('../inc/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('../inc/scripts.php'); ?>