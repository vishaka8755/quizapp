

<?php include 'sub/header.php'; 
include_once('Questionclass.php');
include_once('choiceclass.php');



$number =  (int)$_GET['n'];
$question = new Question();
$Row =  $question->setQuestionNumber($number);
 $choice = new Choice();
$totalquestion = $question->getTotlquestion();    
 ?>



      <h1> ONLINE MCQ TEST - 1  </h1><br><br>
      <div class="card Basic card text-black " style="width:1000px;  ">
      <span class="border border-success border-2"></span>
      <p> Question of <?php echo $Row['q_no'];?> of <?php echo $totalquestion;?> </p>

      <p> <?php echo $Row['q_no'];?>. <?php echo $Row['text']; ?> </p>
       
      <form method="POST" action ="process.php" >      
            
      <?php
          
       $choice->getchoicedetails($number);?> 
      
        
        

       
       
       
        </div></br></br></br>

        
        <input type = "submit" name= "submit" value="next ->" class="btn btn-success"/>
        <input type = "hidden" name ="number" value=<?php echo $number; ?>"/>
   

  
   
 
</form>
 
  <?php include 'sub/footer.php'; ?>

