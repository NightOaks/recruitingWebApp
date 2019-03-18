<?php
  /*-- we included connection files--*/
  include "../config.php";
  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $comment = mysqli_real_escape_string($db, $_POST['comment']);
    $p_id = "SELECT p_id FROM player WHERE p_id = '$_GET[p_id]'";


     $sql = "INSERT INTO evaluation(comment) VALUES ('$comment')";

    $db->query($sql);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
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
    <div class="padding">
      <p class="center">New Evaluation</p>
    
    <p><a class="float-right" href="recruitHome.php">Cancel</a></p>
    
    <form method="POST" name="upfrm" action="" enctype="multipart/form-data">
        
          <input type="submit" value="Done" name="btn_upload" id="btn_upload" class="btn text-color" />
          <div> 

          <input class="margin" type="text" placeholder="Comment" name="comment"><br>

        </div>
    </form>
    </div>
  </body>
</html>