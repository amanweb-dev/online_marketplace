<?php 
$connection=mysqli_connect("localhost","root","","kenabecha");
global $connection;

if (isset($_POST['send_msg'])) {
		$email = $_POST['email'];
		$names = $_POST['names'];
		$contact = $_POST['contact'];
		$msg = $_POST['msg'];

$query = "INSERT INTO admin_massage(m_user_name,m_user_email,m_user_cntct,massages) VALUES('$names','$email','$contact','$msg') ";
$result = mysqli_query($connection,$query);
if ($result) {

	header("Location:contact_us.php");
}else{
	echo "opps!! something went Wrong.Please Try later.";
}
	
}




 ?>










