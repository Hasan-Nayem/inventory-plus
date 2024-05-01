<?php include('../inc/header.php'); ?>
<?php include('../inc/dbconnection.php'); ?>
<?php 
 if( empty($_SESSION['id']) ){
  header('location: login.php');
}
?>
<?php 
$id = $_GET['id'];
$sql = "SELECT * FROM `sells_history` WHERE `id` = '$id'";
$send = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($send);

?>
<!DOCTYPE html>
    <html>
    <head>
      <title>
      </title>
      <meta content="summary_large_image" name="twitter:card" />
      <meta content="website" property="og:type" />
      <meta content="" property="og:description" />
      <meta content="https://rg7l4m3jud.preview-postedstuff.com/V2-i05x-bm7c-hBtm-Lhq3/" property="og:url" />
      <meta
        content="https://pro-bee-beepro-thumbnails.s3.amazonaws.com/messages/794269/778061/1667238/7554374_large.jpg"
        property="og:image" />
      <meta content="" property="og:title" />
      <meta content="" name="description" />
      <meta charset="utf-8" />
      <meta content="width=device-width" name="viewport" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css" />
      <style>
        .bee-row,
        .bee-row-content {
          position: relative
        }

        body {
          background-color: #fff;
          color: #000;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif
        }

        a {
          color: #0068a5
        }

        * {
          box-sizing: border-box
        }

        body,
        h1,
        p {
          margin: 0
        }

        .bee-row-content {
          max-width: 500px;
          margin: 0 auto;
          display: flex
        }

        .bee-row-content .bee-col-w3 {
          flex-basis: 25%
        }

        .bee-row-content .bee-col-w4 {
          flex-basis: 33%
        }

        .bee-row-content .bee-col-w5 {
          flex-basis: 42%
        }

        .bee-row-content .bee-col-w7 {
          flex-basis: 58%
        }

        .bee-row-content .bee-col-w8 {
          flex-basis: 67%
        }

        .bee-row-content .bee-col-w9 {
          flex-basis: 75%
        }

        .bee-row-content .bee-col-w12 {
          flex-basis: 100%
        }

        .bee-button .content {
          text-align: center
        }

        .bee-button a,
        .bee-icon .bee-icon-label-right a {
          text-decoration: none
        }

        .bee-icon,
        .bee-icon .bee-icon-image,
        .bee-icon .bee-icon-label-right {
          display: inline-block
        }

        .bee-icon {
          vertical-align: middle
        }

        .bee-icon .bee-icon-image {
          vertical-align: middle;
          margin-right: -4px
        }

        .bee-paragraph {
          overflow-wrap: anywhere
        }

        @media (max-width:520px) {
          .bee-mobile_hide {
            display: none
          }

          .bee-row-content:not(.no_stack) {
            display: block
          }
        }

        .bee-row-1,
        .bee-row-10,
        .bee-row-11,
        .bee-row-12,
        .bee-row-2,
        .bee-row-3,
        .bee-row-4,
        .bee-row-5,
        .bee-row-6,
        .bee-row-7,
        .bee-row-8,
        .bee-row-9 {
          background-repeat: no-repeat
        }

        .bee-row-1 .bee-row-content,
        .bee-row-12 .bee-row-content {
          background-repeat: no-repeat;
          color: #000
        }

        .bee-row-1 .bee-col-1,
        .bee-row-10 .bee-col-1,
        .bee-row-10 .bee-col-2,
        .bee-row-11 .bee-col-1,
        .bee-row-12 .bee-col-1,
        .bee-row-2 .bee-col-1,
        .bee-row-2 .bee-col-2,
        .bee-row-3 .bee-col-1,
        .bee-row-4 .bee-col-1,
        .bee-row-4 .bee-col-2,
        .bee-row-5 .bee-col-1,
        .bee-row-5 .bee-col-2,
        .bee-row-6 .bee-col-1,
        .bee-row-6 .bee-col-2,
        .bee-row-7 .bee-col-1,
        .bee-row-7 .bee-col-2,
        .bee-row-8 .bee-col-1,
        .bee-row-8 .bee-col-2,
        .bee-row-9 .bee-col-1,
        .bee-row-9 .bee-col-2 {
          padding-bottom: 5px;
          padding-top: 5px
        }

        .bee-row-1 .bee-col-1 .bee-block-1,
        .bee-row-2 .bee-col-1 .bee-block-1,
        .bee-row-2 .bee-col-2 .bee-block-1,
        .bee-row-4 .bee-col-2 .bee-block-1,
        .bee-row-5 .bee-col-2 .bee-block-1,
        .bee-row-6 .bee-col-2 .bee-block-1,
        .bee-row-7 .bee-col-2 .bee-block-1 {
          width: 100%;
          text-align: center
        }

        .bee-row-10 .bee-row-content,
        .bee-row-11 .bee-row-content,
        .bee-row-2 .bee-row-content,
        .bee-row-3 .bee-row-content,
        .bee-row-4 .bee-row-content,
        .bee-row-5 .bee-row-content,
        .bee-row-6 .bee-row-content,
        .bee-row-7 .bee-row-content,
        .bee-row-8 .bee-row-content,
        .bee-row-9 .bee-row-content {
          color: #000;
          background-repeat: no-repeat
        }

        .bee-row-10 .bee-col-1 .bee-block-1,
        .bee-row-10 .bee-col-2 .bee-block-1,
        .bee-row-4 .bee-col-1 .bee-block-1,
        .bee-row-5 .bee-col-1 .bee-block-1,
        .bee-row-6 .bee-col-1 .bee-block-1,
        .bee-row-7 .bee-col-1 .bee-block-1,
        .bee-row-8 .bee-col-1 .bee-block-1,
        .bee-row-8 .bee-col-2 .bee-block-1,
        .bee-row-9 .bee-col-1 .bee-block-1,
        .bee-row-9 .bee-col-2 .bee-block-1 {
          padding: 10px
        }

        .bee-row-11 .bee-col-1 .bee-block-1 {
          text-align: center;
          padding: 5px
        }

        .bee-row-12 .bee-col-1 .bee-block-1 {
          color: #9d9d9d;
          font-family: inherit;
          font-size: 15px;
          padding-bottom: 5px;
          padding-top: 5px;
          text-align: center
        }

        .bee-row-10 .bee-col-1 .bee-block-1,
        .bee-row-10 .bee-col-2 .bee-block-1,
        .bee-row-4 .bee-col-1 .bee-block-1,
        .bee-row-5 .bee-col-1 .bee-block-1,
        .bee-row-6 .bee-col-1 .bee-block-1,
        .bee-row-8 .bee-col-1 .bee-block-1,
        .bee-row-8 .bee-col-2 .bee-block-1,
        .bee-row-9 .bee-col-1 .bee-block-1,
        .bee-row-9 .bee-col-2 .bee-block-1 {
          color: #393d47;
          font-size: 14px;
          font-weight: 400;
          line-height: 200%;
          text-align: left;
          direction: ltr;
          letter-spacing: 0
        }

        .bee-row-10 .bee-col-1 .bee-block-1 a,
        .bee-row-10 .bee-col-2 .bee-block-1 a,
        .bee-row-4 .bee-col-1 .bee-block-1 a,
        .bee-row-5 .bee-col-1 .bee-block-1 a,
        .bee-row-6 .bee-col-1 .bee-block-1 a,
        .bee-row-7 .bee-col-1 .bee-block-1 a,
        .bee-row-8 .bee-col-1 .bee-block-1 a,
        .bee-row-8 .bee-col-2 .bee-block-1 a,
        .bee-row-9 .bee-col-1 .bee-block-1 a,
        .bee-row-9 .bee-col-2 .bee-block-1 a {
          color: #8a3b8f
        }

        .bee-row-10 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-10 .bee-col-2 .bee-block-1 p:not(:last-child),
        .bee-row-4 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-5 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-6 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-7 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-8 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-8 .bee-col-2 .bee-block-1 p:not(:last-child),
        .bee-row-9 .bee-col-1 .bee-block-1 p:not(:last-child),
        .bee-row-9 .bee-col-2 .bee-block-1 p:not(:last-child) {
          margin-bottom: 16px
        }

        .bee-row-7 .bee-col-1 .bee-block-1 {
          color: #393d47;
          font-size: 14px;
          font-weight: 400;
          line-height: 200%;
          text-align: justify;
          direction: ltr;
          letter-spacing: 0
        }

        .bee-row-12 .bee-col-1 .bee-block-1 .bee-icon-image {
          padding: 5px 6px 5px 5px
        }

        .bee-row-12 .bee-col-1 .bee-block-1 .bee-icon {
          margin-left: 0;
          margin-right: 0
        }
      </style>
    </head>

    <body>
      <div class="container mt-4 bee-page-container">
        <div class="bee-row bee-row-1">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w12">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#393d47;font-size:50px;font-family:'Ubuntu', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                    Checkout
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-2">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w5">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#393d47;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:200%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                    Billing Details To -
                  </span>
                </h1>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w7">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#17a2b8;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:200%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                  <?php echo $data['c_name']; ?>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-3">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w12">
              <div class="bee-block bee-block-1 bee-spacer bee-mobile_hide">
                <div class="spacer" style="height:30px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-4">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Selling Item(s) -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#393d47;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:200%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                  <?php 
                  if($data['product_id'] == 1){
                    echo "Brick";
                  }
                  else {
                    echo "Picket";
                  }?>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-5">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Quantity -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#393d47;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:200%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                  <?php echo $data['quantity']; ?>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-6">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Unit Price -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#393d47;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                  <?php echo $data['unit_price']; ?>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-7">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w3">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Total Price -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w9">
              <div class="bee-block bee-block-1 bee-heading">
                <h1
                  style="color:#393d47;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:200%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                  <span class="tinyMce-placeholder">
                  <?php echo $data['quantity']*$data['unit_price']; ?>
                  </span>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-8">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Phone Number -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <em>
                  <?php echo $data['c_phone']; ?>
                  </em>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-9">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Email Address -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <em>
                  <?php echo $data['c_email']; ?>
                  </em>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-10">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Address -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <em>
                  <?php echo $data['c_address']; ?>
                  </em>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bee-row bee-row-10">
          <div class="bee-row-content">
            <div class="bee-col bee-col-1 bee-col-w4">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <strong>
                    Date -
                  </strong>
                </p>
              </div>
            </div>
            <div class="bee-col bee-col-2 bee-col-w8">
              <div class="bee-block bee-block-1 bee-paragraph">
                <p>
                  <em>
                  <?php echo $data['date']; ?>
                  </em>
                </p>
              </div>
            </div>
          </div>
        </div>
        <input type="submit" onclick="window.print()" name="submitBtn" id="" class="btn btn-info text-white" placeholder="" value="Print">
      </div>
      
    </body>
    </html>
