<?php session_start();
if(!isset($_SESSION['username'])) {
    header( 'Location: http://localhost/DBMS-Project/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="updatefircop.css">
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
			<p style="float: left ; margin-left: 45%; margin-top: 2%;"; > <img style="margin-bottom: 3%;" src="user.png"><?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="http://localhost/DBMS-Project/logout.php" ><img src="logout.png"> Logout</a></p>
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
			<a href="http://localhost/DBMS-Project/showcopfir.php" class = "anchor" >
				<div class = "clickable">
					Check FIR Records
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/wantedpage.php" class = "anchor" >
				<div class = "clickable">
					Wanted List
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/contactus.html" class = "anchor" >
				<div class = "clickable">
					Contact Log
				</div>
			</a>
		</div>
		<div class = "main-panel">
			<p style="text-align: center; font-size: 20px;">Click on FIR no. to Update it.</p>
			<input type="text" style="width: 100%;" id="myInput" onkeyup="myFunction()" placeholder="Search FIR number .." title="Search FIR no.">
			<br>
			<br>
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
					echo "<table class='table' id='myTable'>";
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
						echo "<td> <a href='http://localhost/DBMS-Project/copchangestatus.php?id=$firno'> $row[0]</a></td>"; /// change it
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
	<script type="text/javascript">
		function myFunction() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
	</script>
</body>
</html>