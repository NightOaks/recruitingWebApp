<?php
  /*-- we included connection files--*/
  include "../config.php";
  $p_id = $_POST['p_id'];
  $sql = "SELECT * FROM player WHERE p_id ='$_POST[p_id]'";
  $sql1 = "SELECT high_school.name FROM player INNER JOIN high_school ON player.hs_id=high_school.hs_id WHERE p_id = '$_POST[p_id]'";
  $sql2 = "SELECT aau.name FROM player INNER JOIN aau ON player.aau_id=aau.aau_id WHERE p_id = '$_POST[p_id]'";
  $result = $db->query($sql);
  $result1 = $db->query($sql1);
  $result2 = $db->query($sql2);
  $player = $result->fetch_assoc();
  $hs = $result1->fetch_assoc();
  $aau = $result2->fetch_assoc();

  if($_SERVER["REQUEST_METHOD"] == "GET") {

    echo '<script>myfunction()</script>';
    $fname = mysqli_real_escape_string($db, $_GET['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $hs = mysqli_real_escape_string($db, $_POST['hs']);
    $aau = mysqli_real_escape_string($db, $_POST['aau']);
    
    $sql = "UPDATE player SET fname = '$fname', lname = '$lname', year = '$year' WHERE p_id = '$_POST[p_id]'";
    $db->query($sql);
    
    $sql1 = "UPDATE hs SET name = '$hs' WHERE hs_id = '$_POST[hs_id]'";
    $db->query($sql1);

    $sql2 = "UPDATE player SET aau = '$aau'WHERE aau_id = '$_POST[aau_id]'";
    $db->query($sql2);

    //header("location: recruitHome.php");
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
  <?php 
    echo "
    <p class='center'>Edit Recruit</p>
    

    <p><a class='float-right' href='recruitHome.php'>Cancel</a></p>

    <form method='post' name='upfrm' action='editDB.php' enctype='multipart/form-data'>
      <input type='submit' value='Update' name='btn_edit' id='btn_edit' class='btn' />
      <input type='hidden' name='p_id' value=".$p_id."/>
        <div>
          First name:<br>
          <input type='text' name='fname' value=".$player['fname']."><br>
          Last name:<br>
          <input type='text' name='lname' value=".$player['lname']."><br>
          Year:<br>
          <input type='text' name='year' value=".$player['year']."><br>
          High School:<br>
          <input type='text' name='hs' value=".$hs['name']."><br>
          AAU:<br>
          <input type='text' name='aau' value=".$aau['name']."><br>
          
        </div>
      </form>";
    ?>
  </body>
</html>