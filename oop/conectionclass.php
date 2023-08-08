<?php
Class Conectionclass
{
  private  $server = "localhost";  
  private $username = "user";
  private $password = "123456";
  private $dbname="quizapp";
  private $conn;


         protected  function __construct()
         {
            try {
                             
                
                $this ->conn = new mysqli($this ->server,$this ->username,$this ->password,$this ->dbname);
                echo "conecion sucessful";
            }

                    catch(Exception $e) {
                     echo "conecion failed". $e->getMessage();
                    }
                            }

         
                  
                

                    


                        
}   

?>

                    
                    
                    