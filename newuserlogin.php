<?php 
session_start();
$username="";

$password="";
include 'sub/header1.php'; 
require('uservalidationclass.php');
include_once('userclass.php'); 
 
if(isset($_POST['login_user']))
          {
            $username =$_POST['username'];
            $password =$_POST['password'];

            $validation = new Uservalidation($_POST);
            $errors = $validation->validateForm();
            $user = new User();

            if(empty($errors)) {
				$rows = $user->returnUsernameandtype($username, $password);
			
			if($rows){
				$_SESSION['username']= $rows['username'];
				$_SESSION['usertype'] = $rows['role'];
				header("Location:grade.php");    
	      }
          else
			{echo "invalid login details";}

			}
        }
            
         
          ?> 





  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  
  <div class="row">

  <div class="col-sm-6"> 
	  <img src="./img/3.jpeg" alt="Logo" style="width:200px;">
	  </div>
	  
	
  <div class="col-sm-6">
	  
  		<div class="form-label">
  		<label>Username</label>
  		<input type="text" class="form-control" name="username"  >
  		</div>
          <div class="form-label"><label><?php echo $errors['username'] ?? ''?></label></div>
          
  		<div class="form-label">
  		<label>Password</label>
  		<input type="password" class="form-control" name="password">
  		</div> 	
          <div class="form-label"><label><?php echo $errors['password'] ?? ''?> </label></div>
          
		<div class="form-label">
  		<button type="submit" class="btn btn-dark w-100" name="login_user">Login</button>
  		</div>
	  
	 			
	
  	<p>
  		Not yet a member? <a href="newuserregistation.php">Sign up</a>
  	</p>
	  </div> 
	  
	  </div>
  </form>
  <?php include 'sub/footer.php'; 
  ?>

