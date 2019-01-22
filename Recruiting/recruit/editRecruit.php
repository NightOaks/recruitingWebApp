<?php
  /*-- we included connection files--*/
  include "../config.php";

  $former = "SELECT * FROM player WHERE p_id = '$_GET[p_id]'";
  $result = $db->query($former);
  $player = $result->fetch_assoc();

    echo '<script>myfunction()</script>';

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    echo '<script>myfunction()</script>';
    window.open('http://google.com');
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $hs = mysqli_real_escape_string($db, $_POST['hs']);
    $aau = mysqli_real_escape_string($db, $_POST['aau']);
    
    $sql = "UPDATE player SET fname = '$fname', lname = '$lname', year = '$year', hs = '$hs', aau = '$aau' WHERE p_id = '$_GET[p_id]'";
    
    $db->query($sql);

    header("location: recruitHome.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>IWU Recruiting</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="myStyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <script>
      function goBack() {
          window.history.back();
      }

      function myFunction()
{
alert("I am an alert box!");
}
    </script>  
  </head>

  <body>
    <button onclick="goBack()">Go Back</button>
    <h2>Add a Recruit</h2>
    <form method="POST" name="upfrm" action="" enctype="multipart/form-data">
        <div>
          First name:<br>
          <input type="text" name="fname" value="<?php echo $player['fname']?>"><br>
          Last name:<br>
          <input type="text" name="lname" value="<?php echo $player['lname']?>"><br>
          Year:<br>
          <input type="text" name="year" value="<?php echo $player['year']?>"><br>
          High School:<br>
          <input type="text" name="hs" value="<?php echo $player['hs']?>"><br>
          AAU:<br>
          <input type="text" name="aau" value="<?php echo $player['aau']?>"><br>
          <input type="submit" value="Submit" name="btn_edit" id="btn_edit" class="btn" />
        </div>
      </form>
  </body>
</html>