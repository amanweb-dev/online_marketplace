<?php include "include/header.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->

   <?php 

        if (isset($_GET['ordrid']) && isset($_GET['buyer_email']) && isset($_GET['bill'])) {

            $buyer_email = $_GET['buyer_email'];
            $ordrid = $_GET['ordrid'];
            $bill = $_GET['bill'];

            $query = "SELECT * FROM users WHERE user_email = '$buyer_email' ";
            $rslts = $db->select($query);

            $rows_useer = mysqli_fetch_array($rslts);

            $user_card_bl= $rows_useer['user_card_bl'];

            $up_balnce = $user_card_bl+$bill;

            $queryr = "UPDATE  users SET user_card_bl = $up_balnce WHERE user_email = '$buyer_email' ";
            $updater = $db->update($queryr);
            if ($updater) {

            $aprv = 5;
            $querym = "UPDATE  orders SET confirm_status = $aprv WHERE ordr_id = $ordrid ";
            $updatem = $db->update($querym);

            echo "balance is Refunded successfully";
                
            }

            
        
        // if ($update) {
        //   echo "<p style='color:green;text-align:center;font-size:20px;'>Post Approved successfully</p>";
        // }else{
        //     echo "<p style='color:red;text-align:center;'>opps!! Post is not Approved</p>";
        // }

    }

         ?>

        

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
                                <i class="fa fa-file"></i>all_Reject_Order_from_seller
                            </li>
                        </ol>
                        
                        <div class="row">
                           
                            <div class="col-md-12">
                                <h2 style="text-align: center;">View Reject Order List</h2>

                                <div class="table-responsive" style="margin-bottom: 200px">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr class="danger">
                                                <!-- <th>ordr_id</th>
                                                <th>ordr_post_id</th> -->
                                               <!--  <th>seller_email</th>
                                                <th>buyer_email</th> -->
                                                <th>receiver_name</th>
                                                <th>receiver_number</th>
                                                <th>receiver_address</th>
                                                <th>delivery_option</th>
                                                <th>payment_method</th>
                                                <th>ordr_date</th>
                                                <th>Refund</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
 





                                           
                                                 <?php 
                                                        $query = "select * from orders where confirm_status = 4 ";

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

                                             ?>


                                                <tr class="success">
                                                    
                                                    <td><?php echo $receiver_name; ?></td>
                                                    <td><?php echo $receiver_number; ?></td>
                                                    <td><?php echo $receiver_address; ?></td>
                                                    <td><?php echo $delivery_option; ?></td>
                                                    <td><?php echo $payment_method; ?></td>
                                                    <td><?php echo $ordr_date; ?></td>
                                                    

                                                    <td><a href="?ordrid=<?php echo $ordr_id ?>&amp;buyer_email=<?php echo $buyer_email; ?>&amp;bill=<?php echo $total_bill; ?>"><button type="submit" class="btn btn-danger">Refund To Buyer</button></a></td>

                                                </tr>

                                                <?php  } 
                                                

                                                    }

                                                ?> 
                                            
                                        </tbody>
                                    </table>
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