<?php
/*-- we included connection files--*/
  include "../config.php";
  $sql = "SELECT * FROM player WHERE p_id = '$_GET[p_id]'";
  $result = $db->query($sql);
  $player = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../myStyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script>
      function goBack() {
          window.history.back();
      }
    </script>  
  </head>

  <body>
    <button class="nav-link" onclick="goBack()"><</button>

    <?php
    echo "
    <div>
      <form action='editRecruit.php' method='get'>
        <input type='hidden' name='p_id' value=".$player['p_id']."/>
        <input type='submit' value='Edit'>
      </form>
    </div>";

    

      if ($player['profileImage'] != NULL) {
      echo '<img class="playerProfileImage" src="data:image/jpeg;base64,'.base64_encode($player['profileImage']).'"/>';
      }

      echo '<h2 style="text-align: center;">'.$player['fname'].' '.$player['lname'].'</h2>
      <p style="text-align: center;">'.$player['year'].'</p>
      <p style="text-align: center;">'.$player['hs'].'</p>
      <p style="text-align: center;">'.$player['aau'].'</p>';
    ?>
  </body>
</html>