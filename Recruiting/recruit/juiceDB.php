<?php
	include "../config.php";
		
	$p_id = $_POST['p_id'];
	
	$grit = $_POST['grit'];
	$talk = $_POST['talk'];
	$motor = $_POST['motor'];
	$stamina = $_POST['stamina'];
	$feel = $_POST['feel'];
	
	$sql = "INSERT INTO juice_stats (p_id, motor, grit, feel, talk, stamina) VALUES ('$p_id', '$motor', '$grit', '$feel', '$talk', '$stamina')";
	$db->query($sql);
	
	header("location: infoRecruit.php?p_id=$p_id");
	
?>