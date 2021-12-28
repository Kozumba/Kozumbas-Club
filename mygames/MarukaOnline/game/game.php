<?php
include 'config.php'; 
if (isset($_POST['submit'])){
  $chosenclass = $_COOKIE['classtest'];
  $charactername = $_POST['playername'];
$sql = "INSERT INTO classtest (class_role, playername) VALUES (:classrole, :playername)";
$stmt = $db->prepare($sql);
$stmt ->bindparam(':classrole',$chosenclass);
$stmt ->bindparam(':playername',$charactername);
$result = $stmt->execute();
header('Location: ../game/battle.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="../css/game.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character creation</title>
</head>
<body>
 <div class="container">
     <div class="characterbox">
        <img src="../css/images/buttons/left.png" onclick="classChangerMinus()">
        <img id="chars" class="characterselection" src="../css/images/characters/warrior.png">
        <img src="../css/images/buttons/right.png" onclick="classChangerPlus()">
        </div>
        <div class="classname"><h1 id="class">Warrior</h1></div>
    <div class="atributes">
     <ul class="stats"> 
      <li id="str">strength - 60</li>
      <li id="def">defense - 45</li>
      <li id="hp">hitpoints - 125</li>
      <li id="agi">agility - 15</li>
      <li id="mag">magic - 0</li>
      <ul>
    </div> 
     <div class="descriptionbox">
        <div class="infobox"><p id="info">Warriors come from a noble family, which rules over the land of close hand combat.
Warriors use brute strength, to conquer their enemies, and they have built bodies to withstand many attacks.
<b>Their greatest foes are the magic cult users, which can use their spells, to attack from a far distance.</b></p></div>
     </div>
<form class="game" action="" method="post">
<label for="playername">Your desired character name:</label>
<input type="text" Placeholder="enter your character name" name="playername">
<br>
<button class="buttona" name="submit" type="submit">Time to join the world!</button>
</form>       
</div>
<script type="text/javascript">
var counter = 1;
    // Function to create the cookie
    function createCookie(name, value, days) {
        var expires;
          
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }
          
        document.cookie = escape(name) + "=" + 
            escape(value) + expires + "; path=/";
    }

function classChangerPlus() {
counter++;
 if (counter > 4){
     counter = 1;
 }
 classes();
}
function classChangerMinus() {
counter--;
 if (counter < 1){
     counter = 4;
 }
 classes();
}
function classes(){
    if (counter == 1){
  document.getElementById('chars').src = '../css/images/characters/warrior.png';  
  document.getElementById('class').innerHTML = 'Warrior';
  document.getElementById('info').innerHTML = 'Warriors come from a noble family, which rules over the land of close hand combat. Warriors use brute strength, to conquer their enemies, and they have built bodies to withstand many attacks. <b>Their greatest foes are the magic cult users, which can use their spells, to attack from a far distance.</b>';
  document.getElementById('str').innerHTML = 'strength - 60';
  document.getElementById('def').innerHTML = 'defense - 45';
  document.getElementById('hp').innerHTML = 'hitpoints - 125';
  document.getElementById('agi').innerHTML = 'agility - 15';
  document.getElementById('mag').innerHTML = 'magic - 0';
      // Creating a cookie after the document is ready
      $(document).ready(function () {
        createCookie("classtest", "warrior", "10");
    });

  
}
if (counter == 2){
  document.getElementById('chars').src = '../css/images/characters/mage.png'; 
  document.getElementById('class').innerHTML = 'Mage';
  document.getElementById('info').innerHTML = 'Mages come from a magic cult, which can use different type of spells, to gain advantage on the battlefield. Mages use a special type of energy called "Mara", which lets them to use the power of the gods. <b>Their greatest foes are thieves, which can conceal their attacks with stealth and can parry their spells with their agility.</b>';
  document.getElementById('str').innerHTML = 'strength - 15';
  document.getElementById('def').innerHTML = 'defense - 35';
  document.getElementById('hp').innerHTML = 'hitpoints - 100';
  document.getElementById('agi').innerHTML = 'agility - 45';
  document.getElementById('mag').innerHTML = 'magic - 65';
  // Creating a cookie after the document is ready
  $(document).ready(function () {
        createCookie("classtest", "mage", "10");
    });
  
}
if (counter == 3){
  document.getElementById('chars').src = '../css/images/characters/thief.png';   
  document.getElementById('class').innerHTML = 'Thief';
  document.getElementById('info').innerHTML = "Thieves are the survivors of evil cities, which had been destroyed by their own chaos, they try to survive by stealing everything they can, be it food, or be it money. Thieves are really agile and can conceal themselves with stealth ability. <b>Their greatest foes are priests of Maruka's town, which can use their light magic, to reveal where thieves are.</b>";
  document.getElementById('str').innerHTML = 'strength - 25';
  document.getElementById('def').innerHTML = 'defense - 40';
  document.getElementById('hp').innerHTML = 'hitpoints - 100';
  document.getElementById('agi').innerHTML = 'agility - 65';
  document.getElementById('mag').innerHTML = 'magic - 10';
  // Creating a cookie after the document is ready
  $(document).ready(function () {
        createCookie("classtest", "thief", "10");
    });
  
}
if (counter == 4){
  document.getElementById('chars').src = '../css/images/characters/priest.png';   
  document.getElementById('class').innerHTML = 'Priest';
  document.getElementById('info').innerHTML = 'Priests come from the town of Maruka, where they pray to Godess Baruha to gain light magic, which lets them heal their companions in the battle, and reveal any hidden pests with their holy light. <b>Their greatest foes are warriors, which can use their brute strength to overpower priests.</b>';
  document.getElementById('str').innerHTML = 'strength - 15';
  document.getElementById('def').innerHTML = 'defense - 35';
  document.getElementById('hp').innerHTML = 'hitpoints - 100';
  document.getElementById('agi').innerHTML = 'agility - 45';
  document.getElementById('mag').innerHTML = 'magic - 65';
  // Creating a cookie after the document is ready
  $(document).ready(function () {
        createCookie("classtest", "priest", "10");
    });
  
}
}


</script>   
</body>
</html>