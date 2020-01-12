<?php 
include "lib/session.php";
Session::check_session();
 ?>

<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kenabecha</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Kenabecha</a>
            </div>
            <ul class="nav navbar-right top-nav">
                
                    <?php 

                    if (Session::get('userRole')=='Admin') {

                        $qry = "select * from admin_massage where msg_status = 0 ";
                        $msg_rslt = $db->select($qry);
                        
                        if ($msg_rslt) {

                            $cnnt = mysqli_num_rows($msg_rslt);
                           
                        
                        

                        ?>

                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span style="color: red; font-size: 20px;z-index: 9;font-weight:bold;"><?php echo $cnnt; ?></span><b class="caret"></b></a>
                            <ul class="dropdown-menu message-dropdown">
                                <?php 
                                    if ($msg_rslt && $cnnt>0) {

                                        while($rraaww = mysqli_fetch_assoc($msg_rslt)){
                                         $m_id =  $rraaww['m'];
                                         // $m_user_id =  $rraaww['user_id'];
                                         $m_user_name =  $rraaww['m_user_name'];
                                         // $massages =  $rraaww[' massages'];
                                         // $m_id =  $rraaww['m'];
                                         // $m_id =  $rraaww['m'];

                                         ?>
                                            
                                            <li class="message-preview">
                                            <a href="admin_messanger.php?msg_id=<?php echo $m_id; ?>">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="media-heading"><strong><?php echo $m_user_name; ?></strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>


                                        <?php }
                                        
                                    }

                                }else{ ?>

                                    <li class="dropdown">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><b class="caret"></b></a>
                                    <ul class="dropdown-menu message-dropdown">
                                            
                                            <li class="message-preview">
                                            <a href="#">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="media-heading"><strong>No Message</strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>



                               <?php }




                                 ?>
                                
                                <li class="message-footer">
                                    <a href="#">Read All New Messages</a>
                                </li>
                            </ul>
                        </li>

                        
                   <?php }else if(Session::get('userRole')=='Modaretor'){?>

                        
                    <li class="dropdown">
                    <?php 
                         $select_query = "SELECT * FROM post WHERE post_status = 0 ";
                        $result_query = $db->select($select_query);
                        if ($result_query) {
                            $num = mysqli_num_rows($result_query);

                            ?>
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><span style="color:red;margin-top: -50px;font-size: 25px;font-weight: bold;"><?php echo $num; ?></span> <b class="caret"></b></a>
                              <ul class="dropdown-menu alert-dropdown">

                    <?php

                            while ($row = $result_query->fetch_assoc()) {
                                $post_ids=$row['post_id'];
                                $post_titles=$row['post_title'];

                                ?>

                                
                               
                                    <li>
                                        <a href="sngl_postlist.php?un_post_list=<?php echo $post_ids; ?>"><span style="font-size: 15px;" class="label label-danger"><?php echo $post_titles ?></span></a>
                                    </li>
                                    <li class="divider"></li>


                          <?php  }

                       
                            
                        }else{ ?>

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                            <ul class="dropdown-menu alert-dropdown">

                            <li>
                                <a href="#"><span style="font-size: 15px;" class="label label-primary">No New Post</span></a>
                            </li>
                                <li class="divider"></li>


                       <?php }

                     ?>
                     <li>
                        <a href="all_unprv_postlist.php">View All</a>
                    </li>
                      </ul>
                   


                </li>


                   <?php }else if(Session::get('userRole')=='ordermgr'){ ?>

                    <li style="">
                    <?php 
                         $select_querysss = "SELECT * FROM orders WHERE confirm_status  = 4 ";
                        $result_querysss = $db->select($select_querysss);
                        if ($result_querysss) {
                            $numsss = mysqli_num_rows($result_querysss);


                            ?>

                            <a href="all_seller_rejection.php"><button class="btn btn-primary">Seller Rejection [<span style="color:red;font-weight:bold;" ><?php echo $numsss; ?></span>]</button></a>  

                            <?php

                       
                            
                        }else{ ?>

                            <a href="all_seller_rejection.php"><button class="btn btn-primary">Seller Rejection [<span style="color:red;font-weight:bold;"> 0 </span>]</button></a>


                       <?php }

                     ?>

                </li>


                    <li style="">
                    <?php 
                         $select_query = "SELECT * FROM orders WHERE confirm_status = 2 ";
                        $result_query = $db->select($select_query);
                        if ($result_query) {
                            $num = mysqli_num_rows($result_query);


                            ?>

                            <a href="confirmed_product.php"><button class="btn btn-success">Seller Confirmation [<span style="color:red;font-weight:bold;" ><?php echo $num; ?></span>]</button></a>  

                            <?php

                       
                            
                        }else{ ?>

                            <a href="confirmed_product.php"><button class="btn btn-success">Seller Confirmation [<span style="color:red;font-weight:bold;"> 0 </span>]</button></a>


                       <?php }

                     ?>

                </li>


                <li style="">
                    <?php 
                         $select_querys = "SELECT * FROM orders WHERE ordr_status  = 0 ";
                        $result_querys = $db->select($select_querys);
                        if ($result_querys) {
                            $nums = mysqli_num_rows($result_querys);


                            ?>

                            <a href="all_unprv_orderlist.php"><button class="btn btn-danger">Buyer Request [<span style="color:black;font-weight:bold;" ><?php echo $nums; ?></span>]</button></a>  

                            <?php

                       
                            
                        }else{ ?>

                            <a href="#"><button class="btn btn-danger">Buyer Request [<span style="color:black;font-weight:bold;"> 0 </span>]</button></a>


                       <?php }

                     ?>

                </li>



                   <?php }


                     ?>
                   

                <li class="dropdown">

                    <?php 

                        $username = Session::get('username');
                        $my_id = Session::get('userId');

                     ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="profile_edit.php?del_pro=<?php echo $my_id; ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                         <li>
                            <a href="logout.php?action='logout' "><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
