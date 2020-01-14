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
                            All Employees
                            <!-- <small>View User</small> -->
                        </h1><br><br>
                       <!--  <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>user_view
                            </li>
                        </ol> -->
                        
                        <div class="row" style="padding-bottom:35%;">
                            <?php 
                                    if (isset($_GET['del_user_id'])) {
                                        $del_id = $_GET['del_user_id'];

                                        $query = "delete from dashboard_user where user_id = $del_id";
                                        $del_result = $db->delete($query);
                                        if ($del_result) {
                                            echo "<p style='color:green;text-align:center;font-size:20px;'>User deleted successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete User</p>";
                                        }
                                    }

                                 ?>
                            <div class="col-md-8" style='margin-left: 15%'>
                                <!-- <h2 style="text-align: center;">View User</h2> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr class="danger">
                                                <th>No.</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                 <?php 
                                                        $query = "select * from dashboard_user ";
                                                        $result = $db->select($query);
                                                        if ($result) {
                                                            $number_of_rows = mysqli_num_rows($result);
                                                            $i=1;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $user_id = $row['user_id'];
                                                                $user_name = $row['user_name'];
                                                                $user_role = $row['user_role'];


                                                     ?>
                                                <tr class="success">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $user_name; ?></td>
                                                    <td><?php echo $user_role; ?></td>
                                                    
                                                    <td><a onclick="return confirm('Are you sure to delete?')" href="user_list.php?del_user_id=<?php echo $user_id; ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>

                                                </tr>

                                                <?php $i++;}
                                                

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