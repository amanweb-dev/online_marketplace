<?php include "include/header.php" ?>

<?php 
$username=Session::get('username');
$useridnew=Session::get('userId');
$$username=Session::get('user_role');


 ?>
      
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="padding-bottom: 25%;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My Profile
                            <!-- <small>View Profile</small> -->
                        </h1>
                        <br><br>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>
                            </li>
                        </ol> -->

                        <?php 
                        	$query = "select * from dashboard_user where user_id = $useridnew ";

                        	$result = $db->select($query);
                        	if ($result) {
                        		$row = $result->fetch_array();

                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $user_role = $row['user_role'];
                                $user_full_name = $row['user_full_name'];
                                $user_fb = $row['user_fb'];
                                $user_twiter = $row['user_twiter'];
                                $user_insta = $row['user_insta'];
                                $user_phto = $row['user_img'];
                        	}




                         ?>


						<h2 style="text-align:center">My Profile</h2>
						<div class="card">
						  <img src="images/<?php echo !empty($user_phto)?$user_phto:'empty.png'; ?>" alt="profile">
						  <h1><?php echo !empty($user_full_name)?$user_full_name:'Your Name'; ?></h1>
						  <p class="title"><?php echo $user_role.", Kenabecha" ?></p>
						  <p>Userrname: <?php echo $user_name; ?></p>
						  <div class="for_a" style="margin: 24px 0;">
						    <a href="https://twitter.com/<?php echo $user_twiter; ?>"><i class="fa fa-twitter"></i></a>  
						    <a href="https://www.instagram.com/<?php echo $user_insta; ?>"><i class="fa fa-instagram"></i></a>  
						    <a href="https://www.facebook.com/<?php echo $user_fb; ?>"><i class="fa fa-facebook"></i></a> 
						  </div>
						  <a href="profile_edit.php?del_pro=<?php echo $useridnew; ?>"><button>Edit</button></a>
						</div>

   

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/footer.php" ?>