<?php

session_start();
define('server','localhost');
define('username','user');
define('password','123456');
define('dbname','quizapp');
 include_once("Databaseconnection.php");
 $db = new Databaseconnection;
  
 //function validateInput($dbcon,$input){
 //   return mysqli_real_escape_string($dbcon,$input);
 //}

 //function redirect($message,$page){
 //   $_SESSION['message']="$message";
 //   header ("location :$page");
 //   exit(0);
 //}

?>