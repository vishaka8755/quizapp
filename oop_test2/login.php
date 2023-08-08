
<?php include './sub/header1.php'; ?>

<?php
	
	
 
	//redirect if logged in
	if(isset($_SESSION['user'])){
		header('location:grade.php');
	}
	?>


  <form method="post" action="controller/server.php">
  
  <div class="row">

  <div class="col-sm-6"> 
	  <img src="./img/3.jpeg" alt="Logo" style="width:200px;">
	  </div>
	  
	
  <div class="col-sm-6">
	  
  		<div class="form-label">
  		<label>Username</label>
  		<input type="text" class="form-control" name="username" >
  		</div>
	  
  		<div class="form-label">
  		<label>Password</label>
  		<input type="password" class="form-control" name="password">
  		</div>

		<div class="form-label">
  		<button type="submit" class="btn btn-dark w-100" name="login_user">Login</button>
  		</div>
	  
	 			 	<?php
		    		if(isset($_SESSION['message'])){
		    		?>
		    		<div class="alert alert-warning">
					 <?php echo $_SESSION['message']; ?>
					  </div>
		    		 <?php  
		    		unset($_SESSION['message']);
		    	      }
		    ?>
	
  	<p>
  		Not yet a member? <a href="user.php">Sign up</a>
  	</p>
	  </div> 
	  
	  </div>
  </form>
  <?php include './sub/footer.php'; ?>

