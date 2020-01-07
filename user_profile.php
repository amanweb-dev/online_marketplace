<?php include "includes/header.php" ?>
<?php 
$login = $_SESSION['u_l'];
if ($login==true){


global $connection;
if (isset($_SESSION['user_pass'])) {
	$user_email_ss=$_SESSION['user_email']; 

	$query_for_pic="SELECT * FROM users WHERE user_email= '$user_email_ss' ";
	$result_query_for_pic = mysqli_query($connection,$query_for_pic);
	while ($row=mysqli_fetch_assoc($result_query_for_pic)) {
		$user_email = $row['user_email'];
		$user_pass = $row['user_pass'];
		$user_name = $row['user_name'];
		$user_phone = $row['user_phone'];
		$user_phto = $row['user_photo'];
		$user_card = $row['user_card'];
		$user_balance = $row['user_card_bl'];
	}
	$query_for_count_post="SELECT post_id FROM post WHERE post_user_email= '$user_email_ss' ";
	$result_query_for_count_post = mysqli_query($connection,$query_for_count_post);
	$rowcount=mysqli_num_rows($result_query_for_count_post);

	
}
if (empty($user_phto)) {
		$user_phto = '1.jpg';
	}

//start update profile
if (isset($_POST['edit_profile'])) {
	$usernames = $_POST['username'];
	$phones = $_POST['phone'];
	$passwords = $_POST['password'];

	$usernames = mysqli_real_escape_string($connection,$usernames);
	$phones = mysqli_real_escape_string($connection,$phones);
	$passwords = mysqli_real_escape_string($connection,$passwords);

	///image file query
      $user_phtos = $_FILES['user_phto']['name'];
      $destination = "assets/img/" . $user_phtos;  
      $file = $_FILES['user_phto']['tmp_name'];
      move_uploaded_file($file, $destination);

       if (empty($user_phtos)) {
            $query_select_user_image = "SELECT user_phto FROM users WHERE user_email = '$user_email_ss' ";
            $select_user_image = mysqli_query($connection,$query_select_user_image);
            while($row=mysqli_fetch_assoc($select_user_image)) {
            $user_phtos = $row['user_phto'];
            }
          }

	
	$passwords = password_hash($passwords, PASSWORD_BCRYPT,  array('cost' => 12 ));

	$user_update = "UPDATE users SET ";
    $user_update .= "user_name = '{$usernames}', ";
    $user_update .= "user_phone = '{$phones}', ";
    $user_update .= "user_photo = '{$user_phtos}', ";
    $user_update .= "user_pass = '{$passwords}' ";
    
    $user_update .= "WHERE user_email = '{$user_email_ss}' ";

    $update_user_query = mysqli_query($connection,$user_update);
    if (!$update_user_query) {
        die("update_user_query  failed".mysqli_error($connection) );
    }else{
      echo "<p style='color:green' class='text-center mt-2'>Your Account Has been updated Succesfully</p>";
    }

	
}



?>
<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic text-center">
					<img src="assets/img/<?php echo $user_phto; ?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $user_name ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo "Email : ".$user_email."</br>"; ?>
						<?php echo "Contact No : ".$user_phone."</br>"; ?>
						<?php echo "Total Post : ".$rowcount."</br>"; ?>
						<?php echo "Card Number : ".$user_card."</br>"; ?>
						<?php echo "Total Balance : ".$user_balance." Tk"."</br>"; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<?php
					$pro_id = $_SESSION['user_id'];

					echo "<a href='user_profile.php?edit_user=$user_email'><button type='button' class='btn btn-success btn-sm'>Edit</button></a>";

					echo "<a target='_blank' href='my_profile.php?pro_id=$pro_id'><button type='button' style='margin-left:7px !important;' class='btn btn-danger'>My Public Profile</button></a>";
					
					?>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-6 offset-md-2">
			<?php 

				if (isset($_GET['edit_user'])) {
					?>

					<div class="jumbotron">
						<form action="user_profile.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Phone</label>
								<input type="text" name="phone" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Profile Photo</label></br>
								<input type="file" name="user_phto">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="Update" name="edit_profile" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>

					
				<?php }else{ ?>


					            <div class="profile-content">
			   <h2 class="text-center"> Your All Ad</h2>
			   <table style=" font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
			  <tr>
			    <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Title</th>
			    <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">View</th>
			    <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Edit</th>
			    <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Delete</th>
			  </tr>
			<?php 
				global $connection;
				$view_add_query = "SELECT * FROM post WHERE post_user_email = '$user_email_ss' ";
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

				?>
				

						<tr>
						<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $post_titles ?></td>
						<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;"><a href="single.php?post_id=<?php echo $post_ids; ?>"><button class="btn btn-success">View</button></a></td>
						<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;"><a href="post_an_ad.php?edit=<?php echo $post_ids; ?>"><button class="btn btn-primary">Edit</button></a></td>
						<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;"><a onclick="return confirm('Are you sure to delete?')" href="?dl_post_id=<?php echo $post_ids; ?>"><button  class="btn btn-danger">Delete</button></a></td>
						
						</tr>
  

		<?php } ?>
		</table>
            </div>


				<?php 
				if (isset($_GET['dl_post_id'])) {
					$dl_post_id = $_GET['dl_post_id'];

					$dl_qry = "DELETE FROM post WHERE post_id = $dl_post_id ";
					$dl_qry_rslt = mysqli_query($connection,$dl_qry);
					if ($dl_qry_rslt) {
						header("Location:user_profile.php");
					}
				}
			}

			 ?>

			     <?php 

        if (isset($_GET['mrkmsg'])) {
            
        
        $chk_msg_id= $_SESSION['user_id'];

        $query = "UPDATE massage SET msg_status=1 WHERE reciever_id = $chk_msg_id ";
        $result = mysqli_query($connection,$query);

            
            }

         ?>
		</div>
	</div>
</div>


<div class="hding">
	<h1><i class="fa fa-star"></i>Contact Us<i class="fa fa-star"></i></h1>
	<hr class="new5">
</div>
<div class="cntct-us">

<div class="container">
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="contact.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="email">Write Us</label>
			    <textarea class="form-control" name="admnmsg" id="" cols="30" rows="5"></textarea>
			  </div>
			  
			  
			  <button style="float: right;" type="submit" name="cntctus" class="btn btn-success">Send Us</button>
			</form>
		</div>
	</div>

</div>
</div>


<?php

}else{
	header("Location:login.php");

}
 include "includes/footer.php"; 
 ?>
