

<?php include './sub/header.php'; ?>


<?php 
$_SESSION['score'] = 0;
$number = (int)$_GET['n'];

  
$question = new Question();
$Row =  $question->setQuestionNumber($number);
    
     
$choice = new Choice();
$Choice = $choice->getchoice($number);
      


$totalquestion = $question->getTotlquestion();    

    
            ?>



      <h1> ONLINE MCQ TEST - 1  </h1><br><br>
      <div class="card Basic card text-black " style="width:1000px;  ">
      <span class="border border-success border-2"></span>
      <p> Question of <?php echo $Row['q_no'];?> of <?php echo $totalquestion;?> </p>

      <p> <?php echo $Row['q_no'];?>. <?php echo $Row['text']; ?> </p>
      
      
        
      
      <form method="POST" action ="./controller/process.php" >      
      
      <?php  while ( $row = mysqli_fetch_assoc($Choice)):?> 
        <p>&nbsp;<input class="form-check-input" name ="choice" type="radio" value= <?php echo $Row['id']; ?> > <?php echo $row['text']; ?> <p> 
        
        <?php endwhile; ?>  

       
        </div></br></br></br>

        
        <input type = "submit" name= "submit" value="next ->" class="btn btn-success"/>
        <input type = "hidden" name ="number" value=<?php echo $number; ?>"/>
   

  
   
 
</form>
 
  <?php include 'sub/footer.php'; ?>

