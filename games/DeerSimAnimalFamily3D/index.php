<?php // Start the session
session_start();
include "../../config.php";
$title = "Deer Simulator: Animal Family 3D";
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
 <h1 class="card-title text-dark">Deer Simulator: Animal Family 3D</h1>
 <p class="card-text">Deer Simulator: Animal Family 3D is yet another great online game where you will be playing as a deer. There's a ton of adventures that you can start and find many different enemies and friends. You can build up your own house, start a family and buy accessories that will help you get through all of the obstacles the game throws at your feet. The game is offering a ton of options when it comes to character customization and improvement of your surroundings. If you start playing the game regularly, you will get a ton of great gifts, but you can start exploring the world without this in mind.
It's a great game with pleasant 3D graphics, so be sure to try it out, you won’t regret it.</p><iframe src="https://www.gameflare.com/embed/deer-simulator-animal-family-3d/" frameborder="0" scrolling="no" width="100%" height="635" allowfullscreen></iframe></div>
</div>
</div>
</body>
</html>