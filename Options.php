<!DOCTYPE html>
<html>
<head>
	<title> Choose What you want </title>
	<link rel="stylesheet" type="text/css" href="Options.css">
</head>
<body>
	<h1>CHOOSE</h1>
	<div class="radioform">
	<form method="POST" action = <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>>
		CITIZEN<input type="Radio" name = "usertype" placeholder="Citizen"><br>
		POLICE<input type="Radio" name = "usertype" placeholder="Police"><br>
		JUDGE<input type="Radio" name = "usertype" placeholder="Judge"><br>
		<input type="submit" name = "submit">
		</div>
	</form>
</body>
</html>