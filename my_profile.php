<?php include "includes/header.php" ?>
<?php 
global $connection;

if (isset($_GET['pro_id'])) {

    $_SESSION['post_user_id']=$_GET['pro_id']; 

    $post_user_id=$_SESSION['post_user_id'];

    $query_for_pic="SELECT * FROM users WHERE user_id= $post_user_id ";
    $result_query_for_pic = mysqli_query($connection,$query_for_pic);
    while ($row=mysqli_fetch_assoc($result_query_for_pic)) {
        $user_email = $row['user_email'];

        $_SESSION['vsting_user_email']=$user_email;

        $user_pass = $row['user_pass'];
        $user_name = $row['user_name'];
        $user_phone = $row['user_phone'];
        $user_phto = $row['user_photo'];

        $_SESSION['chthd_img']=$user_phto;
        $_SESSION['chthd_nm']=$user_name;
    }
    $query_for_count_post="SELECT post_id FROM post WHERE post_user_email= '$user_email' ";
    $result_query_for_count_post = mysqli_query($connection,$query_for_count_post);
    $rowcount=mysqli_num_rows($result_query_for_count_post);

    
}else{

$post_user_id=$_SESSION['post_user_id'];

    $query_for_pic="SELECT * FROM users WHERE user_id= $post_user_id ";
    $result_query_for_pic = mysqli_query($connection,$query_for_pic);
    while ($row=mysqli_fetch_assoc($result_query_for_pic)) {
        $user_email = $row['user_email'];

        $_SESSION['vsting_user_email']=$user_email;

        $user_pass = $row['user_pass'];

        $user_name = $row['user_name'];
        $user_phone = $row['user_phone'];
        $user_phto = $row['user_photo'];
    }
    $query_for_count_post="SELECT post_id FROM post WHERE post_user_email= '$user_email' ";
    $result_query_for_count_post = mysqli_query($connection,$query_for_count_post);
    $rowcount=mysqli_num_rows($result_query_for_count_post);


}
if (empty($user_phto)) {
        $user_phto = '1.jpg';
         $_SESSION['chthd_img']=$user_phto;
    }

//start update profile

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row all_side">
                    <div class="col-md-5 offset-md-1" style="border-right: 5px solid #d6d2d2;">
                        <div class="lft_side">
                            <div class="pro-img">
                                <img src="assets/img/<?php echo $user_phto; ?>" alt="">
                            </div>
                            <div class="basic_details">
                                <h2><?php echo $user_name; ?></h2>
                                <p><?php echo $user_email; ?></p>
                                <p><?php echo $user_phone; ?></p>

                                <?php
                                if ($_SESSION['u_l'] == true) {
                                    
                                
                                $my_email=$_SESSION['user_email'];
                                $limit=0;

                                    $rtng_query = "SELECT * FROM orders WHERE seller_email = '$my_email' AND confirm_status = 3 OR buyer_email = '$my_email' AND confirm_status = 3";
                                    $rtng_query_rslt = mysqli_query($connection,$rtng_query);
                                    $rating_num=mysqli_num_rows($rtng_query_rslt);

                                    if ($rtng_query_rslt) {

                                        if ($rating_num>0 && $rating_num<=5) {
                                           $limit=1; 
                                        }
                                        if ($rating_num>5 && $rating_num<=10) {
                                           $limit=2; 
                                        }
                                        if ($rating_num>10 && $rating_num<=15) {
                                           $limit=3; 
                                        }
                                        if ($rating_num>15 && $rating_num<=30) {
                                           $limit=4; 
                                        }
                                        if ($rating_num>30) {
                                           $limit=5; 
                                        }
                                        
                                    }else{
                                      $limit=0;  
                                    }

                                    if ($limit>0) {

                                        for ($i=0; $i <$limit ; $i++) {?>
                                        <span style="color: red;"><i class="fa fa-star" aria-hidden="true"></i></span>
                                        
                                    <?php }
                                        
                                    }else{
                                        echo "<p>No Selling Or Buying Experience</p>";
                                    }


                                }


                                 ?>

                                    </br>
                                    </br>

                               
                                <?php 
                                    if ($_SESSION['u_l']==true && $post_user_id !=$_SESSION['user_id']) { ?>
                                         <a href="messenger.php?rsvr_id=<?php echo $post_user_id; ?>"><button class="open-button" type="button">Massage</button></a>
                                        
                                   <?php }


                                 ?>
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 offset-md-1">
                       <div class="right_side">

                        <?php 
                            $visiting_user_email = $_SESSION['vsting_user_email'];

                            $count_post_query = "SELECT * FROM post WHERE post_user_email = '$visiting_user_email' ";
                            $cnt_rs = mysqli_query($connection,$count_post_query);

                            $cnt_rs_rw = mysqli_num_rows( $cnt_rs);



                             $count_post_query1 = "SELECT * FROM orders WHERE seller_email = '$visiting_user_email' AND confirm_status= 3 ";
                            $cnt_rs1 = mysqli_query($connection,$count_post_query1);

                            $cnt_rs_rw1 = mysqli_num_rows( $cnt_rs1);


                            $count_post_query2 = "SELECT * FROM orders WHERE buyer_email = '$visiting_user_email' AND confirm_status= 3";
                            $cnt_rs2 = mysqli_query($connection,$count_post_query2);

                            $cnt_rs_rw2 = mysqli_num_rows( $cnt_rs2);


                         ?>
                         <div class="counts">
                        <h3>Total Add: <?php echo $cnt_rs_rw; ?></h3>
                         <h3>Total Selling Transaction : <?php echo $cnt_rs_rw1; ?></h3>
                         <h3>Total Buying Transaction : <?php echo $cnt_rs_rw2; ?></h3>
                         </div>

                         <a target="_blank" href="single_user_adds.php?uemail=<?php echo $visiting_user_email;?>"><button style="margin-top: 50px;" class="btn btn-primary">See All post From This User</button></a>
                            
                       </div>
                    </div>
            </div>

        </div>
    </div>

    <div class="chat-popup all-bx" id="myForm">
        
    </div>


</div>






<?php include "includes/footer.php" ?>



