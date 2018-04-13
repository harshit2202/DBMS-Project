<?php session_start();
if(!isset($_SESSION['username'])) {
    header( 'Location: http://localhost/DBMS-Project/index.php');
}
?>
<?php
	// $GLOBALS['seensuspect'] = "Yes";
	$firno = $_GET['id'];
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="DBMSProject";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("connection error".$conn->connect_error);
	}

	$sql = "SELECT see_suspect FROM firtable WHERE firno = '$firno'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	if($row=='yes')
	{
		$GLOBALS['seensuspect'] = "Yes";
	}
	else
	{
		$GLOBALS['seensuspect'] = "No";
	}
	$sql = "SELECT * FROM firtable WHERE firno = '$firno'";
	$result = $conn->query($sql);

	$row = mysqli_fetch_row($result);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="firprogress.css">
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
			<p style="float: left ; margin-left: 50%; margin-top: 2%;"; > <img style="margin-bottom: 3%;" src="user.png"><?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="http://localhost/DBMS-Project/logout.php" ><img src="logout.png"> Logout</a></p>
		</div>
		<div class ="leftt">
			<a href="http://localhost/DBMS-Project/usermainpage.php" class = "anchor" >
				<div class = "clickable">
					Home
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/userprofile.php" class = "anchor" >
				<div class = "clickable">
					Profile
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/lodgeFIR.php" class = "anchor" >
				<div class = "clickable">
					New FIR
				</div>
			</a>
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					Nearest Police Station
				</div>
			</a>
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					Contact Us
				</div>
			</a>
		</div>
		<div class = "main-panel">
			<form>
				<label for = "firno">FIR Number </label>
				<input type="Number" name="firno" value="<?php echo $row[1]; ?>" disabled>
				<label for = "firno">Name(Victim) </label>
				<input type="text" name="firno" value="<?php echo $row[9]; ?>" disabled>
				<label for = "firno">Date </label>
				<input type="date" name="firno" value="<?php echo $row[2]; ?>" disabled>
				<label for = "place">Place of crime</label>
				<input type="text" name="place" value="<?php echo $row[3]; ?>" disabled>
				<label for = "time">Time </label>
				<input type="time" name="firno" value="<?php echo $row[6]; ?>" disabled >
				<label for = "description">Description of crime</label>
				<textarea disabled><?php echo $row[4]; ?></textarea>
				<label for = "seensuspect">Was suspect seen?</label>
				<input id = "seensuspect" type="text" name="seensuspect" disabled value=<?php echo $GLOBALS['seensuspect'] ?>>
				<div id = "optional"  style="display: none;">
					<label for = "describesuspect">Description of suspect</label>
					<textarea name="describesuspect" disabled><?php echo $row[5]; ?></textarea>
					<label for = "knowsuspect">Do you know suspect?</label>
					<input type="text" name="knowsuspect" value="<?php echo $row[8]; ?>" disabled>
				</div><br>
				<br>
			</form>
			<label for = "place">Previous COP status</label>
			<table class="table table-striped" style="width: 655px;">
				<thead>
					<tr>
						<th scope="col">Cop ID</th>
						<th scope="col">Date & Time</th>
						<th scope="col">Status Uploaded</th>
					</tr>
				</thead>
				<tbody>
					<?php


					$sql = "SELECT * from copupdate WHERE firno = $firno";
					$ress = $conn->query($sql);
					$flag=0;
					while($roww = mysqli_fetch_row($ress))
					{
						$flag++;
						echo '<tr>';
						echo '<td>'.$roww[0].'</td>';
						echo '<td>'.$roww[2].'</td>';
						echo '<td>'.$roww[3].'</td>';
						echo '</tr>';
					}
					if($flag==0)
					{
						echo '<tr>';
						echo '<td>-</td>';
						echo '<td>-</td>';
						echo '<td>-</td>';
						echo '</tr>';
					}

					?>
					
				</tbody>
			</table>


			<label for = "place">Previous Judge status</label>
			<table class="table table-striped" style="width: 655px;">
				<thead>
					<tr>
						<th scope="col">Judge ID</th>
						<th scope="col">Date & Time</th>
						<th scope="col">Status Uploaded</th>
					</tr>
				</thead>
				<tbody>
					<?php


					$sql = "SELECT * from judgeupdate WHERE firno = $firno";
					$ress = $conn->query($sql);
					$flag2=0;
					while($roww = mysqli_fetch_row($ress))
					{
						$flag2++;
						echo '<tr>';
						echo '<td>'.$roww[0].'</td>';
						echo '<td>'.$roww[2].'</td>';
						echo '<td>'.$roww[3].'</td>';
						echo '</tr>';
					}
					if($flag2==0)
					{
						echo '<tr>';
						echo '<td>-</td>';
						echo '<td>-</td>';
						echo '<td>-</td>';
						echo '</tr>';
					}


					?>
					
				</tbody>
			</table>
			<br>
			<p class="download-link">
				Download the PDF of FIR by clicking one the link : 
				<a href="FIRpdf/<?php echo $row[1]; ?>.pdf" download>Download Link</a>
			</p>
			<br><br>
			<script type="text/javascript">
				toggle();
			</script>
		</div>
	</div>
</body>
</html>