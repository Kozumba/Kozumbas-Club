<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>

    html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}
    
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap');
</style>
<body style="font-family: Lato,Roboto,Arial,Helvetica,sans-serif; margin: 0; padding: 0; background:#000815;">
<?php
$user = $_SESSION['username'];
include 'config.php';

$stmt= $db->prepare("SELECT * FROM `usergames` WHERE creator = :user");
$stmt->bindParam(':user',$user);
$stmt->execute();
$totalgames = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
?>
<div class="d-flex justify-content-center flex-column" style="margin-top:10px;">
 
 
<div class="card mb-5" style="width:11rem; height:170px;">
                
<?php
   
   //Šeit izdrukā visas spēles no datubāzes
   echo "<img src='usergameimages/" . $row['picture']."' width='100' height='100';  class='card-img-top'>";?>
  
   <div class="card-body">  
       <?php echo "<h6 class='text-center card-title text-wrap' style='font-size:15px; font-weight: 800; font-family: Nunito, sans-serif; color:#282725;'>".$row['title']."</b></h6>";?>
   </div>
    <? echo '<a href="deletemygame.php?deletemygame='.$row->game_id.'" class="btn btn-danger">Delete this game</a><br><br>'; ?>
   
</div>
     
     
<?php
}
if ($totalgames == 0){
    echo "<p class=\"text-white text-center\">You haven't published any games</p>";
}
?>
</div>
</body>
</html>
