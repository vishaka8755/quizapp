<?php
include_once('DbConnection.php');
 
class Question extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    public function getTotlquestion(){

        //get total Question 

       $sql = "SELECT * FROM questions ";
       $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
         $total = mysqli_num_rows($results);
         return $total;
 
        
    }

    public function Addquestion(){
 
        
    }

       public function setQuestionNumber($number){
        $sql = "SELECT * FROM questions WHERE q_no = $number";
      
        $result3 = $this->connection->query($sql) or die($this->connection->error.__LINE__);
       $row1 = $result3->fetch_assoc();
       return $row1;
        
    }
  
  


}
        
 
    ?>