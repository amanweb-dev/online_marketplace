 <?php include "includes/header.php" ?>


<?php 
global $connection;
if (isset($_POST['login'])) {
	$email= $_POST['email'];
	$password= $_POST['password'];

	$email = mysqli_real_escape_string($connection,$email);
	$password = mysqli_real_escape_string($connection,$password);

	$user_query = "SELECT * FROM users WHERE user_email = '$email' ";
	$user_query_result = mysqli_query($connection,$user_query);
	if (!$user_query_result) {
		die('user_query_result failed '.mysqli_error($connection));
	}
		
	while ($row=mysqli_fetch_assoc($user_query_result)) {
			$user_id= $row['user_id'];
			$user_email= $row['user_email'];
			$user_name= $row['user_name'];
			$user_phone= $row['user_phone'];
			$user_pass= $row['user_pass'];
			$user_cht_phto= $row['user_photo'];
			
			
		}
	if (!empty($user_email)) {
		if ($email==$user_email && password_verify($password,$user_pass)) {
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_email'] = $user_email;
        $_SESSION['user_name'] = $user_name; 
        $_SESSION['user_phone'] = $user_phone; 
        $_SESSION['user_cht_phto'] = $user_cht_phto; 
        $_SESSION['user_pass'] = $user_pass; 

         header("Location: post_an_ad.php");
		}else{
			 echo "<p style='color:red' class='text-center mt-3'>Password Wrong</br>Please Enter A Valid Password</p>";
		}
	}else{
		echo "<p style='color:red' class='text-center mt-3'>Account Not found</p>";
	}
		
}

 ?>
		<div class="container main-body">
			<div class="row mt-5">
				<div class="col-md-6 offset-md-3">
					<div class="jumbotron">
						<form action="login.php" method="post">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="Login" name="login" class="btn btn-primary btn-block">
							</div>
						</form>
						<a href="signup.php" class="text-center">Don't have an account? Register..</a>
					</div>
				</div>
			</div>
		</div>

<?php include "includes/footer.php" ?>	