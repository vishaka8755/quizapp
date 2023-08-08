<?php
include ('../config/app.php');
include ('../sub/register.php');
if  (isset($_POST['reg_user'])) 

{
            // receive all input values from the form
             // $username = validateInput($db->conn,$_POST['username']);
              //$usertype = validateInput($db->conn,$_POST['usertype']);
              //$email = validateInput($db->conn,$_POST['email']);
             // $password_1 = validateInput($db->conn,$_POST['password_1']);
            //  $password_2 = validateInput($db->conn,$_POST['password_2']);

            $username = $_POST['username'];
            $usertype =$_POST['usertype'];
            $email=$_POST['email'];
            $password_1=$_POST['password_1'];
            $password_2=$_POST['password_2'];

            
              $register = new Registercontroller();
              $result_password = $register->confirmpassword($password_1,$password_2);
              if($result_password){
                $register->isUserExit($username,$email);
              }
              else{
                redirect("passwords are not match","register.php");
              }

            }
              ?>