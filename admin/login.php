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
      if (isset($_POST['login'])) {
        $username = $fm->validation($_POST['uname']);
        $password =  $fm->validation(md5($_POST['pass']));
        $username = mysqli_real_escape_string($db->link,$username);
        $password = mysqli_real_escape_string($db->link,$password);

        $query = "select * from dashboard_user where user_name ='$username' and user_password = '$password' ";
        $login = $db->select($query);
        if ($login != false) {
          $value = mysqli_fetch_array($login);
          $row=mysqli_num_rows($login);
          if ($row>0) {
            Session::set("login", true);
            Session::set("username", $value['user_name']);
            Session::set("userId", $value['user_id']);
            Session::set("userRole", $value['user_role']);
            Session::set("user_img", $value['user_img']);
            header("Location:index.php");
          }else{
            echo "<span style='color:red;text-align:center;font-size:20px;'>No record found</span>";
          }
        }else{
          echo "<span style='color:red; text-align:center; font-size:20px;'>username or password not matched</span>";
        }
      }

     ?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>LOG IN page</title>
   <style type="text/css">
    .login-page {width: 360px;padding: 8% 0 0;margin: auto;}
    .form {position: relative;z-index: 1;background: #FFFFFF;max-width: 360px;margin: 0 auto 100px;padding: 45px;text-align: center;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);}
    .form input {font-family: "Roboto", sans-serif;outline: 0;background: #f2f2f2;width: 100%;border: 0;margin: 0 0 15px;padding: 15px;box-sizing: border-box;font-size: 14px;}
    .form button {font-family: "Roboto", sans-serif;text-transform: uppercase;outline: 0;background: #4CAF50;width: 100%;border: 0;padding: 15px;color: #FFFFFF;font-size: 14px;-webkit-transition: all 0.3 ease;transition: all 0.3 ease;cursor: pointer;}
    .form button:hover,.form button:active,.form button:focus {background: #43A047;}
    .form .message {margin: 15px 0 0; color: #b3b3b3;font-size: 12px;}
    .form .message a {color: #4CAF50;text-decoration: none;}
  </style>
 </head>
 <body>

 <div class="login-page">
  <p style="font-size: 32px;text-align: center">Admin Login</p>
  <div class="form">
    <form class="login-form" action="login.php" method="post">
      <input type="text" name="uname" placeholder="Enter Username"/>
     <input type="password" name="pass" placeholder="Enter_Password"/>
      <button name="login">login</button>
    </form>
  </div>
</div>

  </body>
</html>

