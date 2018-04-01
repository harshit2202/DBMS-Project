<?php session_start(); ?>
<?php
	session_destroy();
	header('Location: http://localhost/DBMS-Project/index.php');
	exit();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>

</body>
</html>