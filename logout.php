<?php session_start(); ?>

<?php 
session_destroy();
$_SESSION['user_email'] = null; 
$_SESSION['user_pass'] =null; 
$_SESSION['user_id'] =null; 
header("Location: index.php" );

 ?>