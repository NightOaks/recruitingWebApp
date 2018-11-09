<?php
	include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>IWU Recruiting</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="myStyle.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>

	<body>
		<div class="padding">
			<h1>Welcome <?php echo $login_session; ?></h1>
			<button id="recruitHomepageBtn" class="btn btn-secondary btn-lg btn-block">Recruit</button>
			<br>
			<button id="gameHomepageBtn" class="btn btn-secondary btn-lg btn-block">Game</button>
			<br>
			<h2><a href = "logout.php">Logout</a></h2>
		</div>
		
		<script src="script.js"></script>
	</body>
</html>