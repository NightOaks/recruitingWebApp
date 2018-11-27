<?php

  /*-- we included connection files--*/
  include "../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $imageName=$_FILES["myimage"]["name"]; 

  $imageTmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

  $sql = "INSERT INTO player(fname, lname, year, hs, aau, profileImage, profileName) VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[year]', '$_POST[hs]', '$_POST[aau]', '$imageTmp', '$imageName')";

  $db->query($sql);
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
  </head>

  <body>
    <h2>File uploading</h2>
    <form method="POST" name="upfrm" action="" enctype="multipart/form-data">
        <div>
          First name:<br>
          <input type="text" name="fname"><br>
          Last name:<br>
          <input type="text" name="lname"><br>
          Year:<br>
          <input type="text" name="year"><br>
          High School:<br>
          <input type="text" name="hs"><br>
          AAU:<br>
          <input type="text" name="aau"><br>
          Enter Image Name:<br>
          <input type="file" name="myimage" id="myimage" class="file_input" />
          <input type="submit" value="Upload" name="btn_upload" id="btn_upload" class="btn" />
        </div>
      </form>
      <table>
        <tr><th>image</th></tr>

      <?php
      $mysqli = new mysqli($host, $uname, $pwd, $db_name);
      $query = "SELECT profileImage FROM player ORDER BY id DESC";
      $result = mysqli_query($mysqli, $query);
      while($row = mysqli_fetch_array($result))
      {
          echo '<tr>
              <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($row['profileImage']).'"/>
              </td>
            </tr>

            ';
      }

      ?>

      <div class="msg">
        <strong>
          <?php if(isset($error)){echo $error;}?>
        </strong>
      </div>
    
    <script src="script.js"></script>
  </body>
</html>