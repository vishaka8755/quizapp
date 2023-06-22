<?php include './sub/header.php'; ?>


<?php 
if(isset($_SESSION['score']))
{
    $_SESSION['score'] = 0;

}


if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
      header('location: login.php');
}

if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header("location: login.php");
}

//get the total number of Question

      $sql = "SELECT * FROM questions";
      $results = $conn->query($sql);

      $total = $results->num_rows;   
?>


      <form >
      


     <div class="container"> 
      <h1> ONLINE MCQ TEST - 1  </h1><br><br>
      </div>
      <div class="card Basic card text-black ">
      <div class="card-body  style="text-align:center" style="font-family:'Times New Roman', Times, serif"">
    
       <li><strong> No of Question :</strong> <?php echo $total; ?></li> 
       <li>Each question carries 01 mark</li> 
       <li>There is no negative marking.<br></li>
       <li><strong>Time is </strong><?php echo $total*.5 ?> Minutes</li>
       
   
      </div>
      </div>

      <br><br>

      <a href ="firstpage.php?n=1" class ="btn btn-primary" >Start Quiz </a>

     </form>
     <?php include 'sub/footer.php'; ?>

