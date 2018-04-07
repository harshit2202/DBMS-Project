<?php session_start();
if(!isset($_SESSION['username'])) {
    header( 'Location: http://localhost/DBMS-Project/index.php');
}
?>
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