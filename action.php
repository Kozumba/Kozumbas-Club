<?php
session_start();
//Using this script, sends the data to the server, to update user's new description
include 'config.php';
if(isset($_POST["submit"])){
              $stmt=$db->prepare("UPDATE `accounts` SET description = :updatedesc WHERE username = :user");
              $updatedesc = $_POST['updatedesc'];
              $user = $_SESSION['username'];
              $stmt->bindParam(':user',$user);
              $stmt->bindParam(':updatedesc',$updatedesc);
              $stmt->execute();
              header("location:profile.php");
          }
//Using this script, sends the data to the server, to delete user's account and also delete their own games uploaded to the website, since the user is getting deleted
if(isset($_POST["delete"])){
    $user = $_SESSION['username'];
    $stmt1=$db->prepare("DELETE FROM `accounts` WHERE username = :user");
    $stmt2=$db->prepare("DELETE FROM `usergames` WHERE creator = :user");
    $stmt1->bindParam(':user',$user);
    $stmt2->bindParam(':user',$user);
    $stmt1->execute();
    $stmt2->execute();
// remove all session variables
    session_unset();

// destroy the session
    session_destroy();
    header("location:index.php");
    
}
?>