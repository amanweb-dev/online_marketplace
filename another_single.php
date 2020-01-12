<?php include "includes/header.php" ?>


		<div class="container main-body">
			<div class="row mt-3">
				<div class="col-md-3">
					<h3>Categories</h3>
					<ul class="list-group categories-list">
						<?php 
			    			 global $connection;
			                    $query = "SELECT * FROM categories";
			                    $cat_result = mysqli_query($connection,$query);
			                    if ($cat_result) {
			                        while ($row = mysqli_fetch_assoc($cat_result)) {
			                            $cat_id= $row['cat_id'];
			                            $cat_title = $row['cat_title'];
			                            $cat_logo = $row['cat_logo'];

			                            ?>
									<li class="list-group-item"><a href="ads.php?p_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></li>
			                       <?php }

			                    }

			                 ?>
					</ul>
				</div>
				<div class="col-md-9">
					<!-- <h3>Posts</h3> -->
					<?php 
						global $connection;
						if (isset($_GET['post_id'])) {
							$the_post_id=$_GET['post_id'];

							

								
								$user_notification =$_SESSION['user_notification'];
								$final_not = ($user_notification+1);
								$notf_user_email=$_SESSION['user_email'];

							 $querym = "UPDATE users SET user_notf = $final_not WHERE user_email = '$notf_user_email' ";
							 $post_as_markm = mysqli_query($connection,$querym);


							 // update users set user_notf = $numxsx where user_email = '$user_email'
								
							

							$post_edit_query = "SELECT * FROM post WHERE post_id = $the_post_id AND post_status = 1 AND selling_status = 0";
							$post_edit_query_result = mysqli_query($connection,$post_edit_query);
							if (!$post_edit_query_result) {
								die("view_add_query_result failed ".mysqli_error($connection));
							}

							while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
								$post_id=$row['post_id'];
								$post_user_email=$row['post_user_email'];
								$post_title=$row['post_title'];
								$post_price=$row['post_price'];
								$post_contact=$row['post_contact'];
								$post_condition=$row['post_condition'];
								$post_category=$row['post_category_id'];
								$post_location=$row['post_location'];
								$post_image=$row['post_image'];
								$post_details=$row['post_details'];

							


						 ?>
					<!-- single ad start -->
					<div class="row single-ad-item mb-3">
						<div class="col-md-12">
							<h3 class="item-title"><?php echo $post_title; ?></h3>
							
							<?php
							if ($_SESSION['u_l'] == true) {

							$match_email = $_SESSION['user_email'];



							 if($post_user_email !=$match_email ){?>

							<span><a href="order.php?product_id=<?php echo $post_id; ?>"><button class="btn btn-success" style="float: right !important;">Buy Now!</button></a></span>

							<?php } 
						}


							?>

			
							<p>
								<span class="small mr-3"><strong>Price : </strong><?php echo $post_price." BDT"; ?> </span>
								<span class="small mr-3"><i class="fa fa-phone"></i><?php echo $post_contact;  ?></span>
								<span class="small mr-3"><strong>Condition :</strong> <?php echo $post_condition; ?></span>
								<span class="small mr-3"><strong>Category :</strong> <?php echo $post_category;  ?></span>
								<span class="small mr-3"><strong>Location :</strong> <?php echo $post_location; ?></span>
							</p>
							<div class="single-item-img p_img">
								<img src="assets/img/<?php echo $post_image; ?>" alt="Mobile">
							</div>
							<h3>Details :</h3>
							<p><?php echo $post_details; ?></p>

								<?php 
								$select_user = "SELECT * FROM users WHERE user_email= '$post_user_email' ";
								$result = mysqli_query($connection,$select_user);

								if ($result) {
									while ($row=mysqli_fetch_assoc($result)) {
										
										$post_user_id=$row['user_id'];
										$post_user_name=$row['user_name'];

										
										
									}
								}


							 ?>
							<h4>Posted By: <a href="my_profile.php?pro_id=<?php echo $post_user_id; ?>"><?php echo $post_user_name; ?></a></h4>

						</div>
					</div>
					<?php }

						} ?>
					<!-- single ad ends -->
						<?php 
						global $connection;
						if (isset($_GET['p_id'])) {
							$the_post_cat_id=$_GET['p_id'];
							$post_cat_query = "SELECT * FROM post WHERE post_category = $the_post_cat_id AND post_status = 1 ";
							$post_cat_query_result = mysqli_query($connection,$post_cat_query);
							if (!$post_cat_query_result) {
								die("view_add_query_result failed ".mysqli_error($connection));
							}

							while ($row=mysqli_fetch_assoc($post_cat_query_result)) {
								$post_id=$row['post_id'];
								$post_user_email=$row['post_user_email'];
								$post_title=$row['post_title'];
								$post_price=$row['post_price'];
								$post_contact=$row['post_contact'];
								$post_condition=$row['post_condition'];
								$post_category=$row['post_category_id'];
								$post_location=$row['post_location'];
								$post_image=$row['post_image'];
								$post_details=$row['post_details'];

							


						 ?>
					<!-- single ad start -->
					<div class="row single-ad-item mb-3">
						<div class="col-md-12">
							<h3 class="item-title"><?php echo $post_title; ?></h3>
							
							<?php
							if ($_SESSION['u_l'] == true) {

							$match_email = $_SESSION['user_email'];



							 if($post_user_email !=$match_email ){?>

							<span><a href="order.php?product_id=<?php echo $post_id; ?>"><button class="btn btn-success" style="float: right !important;">Buy Now!</button></a></span>

							<?php } 
						}


							?>




							<p>
								<span class="small mr-3"><strong>Price : </strong><?php echo $post_price." BDT"; ?> </span>
								<span class="small mr-3"><i class="fa fa-phone"></i><?php echo $post_contact;  ?></span>
								<span class="small mr-3"><strong>Condition :</strong> <?php echo $post_condition; ?></span>
								<span class="small mr-3"><strong>Category :</strong> <?php echo $post_category;  ?></span>
								<span class="small mr-3"><strong>Location :</strong> <?php echo $post_location; ?></span>
							</p>
							<div class="single-item-img big">
								<img src="assets/img/<?php echo $post_image; ?>" alt="Mobile">
							</div>
							<h3>Details :</h3>
							<p><?php echo $post_details; ?></p>
						</div>
					</div>
					<?php }

						} ?>
				</div>
			</div>
		</div>
<?php include "includes/footer.php" ?>	