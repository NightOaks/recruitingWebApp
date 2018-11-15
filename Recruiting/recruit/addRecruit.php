<?php

  /*-- we included connection files--*/
  include "config.php";

  /*--- we created a variables to display the error message on design page ------*/
  $error = "";

  if (isset($_POST["btn_upload"]) == "Upload")
  {
    $uploadOk = 1;

    $file_tmp = $_FILES["fileImg"]["tmp_name"];
    $file_name = $_FILES["fileImg"]["name"];

    /*image name variable that you will insert in database ---*/
    $image_name = $_POST["img-name"];

    //image directory where actual image will be store
    $file_path = "photo/".$file_name;

    $target_file = $file_path . basename($file_name); 

  /*---------------- php textbox validation checking ------------------*/
  if($image_name == "")
  {
    $error = "Please enter Image name.";
  }

  /*-------- now insertion of image section has start -------------*/
  else
  {
    if(file_exists($file_path))
    {
      $error = "Sorry,The <b>".$file_name."</b> image already exist.";
      $uploadOk = 0;
    }
      else
      {
        $result = mysqli_connect($host, $uname, $pwd) or die("Connection error: ". mysqli_error());
        mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error());
        mysqli_query($result,"INSERT INTO images(img_name,img_path)
        VALUES('$image_name','$file_path')") or die ("image not inserted". mysqli_error());
        move_uploaded_file($file_tmp,$file_path);
        $error = "<p align=center>File ".$_FILES["fileImg"]["name"].""."<br />Image saved into Table.";
      }
    }
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
          <input type="text" placeholder="Enter image name" name="img-name" class="tb" />
          <input type="file" name="fileImg" class="file_input" />
          <input type="submit" value="Upload" name="btn_upload" class="btn" />
        </div>
      </form>
      <div class="msg">
        <strong>
          <?php if(isset($error)){echo $error;}?>
        </strong>
      </div>
    
    <script src="script.js"></script>
  </body>
</html>