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
                            Profile
                            <small>Edit Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>profile_edit
                            </li>
                        </ol>

                         <?php 
                            if (isset($_GET['del_pro']) && $_GET['del_pro'] !=NULL) {
                                $del_pro = $_GET['del_pro'];


                                 $query = "select * from dashboard_user where user_id = $del_pro ";
                                $select_user = $db->select($query);
                                if ($select_user) {

                                    $row = $select_user->fetch_array();
                                    $user_id = $row['user_id'];
                                    $user_full_name = $row['user_full_name'];
                                    $user_fb = $row['user_fb'];
                                    $user_twiter = $row['user_twiter'];
                                    $user_insta = $row['user_insta'];
                                         
                                    
                                }else{
                                     echo "<p style='color:red;text-align:center;'>opps!! not found the Profile</p>"; 
                                }
                            }

                         ?>

                    <div class="row">
                        <div class="col-md-6" style="margin-left:20%">
                            <?php 

                                if (isset($_POST['edit_profile'])) {

                                $del_pro_id_up =$_POST['del_pro_id_up'];
                                $user_full_name_new=$fm->validation($_POST['user_full_name']);
                                $user_fb_new =$fm->validation($_POST['user_fb']);
                                $user_twiter_new =$fm->validation($_POST['user_twiter']);
                                $user_insta_new =$fm->validation($_POST['user_insta']);
        
                                $user_img = $_FILES['img']['name'];

                                $user_full_name_new = mysqli_real_escape_string($db->link,$user_full_name_new);
                                $user_fb_new = mysqli_real_escape_string($db->link,$user_fb_new);
                                $user_twiter_new = mysqli_real_escape_string($db->link,$user_twiter_new);
                                $user_insta_new = mysqli_real_escape_string($db->link,$user_insta_new);

                                 if (!empty($user_img)) {



                                    $extension = strtolower(substr($user_img,strlen($user_img)-4,strlen($user_img)));
                                      $allowed_extensions = array(".jpg","jpeg",".png");

                                      if(in_array($extension,$allowed_extensions)){

                                      $destination = "images/".$user_img;  
                                      $file = $_FILES['img']['tmp_name'];
                                      move_uploaded_file($file, $destination); 
                                       }else{

                                         echo "<p style='color:red;text-align:center;'>image type must be (.jpg, jpeg, .png)</p>"; 
                                    }
                                  
                                  }else {
                                          $query = "select user_img from dashboard_user where user_id = $del_pro_id_up ";
                                          $select_image = $db->select($query);
                                          if ($select_image) {

                                              $row = $select_image->fetch_array();   
                                              $user_img = $row['user_img'];
                                               
                                              
                                          }else if($select_image==false){
                                               $user_img = "empty.png";
                                          }
                                      }






                                
                              

                                if (!empty($user_full_name_new) && !empty($user_img) && !empty($user_fb_new) && !empty($user_twiter_new) && !empty($user_insta_new)) {

                                    $query = "update dashboard_user set user_full_name='$user_full_name_new',user_img='$user_img',user_fb='$user_fb_new',user_twiter='$user_twiter_new',user_insta='$user_insta_new' where user_id = $del_pro_id_up ";
                                    $update = $db->update($query);
                                    if ($update) {
                                       echo "<p style='color:green;text-align:center;'>Profile Updated successfully...<a href='index.php'>View Update History</a></p>";
                                    }else{
                                        echo "<p style='color:red;text-align:center;'>opps!! profile is not Updated</p>";
                                    }

                                }else{
                                    echo "<p style='color:red;text-align:center;'>field must not be empty... <a href='index.php'>Click here to edit</a></p>";
                                }
                                 
                            }


                             ?>
                                 <form role="form" action="profile_edit.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="user_full_name" class="form-control" value="<?php echo isset($_GET['del_pro']) ? $user_full_name : '' ?> ">
                                    </div>
                                     <div class="form-group">
                                        <P>if you dot upload new photo, previous photo will be there</P>
                                        <label>User Image</label>
                                        <input type="file" name="img">
                                    </div>

                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" name="user_fb" class="form-control"  value="<?php echo isset($_GET['del_pro']) ? $user_fb :'' ?> ">
                                    </div>

                                     <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="text" name="user_twiter" class="form-control"  value="<?php echo isset($_GET['del_pro']) ? $user_twiter :'' ?> ">
                                    </div>

                                     <div class="form-group">
                                        <label>Istagram Link</label>
                                        <input type="text" name="user_insta" class="form-control"  value="<?php echo isset($_GET['del_pro']) ? $user_insta :'' ?> ">
                                    </div>

              

                                    <input type="hidden" name="del_pro_id_up" class="form-control"  value="<?php echo isset($_GET['del_pro']) ? $del_pro : '' ?> ">

                                     <div class="form-group">
                                        <label></label>
                                        <input type="submit" value="Update Profile" name="edit_profile" class="btn btn-primary">
                                    </div>

                                 </form>
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