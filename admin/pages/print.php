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
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brick Management - Invoice #<?php echo $data['id'] ?></title>

    <link href="../assets/invoice/all.min.css" rel="stylesheet">
    <link href="../assets/invoice/fontawesome-all.min.css" rel="stylesheet">
    <link href="../assets/invoice/invoice.css" rel="stylesheet">
    <script src="../assets/invoice/scripts.min.js?v=d2d29a"></script>

</head>
<body>

    <div class="container-fluid invoice-container">

        
            <div class="row invoice-header">
                <div class="invoice-col">

                                            <p><img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.123rf.com%2Fphoto_129794570_construction-logo-template-suitable-for-construction-company-brand-vector-format-and-easy-to-edit.html&psig=AOvVaw0tw_ur7kJAf2Z-ZjMqx5kv&ust=1653702931858000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCMCPr9HJ_vcCFQAAAAAdAAAAABAF" title="BMS" /></p>
                                        <h3>Invoice #<?php echo $data['id'] ?></h3>

                </div>
                <div class="invoice-col text-center">

                    <div class="invoice-status">
                                                    <span class="unpaid">Paid</span>
                                            </div>

                                            <div class="small-text">
                            Due Date: Thursday, April 28th, 2022
                        </div>
                        <div class="payment-btn-container hidden-print" align="center">
                            <p><br />Reference Number: <?php echo $data['id'] ?></p>
                        </div>
                    
                </div>
            </div>

            <hr>

            
            <div class="row">
                <div class="invoice-col right">
                    <strong>Pay To</strong>
                    <address class="small-text">
                        House: 25/6, Road: 04, Sector: 01, Tushardhara RA, Saddam Market, Kodomtoli, Dhaka 1362
                                            </address>
                </div>
                <div class="invoice-col">
                    <strong>Invoiced To</strong>
                    <address class="small-text">
                    <?php echo $data['c_name'] ?><br />
                    <?php echo $data['c_address'] ?><br />
                        Dhaka, Tejgaon , 1215<br />
                        Bangladesh
                                                                    </address>
                </div>
            </div>

            <div class="row">
                <div class="invoice-col right">
                    <strong>Payment Method</strong><br>
                    <span class="small-text" data-role="paymethod-info">
                                                    <form method="post" action="/viewinvoice.php?id=6" class="form-inline">
                                <input type="hidden" name="token" value="021875d91d0f62ea9ac0759ca453dfacee7cf85e" /><select name="gateway" onchange="submit()" class="form-control select-inline"><option value="mailin" selected="selected">Mail In Payment</option><option value="banktransfer">Bank Transfer</option></select>
                            </form>
                                            </span>
                    <br /><br />
                </div>
                <div class="invoice-col">
                    <strong>Invoice Date</strong><br>
                    <span class="small-text">
                    <?php echo $data['date'] ?><br><br>
                    </span>
                </div>
            </div>

            <br />

            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Invoice Items</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td width="20%" class="text-center"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                                                    <tr>
                                        <td><?php if($data['product_id']== 1){echo "Bricks";}else { echo "Pickets";}  ?></td>
                                        <td class="text-center"><?php echo $data['quantity']." Pc's" ?></td>
                                    </tr>
                                                                    <tr>
                                        <td>Unit Price *</td>
                                        <td class="text-center"><?php echo "৳ ".$data['unit_price'] ?>BDT</td>
                                    </tr>
                                                                <tr>
                                    <td class="total-row text-right"><strong>Sub Total</strong></td>
                                    <td class="total-row text-center"><?php echo "৳ ".$data['unit_price']*$data['quantity']; ?>BDT</td>
                                </tr>
                                                                                                <!-- <tr>
                                    <td class="total-row text-right"><strong>Credit</strong></td>
                                    <td class="total-row text-center">৳0.00BDT</td>
                                </tr> -->
                                <tr>
                                    <td class="total-row text-right"><strong>Total</strong></td>
                                    <td class="total-row text-center"><?php echo "৳ ".$data['unit_price']*$data['quantity']; ?>BDT</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            <div class="transactions-container small-text">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Transaction Date</strong></td>
                                <td class="text-center"><strong>Gateway</strong></td>
                                <td class="text-center"><strong>Transaction ID</strong></td>
                                <td class="text-center"><strong>Amount</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                                                            <tr>
                                    <td class="text-center" colspan="4">No Related Transactions Found</td>
                                </tr>
                                                        <tr>
                                <td class="text-right" colspan="3"><strong>Balance</strong></td>
                                <td class="text-center"><?php echo "৳ ".$data['unit_price']*$data['quantity']; ?>BDT</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pull-right btn-group btn-group-sm hidden-print">
                <a href="javascript:window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <a href="#" class="btn btn-default"><i class="fas fa-download"></i> Download</a>
            </div>

        
    </div>

    <p class="text-center hidden-print"><a href="sales.php?status=manage">&laquo; Back to Client Area</a></a></p>

    <div id="fullpage-overlay" class="hidden">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <img src="/assets/img/overlay-spinner.svg">
                <br>
                <span class="msg"></span>
            </div>
        </div>
    </div>

</body>
</html>
