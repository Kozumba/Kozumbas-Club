<?php // Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Kozumba's club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Welcome to Kozumba's Club, Website for game enjoyers and developers">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <link rel="icon" href="icon.png" sizes="16x16" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap');
</style>
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
          <form class="d-flex" action="" style="width:300px;" method="get">
  <input type="text" name="search" class="form-control" required>
  <button type="submit" name="searchbtn" class="btn btn-primary">Search</button>
</form>          
        </div>
  </nav>
  <div class="d-flex justify-content-center text-white" style="background:#22223B;">
     <a href="index.php"><button type="button" class="btn  text-white mr-1" style="width:186.95px; background:#3a3a66;">Online games</button></a>
     <a href="usergames.php"><button type="button" class="btn  text-white" style="background:#22223B;">Games made by users</button></a>
      
  </div>
<div class="d-flex">  
  <nav class="d-flex flex-wrap">
             <div style="width:13rem; border-radius:0 0 12px 12px; background:#22223B;">
    <h6 class="mt-1 text-white text-center" style="font-size:1rem;">Top 5 played games:</h6>
<?php
        include 'config.php';
         $stmt= $db->prepare("SELECT * FROM games ORDER BY clicks DESC limit 5");
         $stmt->execute();
         while ($row = $stmt->fetch(PDO::FETCH_LAZY))
         {
         echo "<a class='text-dark' style='text-decoration:none;' href='".$row['link']."'>";?>
        
        <div class="d-flex flex-column rounded-pill mb-1" style="width:13rem;">
        <div class="d-flex bg-white mb-1" style="border-radius:.5rem; margin-left:5px;">
                         
         <?php
            
            //Šeit izdrukā visas spēles no datubāzes
            echo "<img src='images/" . $row['picture']."' width='70' height='56' style='border-radius:.5rem 0 0 .5rem;'>";?>
           
            <div class='d-flex flex-column rounded-pill'>  
                <?php echo "<h6 class='text-center' style='font-size:14px; white-space: nowrap; font-weight: 800; font-family: Nunito, sans-serif; color:#282725;'>".$row['title']."(".$row['clicks'].")</b></h6>";?>
                <?php echo '<h6 class="text-center" style="font-size:14px;" >Category:'.$row['category'].'</h6';?>
            </div>
               
                
            </div>
            

            
        </div></a>
        <?php
         }
              ?>
        <h6 class="mt-2 text-white text-center">New added games:</h6>      
                 <?php
         $stmt= $db->prepare("SELECT * FROM games ORDER BY game_id DESC limit 5");
         $stmt->execute();
         while ($row = $stmt->fetch(PDO::FETCH_LAZY))
         {
        ?>
          <?php echo "<a class='nav-link' href='".$row['link']."'>";?>
          
        <div class="card" style="width:11rem; height:100px;">
                         
         <?php
            
            //Šeit izdrukā visas spēles no datubāzes
            echo "<img src='images/" . $row['picture']."' width='50' height='50';  class='card-img-top'>";?>
           
            <div class="card-body">  
                <?php echo "<h6 class='text-center card-title text-wrap' style='font-size:10px; font-weight: 800; font-family: Nunito, sans-serif; color:#282725;'>".$row['title']."</b></h6>";?>
            </div>

            
        </div></a>
              
              
        <?php
}
         ?>
</div>
</nav>
  <div class="container-fluid  d-flex flex-wrap" style="margin-top: 1.5rem;">
    <?php include 'games.php'?>
  </div>
</div>
</div>
</div>
</body>
</html>
