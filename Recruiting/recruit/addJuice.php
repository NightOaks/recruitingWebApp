<?php
	include "../config.php";
	
	$p_id = $_GET['p_id'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Juice Stats</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="recruit.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	
	<body>	
		
		<?php
		echo "
			<div class='padding'>
				<p class='center'>New Evaluation</p>
			
			<p><a class='float-right' href='infoRecruit.php?p_id=$p_id'>Cancel</a></p>
			
			<form method='post' name='upfrm' action='juiceDB.php' enctype='multipart/form-data'>
					
						<input type='submit' value='Done' name='btn_upload' id='btn_upload' class='btn text-color' />
						<input type='hidden' name='p_id' value=".$p_id.">
						<div> 
						<input class='margin' type='text' placeholder='Grit' name='grit'><br>
						<input class='margin' type='text' placeholder='Talk' name='talk'><br>
						<input class='margin' type='text' placeholder='Motor' name='motor'><br>
						<input class='margin' type='text' placeholder='Stamina' name='stamina'><br>
						<input class='margin' type='text' placeholder='Feel' name='feel'><br>
					</div>
			</form>
			</div>
			";
		?>
		
	</body>
</html>