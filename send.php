<?php 
$connection=mysqli_connect("localhost","root","","kenabecha");
global $connection;
$msg=$_POST['msg'];
$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['reciever_id'];
$msg_type=1;

$query = "INSERT INTO massage(sender_id,reciever_id,massages,msg_type) VALUES($sender_id,$receiver_id,'$msg',$msg_type) ";
$result = mysqli_query($connection,$query);
if ($result) {

	$query = "UPDATE massage SET msg_status=1 WHERE reciever_id = $sender_id AND sender_id = $receiver_id ";
	$result = mysqli_query($connection,$query);

	header("Location:messenger.php");
}


 ?>










