<?php session_start();?>
<?php
	$user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>yoyo</title>
</head>
<body>
	<p>Helllllo <?php  echo $user; ?> </p>
</body>
</html>
