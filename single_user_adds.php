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
				<?php
				//query for view post by category 
				if (isset($_GET['p_id'])) {
				 	$p_id=$_GET['p_id'];
				 	$view_post_query = "SELECT * FROM post WHERE post_category_id= $p_id AND post_status = 1 AND selling_status = 0";
						$view_post_query_result = mysqli_query($connection,$view_post_query);
						if (!$view_post_query_result) {
							die("view_add_query_result failed ".mysqli_error($connection));
						}

						while ($row=mysqli_fetch_assoc($view_post_query_result)) {
							$post_ids=$row['post_id'];
							$post_user_email=$row['post_user_email'];
							$post_titles=$row['post_title'];
							$post_prices=$row['post_price'];
							$post_contacts=$row['post_contact'];
							$post_images=$row['post_image'];
							$post_detailses=$row['post_details'];

							?>

								<div class="row single-ad-item mb-3">

									<div class="col-md-3">
										<img src="assets/img/<?php echo $post_images; ?>" alt="myads">
									</div>
									<div class="col-md-9">
										
										<a href="single.php?post_id=<?php echo $post_ids; ?>" class="single-ad-title"><?php echo $post_titles; ?></a>

										<?php

										if ($_SESSION['u_l'] == true) {
											
										

										$match_email = $_SESSION['user_email'];



										 if($post_user_email !=$match_email ){?>

										<span><a href="order.php?product_id=<?php echo $post_ids; ?>"><button class="btn btn-success" style="float: right !important;">Buy Now!</button></a></span>

										<?php } 

										}


										?>

										
						
										<p>
											<span class="small mr-3"><?php echo "Price: ".$post_prices." BDT"; ?></span>
											<span class="small"><i class="fa fa-phone"></i><?php echo $post_contacts; ?></span>
										</p>
										<p><?php echo $post_detailses; ?></p>
										
									</div>
								</div>

								<?php	}

					 }else{ ?>
					<h3 class="text-center">All Ads By Single User</h3>
					<?php 
					//query for view all Adds
						global $connection;
						if (isset($_GET['uemail'])) {
							$useremail = $_GET['uemail'];
						
						$view_post_query = "SELECT * FROM post WHERE post_user_email = '$useremail' AND post_status = 1 AND selling_status = 0";
						$view_post_query_result = mysqli_query($connection,$view_post_query);
						if (!$view_post_query_result) {
							die("view_add_query_result failed ".mysqli_error($connection));
						}

						while ($row=mysqli_fetch_assoc($view_post_query_result)) {
							$post_ids=$row['post_id'];
							$post_user_email=$row['post_user_email'];
							$post_titles=$row['post_title'];
							$post_prices=$row['post_price'];
							$post_contacts=$row['post_contact'];
							$post_images=$row['post_image'];
							$post_detailses=$row['post_details'];

					?>

					<div class="row single-ad-item mb-3">

						<div class="col-md-3">
							<img src="assets/img/<?php echo $post_images; ?>" alt="myads">
						</div>
						<div class="col-md-9">
							<a href="single.php?post_id=<?php echo $post_ids; ?>" class="single-ad-title"><?php echo $post_titles; ?></a>
							
							
							<?php

								if ($_SESSION['u_l'] == true) {
									
								

								$match_email = $_SESSION['user_email'];



								 if($post_user_email !=$match_email ){?>

								<span><a href="order.php?product_id=<?php echo $post_ids; ?>"><button class="btn btn-success" style="float: right !important;">Buy Now!</button></a></span>

								<?php } 

								}


								?>


							<p>
								<span class="small mr-3"><?php echo "Price: ".$post_prices." BDT"; ?></span>
								<span class="small"><i class="fa fa-phone"></i><?php echo $post_contacts; ?></span>
							</p>
							<p><?php echo $post_detailses; ?></p>
							
						</div>
					</div>
				<?php } 

				}else{
					die("error".mysqli_error($connection));
				}


				?>
					
				</div>

				<?php } 

				 ?>
				</div>
			</div>
		</div>

<?php include "includes/footer.php" ?>	