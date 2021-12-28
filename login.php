<?php
include 'config.php';
if(isset($_POST["submit"]))  
     {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>Please enter your user details!</label>';  
           }  
           else  
           {  
                $sql = "SELECT * FROM accounts WHERE username = :username AND password = :password";
                $stmt = $db->prepare($sql);    
                $stmt->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $rows = $stmt->rowCount();
                $result = $stmt->fetch(PDO::FETCH_LAZY);
                
                if($rows > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];
                     $_SESSION["picture"] = $result->profile_picture;

                     include 'login_success.php';  
                }  
                else  
                {  
                     echo '<p class="text-white text-center">You entered your password/username incorrectly</p>';  
                }  
           }  
      } 
?>
<?php if(!isset($_SESSION['username'])){
echo'

<div id="loginhide" class="text-white p-4 d-flex flex-wrap flex-column" style="background:#000815;">
<form action="profile.php" method="post" class="flex-column justify-content-center">
<div class="mb-3">
<label class="form-label mx-auto" style="font-size:14px;">Username</label>
<input type="text" name="username" class="form-control mx-auto" style="width:210px;" required>
</div>
<div class="mb-3">
<label class="form-label" style="font-size:14px;">Password</label>
<input class="form-control mx-auto" style="width:210px;" type="password" name="password" required>
</div>
<button class="btn btn-primary" name="submit" style="width:210px; margin:0px 7.04688px;" type="submit">Log in!</button>
</form>
<ul class="nav navbar-nav">
<li class="nav-item"><a class="nav-link" href="register.php">New user? click here to register</a></li>
</ul>
</div>';
}?>

