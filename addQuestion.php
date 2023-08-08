<?php

 include 'sub/header.php'; 

  include_once('Questionclass.php'); 
include_once('choiceclass.php'); 

$setnum  = 0;
$next = 0;
$qu = new Question();
$ch = new Choice();

if(isset($_POST['submit'])){


    $Qustion_number   = $_POST[ 'Q_NO'];
    $Question_text  = $_POST[ 'Q_TEXT'];
    $Question_text  = $_POST[ 'Q_TEXT'];
    $Correct_choice = $_POST['C_CHOICE'];
    // choice array
    $choices = array();
    $choices[1] = $_POST['CHOICE1'];
    $choices[2] = $_POST['CHOICE2'];
    $choices[3] = $_POST['CHOICE3'];
    //Question quary
    
  
    $insert_row = $qu->Addquestion($Qustion_number,$Question_text);
    //validate insert
    if($insert_row)      
    {   
     foreach($choices as $choice=>$value)
     {  if($value !='')         
      {   if ($Correct_choice==$choice){ $is_correct = 1;}
            else{
                   $is_correct = 0;  }
               $insert_row2=  $ch-> Addchoice($Qustion_number,$is_correct,$value)  ;  }   }
                
  
    $msg="question has been added";
    $total = $qu->getTotlquestion();
  $next = $total+1;}  
            }     
        ?>


      
   
  <div class="card Basic card text-black " style="width:500px; padding :2px; ">
      <h3> Add Question  </h3><br><br>
      
         
       <?php if(isset($msg))
       
       {   echo'<p>'.$msg.'</p>';
       }
       
       ?>
      
      
      <form  method="post" action="addQuestion.php">     
          
      <p><label>Question Number:</label>
      <?php
      $setnum =  $qu->getTotlquestion();
  
      $next = $setnum+1;
    
    ?>

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
    
  
     </form>
     </div>
    <?php include 'sub/footer.php'; ?>
  