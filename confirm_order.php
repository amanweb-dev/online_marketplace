<?php include "includes/header.php" ?>

<?php 
global $connection;
$login = $_SESSION['u_l'];

if ($login == true) {

$buyer_email_sessn=$_SESSION['user_email'];

if (isset($_POST['cnfrm_order'])) {
	$post_id = $_POST['post_id'];
	$seller_email = $_POST['seller_email'];
	$buyer_email = $_POST['buyer_email'];
	$customer_name = $_POST['customer_name'];
	$customer_number = $_POST['customer_number'];
	$customer_adrss = $_POST['customer_adrss'];
	$dlvry_option = $_POST['dlvry_option'];
	$payment_method = $_POST['p_method'];
	$product_price = $_POST['product_price'];

	if ($payment_method =='user_card') {

		$blnce_query = "SELECT user_card_bl FROM users WHERE user_email = '$buyer_email_sessn' ";

	$blnce_query_result = mysqli_query($connection,$blnce_query);
	$select_row = mysqli_fetch_array($blnce_query_result);
	$tk = $select_row['user_card_bl'];

	if ($tk >= $product_price) {


		$orders_query = "INSERT INTO orders(ordr_post_id,seller_email,buyer_email,receiver_name,receiver_number,receiver_address,delivery_option,payment_method,total_bill) VALUES({$post_id},'{$seller_email}','{$buyer_email}','{$customer_name}','{$customer_number}','{$customer_adrss}','{$dlvry_option}','{$payment_method}',{$product_price}) ";

		$orders_query_result = mysqli_query($connection,$orders_query);

		if ($orders_query_result) {

			$updt_tk = $tk-$product_price;

			$update_user_tk_query = "UPDATE users SET user_card_bl = $updt_tk WHERE user_email = '$buyer_email_sessn' ";
			$update_user_tk_query_rslt = mysqli_query($connection,$update_user_tk_query);


			echo "<p style='text-align:center'>Order Confirmation Successfull</br> Thank You for purchasing.We Will Contact  you soon</p>";

			$select_rcnt_ordr_query = "SELECT * FROM orders WHERE ordr_post_id = $post_id AND seller_email = '$seller_email' AND  buyer_email = '$buyer_email' AND total_bill = $product_price ORDER BY ordr_id DESC ";
			$select_rcnt_ordr_rlst =mysqli_query($connection,$select_rcnt_ordr_query);

			$roww = mysqli_fetch_array($select_rcnt_ordr_rlst);

			$ordr_id = $roww['ordr_id'];
            $ordr_post_id = $roww['ordr_post_id'];
            $seller_email = $roww['seller_email'];
            $buyer_email = $roww['buyer_email'];
            $receiver_name = $roww['receiver_name'];
            $receiver_number = $roww['receiver_number'];
            $receiver_address = $roww['receiver_address'];
            $delivery_option = $roww['delivery_option'];
            $payment_method = $roww['payment_method'];
            $total_bill = $roww['total_bill'];
            $ordr_date = $roww['ordr_date'];


			?>

			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div id="printableArea">
				<h2>Order Details</h2>
             <table class="table">
              <thead>
                <tr>
                  <th>Order Serial No:</th>
                  <td><?php echo $ordr_id; ?></td>
                </tr>

                <tr>
                  <th>Product Serial No:</th>
                  <td><?php echo $ordr_post_id; ?></td>
                </tr>

                <tr>
                  <th>Order Date:</th>
                  <td><?php echo $ordr_date; ?></td>
                </tr>

                <tr>
                  <th>Seller Email:</th>
                  <td><?php echo $seller_email; ?></td>
                </tr>

                 <tr>
                  <th>Buyer Email:</th>
                  <td><?php echo $buyer_email; ?></td>
                </tr>

                 <tr>
                  <th>Receiver Name:</th>
                  <td><?php echo $receiver_name; ?></td>
                </tr>

                <tr>
                  <th>Receiver Contact No:</th>
                  <td><?php echo $receiver_number; ?></td>
                </tr>

                <tr>
                  <th>Receiver Address:</th>
                  <td><?php echo $receiver_address; ?></td>
                </tr>

                <tr>
                  <th>Total Bill:</th>
                  <td><?php echo $total_bill." Tk"; ?></td>
                </tr>

                 <tr>
                  <th>Delivery Option:</th>
                  <td><?php echo $delivery_option; ?></td>
                </tr>

                 <tr>
                  <th>Payment Method:</th>
                  <td><?php echo $payment_method; ?></td>
                </tr>

              </thead>
        
            </table>
            
          </div>
					</div>
				</div>
			


           <div class="row mt-4 mb-4">
           	<div class="col-md-6 offset-md-3">

   				<input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Order Details" />
           		
           	</div>

           
           </div>

           </div>





			<?php

		}

		

	}else{

		echo "<script>alert('Sorry You have not sufficient Balance');</script>";
		echo "<script>window.location.href = 'ads.php'</script>";
		
	}


	}else{


		$orders_query = "INSERT INTO orders(ordr_post_id,seller_email,buyer_email,receiver_name,receiver_number,receiver_address,delivery_option,payment_method,total_bill) VALUES({$post_id},'{$seller_email}','{$buyer_email}','{$customer_name}','{$customer_number}','{$customer_adrss}','{$dlvry_option}','{$payment_method}',{$product_price}) ";

		$orders_query_result = mysqli_query($connection,$orders_query);

		if ($orders_query_result) {

			echo "Order Confirmation Successfull</br> Thank You for purchasing. Please Check Your email. We will sent you an email soon";

		}

	}






}



	
}else{

echo "<script>alert('Opps!! You Have to login First');</script>";
echo "<script>window.location.href = 'login.php'</script>";


}


 ?>






<div class="container">
	
	
	
</div>

		
<?php include "includes/footer.php" ?>	
<script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>