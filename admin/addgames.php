<?php include '../config.php';
//starting session
session_start();
//quick script test to see if the user has admin rights
$stmt=$db->prepare("SELECT * FROM accounts where username = :admin_username");
$stmt->bindParam(':admin_username',$_SESSION["username"], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row['account_type'] != "admin"){
    header('Location: https://www.kozumbas.club/profile');
    exit;
} //script ends here
if ((isset($_POST['submit']))) { 
$stmt1=$db->prepare("SELECT * FROM games where title = :title");
$stmt1->bindParam(':title',$_POST["posttitle"], PDO::PARAM_STR);
$stmt1->execute();
$row1 = $stmt1->fetchColumn(PDO::FETCH_ASSOC);
if ($row1){
   echo '<p class="text-white">The game has been already added to the list!</p>';
   header( "refresh:3;url=developeruserform.php" );
   exit();
}else{ 
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["bilde"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Pārbauda vai ir īsta bilde, vai tikai kāds fails
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["bilde"]["tmp_name"]);
    if($check !== false) {
      echo "<p class='text-white'>File is an image - " . $check["mime"] . ".</p></br>";
      $uploadOk = 1;
    } else {
      echo "<p class='text-white'>File is not an image.</p></br>";
      $uploadOk = 0;
    }
  }
  
  // Pārbauda, vai bilde jau eksistē
  if (file_exists($target_file)) {
    echo "<p class='text-white'>Sorry, file already exists.</p></br>";
    $uploadOk = 0;
  }
  
  
  // Atļaut dažādus faila formātus
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<p class='text-white'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p></br>";
    $uploadOk = 0;
  }
  
  // Pārbauda vai $uploadOk ir uzstādīts uz 0 no errora
  if ($uploadOk == 0) {
    echo "<p class='text-white'>Sorry, your file was not uploaded.</p></br>";
  // Ja viss ir ok, tad pievieno failu
  } else {
    if (move_uploaded_file($_FILES["bilde"]["tmp_name"], $target_file)) {
      echo "<p class='text-white'>The file ". htmlspecialchars( basename( $_FILES["bilde"]["name"])). " has been uploaded.</p></br>";
    } else {
      echo "<p class='text-white'>Sorry, there was an error uploading your file.</p></br>";
    }
  }
$link = 'games/'.$_POST["postfolder"];  
$picture = basename($_FILES["bilde"]["name"]); 
    $sql = "INSERT INTO games (picture, link, title, description, category) VALUES (:picture, :link, :title, :description, :category)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':picture',$picture);
    $stmt->bindParam(':link',$link);
    $stmt->bindParam(':title',$_POST["posttitle"]);
    $stmt->bindParam(':description',$_POST["postdescription"]);
    $stmt->bindParam(':category',$_POST["category"]);
    $result = $stmt->execute();
    if ($result === TRUE) {
      echo "Game has been added!<br><br>";
      mkdir ("../games/".$_POST["postfolder"]);
$my_file = "../games/".$_POST["postfolder"]."/index.php";
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates games index file
$data = '<?php // Start the session
session_start();
include "../../config.php";
$title = "'.$_POST["posttitle"].'";
$stmt= $db->prepare("UPDATE games SET clicks = clicks +1 WHERE title = :title");
$stmt->bindParam(\':title\',$title, PDO::PARAM_STR);
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
 <h1 class="card-title text-dark">'.$_POST["posttitle"].'</h1>
 <p class="card-text">'.$_POST['postdescription'].'</p>'
.$_POST["postiframe"].
'</div>
</div>
</div>
</body>
</html>';
fwrite($handle, $data);

    } else {
      echo "<p class='text-white'>Error adding a game: " . $sql . "<br>" . $stmt->errorCode(). "</p><br><br>";
    }
    } 
}
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
<form action="" method="post" enctype="multipart/form-data" class="mx-auto text-white" style="width:550px;">
<div class="form-group">
    <div class="col">
        <label class="col col-form-label">Games picture:</label>    
 <input type="file" class="form-control-file" name="bilde" size=35>
 </div>
 </div>
<div class="form-group row mb-3">
    <div class="col">
        <label class="col col-form-label">Please name your folder <b>without spaces!</b>:</label>    
 <input type="text" class="form-control" name="postfolder" placeholder="Folders name" value="" required>
 </div>
 </div>
<div class="form-group row mb-3">
    <div class="col">
        <label class="col col-form-label">iframe embed link:</label>    
 <input type="text" class="form-control" name="postiframe" placeholder="embed iframe here" value="" required>
 </div>
 </div>
<div class="form-group row mb-3">
    <div class="col">
        <label class="col col-form-label">Game's title:</label>    
 <input type="text" class="form-control" name="posttitle" placeholder="Game title" value="" required>
 </div>
 </div>
<div class="form-group row mb-3">
    <div class="col">
        <label class="col col-form-label">Game's Description:</label>
        <textarea class="form-control" name="postdescription" placeholder="Game description" value="" required cols="70" rows="15" maxlength="1000"></textarea>
 </div>
 </div>
<div class="form-group row mb-3">
    <div class="col">
        <label class="col col-form-label">Category:</label>    
 <select id="category" name="category" class="form-control">
    <option value="Action">Action</option>
    <option value="Adventure">Adventure</option>
    <option value="Puzzle">Puzzle</option>
    <option value="Racing">Racing</option>
    <option value="PointAndclick">Point&Click</option>
    <option value="Sports">Sports</option>
    <option value="Strategy">Strategy</option>
    <option value="Rpg">RPG</option>
 </select>
  </div>
 </div>
   <button type="submit" name="submit" class="btn btn-primary mb-2">Save!</button>
</form>
<?php
//quick script to print out all of the games
include '../config.php';
$stmt=$db->prepare("SELECT * FROM games");
$stmt->execute();
while ($row=$stmt->fetch(PDO::FETCH_LAZY)){
echo '<p class="text-white">games ID: '.$row->game_id.'</p><br>';
echo '<img src="../images/'.$row->picture.'" height="200" width="200"><br><br>';
echo '<p class="text-white">games link: '.$row->link.'</p><br>';
echo '<p class="text-white">games title: '.$row->title.'</p><br>';
echo '<p class="text-white">games Description: '.$row->description.'</p><br>';
echo '<p class="text-white">games category: '.$row->category.'</p><br>';
echo '<p class="text-white">games visits: '.$row->clicks.' clicks</p><br>';
echo '<a href="deletegame.php?deletegame='.$row->game_id.'" class="btn btn-danger">Delete this game</a><br><br>';
}
?>
</div>
</body>
</html>





