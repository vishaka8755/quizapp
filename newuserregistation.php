<?php

session_start();
$username="";
$email="";
$password="";
$password_1="";
$password_2="";
$err= array();
$errors =array();

include 'sub/header1.php'; 
require('userregistervalidationclass.php');
include_once('userclass.php'); 


$user = new User();
if(isset($_POST['reg_user'])){

	$username = $user->escape_string($_POST['username']);
    $usertype = $_POST['usertype'];  
    $email = $_POST['email'];
  
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  $validation = new Userregvalidation($_POST);
  $err= $validation->validateForm();
  ?><div class="alert alert-danger" role="alert">
 <?php 
  foreach($err as $er)
  {  
	echo $er;
	?> </br><?php 
 
   } ?>
</div><?php
 
  if(empty($err))
  {

   
	 $olduser=$user->isuserexit($username,$email);
	  if(empty($olduser))
	  {
		if ($password_1==$password_2)
		{
		  $password = $password_1;

		  $row =$user->registernewuser($username,$email,$password,$usertype);
		
		if($row){
					$_SESSION['username']= $row['username'];
					$_SESSION['usertype'] = $row['usertype'];;
					?><div class="alert alert-success" role="alert">user registation sucessed;</div>
		header("Location:grade.php");<?php 
		}
	  }
	  else { ?> <p><?php  echo array_push($errors,"The two passwords do not match");  ?></p> <?php 

	  }
	}
	else{ array_push($errors, ' user is exit.enter new username or email');  }
  
  }   

	?><div class="alert alert-warning" role="alert">
  <?php 
  foreach($errors as $er)
  {  
	echo $er;
	?> </br><?php 
 
   } ?>
</div><?php
}
  

 


  

?>






<div class="card Basic card text-black " style="width:800px; padding :50px; ">
     
<form   method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

<p>
  		<h3>Sign up</h3>
  	</p>
	 
		
  		<label >User Type </label>
		  
	  <select  class="form-select mb-3" name="usertype" aria-label="Default select example">
     <option value="admin">Admin</option>
	 <option value="user">User</option>
	 </select>
	 
          
  	
	 <div class="form-group form-group-lg">
  	  <label >Username</label>
  	  <div class = "col-xs-1">
	  <input type="text"  class="form-control input-sm "name= "username" id="inputname" placeholder="input your user name">
  	</div></div>
	  
          <div class="form-label"><label><?php echo $errors['username'] ?? ''?></label></div>

  	<div class="form-group form-group-lg">
  	  <label >Email</label>
		<div class = "col-xs-1">
  	  <input type="email" class="form-control input-sm " name="email" id="inputemail"placeholder="input your email address" >
  	</div></div>
	  
          <div class="form-label"><label><?php echo $errors['email'] ?? ''?></label></div>
	  


  	<div class="form-group form-group-lg">
  	  <label for ="inputpassword" class="control-label col-xs-1">Password</label>
		<div class = "col-xs-1">
  	  <input type="password" class="form-control input-sm " name="password_1" id="inputpassword" placeholder="input password">
		</div></div>
		
          <div class="form-label"><label><?php echo $errors['password_1'] ?? ''?></label></div>
  	<div class="form-group form-group-lg">
  	  <label for =id="inpupassword" class="control-label col-xs-1">Confirm password</label>
		<div class = "col-xs-1">
  	  <input type="password" class="form-control input-sm " name="password_2" id="inpupassword" placeholder="re enter password">
  	</div></div></br></br></br>
      <div class="form-group form-group-lg">  
	  
	  <div class="form-label"><label><?php echo $errors['password_2'] ?? ''?></label></div>
      </div>	    		
					
		
  	  <button type="submit" class="btn btn-dark w-25" name="reg_user">Register</button>
  	
	  
  	<p>
  		Already a member? <a href="newuserlogin.php">Sign in</a>
  	</p>
	 
  </form></div>

    <?php include './sub/footer.php'; ?>
