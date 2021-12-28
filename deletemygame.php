<?
include 'config.php';
//quick script test to see if the user is the game developer
$stmt=$db->prepare("SELECT * FROM usergames where creator = :admin_username");
$stmt->bindParam(':admin_username',$_SESSION["username"], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row["creator"] != $_SESSION["username"]){
    header('Location: gamemanager.php');
    exit;
} //script ends here
//Using this script, sends the data to the server, to delete the selected game
include 'config.php';
if(isset($_GET["deletemygame"])){
              $stmt=$db->prepare("DELETE FROM `usergames` WHERE game_id = :game_id");
              $deletedgame = $_GET["deletemygame"];
              $stmt->bindParam(':game_id',$deletedgame);
              $stmt->execute();
              header("location:gamemanager.php");
          }
?>