<?php include "includes/header.php" ?>
<?php if ($_SESSION['u_l'] == true){ 

$qry_id = $_SESSION['user_id'];
$user_cht_phto=$_SESSION['user_cht_phto'];


	?>

<?php 
global $connection;
if (isset($_GET['rsvr_id'])) {

	$post_user_id=$_GET['rsvr_id'];
	 $_SESSION['post_user_id'] = $post_user_id ;

	$query = "SELECT * FROM users WHERE user_id = $post_user_id ";

 $result = mysqli_query($connection,$query);
 if ($result) {
 	$rwww = mysqli_fetch_array($result);
 	$pics = $rwww['user_photo'];
 	$okz = $rwww['user_name'];
 }

}else{

if (isset($_SESSION['post_user_id'])) {
	$post_user_id=$_SESSION['post_user_id'] ;

	$query = "SELECT * FROM users WHERE user_id = $post_user_id ";

 $result = mysqli_query($connection,$query);
 if ($result) {
 	$rwww = mysqli_fetch_array($result);
 	$here_id = $rwww['user_id'];
 	$pics = $rwww['user_photo'];
 	$okz = $rwww['user_name'];
 	$_SESSION['post_user_id']=$here_id;
 }

}else{

$querys = "SELECT sender_id,reciever_id FROM massage WHERE reciever_id = $qry_id OR sender_id = $qry_id GROUP BY reciever_id ORDER BY msg_status";
 $results = mysqli_query($connection,$querys);
 $cnnts= mysqli_num_rows($results);
 if ($results && $cnnts>0) {
 	$arr = mysqli_fetch_array($results);

 	$sender_ids = $arr['sender_id'];
 	$reciever_ids = $arr['reciever_id'];


 	$querys = "SELECT user_id,user_name,user_photo FROM users WHERE user_id = $sender_ids ";
 		$results = mysqli_query($connection,$querys);
 		$cnnts= mysqli_num_rows($results);

 		if ($results && $cnnts >0) {

 		$arrp = mysqli_fetch_array($results);

 				
 			$one_id = $arrp['user_id'];
 			$pics = $arrp['user_photo'];
 			$okz = $arrp['user_name'];

 			
 			$_SESSION['post_user_id']=$one_id;
			$post_user_id =$_SESSION['post_user_id'] ;

 		  }else{

 				echo "<script>alert('No massages');</script>";
 				echo "<script>window.location= 'ads.php'</script>";

 		}


 	
 }else{

 	echo "<script>alert('No massages');</script>";
 	echo "<script>window.location= 'ads.php'</script>";
 }



}
	 

	


}




 ?>

<div class="container">
	<div class="row">
		
		<div class="col-md-3" style="background: #e8e4e4;">
			<h3 class="text-center">Inbox</h3>
			<?php 

if (isset($_GET['get_msg'])==5) {
	

 	$query = "SELECT sender_id FROM massage WHERE reciever_id = $qry_id GROUP BY sender_id ORDER BY msg_status ASC";
 $result = mysqli_query($connection,$query);
 $cnnt= mysqli_num_rows($result);
 if ($result && $cnnt>0) {
 	while ($rwwwpp = mysqli_fetch_assoc($result)) {
 		$sender_ids = $rwwwpp['sender_id'];

 		
 			$querys = "SELECT user_id,user_name,user_photo FROM users WHERE user_id = $sender_ids";
 		
 		$results = mysqli_query($connection,$querys);
 		$cont_sendr_is = mysqli_num_rows($results);
 		if ($results && $cont_sendr_is>0) {
 		
 		while ($row1 = mysqli_fetch_assoc($results)) {

 			$two_id = $row1['user_id'];
 			$two_name = $row1['user_name'];
 			$two_photo = $row1['user_photo'];

 			// $_SESSION['post_user_id']=$two_id;

 			?>

 			<div class="sidedsn">
								
				<div class="row">
					<div class="col-md-3">
						<img style="max-width: 45px;max-height: 45px;border-radius: 50%; border:2px solid black;margin-top:3px;margin-right: 7px;" src="assets/img/<?php echo $two_photo; ?>" alt="">
					</div>
					<div class="col-md-9">
						<a href="?rsvr_id=<?php echo $two_id; ?>"><p><?php echo $two_name ?></p></a>
					</div>
				</div>
			
			</div>


 		<?php } }else{?>
				
				<div class="sidedsn">
								
				<div class="row">
					<h4>Oppss!!No User</h4>
				</div>
			
			</div>

 		<?php }

 	}
 	
 }else{ ?>

 	 	<div class="sidedsn">
								
				<div class="row">
					<h4>No Message</h4>
				</div>
			
			</div>

 <?php }

}else{

 	$query = "SELECT sender_id FROM massage WHERE reciever_id = $qry_id ORDER BY msg_status ASC";
 $result = mysqli_query($connection,$query);
 $cnnt= mysqli_num_rows($result);
 if ($result && $cnnt>0) {
 	while ($rwwwpp = mysqli_fetch_assoc($result)) {
 		$sender_ids = $rwwwpp['sender_id'];

 		
 			$querys = "SELECT user_id,user_name,user_photo FROM users WHERE user_id = $sender_ids ORDER BY user_id";
 		
 		$results = mysqli_query($connection,$querys);
 		$cont_sendr_is = mysqli_num_rows($results);
 		if ($results && $cont_sendr_is>0) {
 		
 		while ($row1 = mysqli_fetch_assoc($results)) {

 			$two_id = $row1['user_id'];
 			$two_name = $row1['user_name'];
 			$two_photo = $row1['user_photo'];

 			// $_SESSION['post_user_id']=$two_id;

 			?>

 			<div class="sidedsn">
								
				<div class="row">
					<div class="col-md-3">
						<img style="max-width: 45px;max-height: 45px;border-radius: 50%; border:2px solid black;margin-top:3px;margin-right: 7px;" src="assets/img/<?php echo $two_photo; ?>" alt="">
					</div>
					<div class="col-md-9">
						<a href="?rsvr_id=<?php echo $two_id; ?>"><p><?php echo $two_name ?></p></a>
					</div>
				</div>
			
			</div>


 		<?php } }else{?>
				
				<div class="sidedsn">
								
				<div class="row">
					<h4>Oppss!!No User</h4>
				</div>
			
			</div>

 		<?php }

 	}
 	
 }else{ ?>

 	 	<div class="sidedsn">
								
				<div class="row">
					<h4>No Message</h4>
				</div>
			
			</div>

 <?php }
 }

			 ?>
			
			
		</div>

		<div class="col-md-6">

			<div class="all-bx" id="myForm">
				<div style="background-color: #a480ab;padding: 1px;" class="chthd">
					<p style="margin-left: 10px; margin-top:0px;color:white" ><img style="max-width: 45px;max-height: 45px;border-radius: 50%; border:2px solid black;margin-top:3px;margin-right: 7px;" src="assets/img/<?php echo $pics; ?>" alt=""><?php echo $okz; ?></p> 
				</div>

				<div class="both" id="parentDiv">
 							<?php 
 							// $qry_id=$_SESSION['user_id'];

 						global $connection;

 						
 							
 						
                        $query = "SELECT * FROM massage WHERE sender_id = $post_user_id AND reciever_id = $qry_id OR sender_id = $qry_id AND reciever_id = $post_user_id";
                            $result = mysqli_query($connection,$query);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                
                                    $sender_id=$row['sender_id'];
                                    $reciever_id=$row['reciever_id'];
                                    $massages=$row['massages'];
                                    $msg_date=$row['msg_date'];
                                    $msg_status=$row['msg_status'];
                                    if ($sender_id==$post_user_id && $reciever_id==$qry_id ) {
                                    	
                                    
                                    ?>
									
									<div class="receiver">
                                     <div class="row mb-3">
										<div class="col-md-2">
											<div class="img-box">
						                    	<img src="assets/img/<?php echo $pics; ?>" alt="">
						                  
						               		</div>
										</div>
										<div class="col-md-10">
											<div class="text">
						                   		<p><?php echo $massages; ?></p> 
						                   		
											</div>
										</div>
									</div>

									</div>
                                <?php
                                	}else{ ?>

                                		<div class="sender">
                                			
								<div class="row">
									<div class="col-md-10">
										<div class="text">
					                   		<p><?php echo $massages; ?></p> 
					                   		
										</div>
									</div>
									<div class="col-md-2">
										<div class="img-box">
					                    	<img src="assets/img/<?php echo $user_cht_phto; ?>" alt="">
					                  
					               		</div>
									</div>
								</div>

                                		</div>

                                	<?php }

                                }
                            }else{
                                echo mysqli_error();
                            }

                     ?>
		        </div>

	        

        	<form action=" send.php" method="post">
			  <div class="form-group">

			    <div class="row">
			    	<div class="col-md-10">
			    		<textarea name="msg" id="msg" class="textareas" required></textarea>
			    	</div>
			    	 <input type="hidden" name="reciever_id" value="<?php echo $post_user_id; ?>">
			    	 <input type="hidden" name="sender_id" value="<?php echo $_SESSION['user_id']; ?>">

			    	<div class="col-md-2">
			    		 <input type="submit" name="send" value="send" class="btn btn-primary inptbtn">
			    	</div>
			    </div>
			  </div>
			  
			 
		</form>

      </div>

          </div>


				<div class="col-md-3" style="background: #e8e4e4;">
			<h3 class="text-center">Sent Message</h3>
			<?php 

