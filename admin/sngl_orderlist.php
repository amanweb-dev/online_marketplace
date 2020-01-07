<?php include "include/header.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Unaprove Order
                            <small>Order List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>sngl_unprv_orderlist
                            </li>
                        </ol>
                        
                        <div class="row">
                           
                        <div class="row">
                    <div class="col-md-6 offset-md-3">
                      <h1>Order Details</h1>
                        
                        <?php

                        if (isset($_GET['ordrid'])) {
                            $ordrid=$_GET['ordrid'];

                       
                        $query = "SELECT * FROM orders WHERE ordr_id = $ordrid ";

                        $result = $db->select($query);
                        if ($result) {
                            $number_of_rows = mysqli_num_rows($result);
                            while ($row = $result->fetch_assoc()) {
                                $ordr_id = $row['ordr_id'];
                                $ordr_post_id = $row['ordr_post_id'];
                                $seller_email = $row['seller_email'];
                                $buyer_email = $row['buyer_email'];
                                $receiver_name = $row['receiver_name'];
                                $receiver_number = $row['receiver_number'];
                                $receiver_address = $row['receiver_address'];
                                $delivery_option = $row['delivery_option'];
                                $payment_method = $row['payment_method'];
                                $total_bill = $row['total_bill'];
                                $ordr_date = $row['ordr_date'];

                            }
                        }

                       


                        ?>








                      <div id="printableArea">
                         <table class="table">
                          <thead>
                            <tr>
                              <th>Order Serial No:</th>
                              <td><?php echo $ordr_id; ?></td>
                            </tr>

                            <tr>
                              <th>Product Serial No:</th>
                              <td><?php echo $ordr_post_id; ?></td>
                            </tr>

                            <tr>
                              <th>Order Date:</th>
                              <td><?php echo $ordr_date; ?></td>
                            </tr>

                            <tr>
                              <th>Seller Email:</th>
                              <td><?php echo $seller_email; ?></td>
                            </tr>

                             <tr>
                              <th>Buyer Email:</th>
                              <td><?php echo $buyer_email; ?></td>
                            </tr>

                             <tr>
                              <th>Receiver Name:</th>
                              <td><?php echo $receiver_name; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Contact No:</th>
                              <td><?php echo $receiver_number; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Address:</th>
                              <td><?php echo $receiver_address; ?></td>
                            </tr>

                            <tr>
                              <th>Total Bill:</th>
                              <td><?php echo $total_bill." Tk"; ?></td>
                            </tr>

                             <tr>
                              <th>Delivery Option:</th>
                              <td><?php echo $delivery_option; ?></td>
                            </tr>

                             <tr>
                              <th>Payment Method:</th>
                              <td><?php echo $payment_method; ?></td>
                            </tr>

                          </thead>
                    
                        </table>
                        
                      </div>

                      <?php ?>

                    <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Order Details" />

           <a onclick="return confirm('Are you sure to request to Seller?')" href="all_unprv_orderlist.php?req_ordr_id=<?php echo $ordr_id; ?>"><button type="submit" class="btn btn-danger">Request</button></a>


                         <?php }

                       ?>
                    </div>
                  </div>


                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/footer.php" ?>

<script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>