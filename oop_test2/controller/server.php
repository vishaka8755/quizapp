


<?php
//start session
session_start();
 
include ('.\classfile\userclass.php');
 
$user = new User();
 
if(isset($_POST['login_user'])){
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
	$rows = $user->returnUsernameandtype($username, $password);
	
		if($rows){
		$username = $rows['username'];
		$usertype= $rows['role'];
  
		$_SESSION['message'] = 'login sucess';
	
		header("Location:.\grade.php");     }

		else{
			$_SESSION['message'] = 'Invalid username or password';
			header('Location:.\login.php');}
	}
		
//else{
	$_SESSION['message'] = 'You need to login first';
	header('Location:login.php');
//}

if(isset($_POST['reg_user'])){
	$username = $user->escape_string($_POST['username']);
  $usertype = $user->escape_string($_POST['usertype']);
  $email = $user->escape_string($_POST['email']);
  $password_1 = $user->escape_string($_POST['password_1']);
  $password_2 = $user->escape_string($_POST['password_2']);
  if ($password_1==$password_2)
  {
	$password = $password_1;
  }
  else {$_SESSION['message2'] = 'The two passwords do not match'; }

  if (empty(username)){$_SESSION['message2'] = 'Username is required';}  
  if (empty($email)) { $_SESSION['message2']="Email is required"; }
  if (empty($password_1)) { $_SESSION['message2']= "Password is required";}
  if (empty($password_2)) { $_SESSION['message2']= "Password is required";}

  if (empty($_SESSION['message2'])) {
	$user->registernewuser($username,$usertype,$email,$password);
	$_SESSION['message2'] = 'user registation sucessed';
	header("Location:grade.php");
  }
  
}

?>

