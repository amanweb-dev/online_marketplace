<?php include "includes/header.php" ?>

<?php 
global $connection;
$name=$_POST['msg'];
$myphn=$_POST['myphn'];


$query = "INSERT INTO testing(chk_cmnt,phn) VALUES('$name','$myphn') ";
$result = mysqli_query($connection,$query);



 ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<form action="" method="post" id="form-submit">
				<input type="text" name="msg" id="name">
				<input type="text" name="myphn" id="phn">
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</div>



<?php include "includes/footer.php" ?>

<script type="text/javascript">
	$('#form-submit').on('submit',function(e){

		e.preventDefault();
		console.log('success');
		$.ajax({

			type:'post',
			data:{msg:$("#name").val(),myphn:$("#phn").val()}
		})

		



	})
</script>