<?php
  /*-- we included connection files--*/
  include "../config.php";
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $imageName="";
    $imageTmp="";
    $imageName=$_FILES["myimage"]["name"];
    $finalhsid = NULL;
    $finalaauid = NULL; 

    if (!$imageName) {
      $imageTmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
    }

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $hs = mysqli_real_escape_string($db, $_POST['hs']);
    $aau = mysqli_real_escape_string($db, $_POST['aau']);

    $sql1 = "INSERT INTO high_school (name) VALUES ('$hs')";
    $db->query($sql1);

    $sql3 = "SELECT hs_id FROM high_school WHERE name = '$hs'";
    $hsid = $db->query($sql3);
    $resulthsid = $hsid->fetch_array(MYSQLI_NUM);
    $finalhsid = $resulthsid[0];
  
    $sql2 = "INSERT INTO aau (name) VALUES ('$aau')";
    $db->query($sql2);

    $sql4 = "SELECT aau_id FROM aau WHERE name = '$aau'";
    $aauid = $db->query($sql4);
    $resultaauid = $aauid->fetch_array(MYSQLI_NUM);
    $finalaauid = $resultaauid[0];

    $sql = "INSERT INTO player(fname, lname, year, profileImage, profileName, hs_id, aau_id) VALUES ('$fname', '$lname', '$year', '$imageTmp', '$imageName', '$finalhsid', '$finalaauid')";
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
    <link rel="stylesheet" type="text/css" href="recruit.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
 
  </head>

  <body>
    <div class="padding">
      <p class="center">New Recruit</p>
    

      <p><a class="float-right" href="recruitHome.php">Cancel</a></p>
      
      <form method="POST" name="upfrm" action="" enctype="multipart/form-data">
      
        <input type="submit" value="Done" name="btn_upload" id="btn_upload" class="btn text-color" />
        <div> 
          <input class="margin" type="text" placeholder="First name" name="fname"><br>
          
          <input class="margin" type="text" placeholder="Last name" name="lname"><br>
          
          <input class="margin" type="text" placeholder="Year" name="year"><br>
          
          <input class="margin" type="text" placeholder="High school" name="hs"><br>
          
          <input class="margin" type="text" placeholder="AAU team" name="aau"><br>
          
          <p>Choose profile image:</p>
          <input type="file" name="myimage" id="myimage" class="file_input text-color" />
          
        </div>
      </form>
    </div>
  </body>
</html>