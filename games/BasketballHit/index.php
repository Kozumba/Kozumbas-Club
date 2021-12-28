<?php // Start the session
session_start();
include "../../config.php";
$title = "Basketball Hit";
$stmt= $db->prepare("UPDATE games SET clicks = clicks +1 WHERE title = :title");
$stmt->bindParam(':title',$title, PDO::PARAM_STR);
$stmt->execute();

?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Kozumbas club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body style="font-family: Lato,Roboto,Arial,Helvetica,sans-serif; background:#000815; ">
  <nav class="navbar navbar-expand-lg navbar-light p-0">
  <div class="container-fluid" style="background:#22223B;">

        <a class="navbar-brand" href="../../index.php">
          <img src="../../style/logo.png" height="50" width="50">
          Kozumbas club
        </a>
        
        <ul class="nav navbar-nav">
           <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="../../projects.php"><img src="../../about.svg" height="32" width="32" class="m-1"><h5 class="mt-2">About</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="../../index.php"><img src="../../games.svg" height="32" width="32" class="m-1"><h5 class="mt-2">Games</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="../../profile.php"><img src="<?php if(isset($_SESSION["username"])){ echo "../../images/accountpics/".$_SESSION["picture"];} else {echo "../../profile.svg";} ?>" height="32" width="32" class="m-1 rounded-circle"><h5 class="mt-2">Profile</h5></a></li>
          </ul>
          </ul>
        </div>
  </nav>
<div class="container-fluid mt-3">  
 <div class="card">
 <div class="card-body text-center">
 <h1 class="card-title text-dark">Basketball Hit</h1>
 <p class="card-text">Basketball Hit is a free physics game. You've squeaked your sneaks across basketball courts all over the world. You have sunk 3 pointers with your eyes closed and made half-court baskets that electrified the world. But that was then, this is now. You've seen it all. You've done it all. And now, the world of competitive basketball bores you, you thirst for greater challenges in a new arena. Enter Basketball Hit. A game that takes everything you love about basketball and puts it into the top-down world of physics-based puzzles. Basketball Hit will finally let you challenge yourself by dribbling your basketball through a series of slats, barriers, borders, walls, and baskets. Can you think ahead? Do you know how to navigate the labyrinthian world of competitive basketball puzzles? This is your chance to be the queen's gambit of the basketball puzzle world. To show your haters that you are like Micheal Jordan and will be successful in not just one sport but multiple sports.</p><iframe width="100%" height="750" src="https://www.addictinggames.com/embed/html5-games/24787" scrolling="no" frameBorder="0"></iframe></div>
</div>
</div>
</body>
</html>