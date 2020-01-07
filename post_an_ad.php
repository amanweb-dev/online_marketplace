<?php include "includes/header.php" ?>


<?php 

if (empty($_SESSION['user_email']) || empty($_SESSION['user_pass'])) {
		header("Location: login.php");
	}else{
		$user_id=$_SESSION['user_id']; 
		$user_email=$_SESSION['user_email']; 
		$user_pass= $_SESSION['user_pass'];
		$user_name= $_SESSION['user_name'];
	}

 ?>



<?php 
//start post Add Query
global $connection;
if (isset($_POST['post_ad'])) {
	$title=mysqli_real_escape_string($connection,$_POST['title']);
	$price=mysqli_real_escape_string($connection,$_POST['price']);
	$mobile=mysqli_real_escape_string($connection,$_POST['mobile']);
	$condition=mysqli_real_escape_string($connection,$_POST['condition']);
	$category=mysqli_real_escape_string($connection,$_POST['category']);
	$location=mysqli_real_escape_string($connection,$_POST['location']);
	$post_content=mysqli_real_escape_string($connection,$_POST['post_content']);

 ///image file query
      $post_img = $_FILES['post_img']['name'];
      $destination = "assets/img/" . $post_img;  
      $file = $_FILES['post_img']['tmp_name'];
      move_uploaded_file($file, $destination);
///ending image file query

$post_create_query = "INSERT INTO post(post_user_email,post_title,post_price,post_contact,post_condition,post_category_id,post_location,post_image,post_details) ";
$post_create_query .= "VALUES('{$user_email}','{$title}','{$price}','{$mobile}','{$condition}',{$category},'{$location}','{$post_img}','{$post_content}') ";

$post_create_query_result = mysqli_query($connection,$post_create_query);
if (!$post_create_query_result) {
	die('post_create_query_result failed '.mysqli_error($connection));
}else{
	echo "post has been created";
}

}

//end post add query
 ?>



