<?php

include("../config.php");

$sql="SELECT * FROM player WHERE fname = '".$_GET['q']."' OR lname = '".$_GET['q']."'";
$playerlist = $db->query($sql);
$playerForm = '';

while ($player = $playerlist->fetch_assoc()){
    $playerForm .= 
        "<div>
        <form action='infoRecruit.php' method='get'>
        <input type='hidden' name='p_id' value=".$player['p_id']."/>
        <input style='width:100%;'type='submit' value='".$player['fname']." ".$player['lname']." ".$player['year']." ".$player['hs']." ".$player['aau']."'>
        </form>
    </div>";
}

echo $playerForm;
?>
