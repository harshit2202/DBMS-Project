<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="showcopfir.css">
	<title>FIR Progress</title>
	<script type="text/javascript">
		function toggle() {
			if(document.getElementById('seensuspect').value == "Yes")
				document.getElementById('optional').style.display = 'block';
		}
	</script>
</head>
<body>
	<div class = "global">
		<div class = "top">
			<h1 class="display-4" style="float: left; font-weight: lighter;font-size: 50px">Online FIR Portal</h1>
			<p style="float: left ; margin-left: 50%; margin-top: 2%;"; > <img style="margin-bottom: 3%;" src="user.png"><?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="" ><img src="logout.png"> Logout</a></p>
		</div>
		<div class ="leftt">
			<a href="http://localhost/DBMS-Project/copmainpage.php" class = "anchor" >
				<div class = "clickable">
					Home
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/copprofile.php" class = "anchor" >
				<div class = "clickable">
					Profile
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/updatefircop.php" class = "anchor" >
				<div class = "clickable">
					Update FIR
				</div>
			</a>
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					Suspect List
				</div>
			</a>
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					Contact Log
				</div>
			</a>
		</div>
		<div class = "main-panel">
			<p style="text-align: center;">Click on FIR no. to show its detail.</p>
			<?php
				


					$servername="localhost";
					$username="root";
					$password="";
					$dbname="DBMSProject";

					$conn = new mysqli($servername,$username,$password,$dbname);

					if($conn->connect_error){
						die("connection error".$conn->connect_error);
					}

					$user = $_SESSION['username'];

					$sql = " SELECT firno,date,time from firtable ";

					$result = $conn->query($sql);
					echo "<table class='table'>";
					echo "<thead class='thead-dark'>";
					echo "<tr>";
					echo "<th scope='col' > #</th>";
					echo "<th scope='col'>Firno</th>";
					echo "<th scope='col'>Date(YYYY-MM-DD)</th>";
					echo "<th scope='col'>Time</th>";
					echo "</tr>";
					echo "<tbody>";
					$indexno =1;
					while($row = mysqli_fetch_row($result))
					{

						$firno = $row[0];
						echo "<tr>";
						echo "<td>$indexno</td>";
						echo "<td> <a href='http://localhost/DBMS-Project/firprogresscop.php?id=$firno'> $row[0]</a></td>";
						echo "<td>$row[1]</td>";
						echo "<td>$row[2]</td>";
						echo "</tr>";
						$indexno++;

					}
					echo "</tbody>";
					echo "</table>";

					function callme(){
						echo "hello";
					}

			?>
		</div>
	</div>
</body>
</html>