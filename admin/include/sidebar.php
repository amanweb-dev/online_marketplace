<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php 
                    if (Session::get('userRole')=='Admin' || Session::get('userRole')=='Founder' || Session::get('userRole')=='Finance') {

                        ?>

                        <li class="clr">
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Employees<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="user_add.php">Add Employee</a>
                            </li>
                            <li>
                                <a href="user_list.php">All Employees</a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="extrnl_user_mnjmnt.php"><i class="fa fa-fw fa-dashboard"></i>List of Buyer/Seller</a>
                    </li>
                        
                    <?php }

                    ?>
                    

                     
                    <li class="">
                        <a href="category_add.php"><i class="fa fa-fw fa-dashboard"></i>Category List</a>
                    </li>
                    <li class="">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>My Profile</a>
                    </li>
                </ul>
            </div>

    </nav>