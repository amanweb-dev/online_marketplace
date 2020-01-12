<?php include "include/header.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->

   <?php 

        if (isset($_GET['req_ordr_id'])) {

            $req_ordr_id = $_GET['req_ordr_id'];

            $aprv = 1;

            $query = "UPDATE  orders SET ordr_status = $aprv,confirm_status = $aprv WHERE ordr_id = $req_ordr_id ";

        $update = $db->update($query);
        
        

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
                                <i class="fa fa-file"></i>all_unprv_orderlist
                            </li>
                        </ol>
                        
                        <div class="row">
                           
                            <div class="col-md-12">
                                <h2 style="text-align: center;">View List</h2>

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
                                                <th>View</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
 
                                           
                                                 <?php 
                                                        $query = "SELECT * FROM orders WHERE confirm_status = 2 ";

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
                                                        $ordr_date = $row['ordr_date'];

                                             ?>


                                                <tr class="success">
                                                    
                                                    <td><?php echo $receiver_name; ?></td>
                                                    <td><?php echo $receiver_number; ?></td>
                                                    <td><?php echo $receiver_address; ?></td>
                                                    <td><?php echo $delivery_option; ?></td>
                                                    <td><?php echo $payment_method; ?></td>
                                                    <td><?php echo $ordr_date; ?></td>
                                                    
                                                    
                                                    
                                                    



                                                    <td><a target="_blank" href="view_confrm_product_details.php?ordrsid=<?php echo $ordr_id; ?>"><button class="btn btn-danger">View</button></a></td>

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