<?php include "includes/header.php" ?>

<?php 
global $connection;
$amar_email = $_SESSION['user_email'];

if (isset($_GET['accept_id']) && isset($_GET['postid'])) {
	
	$accept_id = $_GET['accept_id'];
	$postid = $_GET['postid'];

	$selct_nmbr_query ="SELECT * FROM post WHERE post_id = $postid ";
	$rrssllt = mysqli_query($connection,$selct_nmbr_query);

	if ($rrssllt) {

	$rrsslltrow = mysqli_fetch_array($rrssllt);

	$contact = $rrsslltrow['post_contact'];
		
	}else{
		die("error".mysqli_error($connection));
	}
	





	$queryss = "UPDATE post SET selling_status = 1 WHERE post_id = $postid AND  post_user_email = '$amar_email' ";
	$updatess = mysqli_query($connection,$queryss);

	$query = "UPDATE orders SET confirm_status = 2,seller_number='$contact' WHERE ordr_id = $accept_id AND  seller_email = '$amar_email' ";
	$update = mysqli_query($connection,$query);
	if ($update) {
		echo "Product is Sold. We Will contact You Soon";
	}

}

if (isset($_GET['reject_id'])) {
	
	$reject_id = $_GET['reject_id'];

	$query = "UPDATE orders SET confirm_status = 4 WHERE ordr_id = $reject_id AND  seller_email = '$amar_email' ";
	$update = mysqli_query($connection,$query);
	if ($update) {
		echo "Selling Request is Rejected";
	}

}





 ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">

			<table class="table table-dark table-hover">
			    <thead>
			      <tr>
			        <th>Post Title</th>
			        <th>Selling Confirmation</th>
			        <th>Reject</th>
			      </tr>
			    </thead>
			    <tbody>

			    	<?php
						 
						

						$order_req_query = "SELECT * FROM orders WHERE seller_email = '$amar_email' AND confirm_status = 1 ";

						$order_req_query_rslt = mysqli_query($connection,$order_req_query);
						if ($order_req_query_rslt) {
							while ($row = mysqli_fetch_assoc($order_req_query_rslt)) {

								$ordr_id = $row['ordr_id'];
								$ordr_post_id = $row['ordr_post_id'];

								$ordr_post_qry = "SELECT * FROM post WHERE post_id = $ordr_post_id ";

								$ordr_post_qry_rslt = mysqli_query($connection,$ordr_post_qry);
								$rww = mysqli_fetch_array($ordr_post_qry_rslt);
								$post_title = $rww['post_title'];

								?>

							 <tr>
						        <td><?php echo $post_title ?></td>
						        <td><a href="?postid=<?php echo $ordr_post_id; ?>&amp;accept_id=<?php echo $ordr_id; ?> "><button type="submit" class="btn btn-success">Confirm</button></a></td>

						        <td><a href="?reject_id=<?php echo $ordr_id; ?> "><button type="submit" class="btn btn-success">Reject</button></a></td>
						       
						      </tr>


								<?php								
							}
						}else{
							die("error".mysqli_error($connection));
						}

					?>


			     
			    </tbody>
			</table>
		</div>
	</div>
</div>



<?php //include "includes/footer.php" ?>