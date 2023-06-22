<?php


class connection
{
 public $servername = "localhost";
 public $username = "user";
 public $password = "123456";
 public $dbname = "quizapp";
 public $conn;

public function  __construct()
{
    

    $this->conn = mysqli_connect($this->servername,$this->username, $this->password, $this->dbname);   
}


}



