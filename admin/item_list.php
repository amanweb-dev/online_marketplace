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
                            Item
                            <small>Item List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>item_list
                            </li>
                        </ol>
                        
                        <div class="row">
                            <?php 
                                    if (isset($_GET['del_item_id'])) {
                                        $del_id = $_GET['del_item_id'];

                                        $select_query = "select item_img from item where item_id = $del_id ";
                                            $result_query = $db->select($select_query);
                                            if ($result_query) {

                                                $image_row = $result_query->fetch_array();
                                                $item_img = $image_row['item_img'];
                                                unlink('../images/item_img/'.$item_img);
                                                
                                            }

                                        $query = "delete from item where item_id = $del_id";
                                        $del_result = $db->delete($query);
                                        if ($del_result) {
                                            echo "<p style='color:green;text-align:center;font-size:20px;'>Item deleted successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete Item</p>";
                                        }
                                    }

                                 ?>
                            <div class="col-md-12">
                                <h2 style="text-align: center;">View List</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr class="danger">
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Details</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                 <?php 
                                                        $query = "select * from item";
                                                        $result = $db->select($query);
                                                        if ($result) {
                                                            $number_of_rows = mysqli_num_rows($result);
                                                            $count=1;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $item_id = $row['item_id'];
                                                                $item_name = $row['item_name'];
                                                                $item_cat = $row['item_cat'];
                                                                $item_location = $row['item_location'];
                                                                $item_status = $row['item_status'];
                                                                $item_price = $row['item_price'];
                                                                $item_details = $row['item_details'];
                                                                $item_img = $row['item_img'];
                                                                

                                                     ?>
                                                <tr class="success">
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $item_name; ?></td>

                                                         <?php 
                                                        $query = "select * from category where cat_id = $item_cat";
                                                        $cat_result = $db->select($query);
                                                        if ($cat_result) {
                                                            $number_of_rows = mysqli_num_rows($cat_result);
                                                            while ($row = $cat_result->fetch_assoc()) {
                                                                $cat_title = $row['cat_title'];

                                                            }
                                                        }
                                                     ?>

                                                    <td><?php echo $cat_title; ?></td>

                                                    <td><?php echo $item_location; ?></td>
                                                    <td><?php echo $item_status; ?></td>
                                                    <td><?php echo $item_price; ?></td>
                                                    <td><?php echo $fm->makeShorter($item_details,30); ?></td>
                                                    <td><img width="70px" height="70px" src="../images/item_img/<?php echo $item_img ?>" alt=""></td>
                                                    



                                                    <td><a href="item_edit.php?edit_list_id=<?php echo $item_id; ?> "><button type="submit" class="btn btn-success">Edit</button></a></td>

                                                    <td><a onclick="return confirm('Are you sure to delete?')" href="item_list.php?del_item_id=<?php echo $item_id; ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>

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