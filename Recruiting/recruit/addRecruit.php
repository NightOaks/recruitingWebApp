<?php
  /*-- we included connection files--*/
  include "../config.php";
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $imageName="";
    $imageTmp="";
    $hsID = "";
    $aauID = "";
    $imageName=$_FILES["myimage"]["name"]; 

    if ($imageName != 0) {
      $imageTmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
    }

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $hs = mysqli_real_escape_string($db, $_POST['hs']);
    $aau = mysqli_real_escape_string($db, $_POST['aau']);

    
/*
    $hsID = mysqli_query("SELECT hs_id FROM high_school WHERE name='$hs'");
    if(mysqli_num_rows($hsID) == 0)
    {
		  $sql2 = "INSERT INTO high_school(name) VALUES ('$hs')";
    	$db->query($sql2);
    	$hsID = mysqli_query("SELECT hs_id FROM high_school WHERE name='$hs'");
    }
*/
    /*$aauID = mysqli_query($db, "SELECT * FROM aau WHERE name='$aau'");

    $checkrows = mysqli_num_rows($aauID);

   if($checkrows==0) {
      $sql1 = "INSERT INTO aau(name) VALUES ('$aau')";
      $db->query($sql1);
    }

    $aauID = mysqli_query($db, "SELECT * FROM aau WHERE name='$aau'");

    while ($aauRow = mysqli_fetch_array($aauID))
    {
      // escape your strings
        foreach($aauRow as $key => $val)
      {
          $aauRow[$key] = mysqli_real_escape_string($db, $aauRow[$key]);
      }
    }*/
    if ($db->query("SELECT aau_id FROM aau WHERE name='$aau'")) {

      $sql1 = "INSERT INTO auu (name) VALUES ('$aau')";
      $db->query($sql1);
    }

      $lookupID = mysqli_query($db, "SELECT aau_id FROM aau WHERE name='$aau'");
    

    $row = mysqli_fetch_row($lookupID);
    $aauID = $row[0];

    $sql4 = "INSERT INTO player (fname, lname, aau_id) VALUES ('$fname', '$lname', '$aauID')";

    $db->query($sql4);

    /*$sql = "INSERT INTO player(fname, lname, year, profileImage, profileName, hs_id, aau_id) VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[year]', '$imageTmp', '$imageName', '$hsID', '$aauID')";*/

    //$db->query($sql);


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