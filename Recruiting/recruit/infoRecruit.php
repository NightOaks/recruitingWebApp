<?php

/*-- we included connection files--*/
  include "../config.php";
  $sql = "SELECT * FROM player WHERE id = '$_GET[id]'";
  $result = $db->query($sql);
  $player = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="myStyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
  </head>

  <body>

<table>
        <tr><th>image</th></tr>

<?php


echo 
'
<img src="fetchImage.php?id='.$player['id'].' width="175" height="200"/>
<h1 style="text-align: center;">'.$player['fname'].' '.$player['lname'].'</h1>
    <p style="text-align: center;">'.$player['year'].'</p>
    <p style="text-align: center;">'.$player['hs'].'</p>
    <p style="text-align: center;">'.$player['aau'].'</p>';
?>

    





  </body>
</html>