<?php 
//Connect to The DAtabase

$connection = mysqli_connect("localhost","root","","kenabecha");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}
 ?>