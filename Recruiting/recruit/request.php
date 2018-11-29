<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

include("../config.php");

$sql="SELECT * FROM player WHERE id = '".$q."'";
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
</body>
</html>