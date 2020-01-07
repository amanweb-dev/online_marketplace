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
                            Unaprove Post
                            <small>Post List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>all_unprv_postlist
                            </li>
                        </ol>
                        
                        <div class="row">
                           
                            <div class="col-md-12">
                                <h2 style="text-align: center;">View List</h2>

                                <div class="table-responsive" style="margin-bottom: 200px">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr class="danger">
                                                <th>No.</th>
                                                <th>post_title</th>
                                                <th>post_price</th>
                                                <th>post_image</th>
                                                <th>post_details</th>
                                                <th>Approve</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php 

                                                    if (isset($_GET['aprv_post_id'])) {

                                                        $aprv_post_id = $_GET['aprv_post_id'];

                                                        $aprv = 1;

                                                        $query = "update  post set post_status = $aprv,post_mark = $mark where post_id = $aprv_post_id ";

                                        $update = $db->update($query);
                                        if ($update) {
                                          echo "<p style='color:green;text-align:center;font-size:20px;'>Post Approved successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;'>opps!! Post is not Approved</p>";
                                        }




                                                    }





                                                 ?>





                                           
                                                 <?php 
                                                        $unprv = 0;
                                                        $query = "select * from post where post_status = $unprv ";

                                                        $result = $db->select($query);
                                                        if ($result) {
                                                            $number_of_rows = mysqli_num_rows($result);
                                                            $count=1;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $post_id = $row['post_id'];
                                                                $post_title = $row['post_title'];
                                                                $post_price = $row['post_price'];
                                                                $post_image = $row['post_image'];
                                                                $post_details = $row['post_details'];
                                                                
                                                                
                                                                

                                                     ?>
                                                <tr class="success">
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $post_title; ?></td> 
                                                    <td><?php echo $post_price; ?></td>
                                                    <td><img width="70px" height="70px" src="../assets/img/<?php echo $post_image; ?>" alt=""></td>
                                                    <td><?php echo $fm->makeShorter($post_details,30); ?></td>
                                                    
                                                    



                                                    <td><a onclick="return confirm('Are you sure to Approve?')" href="sngl_postlist.php?aprv_post_id=<?php echo $post_id; ?>"><button type="submit" class="btn btn-danger">Approve</button></a></td>

                                                    <td><a onclick="return confirm('Are you sure to delete?')" href="sngl_postlist.php?del_post_id=<?php echo $post_id; ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>

                                                </tr>

                                                <?php $count++; } 
                                                

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