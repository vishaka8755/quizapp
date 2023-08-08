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

    public function Addquestion($Qustion_number,$Question_text){
        $query = "INSERT INTO questions (q_no,text) values ('$Qustion_number','$Question_text')";
    
        $insert_row = $this->connection->query($query)or die($this->connection->error.__LINE__);
        
        return $insert_row;}

        public function displayQuestion()
        {
            $sql = "SELECT * FROM questions ";
       $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
        if(mysqli_num_rows($results)>0)
        {
            while($row  = $results->fetch_assoc())
            {$data[]=$row; }
            return $data;
        }     
        }

        public function displayRecordByID($editid)
        {
            $sql = "SELECT * FROM questions WHERE q_no='$editid' ";
       $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
        if(mysqli_num_rows($results)==1)
        {
            $row  = $results->fetch_assoc();
            
            return  $row;
        }     
        }
      
        public function UpdateRecord($editid ,$Question_text)
        { 
          
          
            
            $sql = "UPDATE questions SET q_no = '$editid', text='$Question_text' WHERE q_no = '$editid' ";
             $this->connection->query($sql) or die( $this->connection->error.__LINE__);
           
            
            
            return  ;
           
          
        }

        public function deleteRecord($deleteid )
        {
           
            $sql ="DELETE  FROM  questions WHERE q_no='$deleteid ' ";
            $this->connection->query($sql) or die( $this->connection->error.__LINE__);
            
                return ;
            
                      }
        

        
    
// $number,which is come from main pageand after it assign  next number,this method use to get details relavent Question
       public function setQuestionNumber($number){
        $sql = "SELECT * FROM questions WHERE q_no = $number";
      
        $result3 = $this->connection->query($sql) or die($this->connection->error.__LINE__);
       $row1 = $result3->fetch_assoc();
       return $row1;
        
    }

   
     
    
  
  


}
        
 
    ?>