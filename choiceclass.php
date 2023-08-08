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

    public function Addchoice($Qustion_number,$is_correct,$value){
 
        $query = "INSERT INTO choise  (q_no,is_correct,text) VALUES ('$Qustion_number','$is_correct','$value')";
                            
         $insert_row = $this->connection->query($query) or die($this->connection->error.__LINE__);
         return $insert_row;
                            
    }
    public function getchoicedetails($number){
       
                $sqll = "SELECT * FROM choise WHERE q_no = '$number'";
                $choices = $this->connection->query($sqll);
                 $row = $choices->fetch_assoc();
                 Do { ?> <p>&nbsp;<input class="form-check-input" name ="choice" type="radio" value= <?php echo $row['id']; ?> > <?php echo$row['text']; ?> <p> 
       
                    <?php 
                    }

                 
                 while($row = $choices->fetch_assoc());    }
         
                  
                
                 public function displaychoice($no)
                 {
                    $sql = "SELECT * FROM choise WHERE q_no ='$no'";
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
                     $sql = "SELECT * FROM choise WHERE q_no='$editid' ";
                $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
                 if(mysqli_num_rows($results)>0)
                 {
                    while($row  = $results->fetch_assoc())
                    {$data[]=$row; }
                    return $data;
                 }     
                 }

                 public function getchoiceIDs($editid)
                 {
                     $sql = "SELECT id FROM choise WHERE q_no='$editid' ";
                $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
                 if(mysqli_num_rows($results)>0)
                 {
                    while($row  = $results->fetch_assoc())
                    {$data[]=$row; }
                    return $data;
                 }     
                 }
                 
               
                 public function UpdateRecord($id,$is_correct,$text)
                 {
                    
                     $sql ="  UPDATE choise SET  is_correct ='$is_correct',text = '$text'
                     WHERE id ='$id'  ";
                    
                     
                     
                     $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
                    
                     return $results;
                 }
         
                 public function deleteRecord( $deleteid)
                 {
                    
                     $sql ="DELETE  FROM  choise WHERE q_no='$deleteid' ";
                     $results =  $this->connection->query($sql) or die( $this->connection->error.__LINE__);
                    
                         return $results;
                        
                }
}
?>