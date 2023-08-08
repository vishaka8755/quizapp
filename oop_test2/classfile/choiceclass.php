<?php
include_once('DbConnection.php');



class Choice extends DbConnection{
   
   
   
    public function __construct(){

        parent::__construct();
    }

    public function getcorrectchoice($number){
        //get correct choise

  $query = " SELECT * FROM choise  WHERE q_no = '$number' AND is_correct = '1' ";
   //get result
   $result = $this->connection->query($query) or die( $this->connection->error.__LINE__);
  
//get row 
    $row = $result->fetch_assoc();
    return $row;
        
    }

    public function Addchoice(){
 
        
    }
    public function getchoice($number){
        // get choices 
      
      $sqll = "SELECT * FROM choise WHERE q_no = $number";    

      $choices = $this->connection->query($sqll)or die($this->connection->error.__LINE__);
      return $choices;

    }
         
      


}
?>