<?php include('server.php'); ?>
<?php include './sub/header1.php'; ?>

  <?php  if (count($errors) > 0) : ?>
  <div class="form-label">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

	
  <form method="post" action="user.php">
  
  	<div class="form-label">
  	  <label>Username</label>
  	  <input type="text" class="form-control" name= "username" >
  	</div>
  	<div class="form-label">
  	  <label>Email</label>
  	  <input type="email" class="form-control" name="email" >
  	</div>
  	<div class="form-label">
  	  <label>Password</label>
  	  <input type="password" class="form-control" name="password_1">
  	</div>
  	<div class="form-label">
  	  <label>Confirm password</label>
  	  <input type="password" class="form-control" name="password_2">
  	</div>

      <div class="form-label">
  	  <label>Upload imgage</label>
  	<input type="file" id="img" name="img" accept="image/*">
  	</div>

  	<div class="form-label">
  	  <button type="submit" class="btn btn-dark w-100" name="reg_user">Register</button>
  	</div>
	  
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
	 
  </form>
</body>
</html>