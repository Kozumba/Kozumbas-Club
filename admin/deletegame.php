<?php
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
//Using this script, sends the data to the server, to delete the selected game
include '../config.php';
if(isset($_GET["deletegame"])){
              $stmt=$db->prepare("DELETE FROM `games` WHERE game_id = :game_id");
              $deletedgame = $_GET["deletegame"];
              $stmt->bindParam(':game_id',$deletedgame);
              $stmt->execute();
              header("location:addgames.php");
          }
?>