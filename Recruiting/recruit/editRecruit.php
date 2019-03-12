<?php
  /*-- we included connection files--*/
  include "../config.php";

  $former = "SELECT * FROM player WHERE p_id = '$_GET[p_id]'";
  $result = $db->query($former);
  $player = $result->fetch_assoc();
  
  $high_school_query = "SELECT * FROM high_school WHERE hs_id = '$player[hs_id]'";
  $hs_result = $db->query($high_school_query);
  $hs_actual = $hs_result->fetch_assoc();
  
  $aau_query = "SELECT * FROM aau WHERE aau_id = '$player[aau_id]'";
  $aau_result = $db->query($aau_query);
  $aau_actual = $aau_result->fetch_assoc();
  
  

    echo '<script>myfunction()</script>';

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    echo '<script>myfunction()</script>';
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $hs = mysqli_real_escape_string($db, $_POST['hs']);
    $aau = mysqli_real_escape_string($db, $_POST['aau']);
    
    $sql = "UPDATE player SET fname = '$fname', lname = '$lname', year = '$year' WHERE p_id = '$_GET[p_id]'";
    $db->query($sql);
    
    $hs_sql = "INSERT INTO high_school (name) VALUES ('$hs')";
    $db->query($hs_sql);
    $hs_query2 = "SELECT hs_id FROM high_school WHERE name = '$hs'";
    $hs_result2 = $db->query($hs_query2);
    $hs_actual2 = $hs_result2->fetch_assoc();
    $new_hs_id = $hs_actual2['hs_id'];
    
    $aau_sql = "INSERT INTO aau (name) VALUES ('$aau')";
    $db->query($aau_sql);
    $aau_query2 = "SELECT aau_id FROM aau WHERE name = '$aau'";
    $aau_result2 = $db->query($aau_query2);
    $aau_actual2 = $aau_result2->fetch_assoc();
    $new_aau_id = $aau_actual2['aau_id'];
    // $sql_update = "UPDATE player SET hs_id = '$new_hs_id', aau_id = '$new_aau_id' WHERE p_id = '$_GET[p_id]'";
    
    
        
    // $db->query($sql_update);

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
          <input type="text" name="hs" value="<?php echo $hs_actual['name']?>"><br>
          AAU:<br>
          <input type="text" name="aau" value="<?php echo $aau_actual['name']?>"><br>
          <input type="submit" value="Submit" name="btn_edit" id="btn_edit" class="btn" />
        </div>
      </form>
  </body>
</html>