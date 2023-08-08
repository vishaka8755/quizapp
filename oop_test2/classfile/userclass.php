<?php
include_once('Dbconnection.php');
 
class User extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    
    public function returnUsernameandtype($username, $password){
        $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
        $results = $this->connection->query($query);
        if($results->num_rows > 0){
        $row = $results->fetch_assoc();
        return $row;
        }
        else  
        {return false;}        
       
        
    }
    
        
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }

    public function registernewuser($username,$usertype,$email,$password)
    {
        $register_Query = "INSERT INTO user (username,email,password,role) value ($username,$email,$password,$usertype)" ;
        $query = $this->connection->query($register_Query);
        
    }
    public function isuserexit($username,$email){
        $check_query = "SELECT * from user WHERE username=$username OR email=$email LIMIT1 ";
        $result = $this->connection->query($check_query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }


}

?>