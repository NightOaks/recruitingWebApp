<?php
  /*-- we included connection files--*/
  include "../config.php";

    $sql = "SELECT * FROM player WHERE p_id = '$_POST[p_id]'";
    $result = $db->query($sql);
    $player = $result->fetch_assoc();


  if($_SERVER["REQUEST_METHOD"] == "GET") {

    

    //$p_id = $_POST["p_id"];
    $comment = mysqli_real_escape_string($db, $_GET['evaluation']);

    $sql = "INSERT INTO evaluation (p_id, comment) VALUES (".$player['p_id'].", '$comment')";
	 $db->query($sql);

    $p_id = $_GET['p_id'];
    #$comment = mysqli_real_escape_string($db, $_GET['evaluation']);

    #$sql = "INSERT INTO evaluation (p_id, comment) VALUES ($p_id, '$comment')";
	 #$db->query($sql);

    //header('location: recruitHome.php');
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
  <?php
  echo "
    <div class='padding'>
      <p class='center'>New Evaluation</p>
    
    <p><a class='float-right' href='recruitHome.php'>Cancel</a></p>
    
    <form method='post' name='upfrm' action='evalDB.php' enctype='multipart/form-data'>
        
          <input type='submit' value='Done' name='btn_upload' id='btn_upload' class='btn text-color' />
          <input type='hidden' name='p_id' value=".$p_id."/>
          <div> 

          <input class='margin' type='text' placeholder='Evaluation' name='evaluation'><br>

        </div>
    </form>
    </div>
    ";
    ?>
  </body>
</html>