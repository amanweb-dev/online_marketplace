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
                            Page Name
                            <small>Features</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Page Name
                            </li>
                        </ol>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php 

                                        if (isset($_GET['msg_id'])) {
                                           $msg_id= $_GET['msg_id'];
                                           $_SESSION['msg_id'] = $msg_id;

                                          

                                           $qry = "SELECT * FROM admin_massage WHERE msg_status = 0 AND m = $msg_id ";
                                            $msg_rslt = $db->select($qry);


                                            if ($msg_rslt) {
                                              
                                            $cnnt = mysqli_num_rows($msg_rslt);

                                             if ($msg_rslt && $cnnt>0) {

                                        while($msg_raw = mysqli_fetch_assoc($msg_rslt)){
                                         $m_id =  $msg_raw['m'];
                                         $m_user_name =  $msg_raw['m_user_name'];
                                         $m_user_email =  $msg_raw['m_user_email'];
                                         $m_user_cntct =  $msg_raw['m_user_cntct'];
                                         $massages =  $msg_raw['massages'];

                                         ?>
                                            
                                        <div class="row">
                                            <h3>From: <?php echo  $m_user_name; ?></h3>
                                            <h3>Contact: <?php echo  $m_user_cntct; ?></h3>
                                            <h3>Email: <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#sent?compose=new" target="_blank"><?php echo  $m_user_email; ?></a></h3>
                                            <h4>Message: </h4>
                                            <p><?php echo $massages; ?></p>

                                        </div>
                                        
                                        
                                        <?php 

                                        $up_query = "UPDATE admin_massage SET msg_status = 1  WHERE m = $m_id";
                                    $up_rslt =  $db->update($up_query);



                                    }
                                    }
                                }



                                     
                                }





                                     ?>
                                </div>
                            </div>

                            <div class="row">
                                <p>reply Via Gmail..... <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#sent?compose=new" target="_blank">Clic Here</a></p>
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