<?php
	include('config.php');
	session_start();
	
	$user_check = $_SESSION['login_user'];
	
	// $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
	$sql = "SELECT first FROM user where username = '$user_check'";
	$result = $db->query($sql);
	
	// $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	$row = $result->fetch_assoc();
	
	$login_session = $row['first'];
	
	if(!isset($_SESSION['login_user'])){
		header("location:../login.php");
	}
?>