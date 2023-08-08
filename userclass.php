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
    }
        
       
             
       
        function check($username)
        {
                if (empty($username)){
                    echo "username is required";
                                    }
                else
                {return false;}
        }

        function check2($password)
        {
                if (empty($password)){
                    echo "password is required";
                }
                else
                {return false;}
        }
    
    
        
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }

    public function registernewuser($username,$email,$password,$usertype)
    {
        $register_Query = "INSERT INTO users (username,email,password,role) value ('$username','$email','$password','$usertype')" ;
        $query2 = $this->connection->query($register_Query)or die($this->connection->error.__LINE__);
        
        return $query2;   
        
    }
 public function isuserexit($username,$email){
        $check_query = "SELECT * from users WHERE username='$username' OR email='$email' limit 1 ";
        $result = $this->connection->query($check_query);
        if(mysqli_num_rows($result)>0)
        {
            return $username;}
             else 
            {
          return false;
            }

            }

 public function displayuser(){
        $sql = "SELECT * from users ";
        $result = $this->connection->query( $sql);

        if(mysqli_num_rows($result)>0)
        {
            while($row  = $result->fetch_assoc())
            {$data[]=$row; }
            return $data;
        }     

           }

        public function displayuserbyid($editid){
                       
                $sql = "SELECT * FROM users  WHERE username ='$editid' ";

            $result = $this->connection->query( $sql);
            if(mysqli_num_rows($result)==1)
            {
                $row  = $result->fetch_assoc();
                
                return  $row;
            }     
             }

public function updateuser($email,$password,$usertype,$editid)
    {
        $sql = "UPDATE users SET  email= '$email', password ='$password',role ='$usertype' WHERE username = '$editid' ";
        $this->connection->query($sql) or die( $this->connection->error.__LINE__);
        
       return  ;
    }
       
        public function deleteuser($deleteid)
    {
        $sql ="DELETE  FROM  users WHERE username ='$deleteid' ";
        $this->connection->query($sql) or die( $this->connection->error.__LINE__);
        
            return   ;
        }
    }
?>