<?php include 'sub/header.php';
include_once('Questionclass.php');
?>

<?php 
if(isset($_SESSION['score']))
{
    $_SESSION['score'] = 0;

}


if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
      header('location: newuserlogin.php');
}

//if (isset($_GET['logout'])) {
  //    session_destroy();
    //  unset($_SESSION['username']);
      //header("location: login.php");
//}

$question = new Question();
$totalquestion = $question->getTotlquestion();   
  
?>


<form method="post" action= "process.php" >     
     <div class="container"> 
      <h1> ONLINE MCQ TEST - 1  </h1><br><br>
      </div>
      <div class="card Basic card text-black ">
      <div class="card-body  style="text-align:center" style="font-family:'Times New Roman', Times, serif"">
    
       <li><strong> No of Question :</strong> <?php echo $totalquestion; ?></li> 
       <li>Each question carries 01 mark</li> 
       <li>There is no negative marking.<br></li>
       <li><strong>Time is </strong><?php echo $totalquestion*.5 ?> Minutes</li>
       
   
      </div>
      </div>

      <br><br>

      <a href ="firstpage.php?n=1" class ="btn btn-primary" >Start Quiz </a>

     </form>
     <?php include 'sub/footer.php'; ?>

