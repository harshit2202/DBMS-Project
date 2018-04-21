<?php session_start();
echo "<script>togglefunc();</script>";
if(!isset($_SESSION['username']))
	{
		header('Location: http://localhost/DBMS-Project/index.php');
		exit();
	}
	if(isset($_SESSION['username']))
	{
		if($_SESSION['type']!='user')
		{
			header('Location: http://localhost/DBMS-Project/index.php');
			exit();
		}
	}
?>
<?php
	if(isset($_REQUEST['submit']))
	{
		$servername = "localhost";
		$username = "root";
		$password ="";
		$dbname = "DBMSProject";

		$conn = new mysqli($servername,$username,$password,$dbname);

		$var1 = $_SESSION['username'];
		$var2 = $_POST['date'];
		$var3 = $_POST['place'];
		$var4 = $_POST['description'];
		$var5 = $_POST['description_suspect'];
		$var6 = $_POST['time'].":00";
		$var7 = $_POST['seesuspect'];
		$var8 = $_POST['knowsuspect'];
		$var9 = $_POST['victim'];
		

		$sql = "INSERT INTO firtable(username,date,place_crime,descp_crime,descp_suspect,time,see_suspect,know_suspect,victim) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8','$var9')";
 	
		$result = $conn->query($sql);

		$sql2 = "SELECT firno from firtable where username='$var1' ";

		$result2 = $conn->query($sql2);

		while($row = mysqli_fetch_row($result2))

		$firno = $row[0];

		echo $firno;

 		alert("Fir Successfully Registered : Fir Number is ",$firno);
 		$_SESSION['firno'] = $firno;
 		header('Location:http://localhost/DBMS-Project/firconfirmation.php');
 		//exit();
	}

	function alert($msg,$firno)
	{
		echo "<script> alert('$msg : $firno'); </script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="lodgeFIR.css">
	<title>
		Lodge Fir
	</title>
	<script type="text/javascript">
		function togglefunc()
		{
			var x = document.getElementById("suspectselect").value;
			if(x == "yes")
			{
				document.getElementById('suspect').style.display = 'block';
				document.getElementById('suspect1').required = true;
				document.getElementById('suspect2').required = true;
			}
			else
			{
				document.getElementById('suspect').style.display = 'none';
				document.getElementById('suspect1').required = false;
				document.getElementById('suspect2').required = false;
			}
		}
		
		function maxDateSetter() {
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			 if(dd<10){
			        dd='0'+dd
			    } 
			    if(mm<10){
			        mm='0'+mm
			    } 
			today = yyyy+'-'+mm+'-'+dd;
			document.getElementById("datefield").setAttribute("max", today);
		}
	</script>
</head>
<body>
	<div class="global">
		<div class = "top">
			<h1 class="display-4" style="float: left; font-weight: lighter;font-size: 50px">Online FIR Portal</h1>
			<p style="float: left ; margin-left: 47%; margin-top: 2%;"; > <img style="margin-bottom: 3%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="http://localhost/DBMS-Project/logout.php" ><img src="logout.png"> Logout</a></p>
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
			<a href="http://localhost/DBMS-Project/showuserfir.php" class = "anchor" >
				<div class = "clickable">
					FIR History
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/nearbypolice.html" class = "anchor" >
				<div class = "clickable">
					Nearest Police Station
				</div>
			</a>
			<a href="http://localhost/DBMS-Project/contactus.html" class = "anchor" >
				<div class = "clickable">
					Contact Us
				</div>
			</a>
			<br><br><br><br><br><br><br><br><br>
			<p style="color: grey; padding-left: 20px;">&copy; Proness2017-2018</p>
		</div>
		<div class="main-panel">
			<form class = "lodge" method = "POST" action="<?php echo htmlspecialchars("$_SERVER[PHP_SELF]");?>">
				<label for = "victim">Name of Victim (Optional)</label>
				<input type="text" name="victim">
				<label for="date">Date of crime</label>
				<input type="date" name="date" placeholder="None" id = "datefield" max='2018-03-09' required><br>
				<label for="place">Place of crime</label>
				<input type="text" name="place" required><br>
				<label for="time">Approximate time of crime</label>
				<input type="time" name="time" required>
				<label for="description">Description of crime</label>
				<textarea rows = "3" name = "description" placeholder="Maximum 1000 characters..." required></textarea>
				<label for = "seeSuspect">Did you see the suspect?</label>
				<select id = "suspectselect" name = "seesuspect" onchange="togglefunc()" required>
					<option value="" id = "select1">Select</option>
					<option value = "no">No</option>
					<option value="yes">Yes</option>
				</select>
				<div id="suspect" style="display: none;">
					<label for = "suspect" placeholder="Maximum 1000 characters...">Description of suspects</label>
					<textarea rows = "3" id = "suspect1" name="description_suspect"></textarea>
					<label for = "knowsuspect">Do you know suspect</label>
					<select  name = "knowsuspect" id = "suspect2">
						<option value = "">Select</option>
						<option value = "yes">Yes</option>
						<option value = "no">No</option>
					</select>
				</div>
				<br><br>
				<div class="custom-control custom-checkbox" >
					<input type="checkbox" class="custom-control-input" id="customCheck1" required value="accepted">
					<label class="custom-control-label" for="customCheck1" style="padding-top: 0px; color: #aa0002" >I Accept that all the Information provided in this FIR is true to the best of my knowledge.</label>
				</div>
				<button type="submit" name="submit" >Submit FIR</button>
				<br><br><br>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		maxDateSetter();
	</script>
</body>
</html>