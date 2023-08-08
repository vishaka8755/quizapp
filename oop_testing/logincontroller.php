<?php


class ooplogincontroller{
  private $username; 
  private $password;

  public function __construct($username,$password)
  {
    $this->$username = $username; 
    $this-> $password =  $password;
  }

  public function loginuser($username,$password)
  {
    
    if ($this->emptyInput()==false) 
    {
      header("location:index.php");
       }
        $this->getUser($this->$username,$this-> $password);
      }

  }

?>
