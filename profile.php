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

<body style="font-family: Lato,Roboto,Arial,Helvetica,sans-serif; margin: 0; padding: 0;">
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
<div class="d-flex justify-content-center container-fluid" style="background:#000815; height: 900px;">  
<div class="d-flex"> 
  <div>
    <?php include 'login_success.php'; ?>
  
  </div>
  </div>
</div>
</body>
</html>