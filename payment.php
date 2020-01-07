<?php include "includes/header.php" ?>
		<div class="container main-body">
			<div class="row mt-3">
				<div class="col-md-3">
					<h3 class="text-center">Categories</h3>
					<ul class="list-group categories-list">
						<li class="list-group-item"><a href="admin.php?p_id='Mobile' ">Admin</a></li>
						<li class="list-group-item"><a href="users.php?p_id='PC_Laptop' ">Users</a></li>
						<li class="list-group-item"><a href="ads_mngmnt.php?p_id='Vehicle' ">Ads</a></li>
						<li class="list-group-item"><a href="product.php?p_id='Property' ">Category</a></li>
						<li class="list-group-item"><a href="payment.php?p_id='Accessories' ">Payment</a></li>
					</ul>
				</div>
				<div class="col-md-9 mb-4">
					<table class="table table-bordered table-hover">
  <h2>Payments Management</h2>
    <thead>
        <tr>
            <th>Pay Id</th>
            <th>Ordr ads id</th>
             <th>Ordr user id</th>
            <th>Ordr receive id</th>
            <th>Confirm admin id</th>
            <th>Pay Date</th>
            <th>Pay Status</th>
            <th>Confirm</th>
            <!-- <th>Date</th> -->    
            <th>Cancel</th> 
            <!-- <th>Delete</th> -->

           
        </tr>
    </thead>
     <tbody>
      <?php 
          $query = "SELECT * FROM payments ";
          $select_users = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($select_users)) {
              $payment_id = $row['payment_id'];
              $payment_orders_ad_id = $row['payment_orders_ad_id'];
              $payment_orders_user_id = $row['payment_orders_user_id'];
              $payments_orders_receive_id = $row['payments_orders_receive_id'];             
               $payment_con_admin_id = $row['payment_con_admin_id'];
               $payment_date = $row['payment_date'];
               $payment_status = $row['payment_status'];

              // $user_role = $row['user_role'];
              // $user_create_date = $row['user_date'];
              echo "<tr>";
                  echo "<td>$payment_id</td>";
                  echo "<td>$payment_orders_ad_id</td>";
                  echo "<td>$payment_orders_user_id</td>";
                  echo "<td>$payments_orders_receive_id</td>";
                
                  echo "<td>$payment_con_admin_id</td>";
                  echo "<td>$payment_date</td>";
                  echo "<td>$payment_status</td>";

                   echo "<td><button type='button' class='btn btn-warning'>Confirm</button></td>";

                   echo "<td><button type='button' class='btn btn-warning'>Cancel</button></td>";

                  // echo "<td><button type='button' class='btn btn-warning'>Edit</button></td>";

                  // echo "<td><button type='button' class='btn btn-danger'>Delete</button></td>";
                  
              echo "</tr>";       
              
          }

       ?>
      

     
  </tbody>
</table>
				</div>

			</div>
		</div>

<?php include "includes/footer.php" ?>	