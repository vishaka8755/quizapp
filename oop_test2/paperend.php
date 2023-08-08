<?php include './sub/header.php'; ?>

<div class="card Basic card text-black " style="width:1000px; ">

<body >

<h4>congrates! --<?php echo $_SESSION['username'];?></h4><p> you have completed the test </p></div>

<p><h2> Final score  : <?php echo $_SESSION['score'];?></h2></P>


<a href ="mainpage.php?n=0" class ="btn btn-primary" > End Quiz </a>  

</div>

</body>
</html>