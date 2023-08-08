<?php include('server.php'); ?>
<?php include './sub/header1.php'; ?>

  <?php  if (count($errors) > 0) : ?>
  <div class="form-label">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>


<div class="card Basic card text-black " style="width:800px; padding :50px; ">
     
<form   method="post" action="user.php">

<p>
  		<h3>Sign up</h3>
  	</p>
	 
		
  		<label >User Type </label>
		  
	  <select  class="form-select mb-3" name="usertype" aria-label="Default select example">
     <option selected value="user">User</option></select>
          
  	
	 <div class="form-group form-group-lg">
  	  <label >Username</label>
  	  <div class = "col-xs-1">
	  <input type="text"  class="form-control input-sm "name= "username" id="inputname" placeholder="input your user name">
  	</div></div>


  	<div class="form-group form-group-lg">
  	  <label >Email</label>
		<div class = "col-xs-1">
  	  <input type="email" class="form-control input-sm " name="email" id="inputemail"placeholder="input your email address" >
  	</div></div>
	  
	  


  	<div class="form-group form-group-lg">
  	  <label for ="inputpassword" class="control-label col-xs-1">Password</label>
		<div class = "col-xs-1">
  	  <input type="password" class="form-control input-sm " name="password_1" id="inputpassword" placeholder="input password">
		</div></div>

  	<div class="form-group form-group-lg">
  	  <label for =id="inpupassword" class="control-label col-xs-1">Confirm password</label>
		<div class = "col-xs-1">
  	  <input type="password" class="form-control input-sm " name="password_2" id="inpupassword" placeholder="re enter password">
  	</div></div></br></br></br>

	  
		
  	  <button type="submit" class="btn btn-dark w-25" name="reg_user">Register</button>
  	
	  
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
	 
  </form></div>

  <?php include 'sub/footer.php'; ?>
