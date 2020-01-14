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
  <h2>View All Admin</h2>
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
             <th>Name</th>
            <th>Contact</th>
            <th>Role</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <!-- <th>Date</th> -->    
            <th>Edit</th> 
            <th>Delete</th>
           
        </tr>
    </thead>
     <tbody>
      <?php 
          $query = "SELECT * FROM admin ";
          $select_users = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($select_users)) {
              $admin_id = $row['admin_id'];
              $admin_email = $row['admin_email'];
              $admin_name = $row['admin_name'];
              $admin_contact = $row['admin_contact']; 
              $role = $row['Role'];             
              // $user_image = $row['user_image'];
              // $user_role = $row['user_role'];
              // $user_create_date = $row['user_date'];
              echo "<tr>";
                  echo "<td>$admin_id</td>";
                  echo "<td>$admin_email</td>";
                  echo "<td>$admin_name</td>";
                  echo "<td>$admin_contact</td>";
                  echo "<td>$role</td>";
                  // echo "<td> <img width='100' height='100' src='../images/$user_image' alt='image'></td>";
                  // echo "<td>$user_role</td>";
                  // echo "<td>$user_create_date</td>";

                   echo "<td><button type='button' class='btn btn-warning'>Admin</button></td>";

                   echo "<td><button type='button' class='btn btn-warning'>Subscriber</button></td>";

                  echo "<td><button type='button' class='btn btn-warning'>Edit</button></td>";

                  echo "<td><button type='button' class='btn btn-danger'>Delete</button></td>";
                  
              echo "</tr>";       
              
          }

       ?>
      

     
  </tbody>
</table>
				</div>

			</div>
		</div>

<?php include "includes/footer.php" ?>	