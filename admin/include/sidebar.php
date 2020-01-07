<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php 
                    if (Session::get('userRole')=='Admin' || Session::get('userRole')=='Founder' || Session::get('userRole')=='Finance') {

                        ?>

                        <li class="clr">
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Dashboard User<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="user_add.php">Add User</a>
                            </li>
                            <li>
                                <a href="user_list.php">View User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="extrnl_user_mnjmnt.php"><i class="fa fa-fw fa-dashboard"></i>External Users</a>
                    </li>
                        
                    <?php }

                    ?>
                    

                     <li class="">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>My Profile</a>
                    </li>
                    <li class="">
                        <a href="category_add.php"><i class="fa fa-fw fa-dashboard"></i>Category</a>
                    </li>
                </ul>
            </div>

    </nav>