<?php
	include "../config.php";
	
	$sql = "DELETE FROM player WHERE p_id =".$_POST['p_id'];
	$db->query($sql);

	$sql1 = "DELETE FROM high_school WHERE hs_id =".$_POST['hs_id'];
	$db->query($sql1);

	$sql2 = "DELETE FROM aau WHERE aau_id =".$_POST['aau_id'];
	$db->query($sql2);
	
	$sql3 = "DELETE FROM evaluation WHERE p_id =".$_POST['p_id'];
	$db->query($sql3);
	
	$sql4 = "DELETE FROM juice_stats WHERE p_id =".$_POST['p_id'];
	$db->query($sql4);

	header("location: recruitHome.php");
?>