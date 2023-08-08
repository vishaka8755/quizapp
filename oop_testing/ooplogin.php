<?php include('ooploginclass.php') ?>

<?php

if (isset($_POST['login_user'])) {
            $username = $_POST['username'];
             $password = $_POST['password'];
            include  "oopconection.php"; 
            include  "ooplogincontroller.php";
            include  "ooploginclass.php";
     $login  = new ooplogincontroller( $username,$password);
     $login -> loginUser();
     header("location:index.php?error=none");
}

             ?>
