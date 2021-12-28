<?php 
session_start();
if(isset($_SESSION["registered"])){
    header("Location:registersuccess.php");
    exit;
}    
include 'config.php';
if ((isset($_POST['submit']))) {
    $stmt1 = $db->prepare("SELECT * FROM accounts WHERE username = :register_name");
    $stmt1->bindParam(':register_name',$_POST["username"], PDO::PARAM_STR);
    $stmt1->execute();
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    if ($row){
        echo "<script>
        alert('This username already exists!')</script>";
    }else{
    
 
  $target_dir = "images/accountpics/";
  $target_file = $target_dir . basename($_FILES["bilde"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Pārbauda vai ir īsta bilde, vai tikai kāds fails
    $check = getimagesize($_FILES["bilde"]["tmp_name"]);
    if($check !== false) {
      echo "<p>File is an image - " . $check["mime"] . ".</p></br>";
      $uploadOk = 1;
    } else {
      echo "<p>File is not an image.</p></br>";
      $uploadOk = 0;
    }
  }
  
  // Pārbauda, vai bilde jau eksistē
  if (file_exists($target_file)) {
    echo "<p>Sorry, file already exists.</p></br>";
    $uploadOk = 0;
  }
  
  
  // Atļaut dažādus faila formātus
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p></br>";
    $uploadOk = 0;
  }
  
  // Pārbauda vai $uploadOk ir uzstādīts uz 0 no errora
  if ($uploadOk == 0) {
    echo "<p>Sorry, your file was not uploaded.</p></br>";
  // Ja viss ir ok, tad pievieno failu
  } else {
    if (move_uploaded_file($_FILES["bilde"]["tmp_name"], $target_file)) {
      echo "<p>The file ". htmlspecialchars( basename( $_FILES["bilde"]["name"])). " has been uploaded.</p></br>";
$picture = basename($_FILES["bilde"]["name"]);   
$user = 'user';
$empty = '';
$no = 'no';
$sql = "INSERT INTO accounts (account_type, username, password, profile_picture, description, ban) VALUES (:user, :username, :password, :picture, :empty_desc, :ban_no)";    
$stmt = $db->prepare($sql);
$stmt->bindParam(':user', $user);
$stmt->bindParam(':username',$_POST["username"]);
$stmt->bindParam(':password',$_POST["password"]);
$stmt->bindParam(':picture',$picture);
$stmt->bindParam(':empty_desc',$empty);
$stmt->bindParam(':ban_no',$no);
$result = $stmt->execute();
 
    if ($result === TRUE) {
      echo "Your profile has been created!<br><br>";
      $_SESSION["registered"]= "yes";
    header("Location:registersuccess.php");
    exit;
    } else {
      echo "<p>Error creating your profile :( : " . $sql . "<br>".$stmt->errorCode(). "</p><br><br>";
}
    } else {
      echo "<p>Sorry, there was an error uploading your file.</p></br>";
    }
  }

    } 
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Kozumba's club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
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
<div class="text-white p-4 d-flex flex-wrap flex-column" style="background:#000815; width:275px;">
<h1 class="text-center">Register!</h1><br><br>
<form class="flex-column" action="" method="POST" enctype="multipart/form-data">
<div class="mb-3">
<label class="form-label mx-auto" style="font-size:14px;">Username</label>    
<input type="text" name="username" class="form-control mx-auto" style="width:210px;" required>
</div>
<div class="mb-3">
<label class="form-label" style="font-size:14px;">Password</label>
<input class="form-control mx-auto" style="width:210px;" type="password" name="password" required>
</div>
<div class="mb-3">
<label class="form-label" style="font-size:14px;">Your profile picture</label>
<input type="file" name="bilde" class="form-control-file mx-auto" size=35 style="width:210px;">
</div>
<button class="btn btn-primary" name="submit" style="width:210px; margin:0px 12.8438px;" type="submit">Join the club!</button>
</form>
</div>
</div>
  </div>
</div>
</body>
</html>





