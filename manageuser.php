<?php
include 'sub/header.php'; 
include_once('userclass.php'); 

$msg1 = "";
$no= 1;
$qu = new User();



   
  
if(isset($_POST['update'])){

 
 $editid  = $_POST[ 'username']; 
  $email  = $_POST[ 'email'];
  $password  = $_POST[ 'password']; 
  $usertype  = $_POST[ 'role'];

 
  $qu->updateuser($email,$password,$usertype,$editid);
         $msg1="updated information";
    }        
   
    
             
   if(isset($_GET['deleteid'])){ 
    $deleteid = $_GET['deleteid'];
    
     $qu->deleteuser($deleteid);
     
    $msg1="delete record sucessfuly ";
   }

                
  if(isset($_GET['editid']))
  { 
    
        $editid = $_GET['editid'];
        
       $myrecord = $qu->displayuserbyid($editid);
            
      ?> 
 
<div class="container"> 
<form  method="post" action="manageuser.php">  
 <h3>Manage user details </h3>   
   
               
                                   
  <div class="form-group form-group-lg">
             <label >Username</label>   <div class = "col-xs-1">
           <input  value = "<?php echo ($myrecord['username']); ?>"type="text"  class="form-control input-sm "name= "username" id="inputname" placeholder="input your user name">
           </div></div>
     
               <div class="form-group form-group-lg">
             <label >Email</label>
             <div class = "col-xs-1">
             <input  value = "<?php echo ($myrecord['email']); ?>"type="email" class="form-control input-sm " name="email" id="inputemail"placeholder="input your email address" >
           </div></div>
                     
     
     
           <div class="form-group form-group-lg">
             <label for ="inputpassword" class="control-label col-xs-1">Password</label>
             <div class = "col-xs-1">
             <input  value = "<?php echo ($myrecord['password']); ?>"type="password" class="form-control input-sm " name="password" id="inputpassword" placeholder="input password">
             </div></div>
         
             <div class="form-group form-group-lg">
             <label for ="inputpassword" class="control-label col-xs-1">Role</label>
             <div class = "col-xs-1">
             <input  value = "<?php echo ($myrecord['role']); ?>"type="password" class="form-control input-sm " name="role" id="inputpassword" placeholder="input password">
             </div></div>
              
                

      <input type="hidden" name="hid"  value = "<?php $value1['username']; ?>" ></p>

     <p><input type="submit" name="update" value="update" class="btn btn-success"></p> 
     <div class="alert alert-success" role="alert">
<?php echo $msg1; ?>
</div>
        <?php }  ?> 
        
        

            
      
    
    <h4 class = "text-center text-danger" >Display Users details</h4>
      <table class = "table table-bordered">
    
       <tr class="bg-primary text-center">
       <th>NO</th>
       <th>user name</th>
       <th>Email</th>    
       <th>Action</th>  
    
      
       <?php 
      $data1 = $qu->displayuser();
       $no = 1;
        foreach($data1 as $value1) {
           ?>

          <tr> 
        <td><?php echo  $no; ?></td>
        <td><?php echo   $value1['username']; ?></td>
        <td><?php echo   $value1['email']; ?></td>              
       
         <td><a href ="manageuser.php?editid=<?php echo  $value1['username'] ?>" class = "btn btn-info"> Edit </a>
        <a href= "manageuser.php?deleteid=<?php echo  $value1['username'] ?>" class = "btn btn-danger"> Delete </a>
        </td> 
              
       <?php
      $no ++;
      }?>

       </tr> 
       </table>      
      
     </form>
     </div>
    <?php include 'sub/footer.php'; ?>
    