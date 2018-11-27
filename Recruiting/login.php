<?php
	include("config.php");

	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
			
		$myusername = mysqli_real_escape_string($db, $_POST['username']);
		$mypassword = mysqli_real_escape_string($db, $_POST['password']);
		$error = ""; 
		
		$sql = "SELECT userid FROM user WHERE username = '$myusername' and password = '$mypassword'";
		// $result = mysqli_query($db, $sql);
		$result = $db->query($sql);
		// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		// $row = mysqli_fetch_row($result);
		// $row = $result->fetch_assoc();
		// $active = $row['active'];
		$count = mysqli_num_rows($result);
			
		// If result matched $myusername and $mypassword, table row must be 1 row	
		if($count == 1) {
			// session_register($myusername);
			$_SESSION['login_user'] = $myusername;
				
			header("location: recruiting.php");
		} else {
			$error = "Incorrect username and password.";
		}
	}
?>

<!DOCTYPE html>
	
	<head>
		<title>Login Page</title>
		
		<style type = "text/css">
			body {
				font-family:Arial, Helvetica, sans-serif;
				font-size:14px;
				background-color: #FFFFFF;
			}
			label {
				font-weight:bold;
				width:100px;
				font-size:14px;
			}
			.box {
				border:#666666 solid 1px;
			}
				
			.overallBox {
				text-align: center;
			}
			
			.innerBox {
				width: 300px;
				border: solid 1px #333333;
				text-align: left;
			}
			
			.loginHeader {
				background-color: #333333;
				color: #FFFFFF;
				padding: 3px;
			}
			
			.inputBox {
				margin: 30px;
			}
		</style>
		
	</head>
	
	<body>
	
		<div class = "overallBox">
			<div class = "innerBox">
				<div class = "loginHeader"><b>Login</b></div>
				
				<div class = "inputBox">
					
					<form method = "post">
						<label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
						<label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
						<input type = "submit" value = " Submit "/><br />
					</form>
					
				</div>
				
			</div>
			
		</div>

	</body>
</html>