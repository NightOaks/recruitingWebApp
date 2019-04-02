<?php
	include "../config.php";
	
	$p_id = $_POST['p_id'];
	$comment = $_POST['evaluation'];
	
	$sql = "INSERT INTO evaluation(p_id, comment) VALUES ('$p_id', '$comment')";
	$db->query($sql);
	
	header("location: infoRecruit.php?p_id=$p_id");
?>