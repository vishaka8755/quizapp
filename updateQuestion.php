<?php
include 'sub/header.php'; 
include_once('Questionclass.php'); 
include_once('choiceclass.php'); 

$setnum  = 0;
$next = 0;
$no= 1;
$qu = new Question();
$ch = new Choice();
$data2 = array();
$data1 = array();
$ids = 0;

$msg1 = "";

if(isset($_GET['deleteid'])){ 
  $deleteid = $_GET['deleteid'];
  
   $qu->deleteRecord( $deleteid);
   $ch->deleteRecord( $deleteid);
   $msg1="deleted ";
}   
    
    

   if(isset($_POST['submit'])){


    $Qustion_number   = $_POST[ 'Q_NO'];
    $Question_text  = $_POST[ 'Q_TEXT'];
   
    $Correct_choice = $_POST['C_CHOICE'];
    // choice array
    $choices = array();
    $choices[1] = $_POST['CHOICE1'];
    $choices[2] = $_POST['CHOICE2'];
    $choices[3] = $_POST['CHOICE3'];
    //Question quary
      
    $qu->Addquestion($Qustion_number,$Question_text);
          
      
     foreach($choices as $choice=>$value)
     {  if($value !='')         
      {   if ($Correct_choice==$choice){ $is_correct = 1;}
            else{
                   $is_correct = 0;  }
               $ch-> Addchoice($Qustion_number,$is_correct,$value)  ;  }   }
             
  
     $msg1="question has been added";
    $total = $qu->getTotlquestion();
  $next = $total+1;}  
             
       
  
