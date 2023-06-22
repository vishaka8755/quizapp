
<?php 
include './sub/header1.php';
require 'ooplogin.php';
$login = new Login();
if(isset($_ ["submit"])) 
{$result=$login->login($_POST[""],$_POST[""]);

if(result == 1){

}
elseif(result == 10)
{}
elseif(result == 100)
{}
}?>



<?php  if (count($errors) > 0) : ?>
  <div class="form-label">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>


  <form method="post" action="login.php">
  
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
	
  	<p>
  		Not yet a member? <a href="user.php">Sign up</a>
  	</p>
	  </div> 
	 
	  </div>
  </form>
  <?php include 'sub/footer.php'; ?>

