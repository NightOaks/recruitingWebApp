<?php

header("content-type:image/jpeg");

/*-- we included connection files--*/
  include "../config.php";

  $sql = "SELECT profileImage FROM player WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);

  header("Content-type: image/jpeg");
  echo $row['profileImage'];

/*$name=$_GET['name'];

$select_image="SELECT * FROM player WHERE profileName='$name'";

$var=mysql_query($select_image);

if($row=mysql_fetch_array($var))
{
 $image_name=$row["profileName"];
 $image_content=$row["profileImage"];
}
echo $image;*/

?>