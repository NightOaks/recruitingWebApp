<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../myStyle.css">

    <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Scripting for AJAX
  <script>
    function getPlayers(str) {
      if (str == "") {
        document.getElementById("search").innerHTML = "";
        return;
      } else { 
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET","request.php?q="+str,true);
      xmlhttp.send();
    }
  }
</script>
-->
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
              <input class="form-control mr-sm-2" placeholder="Search" onchange="getPlayer(this.value)" aria-label="Search">
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