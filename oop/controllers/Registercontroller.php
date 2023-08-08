<?php
include('./config/app.php');


class Registercontroller
{
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function registation($username,$email,$password,$usertype)
    {
        $query = "INSERT INTO users (username, email, password,role) 
                      VALUES('$username', '$email', '$password','$usertype')";
            $result= $this -> conn->query( $query);
            return $result;
    }

    public function confirmpassword($password_1,$password_2)
    {
        if ($password_1 == $password_2)
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function isUserExit($username,$email)
    {

        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
         $result = $this ->conn->query(  $user_check_query);
         if ($result->num_rows>0){return true;}else {return false;}
       
        
    }
}

?>