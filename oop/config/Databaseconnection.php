
<?php

Class Databaseconnection{
public $conn;
      public function __construct()
    {
        $conn = new mysqli(server,username,password,dbname);
        if(!$conn)
        {die("<h1> DatabaseConnection faild </h1>");}
        echo "connected to database";
      return  $this-> conn;
        
    }
}

?>
