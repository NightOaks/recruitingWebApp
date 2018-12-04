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
    	<link rel="stylesheet" type="text/css" href="loginStyle.css">
    	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<div id="login">
		    <div class="container">
		        <div id="login-row" class="row justify-content-center align-items-center">
		            <div id="login-column" class="col-md-12">
		                <div class="login-box col-md-6">
		                    <form id="login-form" class="form" action="" method="post">
		                        <h3 class="text-center text-color">Login</h3>
		                        <div class="form-group">
		                            <label for="username" class="text-color">Username:</label><br>
		                            <input type="text" name="username" id="username" class="form-control">
		                        </div>
		                        <div class="form-group">
		                            <label for="password" class="text-color">Password:</label><br>
		                            <input type="password" name="password" id="password" class="form-control">
		                        </div>
		                        <div class="form-group">
		                            <input type="submit" name="submit" class="btn btn-md" value="Submit">
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</body>
</html>