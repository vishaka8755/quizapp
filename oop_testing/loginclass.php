<?php

private loginclass class  extends dbh{

    protected function getuser(&username,$password)

    {
        $stmt = $this-> connect()->prepare( "SELECT * FROM users WHERE username ='$username' AND password ='$password'";);
       
        if (!$stmt->execute(array(&username,$password))){
            $stmt = null;
            header("location:index.php?error=stmtfaild");
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt=null;
            header("location:index.php?error=user not found");
            exit();
        }
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd=password_verify($password,$pwdHashed[0]["users_pwd"]);
        if($checkPwd==false){
            $$stmt = null;
            header("location:index.php?error=user not found");
            exit();
            elseif($checkPwd==true)
            {
                $stmt = $this-> connect()->prepare( "SELECT * FROM users WHERE username = ? AND password = ?";);
                if(!stmt->execute(array(&username,$password))){
                     $stmt=null;
                     header("location:index.php?error=stmt faild")
                     exit();
                }
                  $user = $stmt->fetchAll(PDO:fetch_ASSOC);
                  session_start();
                  $_SESSION[]=$user[0][];
                  $_SESSION[]=$user[0][];
          
            }

            $stmt=null;           
        }

       
    }


}
?>