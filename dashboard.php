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
					<div class="row">
						<div class="col-md-4 mt-3">
						<a href="ads.php?p_id='Mobile' " class="text-center category-border">
							<img src="assets/img/pending_users.png" alt="Mobile">
							<h4>Pending Users</h4>
						</a>
					</div>
					<div class="col-md-4 mt-3">
						<a href="ads.php?p_id='PC_Laptop' " class="text-center category-border">
							<img src="assets/img/aprvd_usrs.png" alt="PC & Laptop">
							<h4>Approved Users</h4>
						</a>
					</div>
					<div class="col-md-4 mt-3">
						<a href="ads.php?p_id='PC_Laptop' " class="text-center category-border">
							<img src="assets/img/total_users.png" alt="PC & Laptop">
							<h4>Total Users</h4>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mt-3">
						<a href="ads.php?p_id='Property' " class="text-center category-border">
							<img src="assets/img/pndng_ad.png" alt="Mobile">
							<h4>Pending Advertisement</h4>
						</a>
					</div>
					<div class="col-md-4 mt-3">
						<a href="ads.php?p_id='PC_Laptop' " class="text-center category-border">
							<img src="assets/img/aprvd_ad.png" alt="PC & Laptop">
							<h4>Approved Advertisement</h4>
						</a>
					</div>
					<div class="col-md-4 mt-3">
						<a href="ads.php?p_id='Vehicle' " class="text-center category-border">
							<img src="assets/img/total_ad.png" alt="Vehicle">
							<h4>Total Advertisement</h4>
						</a>
					</div>
				</div>
				</div>
			</div>
		</div>

<?php include "includes/footer.php" ?>	