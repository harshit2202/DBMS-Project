<?php session_start(); ?>
<?php
	$type = $_SESSION['type'];
	$user = $_SESSION['username'];

	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname = "DBMSProject";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("connection error".$conn->connect_error);
	}

	if($type == "cop")
	{
		$sql = "SELECT * FROM coptable WHERE username= '$user' ";
	}
	elseif($type=="citizen")
	{
		$sql = "SELECT * FROM citizentable WHERE username= '$user' ";
	}
	elseif($type=="judge") 
	{
		$sql = "SELECT * FROM judgetable WHERE username= '$user' ";
	}
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="userprofile.css">
	<title><?php echo $_SESSION['username']; ?> - Profile</title>

</head>
<body>
	<div class="main-page">


		<div class="heading">
			<span class="mainheading">Online FIR Portal</span>
			<p style="float: left;margin-top: 1.5%; margin-left: 5%; font-size: 20px;"><a style="text-decoration: none;" href="http://localhost/TestFolder/usermainpage.php"><img style="margin-bottom: 8%;" src="home.png"> Home</a></p>
			<p style="float: left ; margin-left: 38%; margin-top: 1.8%;"; > <img style="margin-bottom: 1%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp;
			 <a style="text-decoration: none;" href="http://localhost/TestFolder/index.php"><img src="logout.png"> Logout</a></p>
		</div>

		<div class="details-section">
			<div class="image-initials">
				<img src="user-big.png" style="border-width: 2px;">
				<h2 style="text-align: center;"><?php echo $_SESSION['username']; ?></h2>
				<p style="text-align: center;"><?php echo $row["name"]; ?></p>
			</div>
			
			<div class="information">

				<p style="margin-bottom: 0;">COP Registration number : </p>
				<p style="font-size: 25px;"><b><?php echo $row["copID"]; ?></b></p>

				<br>

				<p style="margin-bottom: 0;">Name : </p>
				<p style="font-size: 25px;"><b><?php echo $row["name"]; ?></b></p>

				<br>

				<p style="margin-bottom: 0;">Username : </p>
				<p style="font-size: 25px;"><b><?php echo $row["username"]; ?></b></p>

				<br>

				<p style="margin-bottom: 0;">Email - ID : </p>
				<p style="font-size: 25px;"><b><?php echo $row["email"]; ?></b></p>

				<br>

				<p style="margin-bottom: 0;">Contact number : </p>
				<p style="font-size: 25px;"><b><?php echo $row["phoneno"]; ?></b></p>

				<br>

				<p style="margin-bottom: 0;">Address : </p>
				<p style="font-size: 25px;"><b><?php echo $row["address"]; ?></b></p>


			</div>

		</div>

	</div>
	

</body>
</html>
