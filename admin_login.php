 <?php include "includes/header.php" ?>

<?php 
global $connection;
if (isset($_POST['login'])) {
	$email= $_POST['email'];
	$password= $_POST['password'];

	$email = mysqli_real_escape_string($connection,$email);
	$password = mysqli_real_escape_string($connection,$password);

	$user_query = "SELECT * FROM admin WHERE admin_email = '$email' ";
	$user_query_result = mysqli_query($connection,$user_query);
	if (!$user_query_result) {
		die('user_query_result failed '.mysqli_error($connection));
	}
		
	while ($row=mysqli_fetch_assoc($user_query_result)) {
			$admin_id= $row['admin_id'];
			$admin_email= $row['admin_email'];
			$admin_name= $row['admin_name'];
			$admin_contact= $row['admin_contact'];
			$admin_pass= $row['admin_pass'];
			
			
		}
	if (!empty($admin_email)) {
		if ($email==$admin_email && $password==$admin_pass) {
		$_SESSION['admin_email'] = $admin_email; 
        $_SESSION['admin_name'] = $admin_name; 
        $_SESSION['admin_contact'] = $admin_contact; 
        $_SESSION['admin_pass'] = $admin_pass; 
        // $_SESSION['user_pass'] = $user_pass; 

         header("Location: admin.php");
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
						<form action="admin_login.php" method="post">
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