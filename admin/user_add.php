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
                            User
                            <small>Add User</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>User_add
                            </li>
                        </ol>

                    <div class="row">
                        <div class="col-md-6" style="margin-left:20%">
                            <?php 

                                if (isset($_POST['create_user'])) {

                                $user_name =$fm->validation($_POST['user_name']);
                                $user_role =$fm->validation($_POST['user_role']);
                                $user_password =$fm->validation($_POST['user_password']);
                                $user_names = mysqli_real_escape_string($db->link,$user_name);
                                $user_role = mysqli_real_escape_string($db->link,$user_role);
                                $user_password = mysqli_real_escape_string($db->link,$user_password);
                                $user_password = md5($user_password);

                                if (!empty($user_names) && !empty($user_role) && !empty($user_password)) {

                                    $query = "SELECT * FROM dashboard_user WHERE user_name='$user_names' ";
                                    $result = $db->select($query);
                                    if ($result == false){

                                        $query = "Insert into dashboard_user(user_name,user_role,user_password) values('$user_names','$user_role','$user_password') ";
                                        $create = $db->insert($query);
                                        if ($create) {
                                           echo "<p style='color:green;text-align:center;'>user created successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;'>opps!! user is not created</p>";
                                        }

                                    }else{
                                       echo "<p style='color:red;text-align:center;'>username already used.please choose anotherone</p>"; 
                                    }

                                    

                                }else{
                                    echo "<p style='color:red;text-align:center;'>field must not be empty</p>";
                                }
                            }


                             ?>
                                 <form role="form" action="user_add.php" method="post">

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="user_name" class="form-control" placeholder="Enter Username">
                                    </div>

                                     <div class="form-group">
                                        <label>User Role</label>
                                        <select class="form-control" name="user_role" id="">
                                            <option value="Founder">Founder</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Admin">Admin</option>
                                            <option value="ordermgr">Order Manager</option>
                                            <option value="Modaretor">Modaretor</option>
                                        </select>
                                    </div>

                                     <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="user_password" class="form-control" placeholder="Enter Password">
                                    </div>

                                     <div class="form-group">
                                        <label></label>
                                        <input type="submit" value="Create User" name="create_user" class="btn btn-primary">
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