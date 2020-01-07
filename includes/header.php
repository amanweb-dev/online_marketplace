<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
//database Connection For Every Page
	include "../kinakini/includes/db.php";
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Kenabecha</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 999; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

button.bttn {
    height: 37px;
    background: #1cdcc1;
    border: 2px solid #3a988b;
    color: #f92929;
}
</style>

	</head>
	<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-info">
			<div class="container">
				<a class="navbar-brand" href="index.php">Kenabecha</a>

				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="ads.php">All Ads</a>
					</li>
				</ul>
				<?php 
				global $connection;
					///menu for login session
					
					if (isset($_SESSION['user_email']) || isset($_SESSION['user_pass'])) { 
						$_SESSION['u_l'] = true;

						$user_email=$_SESSION['user_email'];
						$query="SELECT user_photo FROM users WHERE user_email= '$user_email' ";
						$result = mysqli_query($connection,$query);
						while ($row=mysqli_fetch_assoc($result)) {
							$user_phto = $row['user_photo'];
						}
						if (empty($user_phto)) {
							$user_phto = '1.jpg';
						}

						?>
						
						<ul class="navbar-nav" style="margin-right:30px; ">

							<?php 

								$query_req = "SELECT * FROM orders WHERE seller_email = '$user_email' AND confirm_status = 1 ";

								$query_req_rslt =  mysqli_query($connection,$query_req);
								if ($query_req_rslt) {
									$cnt_rw = mysqli_num_rows($query_req_rslt);
									if ($cnt_rw>0) { 

											?>
												
												
												<li class="ordr_rq">
													<a target="_blank" href="confirm_selling.php">
													<p>Order Request <span style="padding: 3px;color:black;margin-left: 3px;border: 2px solid white;border-radius: 50%;font-weight:bold;"><?php echo $cnt_rw; ?></span></p>
													</a>
												</li>
												


											<?php
										
										
									}
								}

							 ?>

							<li id="myBtn" class="nav-item active mr-3">
								<a class="nav-link btn btn-warning" href="#"><i class="fa fa-search"></i></a>
							</li>

							<li class="nav-item active">
								<a class="nav-link btn btn-warning" href="post_an_ad.php">Post Your Ad</a>
							</li>

							<div class="dropdown ml-3">
								<img class="dropdown-toggle" data-toggle="dropdown" style="height: 35px; width: 35px; border-radius: 50%; border-style: solid; border-color: black;border-width: 2px;" src="assets/img/<?php echo $user_phto; ?>" alt="">
								<div class="dropdown-menu">
									<a class="dropdown-item" href="../kinakini/user_profile.php">My Profile</a>
									<a class="dropdown-item" href="../kinakini/logout.php">Logout</a>
								</div>
							</div>

							<div class="dropdown ml-3">

								<?php 

								$chk_msg_id= $_SESSION['user_id'];

									$query = "SELECT * FROM massage WHERE reciever_id = $chk_msg_id AND msg_status = 0";
									$result = mysqli_query($connection,$query);
									$ttl_msg = mysqli_num_rows($result);

								 ?>

								<i style="font-size: 20px; color:#fff; margin-top: 10px;" class="dropdown-toggle fa fa-envelope" data-toggle="dropdown" aria-hidden="true"><span style="color:red;font-weight:bold;padding:2px;font-size: 22px;margin-bottom: 10px;"><?php echo $ttl_msg>0 ?$ttl_msg :'' ?></span></i>
								
								<div class="dropdown-menu">
									<?php 

										if ($ttl_msg>0) { ?>

											<a class="dropdown-item" href="../kinakini/messenger.php?get_msg=<?php echo 5; ?>">See All Message</a>
										<?php }else{ ?>
												
												<a class="dropdown-item" href="#">No Message</a>

									<?php	}


									 ?>
									
									<a class="dropdown-item" href="../kinakini/user_profile.php?mrkmsg">Mark all as Read</a>
								</div>
							</div>


							<div class="dropdown ml-4">
								<?php 
									$user_email=$_SESSION['user_email'];

									$queries = "SELECT user_notf FROM users WHERE user_email = '$user_email' ";
									$resultz = mysqli_query($connection,$queries);
									if ($resultz) {
										$notf = mysqli_fetch_array($resultz);
										$numbz = $notf['user_notf'];
										$_SESSION['user_notification']=$numbz;

										// echo $numbz;


									$queryx="SELECT * FROM post WHERE post_status= 1 AND post_user_email != '$user_email' ";
									$resultx = mysqli_query($connection,$queryx);

									if ($resultx) {
										$numx = mysqli_num_rows($resultx);

										$_SESSION['user_all_not']=$numx;
										// echo $numx;

									}

									if ($numbz==$numx) {
										$notification=0;
									}else if(($numx-$numbz)>3){
											$notification=3;

									}else{
										$notification= ($numx-$numbz);
									}

									if ($notification>0) {
										
									
									$query = "SELECT * FROM post WHERE post_status = 1 AND post_user_email != '$user_email' ORDER BY post_id DESC LIMIT $notification ";
									$result = mysqli_query($connection,$query);
									if ($result) {
										$num = mysqli_num_rows($result);
										if ($num>0){


									$qr = "SELECT * FROM post WHERE post_user_email = '$user_email' AND post_mark = 1";
									$rlt = mysqli_query($connection,$qr);
									$ap_notf = mysqli_num_rows($rlt);
											
						
										
										?>

										<i style="font-size: 20px; color:#fff; margin-top: 10px;" class="dropdown-toggle fa fa-bell" data-toggle="dropdown" aria-hidden="true"><span style="color:red;font-weight:bold;padding:2px;font-size: 22px;margin-bottom: 10px;"><?php echo ($num+$ap_notf); ?></span></i>

										<div class="dropdown-menu">

											<?php

											while ($row=mysqli_fetch_assoc($result)) {
											$post_id = $row['post_id'];
											$post_title = $row['post_title'];


											?>

												
											<a class="dropdown-item" href="another_single.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>

								


											<?php	}if($ap_notf>0){ ?>
											
											<a style="color: green;" class="dropdown-item" href="post_an_ad.php">Your<?php echo " ".$ap_notf." "; ?> Post Has</br>  been Approved.</a>


											<?php }




											?>

												<a style="color:red;" class="dropdown-item" href="?mrk_all">Mark All as Read</a>


											<?php }}}else{

											$qr = "SELECT * FROM post WHERE post_user_email = '$user_email' AND post_mark = 1";
											$rlt = mysqli_query($connection,$qr);
											$ap_notf = mysqli_num_rows($rlt);

											if ($ap_notf>0) { ?>

											<i style="font-size: 20px; color:#fff; margin-top: 10px;" class="dropdown-toggle fa fa-bell" data-toggle="dropdown" aria-hidden="true"><span style="color:red;font-weight:bold;padding:2px;font-size: 22px;margin-bottom: 10px;"><?php echo $ap_notf; ?></span></i>


										<div class="dropdown-menu">

												
											<a style="color: green;" class="dropdown-item" href="post_an_ad.php">Your<?php echo " ".$ap_notf." "; ?> Post Has</br>  been Approved.</a>

												<a style="color:red;" class="dropdown-item" href="?mrk_all">Mark All as Read</a>

												
											<?php }else{



											 ?>

												<i style="font-size: 20px; color:#fff; margin-top: 10px;" class="dropdown-toggle fa fa-bell" data-toggle="dropdown" aria-hidden="true"></i>

												<div class="dropdown-menu">
													<a class="dropdown-item" href="#">No Notification</a>
												</div>


												<?php   }}}else{
													die("error".mysqli_error($connection));
												}  ?>

										 </div>			
							

							<?php 


							if (isset($_GET['mrk_all'])) {

								$user_email=$_SESSION['user_email'];
								$pst_mrk =0;

								$numxsx=$_SESSION['user_all_not'];

								// $query = "update  post set post_mark = $pst_mrk where post_user_email = '$user_email' ";

								 $query = "update  users set user_notf = $numxsx where user_email = '$user_email' ";

							 $post_as_mark = mysqli_query($connection,$query);

							 $updt_post_mark = "UPDATE post SET post_mark = 0  WHERE post_user_email = '$user_email' ";
							$rs = mysqli_query($connection,$updt_post_mark);
							 	}

							 ?>

							

							</div>


						</ul>
					<?php	}
					else{

							$_SESSION['u_l'] = false;


					  ?>
						
						<!-- menu for logout session or visitor -->	
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="signup.php">Sign Up</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="login.php">Login</a>
							</li>

							<li  id="myBtn" class="nav-item active mr-3">
								<a class="nav-link btn btn-warning" href="#"><i class="fa fa-search">
									
								</i></a>
							</li>

							<li class="nav-item active">
								<a class="nav-link btn btn-warning" href="post_an_ad.php">Post Your Ad</a>
							</li>

						</ul>


					<?php 
				}

				 ?>
						
			</div>
		</nav>

 <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>

    <form action="search_post.php" method="post">

    <label for="">Search Item</label>

   <div class="row">
   	 <div class="form-group mr-3 ml-3">
    <select class="form-control" name="category">
    <option value="all">All Categories</option>
		
		 <?php 
            $querym = "select * from categories ";

            $cat_resultm = mysqli_query($connection,$querym);
            if ($cat_resultm) {
              while ($rowm = mysqli_fetch_assoc($cat_resultm)) {
                    $cat_idm = $rowm['cat_id'];
                    $cat_titlem = $rowm['cat_title'];

         ?>
			<option value="<?php echo $cat_idm; ?>"><?php echo $cat_titlem; ?></option>

		<?php }} ?>

    </select>
  </div>

  <div class="form-group mr-3">
    <input type="text" class="form-control" placeholder="Search name" name="srch_text">
  </div>
  <button type="submit" name="search" class="bttn">Search</button>
   </div>

  
</form>
  </div>

</div>

