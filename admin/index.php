<?php // Start the session
session_start();
include '../config.php';
//quick script test to see if the user has admin rights
$stmt=$db->prepare("SELECT * FROM accounts where username = :admin_username");
$stmt->bindParam(':admin_username',$_SESSION["username"], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row['account_type'] != "admin"){
    header('Location: ../profile.php');
    exit;
} //script ends here
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Admin panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap');
</style>
<body style="font-family: Lato,Roboto,Arial,Helvetica,sans-serif; margin: 0; padding: 0; background:#000815;">
  <nav class="navbar navbar-expand-lg navbar-light p-0">
  <div class="container-fluid" style="background:#22223B;">

        <a class="navbar-brand text-white" href="../index.php">
          <img src="../style/logo.png" height="50" width="50">
          Kozumba's club
        </a>
        
        <ul class="nav navbar-nav">
        <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="../projects.php"><img src="../about.svg" height="32" width="32" class="m-1"><h5 class="mt-2">About</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="../index.php"><img src="../games.svg" height="32" width="32" class="m-1"><h5 class="mt-2">Games</h5></a></li>
          <li class="nav-item mr-1"><a class="nav-link text-white d-flex" href="../profile.php"><img src="<?php if(isset($_SESSION["username"])){ echo '../images/accountpics/'.$_SESSION["picture"];} else {echo '../profile.svg';} ?>" height="32" width="32" class="m-1 rounded-circle"><h5 class="mt-2">Profile</h5></a></li>
          </ul> 
        </div>
  </nav>
<div class="container-fluid">
    <h4 class="m-3 text-white text-center">Welcome to the admin panel, <?php echo $_SESSION["username"];?></h4>
    <br>
    <h5 class="text-white text-center">What do you want to do?</h5>
    <br>
    <ul class="d-flex flex-column justify-content-center card" style="list-style-type: none; margin:auto; width:450px;">
        <li class="m-1 btn btn-primary"><a href="ban.php" class="text-white" style="text-decoration:none;">Ban users</a></li>
        <li class="m-1 btn btn-primary"><a href="addgames.php" class="text-white" style="text-decoration:none;">Add new games/delete games</a></li>
    </ul>
</div>
</body>
</html>
