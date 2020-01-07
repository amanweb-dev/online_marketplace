<?php include "includes/header.php" ?>

	<section id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>top marketplace trends</h2>
                </div>

    			 <?php 
    			 global $connection;
                    $query = "SELECT * FROM categories LIMIT 5";
                    $cat_result = mysqli_query($connection,$query);
                    if ($cat_result) {
                        $i=0;
                        while ($row = mysqli_fetch_assoc($cat_result)) {
                            $cat_id[$i] = $row['cat_id'];
                            $cat_title[$i] = $row['cat_title'];
                            $cat_logo[$i] = $row['cat_logo'];

                        $i++;}

                    }

                 ?>
                <div class="col-md-6">
                    <div class="categories-item">
                        <div class="single-categories-item item1">
                            <div class="item-content">
                                <a href="ads.php?p_id=<?php echo $cat_id[0]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[0]; ?>" alt="">
                                <h3><?php echo $cat_title[0]; ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="single-categories-item item3">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[1]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[1]; ?>" alt="">
                                <h3><?php echo $cat_title[1]; ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="single-categories-item item4">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[2]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[2]; ?>" alt="">
                                <h3><?php echo $cat_title[2]; ?></h3>
                                 </a>
                            </div>
                        </div>
                        <div class="single-categories-item item5">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[3]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[3]; ?>" alt="">
                                <h3><?php echo $cat_title[3]; ?></h3>
                                 </a>
                            </div>
                        </div>
                        <div class="single-categories-item item6">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[4]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[4]; ?>" alt="">
                                <h3><?php echo $cat_title[4]; ?></h3>
                                 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php include "includes/footer.php" ?>	