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
    <div class="padding">
      <h1>Welcome <?php echo $_SESSION['login_user']; ?></h1>
      <a href="recruit/recruitHome.php"><button id="recruitHomepageBtn" class="btn btn-secondary btn-lg btn-block">Recruit</button></a>
      <br>
      <a href="game/gameHome.php"><button id="gameHomepageBtn" class="btn btn-secondary btn-lg btn-block">Game</button></a>
    </div>
    
    
  </body>
</html>