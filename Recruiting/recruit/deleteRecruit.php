<?php
	include "../config.php";
	
	$sql = "DELETE FROM player WHERE p_id =".$_POST['p_id'];
	$db->query($sql);
	
	header("location: recruitHome.php");
?>