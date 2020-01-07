<?php 
include "lib/session.php";
Session::check_login();

 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();

 ?>


<?php 
if (isset($_GET['action'])) {
	$action = $_GET['action'];
	Session::destroy();
}



 ?>