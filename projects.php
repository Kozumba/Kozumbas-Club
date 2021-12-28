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
  <link rel="stylesheet" href="style/style.css">
  <link rel="icon" href="icon.png" sizes="16x16" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="font-family: Lato,Roboto,Arial,Helvetica,sans-serif; margin: 0; padding: 0; background:#000815;">
  <nav class="navbar navbar-expand-lg navbar-light p-0">
  <div class="container-fluid" style="background:#22223B;">

        <a class="navbar-brand" href="index.php">
          <img src="style/logo.png" height="50" width="50">
          Kozumba's club
        </a>
        
        <ul class="nav navbar-nav">
        <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="projects.php"><img src="about.svg" height="32" width="32" class="m-1"><h5 class="mt-2">About</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="index.php"><img src="games.svg" height="32" width="32" class="m-1"><h5 class="mt-2">Games</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="profile.php"><img src="<?php if(isset($_SESSION["username"])){ echo 'images/accountpics/'.$_SESSION["picture"];} else {echo 'profile.svg';} ?>" height="32" width="32" class="m-1 rounded-circle"><h5 class="mt-2">Profile</h5></a></li>
          </ul> 
        </div>
  </nav>
  <div class="container-fluid text-white" style=" background:#000815; height:880px;">
      <div class="text-center">
        <div class="d-flex justify-content-center">      
        <img src="style/logo.png" height="50" width="50">   
      <h1 class="mb-5 mt-1">about me</h1>
      </div>
      <p>I am a 20 year old programmer, who loves to create games/programs/applications and websites :)</p>
      </br>
      <p>Here you can see my current projects, which i have developed or im still developing</p>
      <div class="d-flex flex-wrap justify-content-center" >
          <div class="card m-2" style="width: 18rem;">
              <img class="card-img-top" src="kozumbasclub.png" width="286" height="180">
                <div class="card-body">
              <h4 class="text-dark card-title">Kozumba's Club</h4>
              <p class="card-text text-dark">
               Current plans for Kozumba's Club:</p>
                <ul>
                      <li class="text-dark">Add a possibility of visiting other's profiles</li>
                      <li class="text-dark"><del>Add forms for game developers</del></li>
                </ul>
              <a href="index.php" class="btn btn-primary">Visit Kozumba's Club</a>
          </div>
          </div>
          <div class="card m-2" style="width: 18rem;">
              <img class="card-img-top" src="chrome_zyfPvYf8kx.png" width="286" height="180">
                <div class="card-body">
              <h4 class="text-dark card-title">simple battle game</h4>
              <p class="card-text text-dark">
                Current plans for this game are:<b>(project has been postponed)</b></p>
                <ul>
                      <li class="text-dark">Add game characters</li>
                      <li class="text-dark">Add multiplayer mode</li>
                      <li class="text-dark">Add sounds with dialogue when you hit and get hit</li>
                </ul>
             <p class="card-text text-dark">(P.S. I intended to scare people with this silly game :P)</p>
              <a href="mygames/SimpleBattle/" class="btn btn-primary">Play the game here!</a>
          </div>
          </div>
          <div class="card m-2" style="width: 18rem;">
              <img class="card-img-top" src="Maruka.png" width="286" height="180">
                <div class="card-body">
              <h4 class="text-dark card-title">Maruka Online</h4>
              <p class="card-text text-dark">
                This game is text based MMORPG, which has been inspired by Kordbika.
                The game is in early stages, but slowly it keeps getting updated.
                Current plans for this game are:<b>(project has been postponed)</b></p>
                <ul>
                      <li class="text-dark">Add a town</li>
                      <li class="text-dark"><del>Add a character creation screen</del></li>
                      <li class="text-dark">develop combat(early stages)</li>
                </ul>
              <a href="mygames/MarukaOnline/landing.html" class="btn btn-primary">Play the game here!</a>
          </div>
          </div>
          <div class="card m-2" style="width: 18rem;">
              <img class="card-img-top" src="banner.png" width="286" height="180">
                <div class="card-body">
              <h4 class="text-dark card-title">Battle simulation script</h4>
              <p class="card-text text-dark">
                This simple script simulates battle when you click on any enemy, i've also added few weapons with different attack speeds. The simulation ends once the player or the enemy has died</p>
              <a href="mygames/Scripts/index.html" class="btn btn-primary">Play the script!</a>
          </div>
          </div>
      </div>
      </br>
      <p> Wanna contact me or you have suggestions for my website? Feel free to do that at Emils2235@gmail.com </p>
  </div>
  </div>
</body>
</html>
