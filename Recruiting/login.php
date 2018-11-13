<?php
	include("config.php");

	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
			
		$myusername = mysqli_real_escape_string($db, $_POST['username']);
		$mypassword = mysqli_real_escape_string($db, $_POST['password']);
		$error = ""; 
		
		$sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($db, $sql);
		// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$row = mysqli_fetch_row($result);
		// $active = $row['active'];
		$count = mysqli_num_rows($result);
			
		// If result matched $myusername and $mypassword, table row must be 1 row	
		if(TRUE) {
			session_register("myusername");
			$_SESSION['login_user'] = $myusername;
				
			header("location: home.php");
		} else {
			$error = "Incorrect username and password.";
		}
	}
?>

<html>
	
	<head>
		<title>Login Page</title>
		
		<style type = "text/css">
			body {
				font-family:Arial, Helvetica, sans-serif;
				font-size:14px;
			}
			label {
				font-weight:bold;
				width:100px;
				font-size:14px;
			}
			.box {
				border:#666666 solid 1px;
			}
		</style>
		
	</head>
	
	<body bgcolor = "#FFFFFF">
	
		<div align = "center">
			<div style = "width:300px; border: solid 1px #333333; " align = "left">
				<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
				<div style = "margin:30px">
					
					<form action = "" method = "post">
						<label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
						<label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
						<input type = "submit" value = " Submit "/><br />
					</form>
					
					<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
				</div>
				
			</div>
			
		</div>

	</body>
</html>