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
                             Order Confirmation
                            <small>Confirmation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>order_confirmation
                            </li>
                        </ol>

                        <?php 

                        if (isset($_GET['the_ordr_id'])) {
                            $the_ordr_id = $_GET['the_ordr_id'];


                            $singl_ordr_query = "SELECT * FROM orders WHERE ordr_id = $the_ordr_id ";
                            $singl_ordr_query_rslt = $db->select($singl_ordr_query);

                            $arr_rslt = mysqli_fetch_array($singl_ordr_query_rslt);


                            $ordr_id = $arr_rslt['ordr_id'];
                            $ordr_post_id = $arr_rslt['ordr_post_id'];
                            $seller_email = $arr_rslt['seller_email'];
                            $buyer_email = $arr_rslt['buyer_email'];
                            $receiver_name = $arr_rslt['receiver_name'];
                            $receiver_number = $arr_rslt['receiver_number'];
                            $receiver_address = $arr_rslt['receiver_address'];
                            $delivery_option = $arr_rslt['delivery_option'];
                            $payment_method = $arr_rslt['payment_method'];
                            $ordr_date = $arr_rslt['ordr_date'];



                             $order_post_query = "SELECT * FROM post WHERE post_id = $ordr_post_id ";
                            $order_post_query_rslt = $db->select($order_post_query);

                            $ordr_post_arr_rslt = mysqli_fetch_array($order_post_query_rslt);

                            $post_id = $ordr_post_arr_rslt['post_id'];
                            $post_user_email = $ordr_post_arr_rslt['post_user_email'];
                            $post_title = $ordr_post_arr_rslt['post_title'];
                            $post_price = $ordr_post_arr_rslt['post_price'];
                            $post_contact = $ordr_post_arr_rslt['post_contact'];
                            $post_condition = $ordr_post_arr_rslt['post_condition'];
                            $post_location = $ordr_post_arr_rslt['post_location'];
                            $post_condition = $ordr_post_arr_rslt['post_condition'];
                            $post_details = $ordr_post_arr_rslt['post_details'];





                        }




                         ?>
                        
                        

                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/footer.php" ?>