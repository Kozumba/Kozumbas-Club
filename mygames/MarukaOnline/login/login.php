<?php
session_start();
include 'config.php';
if (isset($_POST['uname']) && isset($_POST['psw'])){
    $sql = "SELECT FROM classtest (username, password) WHERE username = :username && :password";
$stmt->bindparam(':username', $_POST['uname']);
$stmt->bindparam(':password', $_POST['psw']);
$stmt = $db->prepare($sql);
$result = $stmt->execute();
 if ($_POST['uname'] == $row['username'] && $_POST['psw'] == $row['password']){
    header('Location: ../game/game.php');
    $_SESSION['user'] = $_POST['uname'];

}
else {
echo '
<script>
alert("You have entered your password or username incorrectly, please try again");
</script>
';
}
}
if (!isset($_SESSION['user'])){
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maruka Online</title>
</head>
<body>
<form action="" method="post">    
 <div class="loginbox">
<label for="uname"><b>Username</b></label>
<input type="text" placeholder="Enter username" name="uname" required>
<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" required>

<button type="submit">Login</button>
<label>
<input type="checkbox" checked="checked" name="remember"> Remember me
</label> 
<a href="register.php">Register</a>
</div>
</form>   
</body>
</html>
';
} else{
header('Location: ../game/game.php');
}
?>