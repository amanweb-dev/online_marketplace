<?php 
session_start();
$connection=mysqli_connect("localhost","root","","kenabecha");
global $connection;


if ($_SESSION['u_l'] == true) {

	if (isset($_POST['cntctus'])) {
 $user_id=$_SESSION['user_id'];
$admnmsg=$_POST['admnmsg'];
$username= $_SESSION['user_name'];
$m_user_email= $_SESSION['user_email'];

$query = "INSERT INTO admin_massage(user_id,m_user_name,m_user_email,massages) VALUES($user_id,'$username','$m_user_email','$admnmsg') ";
$result = mysqli_query($connection,$query);
if ($result) {


	header("Location:user_profile.php");
}
	
}
}else{
	header("Location:index.php");
}




 ?>










