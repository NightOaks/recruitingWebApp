<?php

/*-- we included connection files--*/
  include "../config.php";
  $sql = "SELECT * FROM player WHERE p_id = '$_GET[p_id]'";
  $sql1 = "SELECT high_school.name FROM player INNER JOIN high_school ON player.hs_id=high_school.hs_id WHERE p_id = '$_GET[p_id]'";
  $sql2 = "SELECT aau.name FROM player INNER JOIN aau ON player.aau_id=aau.aau_id WHERE p_id = '$_GET[p_id]'";
  $result = $db->query($sql);
  $result1 = $db->query($sql1);
  $result2 = $db->query($sql2);
  $player = $result->fetch_assoc();
  $hs = $result1->fetch_assoc();
  $aau = $result2->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../myStyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
  </head>

  <body>
    <?php
    echo "
    <div>
      <form action='editRecruit.php' method='get'>
        <input type='hidden' name='p_id' value=".$player['p_id']."/>
        <input type='submit' value='Edit'>
      </form>
    </div>";

    
    if ($player['profileImage'] !=NULL){
      echo '<img class="playerProfileImage" src="data:image/jpeg;base64,'.base64_encode($player['profileImage']).'"/>';
    }

      echo '<h2 style="text-align: center;">'.$player['fname'].' '.$player['lname'].'</h2>
      <p style="text-align: center;">'.$player['year'].'</p>
      <p style="text-align: center;">'.$hs['name'].'</p>
      <p style="text-align: center;">'.$aau['name'].'</p>';
    ?>
  </body>
</html>