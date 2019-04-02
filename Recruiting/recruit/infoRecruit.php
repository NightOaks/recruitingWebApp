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
    <link rel="stylesheet" type="text/css" href="recruit.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
  </head>

  <body>
    <p><a href="recruitHome.php">Back</a></p>
    <?php

    echo "
    <div class='float-right'>
      <form action='deleteRecruit.php' method='post'>
        <input type='hidden' name='p_id' value=".$player['p_id'].">
        <input type='hidden' name='hs_id' value=".$player['hs_id'].">
        <input type='hidden' name='aau_id' value=".$player['aau_id'].">
        <input class = 'btn text-color' type='submit' value='Delete'>
      </form>
    </div>";

    echo "
    <div>
      <form action='editRecruit.php' method='post'>
        <input type='hidden' name='p_id' value=".$player['p_id'].">
        <input class = 'btn text-color' type='submit' value='Edit'>
      </form>
    </div>";
    

    if ($player['profileImage'] !=NULL){
      echo '<img class="playerProfileImage" src="data:image/jpeg;base64,'.base64_encode($player['profileImage']).'"/>';
    }

      echo '<div class="padding"><p class="center">'.$player['fname'].' '.$player['lname'].'</p>
      <p>'.$player['year'].'</p>
      <p>'.$hs['name'].'</p>
      <p>'.$aau['name'].'</p></div>';


      echo "<div class='black-border'>
      <form action='addEval.php' method='get'>
        <input type='hidden' name='p_id' value=".$player['p_id'].">
        <input class = 'btn text-color' type='submit' value='Evaluations'>
      </form>
      <hr>
      </div>";

    ?>
  </body>
</html>