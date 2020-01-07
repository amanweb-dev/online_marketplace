<?php include "includes/header.php" ?>
<div class="container">
	
	<h2 style="border-bottom: 3px solid #ddd;" class="text-center mt-4 mb-4">Order processing</h2>
	<p style="border-bottom: 3px solid green;color:red;" class="text-center mt-4 mb-4">***[ If The Product is Delivered By Kenabecha then You have to pay Delivery Charge as Your Product Category and Type When Receiving Your Product. ]***</p>
	<div class="row" style="min-height: 550px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<h2 style="background-color: green;" class="text-center">Product Details</h2>

					<?php 
						global $connection;
						if (isset($_GET['pro_id'])) {
							$the_post_id=$_GET['pro_id'];


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

					<div class="col-md-5">
						<h3 class="text-center">Order Information</h3>

					<form action="confirm_order.php" method="post">
                      <div class="form-group">
                         <label class="" for="">Receiver Name</label>
                        <input type="text" name="customer_name" class="form-control">
                      </div>
                     <div class="form-group">
                        <label class="" for="">Receiver Mobile No</label>
                      <input type="text" name="customer_number" class="form-control">
                     </div>
                     <div class="form-group">
                       <label class="" for="">Receiver Address Details</label>
                      <input type="text" name="customer_adrss" class="form-control">
                     </div>


                     <div class="form-group">
                       <label class="" for="">Product Delivery Option</label>
                        <select class="form-control" name="dlvry_option" id="">
                        <option value="self">I Will Collect</option>
                        <option value="via_system">Delivered By Kenabecha</option>
                      </select>
                     </div>

                      <div class="form-group">
                       <label class="" for="">Payment Method</label>
                        <select class="form-control" name="p_method" id="">
                        <option value="user_card">From My Card</option>
                        <option value="cash_on_del">Cash On Delivery</option>
                      </select>
                     </div>
                     <input type="hidden" name="seller_email" value="<?php echo $post_user_email; ?>">
                     <input type="hidden" name="buyer_email" value="<?php echo $_SESSION['user_email']; ?>">
                     <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                     <input type="hidden" name="product_price" value="<?php echo $post_price; ?>">

                     <div class="form-group">
                     	<input type="submit" class="btn btn-success" name="cnfrm_order" value="Confirm Order" >
                     </div>
                          
                 </form>
					</div>

				
			</div>
		</div>
	</div>
	
</div>

		
<?php include "includes/footer.php" ?>	