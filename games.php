
<?php
include "config.php";
//for action count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'action'");
$stmt->execute();

$totalaction = $stmt->rowcount();
//for adventure count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'adventure'");
$stmt->execute();

$totaladventure = $stmt->rowcount();

//for puzzle count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'puzzle'");
$stmt->execute();

$totalpuzzle = $stmt->rowcount();

//for racing count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'racing'");
$stmt->execute();

$totalracing = $stmt->rowcount();

//for point&click count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'pointandclick'");
$stmt->execute();

$totalpointandclick = $stmt->rowcount();

//for sports count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'sports'");
$stmt->execute();

$totalsports = $stmt->rowcount();

//for strategy count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'strategy'");
$stmt->execute();

$totalstrategy = $stmt->rowcount();

//for RPG count
$stmt= $db->prepare("SELECT `category` FROM `games` WHERE category = 'rpg'");
$stmt->execute();

$totalrpg = $stmt->rowcount();
?>
<div class="d-flex flex-column">
<div class="container-fluid">
<div class="dropdown container-fluid" style="position:relative;">
<button class="btn btn-secondary dropdown-toggle" type="button" onclick="dropdownmenu()" style="background:#22223B;">
    Category
  </button>
  <div class="dropdown-menu" id="showingdropdown" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=action"><img class="m-1" src="style/categories/action.svg" width="20" height="20">Action(<?php echo $totalaction;?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=adventure"><img class="m-1" src="style/categories/adventure.svg" width="20" height="20">Adventure(<?php echo $totaladventure; ?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=puzzle"><img class="m-1" src="style/categories/puzzle.svg" width="20" height="20">Puzzle(<?php echo $totalpuzzle; ?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=racing"><img class="m-1" src="style/categories/racing.svg" width="20" height="20">Racing(<?php echo $totalracing; ?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=pointandclick"><img class="m-1" src="style/categories/pointandclick.svg" width="20" height="20">Point&Click(<?php echo $totalpointandclick; ?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=sports"><img class="m-1" src="style/categories/sports.svg" width="20" height="20">Sports(<?php echo $totalsports; ?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=strategy"><img class="m-1" src="style/categories/strategy.svg" width="20" height="20">Strategy(<?php echo $totalstrategy; ?>)</a>
    <a class="dropdown-item p-1 rounded " style="" href="?games&category=rpg"><img class="m-1" src="style/categories/rpg.svg" width="20" height="20">RPG(<?php echo $totalrpg;  ?>)</a>
    </div>

</div>
</div>
<?php
if(isset($_GET['searchbtn'])) {
    
echo '
<div class="d-flex flex-column container-fluid">

<div class="text-white text-center mx-auto container-fluid"><p>search results for games called "'.$_GET['search'].'"</p></div>'; 
} ?>
</div>
<script>
var dropactive = 0;
function dropdownmenu()
{
if (dropactive == 0) {
document.getElementById("showingdropdown").style.display="block";
dropactive = 1;
} else {
document.getElementById("showingdropdown").style.display="none";
    dropactive = 0; 
}
}
</script>
<div class="d-flex container-fluid flex-wrap align-items-center justify-content-center" style="margin-bottom:100px;">

<?php
include "config.php";
if (isset($_GET['category'])) {
    $skaits_pa_lapu=28;
    if(isset($_GET["page"])) {
        $lapa=$_GET["page"];
    }
    else {
        $lapa=1;
    }
    $sakt_no=($lapa-1)*28;
    
$stmt= $db->prepare("SELECT * FROM games WHERE category = '".$_GET['category']."' limit $sakt_no,$skaits_pa_lapu");
$stmt->execute();
}
elseif(isset($_GET['searchbtn'])) {
    $skaits_pa_lapu=28;
    if(isset($_GET["page"])) {
        $lapa=$_GET["page"];
    }
    else {
        $lapa=1;
    }
    $sakt_no=($lapa-1)*28;

    $stmt= $db->prepare("SELECT * FROM games WHERE title LIKE '%".$_GET['search']."%' limit $sakt_no,$skaits_pa_lapu");
    $stmt->execute(); 
    $totalresults = $stmt->rowcount();
}
else
{
         //nosaka kura lapa ir pašlaik parādīta
         $skaits_pa_lapu=28;
         if(isset($_GET["page"])) {
             $lapa=$_GET["page"];
         }
         else {
             $lapa=1;
         }
         $sakt_no=($lapa-1)*28;
         
         $stmt= $db->prepare("SELECT * FROM games limit $sakt_no,$skaits_pa_lapu");
         $stmt->execute();
}
?>
         <?php
         while ($row = $stmt->fetch(PDO::FETCH_LAZY))
         {
        ?>
          <?php echo "<a class='nav-link' href='".$row['link']."'>";?>
          
        <div class="card" style="width:11rem; height:170px;">
                         
         <?php
            
            //Šeit izdrukā visas spēles no datubāzes
            echo "<img src='images/" . $row['picture']."' width='100' height='100';  class='card-img-top'>";?>
           
            <div class="card-body">  
                <?php echo "<h6 class='text-center card-title text-wrap' style='font-size:15px; font-weight: 800; font-family: Nunito, sans-serif; color:#282725;'>".$row['title']."</b></h6>";?>
            </div>

            
        </div></a>
              
              
        <?php
}
         ?>
</div>
</div>
<!-- Default dropright button -->
<?php
//izpilda ciklu, kas izveido navigācijas/lapas pogas ja kategorija nav uzstādīta
if (!isset($_GET['category']) && !isset($_GET['searchbtn'])){
$stmt=$db->prepare("select * from games");
        $stmt->execute();
        $visas_speles=$stmt->rowCount();
        if($visas_speles <= 0){
            echo '';
        }else{
        $visas_lapas=ceil($visas_speles/$skaits_pa_lapu);
echo "</div><div class='text-center mx-auto m-5'>";
if (($_GET['page'] ?? 1) != 1) {
    echo "<a class='btn btn-dark' href='?page=",($lapa-1),"'>< </a>";
}
        for($i=1;$i<=$visas_lapas;$i++)
        {
            echo "<a class='btn btn-dark' href='?page=".$i."'>".$i."</a> ";
        }
if ($lapa != $visas_lapas){
     echo "<a class='btn btn-dark' href='?page=",($lapa+1),"'> ></a>";
}
echo "</div>";
}
}
elseif  (isset($_GET['searchbtn']) && !isset($_GET['category'])){
//izpilda ciklu, kas izveido navigācijas/lapas pogas ja notiek meklēšana
    $stmt=$db->prepare("select * from games WHERE title LIKE '%".$_GET['search']."%'");
    $stmt->execute();
    $visas_speles=$stmt->rowCount();
    if($visas_speles <= 0){
        echo '';
    }else{
    $visas_lapas=ceil($visas_speles/$skaits_pa_lapu);
echo "</div><div class='text-center mx-auto m-5'>";
if (($_GET['page'] ?? 1) != 1) {
echo "<a class='btn btn-dark' href='?games&search=",$_GET['search'],"&searchbtn=&page=",($lapa-1),"'>< </a>";
}
    for($i=1;$i<=$visas_lapas;$i++)
    {
        echo "<a class='btn btn-dark' href='?games&search=",$_GET['search'],"&searchbtn=&page=".$i."'>".$i."</a> ";
    }
if ($lapa != $visas_lapas){
 echo "<a class='btn btn-dark' href='?games&search=",$_GET['search'],"&searchbtn=&page=",($lapa+1),"'> ></a>";
}
echo "</div>";
        }

}else{
  //izpilda ciklu, kas izveido navigācijas/lapas pogas ja kategorija ir uzstādīta
  $stmt=$db->prepare("select * from games WHERE category = '".$_GET['category']."'");
  $stmt->execute();
  $visas_speles=$stmt->rowCount();
  if($visas_speles <= 0){
    echo '';
  }else{
  $visas_lapas=ceil($visas_speles/$skaits_pa_lapu);
echo "</div><div class='container-fluid text-center mx-auto m-5'>";
if (($_GET['page'] ?? 1) != 1) {
echo "<a class='btn btn-dark' href='?games&category=",$_GET['category'],"&page=",($lapa-1),"'>< </a>";
}
  for($i=1;$i<=$visas_lapas;$i++)
  {
      echo "<a class='btn btn-dark' href='?games&category=",$_GET['category'],"&page=".$i."'>".$i."</a> ";
  }
if ($lapa != $visas_lapas){
echo "<a class='btn btn-dark' href='?games&category=",$_GET['category'],"&page=",($lapa+1),"'> ></a>";
}
echo "</div>";  
}
}
 ?>
</div>
</div>


