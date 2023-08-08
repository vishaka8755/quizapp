


<?php session_start();?>
<?php
//check to see if score is set

if(!isset($_SESSION['score']))
{
    $_SESSION['score'] = 0;

}

if($_POST)
{
   $number = $_POST['number'];
   $selected_choice = $_POST['choice'];
   $next = $number+1; 
   include_once('./classfile/Questionclass.php');
    $question = new Question(); 

    $totalquestion = $question->getTotlquestion();
    include_once('./classfile/choiceclass.php');
    $choice = new Choice();
    
    $Row = $choice-> getcorrectchoice($number);
    $correct_choice = $Row['id'];




//compare 

if($correct_choice ==  $selected_choice)
{ $_SESSION['score']++;


}


        if ($number> $total)
        {
            header("location:paperend.php"); 
           
           exit();
            }
        else {
            header("location:firstpage.php?n=" .$next );
            
                 }
}
?>