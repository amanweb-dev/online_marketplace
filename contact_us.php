<?php include "includes/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row mt-4">
                <div class="col-md-4">
                    <h2 class="text-center">Location</h2>
                  <img width="100%" height="auto" src="assets/img/map.PNG" alt="">
    
                </div>
                <div class="col-md-8 mb-4">
                       <h2>Contact Us</h2>
                  <form action="contact.php" method="post">
                    <div class="form-group">
                      <label for="email">Enter Your Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="">Enter Your Name:</label>
                      <input type="text" class="form-control" id="" placeholder="Edwin Diaz" name="names">
                    </div>
                    <div class="form-group">
                      <label for="">Enter Your Contact No:</label>
                      <input type="text" class="form-control" id="" placeholder="01XXXXXXXXX" name="contact">
                    </div>
                     <div class="form-group">
                      <label for="">Your Massage:</label>
                    <textarea class="form-control" rows="5" name="msg" id=""></textarea>
                    </div>
                   <input type="submit" class="btn btn-primary" name="send_msg" value="Send Now!">
                 </form>
                </div>
            </div>
    
                 
           
            
        </div>
    </div>
        


</div>




<?php include "includes/footer.php" ?>	