<?php

include("../config.php");

$q = $_GET['q'];

$sql="SELECT fname, lname FROM player WHERE fname LIKE '%" . $q . "%' or lname LIKE '%" . $q . "%'";

$result = $db->query($sql);

$list = [];
while ($player = $result->fetch_assoc()) {
    array_push($list, $player['fname'] . ' ' . $player['lname']);
}


$arrayEncoded = json_encode($list);

echo $arrayEncoded;
?>
