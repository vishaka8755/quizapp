<?php include './connection.php'; ?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>QUIZZES</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4 justify-content-center">
  <a class="navbar-brand" href="#">
    <img src="./img/1.jpeg" alt="Logo" style="width:100px;">
  </a>
    <div class="container">
                            <div class="container-fluid mt-3">
 	                          <h2>GETGOAL</h2><h5> QUIZZES<h5>                            
 							               </div>
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item">
            
            <div class="container mt-3">      
                    <div class="dropdown"> <button type="button" class="btn btn-info    dropdown-toggle" data-bs-toggle="dropdown">
                   StartQuiz  </button>    
                 <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="/Php_tutorials\goldq\mainpage.php">grade1</a></li>
                 
                
                 <li><a class="dropdown-item" href="#">Grade 2</a></li>
                 <li><a class="dropdown-item" href="#">Grade 3</a></li>
                <li><a class="dropdown-item" href="#">Grade 4</a></li>
                 <li><a class="dropdown-item" href="#">Grade 5</a></li>
                </ul>     </div>             </div> 


          </li>
          <li class="nav-item">
            <div class="container mt-3">      
                    <div class="dropdown"> <button type="button" class="btn btn-info    dropdown-toggle" data-bs-toggle="dropdown">
                   AddnewQuestion  </button>    
                 <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="/Php_tutorials\goldq\addQuestion.php">grade1</a></li>
                 
                 <li><a class="dropdown-item" href="#">Grade 2</a></li>
                 <li><a class="dropdown-item" href="#">Grade 3</a></li>
                <li><a class="dropdown-item" href="#">Grade 4</a></li>
                 <li><a class="dropdown-item" href="#">Grade 5</a></li>
                </ul>     </div>             </div>
          </li>
          <li class="nav-item"><span class="badge badge rounded-pill bg-success"><h6> <?php echo $_SESSION['username'];?></h6></span></li>
          <li class="nav-item">
         
            <a class="nav-link" href="/Php_tutorials\goldq\login.php" style="color: red;">logout</a>
          </li>
        </ul>
      </div>
  </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">