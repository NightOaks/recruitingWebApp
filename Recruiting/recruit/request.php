<?php

include("../config.php");

$q = $_GET['q'];

$sql="SELECT fname, lname FROM player WHERE fname LIKE '%$q%' or lname LIKE '%$q%';;

$array[] = $db->query($sql);

foreach ($array as $results){
    if (stripos($results, $q) !== false){
        $list[] = $results;
    }
}

$arrayEncoded = json_encode($list);

echo $list;
?>
