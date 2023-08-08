<?php include './connection.php'; ?>
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


//get total Question 

$sql = "SELECT * FROM questions ";
$results =  $conn->query($sql) or die($conn->error.__LINE__);
$total = mysqli_num_rows($results);


//get correct choise

$query = " SELECT * FROM choise  WHERE q_no = '$number' AND is_correct = '1' ";
//get result
$result = $conn->query($query) or die($conn->error.__LINE__);
//get row 
$row = $result->fetch_assoc();

// set correct choice
$correct_choice = $row['id'];




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