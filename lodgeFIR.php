<?php session_start();
	echo "<script>togglefunc();</script>";
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
			<h1 class="display-4" style="float: left;">Online FIR Portal</h1>
			<p style="float: left ; margin-left: 50%; margin-top: 2%;"; > <img style="margin-bottom: 3%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="" ><img src="logout.png"> Logout</a></p>
		</div>

		<div class ="leftt">
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					TEST
				</div>
			</a>
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					FIR
				</div>
			</a>
			<a href="NULL" class = "anchor" >
				<div class = "clickable">
					HELP
				</div>
			</a>	
		</div>
		<div class="main-panel">
			<form class = "lodge" method = "POST" action="<?php echo htmlspecialchars("$_SERVER[PHP_SELF]");?>">
				<label for = "victim">Name of Victim</label>
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
				<select id = "suspectselect" name = "seeSuspect" onchange="togglefunc()" required>
					<option value="" id = "select1">Select</option>
					<option value = "no">No</option>
					<option value="yes">Yes</option>
				</select>
				<div id="suspect" style="display: none;">
					<label for = "suspect" placeholder="Maximum 1000 characters...">Description of suspects</label>
					<textarea rows = "3" id = "suspect1"></textarea>
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
					<label class="custom-control-label" for="customCheck1" style="padding-top: 0px; color: #aa0002" >I Accept that all the Information provided in this FIR is true to best of my knowledge.</label>
				</div>
				<button action = "submit" >Submit FIR</button>
				<br><br><br>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		maxDateSetter();
	</script>
</body>
</html>