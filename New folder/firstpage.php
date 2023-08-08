

<?php include './sub/header1.php'; ?>


<?php 
$_SESSION['score'] = 0;
$number = (int)$_GET['n'];

  

    // set Qustion number
      
      $sql = "SELECT * FROM questions WHERE q_no = $number";
      
      $result3 = $conn->query($sql) or die($conn->error.__LINE__);
     $row1 = $result3->fetch_assoc();
     
      // get choices 
      
      $sqll = "SELECT * FROM choise WHERE q_no = $number";    

      $choices = $conn->query($sqll)or die($conn->error.__LINE__);

      //get total Question 

      $sql = "SELECT * FROM questions ";
      $results =  $conn->query($sql) or die($conn->error.__LINE__);
      $total = mysqli_num_rows($results);

      
            ?>



      <h1> ONLINE MCQ TEST - 1  </h1><br><br>
      <div class="card Basic card text-black " style="width:1000px;  ">
      <span class="border border-success border-2"></span>
      <p> Question of <?php echo $row1['q_no'];?> of <?php echo $total;?> </p>

      <p> <?php echo $row1['q_no'];?>. <?php echo $row1['text']; ?> </p>
      
      
        
      
      <form method="POST" action ="process.php" >      
      
      <?php  while ( $row = mysqli_fetch_assoc($choices)):?> 
        <p>&nbsp;<input class="form-check-input" name ="choice" type="radio" value= <?php echo $row['id']; ?> > <?php echo $row['text']; ?> <p> 
        
        <?php endwhile; ?>  

       
        </div></br></br></br>

        
        <input type = "submit" name= "submit" value="next ->" class="btn btn-success"/>
        <input type = "hidden" name ="number" value=<?php echo $number; ?>"/>
   

  
   
 
</form>
 
  <?php include 'sub/footer.php'; ?>

