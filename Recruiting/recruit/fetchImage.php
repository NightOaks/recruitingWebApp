<?php

header("content-type:image/jpeg");

/*-- we included connection files--*/
  include "../config.php";

  $sql = "SELECT profileImage FROM player WHERE p_id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);

  header("Content-type: image/jpeg");
  echo $row['profileImage'];

?>