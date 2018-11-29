<?php

include("../config.php");

$q = $_GET['q'];
/*
$sql="SELECT fname, lname FROM player WHERE fname LIKE '%$q%' or lname LIKE '%$q%';;

$array[] = $db->query($sql);
*/
$array = array("Nicole Ignasiak", "Katie Key");

$list = array();

foreach ($array as $destination) {
    if (stripos($destination, $q) !== false){
        $list[] = $destination;
    }
}

$arrayEncoded = json_encode($list);

echo $list;
?>