if(isset($_POST['update'])){

 
  $editid  = $_POST[ 'Q_NO']; 
  $Question_text  = $_POST[ 'Q_TEXT'];
  $qu->UpdateRecord( $editid ,$Question_text);
 $ids = $_POST['hid1']; 
 
 //$ids= $ch->getchoiceIDs($editid);
 $i = 0;

    
  $Correct_choice = $_POST['C_CHOICE'];
  // choice array
  $choices = array();
  $choices[1] = $_POST['CHOICE1'];
  $choices[2] = $_POST['CHOICE2'];
  $choices[3] = $_POST['CHOICE3'];
  //Question quary       
      
    
  
  
  foreach($choices as $choice=>$value)
     {  
      
      if($value !='')  
      {  
         if ($Correct_choice==$choice)
         { $is_correct = 1;}
            else{
                   $is_correct = 0; 
                   }
                   $id = $ids;
                                   
                   $text = $value;
                   
               $ch-> UpdateRecord($id,$is_correct,$text);
              $ids++;
          }       
             
             
              }

            
             
  
     $msg1="question has been update";
    $total = $qu->getTotlquestion();
  $next = $total+1;
}  
  
 
     
      
   
     ?>

 
  
     <h3> Manage Questions  </h3><br><br>
     <div class="container">
         
      
      
     <?php 
     
      
           
      
     
             
       if(isset($_GET['editid'])){ 
    
      $editid = $_GET['editid'];
     $myrecord = $qu->displayRecordByID($editid);
     $myrecord2 = $ch->displayRecordByID($editid);  
     
    ?> 

    <form  method="post" action="updateQuestion.php">    
      
    <label>Question No :</label>
    <input value = "<?php echo ($myrecord['q_no']); ?>" type="number" name="Q_NO" style="width:100px;"/>  
       
    <label>Question:</label>
    <div class="input-group input-group-lg">
    
      <input type = "text" name = "Q_TEXT" value = "<?php echo($myrecord['text']) ?>" />
    </div>
          
      <label>Choice#1:</label>
      <input  type="text" name="CHOICE1" value = "<?php echo ($myrecord2[0]['text']);  ?> "/>
      
      <label>Choice#2:</label>
      <input  type="text" name="CHOICE2" value = "<?php echo ($myrecord2[1]['text']);  ?> "/>
     
      <label>Choice#3:</label>
      <input  type="text" name="CHOICE3" value = "<?php echo ($myrecord2[2]['text']);  ?> "/>
      
      <label>correct choice Number :</label>

      <select  class="form-select mb-3" name="C_CHOICE" style="width:100px;" aria-label="Default select example">
     
     <?php if ($myrecord2[0]['is_correct']== 1)
      { ?>
      <option selected value="1">1</option>
      
      <?php } if ($myrecord2[1]['is_correct']== 1)
      
      { ?>
      <option selected value="2">2</option>
      
      <?php }   
      if ($myrecord2[2]['is_correct'] ==1)

      {?>
      <option selected value="3">3</option>
      
      <?php }   ?>
      <option value="1">1</option>
	 <option value="2">2</option>
   <option value="3">3</option>
    
    </select>
    
     
      
        <input type="hidden" name="hid1"  value = "<?php echo ($myrecord2[0]['id']); ?>" ></p>
      <input type="hidden" name="hid"  value = "<?php ['q_no']; ?>" ></p>


  <p><input type="submit" name="update" value="update" class="btn btn-success"></p> 

  <div class="alert alert-success" role="alert">
<?php echo $msg1; ?>
</div>
  <?php   }                                     
            
     else{ ?>
        
        
  <form  method="post" action="updateQuestion.php"> 

<p><label>Question Number:</label>

<?php
$setnum =  $qu->getTotlquestion();  
$next = $setnum+1;    
?>

  <input value="<?php echo $next ?>" type="number" name="Q_NO" style="width:100px;"/></P>

<p><label>Question:</label>
<input type = "text" name = "Q_TEXT"/> </P>

<p><label>Choice#1:</label>
<input  type="text" name="CHOICE1"/> </P>
<p><label>Choice#2:</label>
<input  type="text" name="CHOICE2"/> </P>
<p><label>Choice#3:</label>
<input  type="text" name="CHOICE3"/> </P>

<p> <label>correct choice Number :</label> 

<select  class="form-select mb-3" name="C_CHOICE" style="width:100px;" aria-label="Default select example">
     <option value="1">1</option>
	 <option value="2">2</option>
   <option value="3">3</option>
	 </select>
	 


<p><input type="submit" name="submit" value="submit" class="btn btn-success"></p> 
<div class="alert alert-success" role="alert">
<?php echo $msg1; ?>
</div>
<?php    }     
 ?>    
    
    
    
    
    
    <h4 class = "text-center text-danger" >Display Records</h4>
      <table class = "table table-bordered">
    
       <tr class="bg-primary text-center">

       <th>NO</th>
       <th>Question</th>
       <th>Choices</th>
       <th>Action</th></tr>
      
    
      
       <?php 
      $data1 = $qu->displayQuestion();
       $no =  1;
       if(!empty($data1))
       {
        foreach($data1 as $value1) {
           ?>
          <tr> 
        <td><?php echo $no; ?></td>
        <td><?php echo   $value1['text']; ?></td>
           
         <td>  
        
        <?php
         $data2 = $ch->displaychoice($no);
        foreach($data2 as $value2) {
          ?> 
           <p>&nbsp;<input class="form-check-input" name ="<?php echo $value2['q_no'] ?>" type="radio"  value =<?php echo $value2['id']; ?> required    
          <?PHP if ($value2['is_correct']==1 ){echo "checked";} ?> >&nbsp;   <?php echo $value2['text']; ?> </p>
          <?PHP
        }     
        ?>     
          
      </td> 
       
         
        

        <td><a href ="updateQuestion.php?editid=<?php echo  $value1['q_no'] ?>" class = "btn btn-info"> Edit </a>
        <a href= "updateQuestion.php?deleteid=<?php echo  $value1['q_no'] ?>" class = "btn btn-danger"> Delete </a>
        </td> 
              
       <?php
      $no ++;
      }
    }?>

       </tr> 
       </table>      
      
     </form>
     </div>
    <?php include 'sub/footer.php'; ?>
    