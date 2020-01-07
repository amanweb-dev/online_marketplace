<?php include "includes/header.php" ?>
<div class="container">
	<h2 style="border-bottom: 3px solid #ddd;" class="text-center mt-4 mb-4">Order processing</h2>
	<div class="row" style="min-height: 550px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6 offset-md-2">
					<h2 style="background-color: green;" class="text-center">Product Details</h2>

					<?php 
						global $connection;
						if (isset($_GET['product_id'])) {
							$the_post_id=$_GET['product_id'];


							$post_edit_query = "SELECT * FROM post WHERE post_id = $the_post_id AND post_status = 1 ";
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

							
							}
						}

						 ?>
			           
					  <table class="table table-bordered">
					    <thead>
					      <tr>
					       <!--  <label class="form-control text-center" for=""><?php echo $post_title; ?></label> -->
					       <th style="width:27%;">Product Title</th>
					        <td><?php echo $post_title; ?></td>
					      </tr>
					      <tr>
					        <th>Price</th>
					        <td><?php echo $post_price." Tk"; ?></td>
					      </tr>
					      <tr>
					        <th>Condition</th>
					        <td><?php echo $post_condition; ?></td>
					      </tr>
					       <tr>
					        <th>Product Details</th>
					        <td><?php echo $post_details; ?></td>
					      </tr>
					    </thead>
					  </table>
					 
					</div>

					<div class="col-md-3">
						 <div class="form-group">
						<div class="right-btn" style="margin-top:50%">

							<div class="row mb-3">
								<a href="#"> <button class="btn btn-danger">Buy Your Own Risk</button></a>
							</div>
							<div class="row mb-3">
								<a href="buy_via_us.php?pro_id=<?php echo $post_id; ?>"><button class="btn btn-primary">Buy Via Kenabecha</button></a>
							</div>
							
						</div>
						</div>
					</div>

				
			</div>
		</div>
	</div>
</div>

		
<?php include "includes/footer.php" ?>	