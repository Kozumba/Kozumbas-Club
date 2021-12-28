let toxic_blow = 1800;
let scimitar = 2400;
let longsword  = 3000;
let warhammer = 3600;

function bp(){
   let toxic_blow = 1800;
   taken_weapon = toxic_blow;
   document.getElementById("weapon").style.display = "none";
   document.getElementById("battle").style.display = "block";
   check();
}
function scim(){
    let scimitar = 2400;
    taken_weapon = scimitar;
    document.getElementById("weapon").style.display = "none";
    document.getElementById("battle").style.display = "block";
    check();
 }
 function long(){
    let longsword  = 3000;
    taken_weapon = longsword;
    document.getElementById("weapon").style.display = "none";
    document.getElementById("battle").style.display = "block";
    check();
 }
 function war(){
    let warhammer = 3600;
    taken_weapon = warhammer;
    document.getElementById("weapon").style.display = "none";
    document.getElementById("battle").style.display = "block";
    check();
 }
let IntervalID;
let your_hp = 99;
    let enemy_hp = 120;
    let dmgd = 0;
    let dmgr = 0;
    let hptext = "";
    let mobtext = "";
    let dpstext = "";
    let ooftext = "";
    //player's stats
    let player_att = 1;
    let player_str = 1;
    let player_def = 1;
    //enemy's stats
    let enemy_att = 1;
    let enemy_str = 1;
    let enemy_def = 1;
function check(){
    if (!IntervalID){
        IntervalID = setInterval(play, taken_weapon);
    }
}
function play(){
    
        dmgd = Math.floor(Math.random()*26);
        dmgr = Math.floor(Math.random()*14);
        if (enemy_hp < dmgd){
           enemy_hp = 0;
        } else {
            enemy_hp = enemy_hp - dmgd;
        }
        if (your_hp < dmgr){
            your_hp = 0;
        } else {
            your_hp = your_hp - dmgr;
        }
        hptext = your_hp;
        mobtext = enemy_hp;
        dpstext = dmgd;
        ooftext = dmgr;
        document.getElementById("player_hp").innerHTML = hptext;
        document.getElementById("enemy_hp").innerHTML = mobtext;
        document.getElementById("dmg_dealt").innerHTML = dpstext;
        document.getElementById("dmg_recieved").innerHTML = ooftext;
        if (your_hp <= 0 || enemy_hp <= 0){
            clearInterval(IntervalID);
            IntervalID = null; 
        }

    }