if (isset($_GET['get_msg'])==5) {
	

 	$query = "SELECT reciever_id FROM massage WHERE sender_id = $qry_id GROUP BY reciever_id ORDER BY msg_status ASC";
 $result = mysqli_query($connection,$query);
 $cnnt= mysqli_num_rows($result);
 if ($result && $cnnt>0) {
 	while ($rwwwpp = mysqli_fetch_assoc($result)) {
 		$reciever_ids = $rwwwpp['reciever_id'];

 		
 			$querys = "SELECT user_id,user_name,user_photo FROM users WHERE user_id = $reciever_ids";
 		
 		$results = mysqli_query($connection,$querys);
 		$cont_sendr_is = mysqli_num_rows($results);
 		if ($results && $cont_sendr_is>0) {
 		
 		while ($row1 = mysqli_fetch_assoc($results)) {

 			$two_id = $row1['user_id'];
 			$two_name = $row1['user_name'];
 			$two_photo = $row1['user_photo'];

 			// $_SESSION['post_user_id']=$two_id;

 			?>

 			<div class="sidedsn">
								
				<div class="row">
					<div class="col-md-3">
						<img style="max-width: 45px;max-height: 45px;border-radius: 50%; border:2px solid black;margin-top:3px;margin-right: 7px;" src="assets/img/<?php echo $two_photo; ?>" alt="">
					</div>
					<div class="col-md-9">
						<a href="?rsvr_id=<?php echo $two_id; ?>"><p><?php echo $two_name ?></p></a>
					</div>
				</div>
			
			</div>


 		<?php } }else{?>
				
				<div class="sidedsn">
								
				<div class="row">
					<h4>Oppss!!No User</h4>
				</div>
			
			</div>

 		<?php }

 	}
 	
 }else{ ?>

 	 	<div class="sidedsn">
								
				<div class="row">
					<h4>No Sent Message</h4>
				</div>
			
			</div>

 <?php }

}else{

 	$query = "SELECT reciever_id FROM massage WHERE sender_id = $qry_id GROUP BY reciever_id ORDER BY msg_status ASC";
 $result = mysqli_query($connection,$query);
 $cnnt= mysqli_num_rows($result);
 if ($result && $cnnt>0) {
 	while ($rwwwpp = mysqli_fetch_assoc($result)) {
 		$reciever_ids = $rwwwpp['reciever_id'];

 		
 			$querys = "SELECT user_id,user_name,user_photo FROM users WHERE user_id = $reciever_ids";
 		
 		$results = mysqli_query($connection,$querys);
 		$cont_sendr_is = mysqli_num_rows($results);
 		if ($results && $cont_sendr_is>0) {
 		
 		while ($row1 = mysqli_fetch_assoc($results)) {

 			$two_id = $row1['user_id'];
 			$two_name = $row1['user_name'];
 			$two_photo = $row1['user_photo'];

 			// $_SESSION['post_user_id']=$two_id;

 			?>

 			<div class="sidedsn">
								
				<div class="row">
					<div class="col-md-3">
						<img style="max-width: 45px;max-height: 45px;border-radius: 50%; border:2px solid black;margin-top:3px;margin-right: 7px;" src="assets/img/<?php echo $two_photo; ?>" alt="">
					</div>
					<div class="col-md-9">
						<a href="?rsvr_id=<?php echo $two_id; ?>"><p><?php echo $two_name ?></p></a>
					</div>
				</div>
			
			</div>


 		<?php } }else{?>
				
				<div class="sidedsn">
								
				<div class="row">
					<h4>Oppss!!No User</h4>
				</div>
			
			</div>

 		<?php }

 	}
 	
 }else{ ?>

 	 	<div class="sidedsn">
								
				<div class="row">
					<h4>No Message</h4>
				</div>
			
			</div>

 <?php }
 }

			 ?>
			
			
		</div>




		</div>

	</div>
</div>



<?php }else{
	header("Location:ads.php");
} ?>
	

<?php include "includes/footer.php" ?>

<script>
	
var objDiv = document.getElementById("parentDiv");
objDiv.scrollTop = objDiv.scrollHeight;

</script>