<?php 
//start edit  query
if (isset($_GET['edit'])) {
	$the_post_id=$_GET['edit'];
	$post_edit_query = "SELECT * FROM post WHERE post_id = $the_post_id ";
	$post_edit_query_result = mysqli_query($connection,$post_edit_query);
	if (!$post_edit_query_result) {
		die("view_add_query_result failed ".mysqli_error($connection));
	}

	while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
		$post_id=$row['post_id'];
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
if (isset($_POST['edit_post'])) {
	$title=mysqli_real_escape_string($connection,$_POST['title']);
	$price=mysqli_real_escape_string($connection,$_POST['price']);
	$mobile=mysqli_real_escape_string($connection,$_POST['mobile']);
	$condition=mysqli_real_escape_string($connection,$_POST['condition']);
	$category=mysqli_real_escape_string($connection,$_POST['category']);
	$location=mysqli_real_escape_string($connection,$_POST['location']);
	$post_content=mysqli_real_escape_string($connection,$_POST['post_content']);
	$post_id_edit=mysqli_real_escape_string($connection,$_POST['post_id_edit']);

 ///image file query
      $post_img = $_FILES['post_img']['name'];
      $destination = "assets/img/" . $post_img;  
      $file = $_FILES['post_img']['tmp_name'];
      move_uploaded_file($file, $destination);

  ///if image not set
      if (empty($post_img)) {
            $img_query = "SELECT * FROM post WHERE post_id = $post_id_edit ";
            $select_post_image = mysqli_query($connection,$img_query);
            while($row=mysqli_fetch_assoc($select_post_image)) {
            $post_img = $row['post_image'];
            }
          }
///updat_query
         $query_for_post_update = "UPDATE post SET ";
        $query_for_post_update .= "post_title = '{$title}', ";
        $query_for_post_update .= "post_price = '{$price}', ";
        $query_for_post_update .= "post_contact = '{$mobile}', ";
        $query_for_post_update .= "post_condition = '{$condition}', ";
        $query_for_post_update .= "post_category_id = {$category}, ";
        $query_for_post_update .= "post_location = '{$location}', ";
        $query_for_post_update .= "post_image = '{$post_img}', ";
        $query_for_post_update .= "post_details = '{$post_content}' ";
                
        $query_for_post_update .= "WHERE post_id = {$post_id_edit} ";

        $update_post = mysqli_query($connection,$query_for_post_update);
        if (!$update_post) {
            die("update post failed".mysqli_error($connection) );
        }else{
          echo "post update successfully";
        }

}
/// End Update Query
	?>
<?php 
//// start delete query

 if(isset($_GET['delete'])) {
  $the_post_delete_id = $_GET['delete'];
 $query = "DELETE FROM post WHERE post_id = {$the_post_delete_id}  ";
 $post_delete_query = mysqli_query($connection,$query);
 if (!$post_delete_query) {
   die("delete course query ".mysqli_error($connection));
 }else{
 	 header("Location: post_an_ad.php");
 }

}




 ?>



<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2 class="text-center"> Your All Ad</h2>
			<?php 
				global $connection;

					$updt_post_mark = "UPDATE post SET post_mark = 0  WHERE post_user_email = '$user_email' ";
					$rs = mysqli_query($connection,$updt_post_mark);



				$view_add_query = "SELECT * FROM post WHERE post_user_email = '$user_email' ";
				$view_add_query_result = mysqli_query($connection,$view_add_query);
				if (!$view_add_query_result) {
					die("view_add_query_result failed ".mysqli_error($connection));
				}

				while ($row=mysqli_fetch_assoc($view_add_query_result)) {
					$post_ids=$row['post_id'];
					$post_titles=$row['post_title'];
					$post_prices=$row['post_price'];
					$post_contacts=$row['post_contact'];
					$post_images=$row['post_image'];
					$post_detailses=$row['post_details'];
					$post_status=$row['post_status'];
					$selling_status=$row['selling_status'];

				

				?>
				


			<div class="row single-ad-item mb-3">
				<div class="col-md-3">
					<img src="assets/img/<?php echo $post_images ?>" alt="myads">
				</div>
				<div class="col-md-9">
					<a href="post_an_ad.php" class="single-ad-title"><?php echo $post_titles;  ?></a>
					<p>
						<span class="small mr-3"><?php echo $post_prices." "."TK"; ?></span>
						<span class="small mr-3"><i class="fa fa-phone"></i><?php echo $post_contacts; ?></span>
						<span style="color:red;" class="small ml-3"><?php echo $post_status==1?"Approved" : "Pending"; ?></span><span style="color:red;" class="small ml-3" ><?php echo $selling_status==1?"Sold Oot" : "Available"; ?></span>
					</p>
					<p><?php echo $post_detailses; ?></p>
					<div class="row">
					<span class="small mr-3"><button type='button' class='btn btn-danger'><?php echo "<a href='post_an_ad.php?edit= $post_ids '>Edit</a>"?></button></span> 
					<span class="small"><button type='button' class='btn btn-danger'><?php echo "<a href='post_an_ad.php?delete= $post_ids '>Delrte</a>"?></button> </span>	
					</div>
				</div>
			</div>
		<?php } ?>
			

		</div>



		<div class="col-md-6">
			<div class="jumbotron">
				<h2 class="text-center">Post Your Ad</h2>
				<form action="post_an_ad.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Post Title</label>
						<input type="text" name="title" value="<?php echo isset($post_title) ? $post_title : ''; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Price</label>
						<input type="text" name="price" value="<?php echo isset($post_price) ? $post_price : ''; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Contact No</label>
						<input type="text" name="mobile" value="<?php echo isset($post_contact) ? $post_contact : ''; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Condition Type</label>
						<select name="condition" id="">
							<option value="Used">Used</option>
							<option value="New">New</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Category</label>
						<select name="category" id="">
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
									<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>

			                   <?php }

			                }

			                 ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<input type="text" name="location" value="<?php echo isset($post_location) ? $post_location : ''; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Post Image</label></br>
						<input type="file" name="post_img">
					</div>
					<div class="form-group">
						<label for="post_content">Post Content:</label>
						<?php if (isset($post_details)) {
							echo "</br>".$post_details;
						} ?>
						<textarea class="form-control" name="post_content" id="" cols="20" rows="5"></textarea>
					</div>
					
					<?php 
					if (isset($the_post_id)) {
						
						echo "<div class='form-group'>
						<input type='hidden' value='$the_post_id' name='post_id_edit'>
						<input type='submit' value='Update Post !' name='edit_post' class='btn btn-primary btn-block'>
					</div>";
					}else{
						echo "<div class='form-group'>
						<input type='submit' value='Post Now !' name='post_ad' class='btn btn-primary btn-block'>
					</div>";
					}


					 ?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include "includes/footer.php" ?>