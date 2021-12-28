<?php // Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Kozumba's club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>

<body class="bg-dark" style="font-family: Lato,Roboto,Arial,Helvetica,sans-serif;">
  <nav class="navbar navbar-expand-lg navbar-light p-0">
  <div class="container-fluid" style="background:black;">

        <a class="navbar-brand" href="../../index.php">
          <img src="../../style/logo.png" height="50" width="50">
          Kozumba's club
        </a>
        
        <ul class="nav navbar-nav">
          <li class="nav-item mr-1"><a class="nav-link text-dark bg-white rounded border d-flex" href="../../index.php"><img src="../../joystick.svg" height="30" width="30" class="m-1"><h5 class="mt-2">Games</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-dark bg-white rounded border d-flex" href="../../projects.php"><img src="../../question-lg.svg" height="30" width="30" class="m-1"><h5 class="mt-2">About</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-dark bg-white rounded border d-flex" href="../../profile.php"><img src="../../person-square.svg" height="30" width="30" class="m-1"><h5 class="mt-2">Profile</h5></a></li>
          </ul>
        </div>
  </nav>
<div class="container-fluid mt-3 d-flex flex-wrap">  
<div class="d-flex"> 
 <div>
  <div>
    <?php include '../../login_success2.php'; ?>
    <?php include '../../chat2.php'; ?> 
  </div>
  </div>
 
 <div class="container-fluid mt-3 d-flex flex-wrap">
 <h1 class="titlegame">2048</h1>
</div>
<div class="game">        
   <iframe class="game2048" src="../../games/2048/index.html" title="2048" scrolling="no" width="480" height="560"></iframe>
</div>
<div class="descrbox">
<p class="desctext">2048 is a popular single-player game for Web and mobile. It’s a type of “sliding block puzzle” — think Threes!, on which 2048 is based, or the old-timey game klotski — that’s played on an almost Sudoku-like grid. Like Sudoku, it also involves some math. The object of the game is to combine the numbers displayed on the tiles until you reach 2048.
</p></div>
 </div>
</div>
</div>
</body>
</html>