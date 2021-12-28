<?php  
 //login_success.php
//quick script test to see if the user has been banned
include 'config.php';
if(isset($_SESSION["username"])){
$stmt=$db->prepare("SELECT ban FROM accounts where username = :username");
$stmt->bindParam(':username',$_SESSION["username"], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row['ban'] == "yes"){
    header('Location: iambanned.php');
    exit;
}//script ends here   
      $user = $_SESSION['username'];
      $stmt= $db->prepare("SELECT `description` FROM `accounts` WHERE username = :user");
      $stmt->bindParam(':user',$user);
      $stmt->execute();
      echo '<div class="d-flex flex-column" style="width:275px; background-color: #000815;">';
      echo '<img class="mt-1 mb-1 mx-auto rounded-circle" width="84" height="84" src="images/accountpics/'.$_SESSION["picture"].'"></br>';
      echo '<h4 class="text-center text-white">'.$_SESSION["username"].'</h4>';
      echo '<h3 class="text-white text-center">Your description:</h3></br>';
      while ($row = $stmt->fetch(PDO::FETCH_LAZY))
         {
      echo '<p class="text-white text-center">' .$row->description.'<br>';
            if(isset($_GET["edit"])){
    echo "
    <form action='action.php' method='POST'>
    <textarea class='form-control' name='updatedesc'>".$row->description."</textarea>
    <input type='submit' class='button-primary' name='submit'>
    </form>
    ";
    
    }
         }
    

      echo '
      <h3 class="text-white text-center">My published games:</h3>
      ';
      
      echo '<iframe src="gamemanager.php" width="300" height="200" frameBorder="0"></iframe>';
         
      
      
      echo '<br>
      <h3 class="text-white text-center">Options</h3>
      <a href="admin/developeruserform.php" class="text-center">Publish a new game</a>
      <a href="profile.php?edit" class="text-center">Update your description</a>
      <a href="profile.php?delete" class="text-center">Delete your account</a>
      ';
         if(isset($_GET["delete"])){
    echo "
    <form action='action.php' method='POST'>
    <h4 class='text-white text-center'><b>Are you sure you want to delete your account? You won't be able to get it back!</b></h4>
    <div class='d-flex justify-content-center'>
    <div class='m-1'>
    <input type='submit' class='btn-primary btn' value='yes' name='delete'>
    </div>
    <div class='m-1'>
    <a class='btn btn-primary' href='profile.php'>no</a>
    </div>
    </div>
    </form>
    ";
    
    }
    echo '
      <br /><a class=" btn btn-danger w-50 mb-2 mx-auto" href="logout.php" style="color:#000815;">Log out<img src="log-out.svg" width="20" height="20" style="margin-left: 10px; margin-right:-15px; margin-bottom:3px;"></a>
      </div>';  
 }  
 else  
 {  
      include 'login.php';  
 };  
 ?> 