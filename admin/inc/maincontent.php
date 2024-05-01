<div class="br-pagebody">

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-info rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Order Completed  </p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                    <?php 
                      $sql = "SELECT * FROM sells_history";
                      $send = mysqli_query($conn, $sql);
                      echo mysqli_num_rows($send);
                    ?>
                  </p>
                  <span class="tx-11 tx-roboto tx-white-8">Lorem Ipsum</span>
                </div>
              </div>
              <div id="ch1" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-purple rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Sales Amount - </p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">

                      <?php 
                        $sql = "SELECT * FROM `sells_history`";
                        $send = mysqli_query($conn,$sql);
                        $moneyCount = 0;
                        while($data = mysqli_fetch_assoc($send)){
                          $moneyCount = $moneyCount + ($data['quantity']*$data['unit_price']);
                        } 
                        echo $moneyCount;
                      ?> BDT

                  </p>
                  <span class="tx-11 tx-roboto tx-white-8">Congratulations!!</span>
                </div>
              </div>
              <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Inventory</p>
                  <p class="tx-22 tx-white tx-lato  mg-b-0 lh-1">Bricks Left - 

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
                      echo $total - $subTotal;
                  ?>PC's

                  </p>
                  <p class="tx-22 tx-white tx-lato  mg-b-0 lh-1">Pickets Left - 

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

                    echo $total - $subTotal;
                  ?>PC's

                  </p>
                  <!-- <span class="tx-11 tx-roboto tx-white-8">23% average duration</span> -->
                </div>
              </div>
              <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Pending Order</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">7</p>
                  <span class="tx-11 tx-roboto tx-white-8">Lorem Ipsum Dolor Sit Amte</span>
                </div>
              </div>
              <div id="ch4" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
          <div class="col-lg-12">

                  <div class="card bd-0 shadow-base pd-25 mg-t-20 mb-3">
                                <?php 
                                    $sql = "SELECT * FROM `sells_history`";
                                    $send = mysqli_query($conn,$sql);
                                    foreach($send as $data)
                                    {
                                      $date[] = $data['date'];
                                      $amount[] = $data['quantity']*$data['unit_price'];
                                    }
                                  
                                ?>
                              
                              <div class="d-md-flex justify-content-between pd-25">
                                  <div>
                                    <h1 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Graph n Chart Corner </h1>
                                  </div>
                              </div><!-- d-flex -->
                              <canvas id="myChart" width="20" height="5"></canvas>
                              <script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($date); ?>,
        datasets: [{
            label: 'Income',
            data: <?php echo json_encode($amount); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
                    </div>



            <div class="card bd-0 shadow-base">
              <div class="d-md-flex justify-content-between pd-25">
                <div>
                  <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Pending Order List - </h6>
                  <!-- <p>Past 30 Days — Last Updated Oct 14, 2017</p> -->
                </div>
             
              </div><!-- d-flex -->
              <div class="pd-l-25 pd-r-15 pd-b-25">
              <?php 
                      $sql = "SELECT * FROM `sells_history` WHERE `status` = 1";
                      $send = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($send) == 0){
                        echo '<div class="alert alert-info"> No Orders In Pending List </div>';
                      }else{
              ?>
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Qty.</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                      
                        while($info = mysqli_fetch_assoc($send)){
                          ?> 
                            <tr>
                              <th scope="row">1</th>
                              <td><?php echo $info['c_name']; ?></td>
                              <td><?php echo $info['c_phone']; ?></td>
                              <td><?php echo $info['c_address']; ?></td>
                              <td><?php echo $info['quantity']; ?></td>
                              <td> <a href="#" class="btn btn-info">Sell Item</a></td>
                            </tr>
                          <?php
                        }
                      }
                    ?>
                    
                  </tbody>
                </table>
              </div>
            </div><!-- card -->

            <div class="card bd-0 shadow-base pd-25 mg-t-20">
                        <?php 
                          $today = date('Y-m-d');
                          $sql = "SELECT * FROM `sells_history` WHERE `date` = '$today'";
                          $send = mysqli_query($conn,$sql);
                          
                        ?>
                      
                      <div class="d-md-flex justify-content-between pd-25">
                          <div>
                            <h1 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Todays Sells At A Glance  - 
                            <?php 
                          if(mysqli_num_rows($send) <= 0 ){
                            echo '<span class="badge badge-danger">'. mysqli_num_rows($send) .'</span> ';
                          }
                          else if(mysqli_num_rows($send) <= 5){
                            echo '<span class="badge badge-warning text-white">'. mysqli_num_rows($send) .'</span> ';
                          }
                          else if(mysqli_num_rows($send) >= 10){
                            echo '<span class="badge badge-success text-white">'. mysqli_num_rows($send) .'</span> ';
                          }
                        ?>
                            </h1>
                            <!-- <p>Past 30 Days — Last Updated Oct 14, 2017</p> -->
                          </div>
                      </div><!-- d-flex -->
                      <table class="table text-center">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Pricing Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($info = mysqli_fetch_assoc($send)){ ?>
                          <tr>
                            <th scope="row"> <?php echo $info['id']; ?> </th>
                            <td> <?php echo $info['c_name']; ?> </td>
                            <td><?php echo $info['c_email']; ?></td>
                            <td><?php echo $info['c_phone']; ?></td>
                            <td><?php if($info['product_id'] == 1){
                              echo "Bricks";
                            }else echo "Pickets"; 
                            ?></td>
                            <td><?php echo $info['quantity']; ?></td>
                            <td><?php echo $info['quantity']*$info['unit_price']; ?> BDT</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                    </table>
            </div><!-- card -->

            


          </div><!-- col-8 -->
          <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                           
          </div>
        </div>
      <!-- Paste Here Rest Of The Main Content Code From admin/assets/codeMaincontent.txt -->
      </div>