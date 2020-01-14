<?php include "includes/header.php" ?>
		<div class="container main-body">
			<div class="row mt-3">
				<div class="col-md-3">
					<h3 class="text-center">Categories</h3>
					<ul class="list-group categories-list">
            <li class="list-group-item"><a href="admin.php?p_id='Mobile' ">Admin</a></li>
            <li class="list-group-item"><a href="users.php?p_id='PC_Laptop' ">Users</a></li>
            <li class="list-group-item"><a href="ads_mngmnt.php?p_id='Vehicle' ">Ads</a></li>
            <li class="list-group-item"><a href="product.php?p_id='Property' ">Category</a></li>
            <li class="list-group-item"><a href="payment.php?p_id='Accessories' ">Payment</a></li>
          </ul>
				</div>
				<div class="col-md-9 mb-4">
					                        <h1 class="page-header">
                            Wellcome to Admin
                            <small></small>
                        </h1>


                        <!-- Form Right Side -->
                         <h3 class="text-center">Manage your Category Item</h3><hr>
                        <div class="col-xs-6">
                            <?php 
                                global $connection;
                                if (isset($_POST['submit'])) { 
                                      $cat_title = $_POST['cat_title'];
                                      if ($cat_title == "" || empty($cat_title)) {
                                          echo "The Field should not be empty";
                                      }else{
                                          $query = "INSERT INTO categories(cat_title) ";
                                          $query .="VALUE('$cat_title')";
                                          $create_category_query = mysqli_query($connection,$query);
                                          if (!$create_category_query) {
                                             die("Query failed" .mysqli_error($connection));
                                          }
                                      }
                                  }

                             ?>

                             <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                 <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                            </form>

                             <?php 

                                if (isset($_GET['edit'])) {
                                   $cat_id = $_GET['edit'];
                                   include "includes/update_categories.php";
                                }
                              ?>

                        </div>


                         <!-- Form Left Side -->

                         <div class="col-xs-6 text-center">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Category Title</th>
                                         <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                   <!--  Find All Categories -->
                                     <?php 
                                                global $connection;
                                            $query = "SELECT * FROM categories";
                                            $select_categories = mysqli_query($connection,$query);

                                            while($row = mysqli_fetch_assoc($select_categories)) {
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                                 echo "<tr>";
                                                 echo "<td>{$cat_id}</td>";
                                                 echo "<td>{$cat_title}</td>";
                                                 echo "<td><a href='product.php?delete={$cat_id}'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                                                 echo "<td><a href='product.php?edit={$cat_id}'><button type='button' class='btn btn-warning'>Edit</button></a></td>";
                                                echo "</tr>";

                                            }


                                     ?>

                                    <!--  Delete Categories -->
                                     <?php 

                                        global $connection;
                                      if (isset($_GET['delete'])) {
                                            $the_cat_id = $_GET['delete'];
                                           $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                           $delete_query = mysqli_query($connection,$query);
                                           header("Location: product.php");
                                        }



                                     ?>
                                </tbody>
                            </table>
                        </div>
				</div>

			</div>
		</div>

<?php include "includes/footer.php" ?>	