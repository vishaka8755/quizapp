<?php include 'config/app.php'; ?>
<?php session_start();?>
<?php


class User extends Conection

{   

    public function getusers()
    {               
     $data = null;
      $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
      if( $results= $this ->connect()->query($query) )
            { while($result=mysqli_fetch_assoc($results))
              {$data[] =$result;
                 } 
             }return $data;
      } 




      public function reguser()
          {
            if  (isset($_POST['reg_user'])) {
            // receive all input values from the form
              $username = $_POST['username'];
              $usertype = $_POST['usertype'];
              $email = $_POST['email'];
              $password_1 = $_POST['password_1'];
              $password_2 = $_POST['password_2'];
      
                                        // form validation: ensure that the form is correctly filled ...
                                         // by adding (array_push()) corresponding error unto $errors array
                                            if (empty($username)) { array_push($errors, "Username is required"); }
                                            if (empty($email)) { array_push($errors, "Email is required"); }
                                             if (empty($password_1)) { array_push($errors, "Password is required"); }
                                             if ($password_1 != $password_2) {
                                     array_push($errors, "The two passwords do not match");             }
      
                                                 // first check the database to make sure 
                                                // a user does not already exist with the same username and/or email
                    
     $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result =  $this ->connect()->query( $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
          if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
          }
      
          if ($user['email'] === $email) {
            array_push($errors, "email already exists");
          }
        }
      
        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = ($password_1);//encrypt the password before saving in the database
      
            $query = "INSERT INTO users (username, email, password,role) 
                      VALUES('$username', '$email', '$password','$usertype')";
            $result= $this ->connect()->query( $query);
           
           
           
            $_SESSION['username'] = $username;
          $_SESSION['usertype'] = $usertype;
      
            $_SESSION['success'] = "You are now logged in";
            header('location:grade.php');

        }
      }
    }
           
            public function login()
            {
                if (isset($_POST['login_user'])) {
                    $username = $_POST['username'];
                     $password = $_POST['password'];
                    
                                  if (empty($username)) {
                                            array_push($errors, "Username is required");
                                           }
                                    if (empty($password)) {
                                                  array_push($errors, "Password is required");
                                          }
        
                                      if (count($errors) == 0) {
              
                                          $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
                                          $results =  $this ->connect()->query($query);
                                        $result = $results->fetch_assoc();
                                        if ($result) 
                                          {
                                       
                                            
                                          $_SESSION['username'] = $result['username'];
                  
        
                                          $_SESSION['usertype'] = $result['role'];
                                        
                                          $_SESSION['success'] = "You are now logged in";
                                          header('location: grade.php');
                                        } array_push($errors, "invalid login details");
                                      
                                      } 

            }
          }}

?>
