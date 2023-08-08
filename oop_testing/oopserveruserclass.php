<?php include 'connection.php'; ?>
<?php session_start();?>
<?php


// initializing variables
$username = "";
$email    = "";
$password = "";
$errors = array(); 
                                                              

class User  
  
{  

// REGISTER USER
public function registeruser(){
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $usertype = $_POST['usertype'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
}

public function checkvalidity_userregisterform(){
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }   
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
}

public function checkdatabase_user(){
// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
}


    

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = ($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,role) 
  			  VALUES('$username', '$email', '$password','$usertype')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['usertype'] = $usertype;

  	$_SESSION['success'] = "You are now logged in";
  	header('location:grade.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $usertype = $_POST['usertype'];
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = ($password);
  	$query = "SELECT * FROM users WHERE username='$username'AND role ='$usertype' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['usertype'] = $usertype;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: grade.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
}

?>