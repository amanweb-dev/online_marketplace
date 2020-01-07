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
                            External Users
                            <small>External User List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>extrnl_user_mnjmnt
                            </li>
                        </ol>
                        
                        <div class="row">
                            <?php 
                                    if (isset($_GET['del_user_id'])) {
                                        $del_id = $_GET['del_user_id'];

                                        $select_query = "select user_photo from users where user_id = $del_id ";
                                            $result_query = $db->select($select_query);
                                            if ($result_query) {

                                                $image_row = $result_query->fetch_array();
                                                $item_img = $image_row['user_photo'];
                                                unlink('../assets/img/'.$item_img);
                                                
                                            }

                                        $query = "delete from users where user_id = $del_id";
                                        $del_result = $db->delete($query);
                                        if ($del_result) {
                                            echo "<p style='color:green;text-align:center;font-size:20px;'>User deleted successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete User</p>";
                                        }
                                    }

                                 ?>
                            <div class="col-md-12">
                                <h2 style="text-align: center;">View List</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <h2>Users Management</h2>
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Email</th>
                                                 <th>Name</th>
                                                <th>Contact</th>
                                                <th>Photo</th>
                                                <th>Delete</th>

                                               
                                            </tr>
                                        </thead>
                                         <tbody>
                                              <?php 
                                                  $query = "SELECT * FROM users ";
                                                  $select_users =$db->select($query);
                                                  while ($row=mysqli_fetch_assoc($select_users)) {
                                                      $user_id = $row['user_id'];
                                                      $user_email = $row['user_email'];
                                                      $user_name = $row['user_name'];
                                                      $user_phone = $row['user_phone'];             
                                                       $user_photo = $row['user_photo'];

                                                       ?>
                                                      <tr>
                                                          <td><?php echo $user_id; ?></td>
                                                          <td><?php echo $user_email; ?></td>
                                                          <td><?php echo $user_name; ?></td>
                                                          <td><?php echo $user_phone; ?></td>
                                                          <td> <img width='90px' height='70' src='../assets/img/<?php echo $user_photo; ?>' alt='image'></td>

                                                           <td><a onclick="return confirm('Are you sure to delete?')" href="extrnl_user_mnjmnt.php?del_user_id=<?php echo $user_id; ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>
                                                          
                                                      </tr>

                                                      <?php      
                                                      
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