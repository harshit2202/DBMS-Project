<?php 
	$GLOBALS['seensuspect'] = "Yes";
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
			<p style="float: left ; margin-left: 50%; margin-top: 2%;"; > <img style="margin-bottom: 3%;" src="user.png"> username<!-- <?php echo $_SESSION['username'] ; ?> --> &nbsp; &nbsp; &nbsp; <a href="" ><img src="logout.png"> Logout</a></p>
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
		<div class = "main-panel">
			<form>
				<label for = "firno">FIR Number </label>
				<input type="Number" name="firno" disabled>
				<label for = "firno">Name </label>
				<input type="text" name="firno" disabled>
				<label for = "firno">Date </label>
				<input type="date" name="firno" disabled>
				<label for = "place">Place of crime</label>
				<input type="text" name="place" disabled>
				<label for = "time">Time </label>
				<input type="time" name="firno" disabled >
				<label for = "description">Description of crime</label>
				<textarea disabled></textarea>
				<label for = "seensuspect">Was suspect seen?</label>
				<input id = "seensuspect" type="text" name="seensuspect" disabled value=<?php echo $GLOBALS['seensuspect'] ?>>
				<div id = "optional"  style="display: none;">
					<label for = "describesuspect">Description of suspect</label>
					<textarea name="describesuspect" disabled></textarea>
					<label for = "knowsuspect">Do you know suspect?</label>
					<input type="text" name="knowsuspect" disabled>
				</div><br>
				<br>
			</form>
			<script type="text/javascript">
				toggle();
			</script>
		</div>
	</div>
</body>
</html>