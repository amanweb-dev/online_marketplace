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
  <h2>Ads Management</h2>
    <thead>
        <tr>
            <th>Ads Id</th>
            <th>Ads User Email</th>
             <th>Ads Title</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Approve</th>
            <th>Unapprove</th>   
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
    </thead>
     <tbody>
      <?php 
          $query = "SELECT * FROM post ";
          $select_users = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($select_users)) {
              $post_id = $row['post_id'];
              $post_user_email = $row['post_user_email'];
              $post_title = $row['post_title'];
              $post_contact = $row['post_contact'];             
               $post_image = $row['post_image'];
               // $user_role = $row['user_role'];
              // $user_role = $row['user_role'];
              // $user_create_date = $row['user_date'];
              echo "<tr>";
                  echo "<td>$post_id</td>";
                  echo "<td>$post_user_email</td>";
                  echo "<td>$post_title</td>";
                  echo "<td>$post_contact</td>";
                  echo "<td> <img width='150px' height='100' src='assets/img/$post_image' alt='image'></td>";
                    //echo "<td>$user_role</td>";
                  // echo "<td>$user_role</td>";
                  // echo "<td>$user_create_date</td>";

                   echo "<td><button type='button' class='btn btn-warning'>Approve</button></td>";

                   echo "<td><button type='button' class='btn btn-warning'>Unapprove</button></td>";

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