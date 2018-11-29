<?php

include("../config.php");

$q = $_GET['q'];

$sql="SELECT fname, lname FROM player WHERE fname LIKE '%$q%' or lname LIKE '%$q%';;

$playerlist = $db->query($sql);

$array = $playerlist->fetch_all();

$playerlist->free();

foreach (){
    if (stripos())
}

echo $playerForm;
?>
