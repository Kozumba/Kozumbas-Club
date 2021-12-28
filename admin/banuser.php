<?php
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
//Using this script, sends the data to the server, to update the selected account got banned
if(isset($_GET["banaccount"])){
              $stmt=$db->prepare("UPDATE `accounts` SET ban = :banned WHERE username = :user");
              $banned = "yes";
              $user = $_GET["banaccount"];
              $stmt->bindParam(':user',$user);
              $stmt->bindParam(':banned',$banned);
              $stmt->execute();
              header("location:https://www.kozumbas.club/admin/ban");
          }
?>