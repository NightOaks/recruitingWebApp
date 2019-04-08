<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="recruitList.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
  </head>

  <?php include('../session.php'); ?>
  <body>

    <div class="padding">
      <div class = "padding">
        <h1>Welcome <?php echo $login_session; ?></h1>
        <p><a class="float-right text-color" href="../logout.php">Logout</a></p>
        <p><a class="text-current" href="addRecruit.php">Add Recruit</a></p>
      </div>

    </div>

    <?php
      #error_reporting(E_ERROR | E_PARSE);
      $sql = "SELECT * FROM player ORDER BY fname ASC";
      $playerlist = $db->query($sql);
      $playerForm = '';

        while ($player = $playerlist->fetch_assoc()){
          $playerForm .= 
            "<div class='padding'>
              <form action='infoRecruit.php' method='get'>
                <input type='hidden' name='p_id' value=".$player['p_id']."/>
                <input class='btn-recruit' type='submit' value='".$player['fname']." ".$player['lname']." ".$player['year']."'>
              </form>
            </div>";
        }
        echo $playerForm;
    ?>
  </body>
</html>