<?php
	echo "<script>togglefunc();</script>";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="lodgeFIR.css">
	<title>
		Lodge Fir
	</title>
	<script type="text/javascript">
		function togglefunc()
		{
			alert("hello");
			var x = document.getElementById("suspectselect").value;
			if(x == "yes")
			{
				document.getElementById('suspect').style.display = 'block';
			}
			else
			{
				document.getElementById('suspect').style.display = 'none';
			}
		}
	</script>
</head>
<body>
	<div class="global">
		<div class = "top">
			Online Fir Portal
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
				<label for="date">Date of crime</label>
				<input type="date" name="date" placeholder="None">
				<label for="place">Place of crime</label>
				<input type="text" name="place" >
				<label for="time">Time of crime</label>
				<input type="time" name="time" >
				<label for="description">Description of crime</label>
				<textarea rows = "3" name = "description"></textarea>
				<label for = "seeSuspect">Did you see the suspect</label>
				<select id = "suspectselect" name = "seeSuspect" onchange="togglefunc()">
					<option value="select">Select</option>
					<option value = "no">No</option>
					<option value="yes">Yes</option>
				</select>
				<div id="suspect" style="display: none;">
				<label for = "suspect" >Description of suspects</label>
				<textarea rows = "3" name = "suspect"></textarea>
				</div>
			</form>
		</div>
	</div>
</body>
</html>