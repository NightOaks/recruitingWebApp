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
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="navbar-collapse">
        
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Recruit <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../game/gameHome.php">Game</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn nav-link my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="addRecruit.php">Add</a>
          </li>
        </ul>

      </div>
    </nav>

    <?php
      include("../config.php");
      $sql = "SELECT * FROM player";
      $playerlist = $db->query($sql);
          
          while ($player = $playerlist->fetch_assoc()){
            $playerForm = 
              "<div>
              <form action='infoRecruit.php' method='get'>
              <input type='hidden' name='id' value=".$player['p_id']."/>
              <input style='width:100%;'type='submit' value='".$player['fname']." ".$player['lname']." ".$player['year']." ".$player['hs']." ".$player['aau']."'>
              </form>
            </div>";
          }

        echo $playerForm;
    ?>
  </body>
</html>