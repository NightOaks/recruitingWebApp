<?php
	include "../config.php";
	
	$p_id = $_POST['p_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$year = $_POST['year'];
	$hs = $_POST['hs'];
	$aau = $_POST['aau'];
	
	$sql = "SELECT * FROM player WHERE p_id ='$p_id'";
	$result = $db->query($sql);
	$player = $result->fetch_assoc();
	
	$hs_id = $player['hs_id'];
	$update_hs = "UPDATE high_school SET name='$hs' WHERE hs_id='$hs_id'";
	$db->query($update_hs);
	
	$aau_id = $player['aau_id'];
	$update_aau = "UPDATE aau SET name='$aau' WHERE aau_id='$aau_id'";
	$db->query($update_aau);
	
	$real_id = $player['p_id'];
	$player_sql = "UPDATE player SET fname='$fname', lname='$lname', year='$year' WHERE p_id='$real_id'";
	$db->query($player_sql);
	
	header("location: infoRecruit.php?p_id=$p_id");
	
?>