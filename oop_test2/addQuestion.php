<?php include './sub/header.php'; ?>
<?php
if(isset($_POST['submit']))
{//get post variables 
    $Qustion_number = $_POST['Q_NO'];//left side ---variable name|| right side ---value enter to the feild
    $Question_text  = $_POST[ 'Q_TEXT'];
    $Correct_choice = $_POST['C_CHOICE'];
    // choice array
    $choices = array();
    $choices[1] = $_POST['CHOICE1'];
    $choices[2] = $_POST['CHOICE2'];
    $choices[3] = $_POST['CHOICE3'];
    //Question quary
    $query = "INSERT INTO questions (q_no,text) values ('$Qustion_number','$Question_text')";
    
    $insert_row = $conn->query($query)or die($conn->error.__LINE__);

    
    //validate insert
    if($insert_row)
        
    {
       
        foreach($choices as $choice=>$value)
        {

             if($value !='')         
            {
                     if ($Correct_choice==$choice){
                                          $is_correct = 1;}
                                            else{
                                             $is_correct = 0;    }
                


                                                    //choice Query
                            $query = "INSERT INTO choise  (q_no,is_correct,text) VALUES ('$Qustion_number','$is_correct','$value')";
                            //Run Query
                             $insert_row = $conn->query($query) or die($conn->error.__LINE__);
                            //validate insert 
    
                     if($insert_row)
                        {
                        continue;
                        }
    
                    else {
                             die('Error:('.$conn->errorno.')'.$conn->error);
                        } 
            }

        }
    
    $msg="question has been added";
}
}
 



$sql = "SELECT * FROM questions";
$results =  $conn->query($sql) or die($conn->error.__LINE__);
$total = mysqli_num_rows($results);
$next = $total+1;
        
        ?>


      
   
  <div class="card Basic card text-black " style="width:500px; padding :2px; ">
      <h3> Add Question  </h3><br><br>
      
      
    
       <?php if(isset($msg))
       
       {   echo'<p>'.$msg.'</p>';
       }?>
      
      <form  method="post" action="addQuestion.php">
       
      
      
      <p><label>Question Number:</label>
        <input value="<?php echo $next ?>" type="number" name="Q_NO" style="width:100px;"/></P>

        <p><label>Question:</label>
        <input type = "text" name = "Q_TEXT"/></P>

        <p><label>Choice#1:</label>
        <input  type="text" name="CHOICE1"/></P>
        <p><label>Choice#2:</label>
        <input  type="text" name="CHOICE2"/></P>
        <p><label>Choice#3:</label>
        <input  type="text" name="CHOICE3"/></P>

    <p><label>correct choice Number :</label></p>
    <input type="number" name="C_CHOICE" style="width:100px;"/></p>
    <p><input type="submit" name="submit" value="submit" class="btn btn-success">
    </div>
    <?php
		    		if(isset($_SESSION['message'])){
		    		?>
		    		<div class="alert alert-warning">
					 <?php echo $_SESSION['message']; ?>
					  </div>
		    		 <?php  
		    		unset($_SESSION['message']);
		    	      }
		    ?>
     </form>
     <?php include 'sub/footer.php'; ?> 