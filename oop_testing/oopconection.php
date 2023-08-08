


 


<?php
class dbh
{
  private function connect()
  {
  $username = "user";
  $password = "123456";

  try {
    $conn = new PDO("mysql:host=localhost;dbname=quizapp", $username, $password);
    // set the PDO error mode to exception
   // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    return $conn;


  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
  }
}
}



?>