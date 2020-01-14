<?php include "include/header.php" ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->
  <?php 

$external_user = "SELECT * FROM users ";
$external_user_rslt = $db->select($external_user);
if ($external_user_rslt) {
    $num_user = mysqli_num_rows($external_user_rslt);
}else{
  $num_user = 0;
}

$total_post = "SELECT * FROM post ";
$total_post_rslt = $db->select($total_post);
if ($total_post_rslt) {
    $num_post = mysqli_num_rows($total_post_rslt);
}else{
  $num_post = 0;
}


$approved_post = "SELECT * FROM post WHERE  post_status = 1 ";
$approved_post_rslt = $db->select($approved_post);
if ($approved_post_rslt) {
    $num_approved_post = mysqli_num_rows($approved_post_rslt);
}else{
  $num_approved_post = 0;
}

$unapproved_post = "SELECT * FROM post WHERE  post_status != 1 ";
$unapproved_post_rslt = $db->select($unapproved_post);
if ($unapproved_post_rslt) {
    $num_unapproved_post = mysqli_num_rows($unapproved_post_rslt);
}else{
  $num_unapproved_post = 0;
}

$total_order_trans = "SELECT * FROM orders";
$total_orders_rslt = $db->select($total_order_trans);
if ($total_orders_rslt) {
    $num_total_orders = mysqli_num_rows($total_orders_rslt);
}else{
  $num_total_orders = 0;
}

$total_success_order_trans = "SELECT * FROM orders WHERE confirm_status=3";
$total_success_orders_rslt = $db->select($total_success_order_trans);
if ($total_success_orders_rslt) {
    $num_total_succes_orders = mysqli_num_rows($total_success_orders_rslt);
}else{
  $num_total_succes_orders = 0;
}

$total_unsuccess_order_trans = "SELECT * FROM orders WHERE confirm_status=5";
$total_unsuccess_orders_rslt = $db->select($total_unsuccess_order_trans);
if ($total_unsuccess_orders_rslt) {
    $num_total_unsucces_orders = mysqli_num_rows($total_unsuccess_orders_rslt);
}else{
  $num_total_unsucces_orders = 0;
}

$total_categories = "SELECT * FROM categories ";
$total_categories_rslt = $db->select($total_categories);
if ($total_categories_rslt) {
    $num_total_rslt = mysqli_num_rows($total_categories_rslt);
}else{
  $num_total_rslt = 0;
}




   ?>     

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <br><br>
                       <!--  <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_user; ?></div>
                                        <div>Total Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="extrnl_user_mnjmnt.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo  $num_post; ?></div>
                                        <div>Total Ads</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_approved_post; ?></div>
                                        <div>Total Approved Ads</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_unapproved_post; ?></div>
                                        <div>Total UnApproved Ads</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 20%;">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_total_orders; ?></div>
                                        <div>Total Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_total_succes_orders; ?></div>
                                        <div>Total Successful Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_total_unsucces_orders; ?>
                                            
                                        </div>
                                        <div>Total Canceled Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num_total_rslt; ?></div>
                                        <div>Total Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="category_add.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "include/footer.php" ?>
