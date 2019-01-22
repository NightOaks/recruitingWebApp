<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="recruitList.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">

  <script>
    window.onload = function(){
      var input1 = document.getElementById("search");
  
      input1.addEventListener("input", function(event){
          let request = new XMLHttpRequest();
          request.onreadystatechange = function(){
              if (request.readyState == 4 && request.status == 200){
                  var response = request.responseText;
                  //var parsedResponse = JSON.parse(response);
                  document.getElementById("ajaxOutput").innerHTML = response;
              }
          }
          var path = "request.php?q=" + document.getElementById("search").value;
          request.open("GET", path, true);
          request.send();
      });
    }
  </script>
  </head>

  <body>

    <div class="padding">
      <p><a class="text-current" href="#">Recruit</a></p>
      <p><a class="float-right text-color" href="addRecruit.php">Add Recruit</a></p>
      <p ><a class="text-color" href="../game/gameHome.php">Game</a></p>
      
      <form class="form-inline my-2 my-lg-0">
        <input id="search" type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
      </form>

    </div>


    <p id="ajaxOutput"></p>

    <?php
      include("../config.php");
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