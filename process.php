


<?php session_start();?>
<?php
//check to see if score is set
include_once('Questionclass.php');
include_once('choiceclass.php');
if(!isset($_SESSION['score']))
{
    $_SESSION['score'] = 0;

}

if($_POST)
{
    $number = $_POST['number'];
   $selected_choice = $_POST['choice'];
   echo $selected_choice;
   
   $next = $number+1; 
   
    $question = new Question(); 

    $totalquestion = $question->getTotlquestion();
   
    $choice = new Choice();
    
    $Row = $choice-> getcorrectchoice($number);
    $correct_choice = $Row['id'];




//compare 

if($correct_choice ==  $selected_choice)
{ $_SESSION['score']++;


}


        if ($number> $totalquestion)
        {
            header("location:paperend.php"); 
           
           exit();
            }
        else {
            header("location:firstpage.php?n=" .$next );
            
                 }
}
?>