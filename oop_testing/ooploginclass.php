<?php


class login{
  private $username; 
  private $password;

  public function __construct($username,$password)
  {
    $this-> $username = $username; 
    $this->  $password =  $password ;
  }

  public function emptyinput($username,$password)
  {
    $errors;
    if (empty($this-> $username)) {
      array_push($errors, "Username is required");
       }
        if (empty($this->  $password)) {
            array_push($errors, "Password is required");
      }

  }
  return  $errors;

}