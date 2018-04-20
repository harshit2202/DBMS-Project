<?php session_start(); ?>
<?php

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="DBMSProject";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("connection error".$conn->connect_error);
	}

	//echo "Connected Successfully";

	if(isset($_REQUEST['submit-btnn']))
	{
		
		//Write backend here.............

		//

	}
	function alert($msg){
		echo "<script> alert('$msg'); </script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="forgotpassword1.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<title>MainPage</title>
</head>
<body>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
  			<h1 class="display-4">Online FIR Portal</h1>
  		</div>
	</div>



	<div class="loginpanel">
		<p style="font-size: 25px; text-align: center;">Password Recovery</p>
		<br><br>
		<form method="post">

		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input name="Username" required <?php echo isset($_POST['Username'])?'value="'.htmlspecialchars($_POST['Username']).'"':''; ?> type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
		    <small id="emailHelp" class="form-text text-muted">Enter the one you entered at registration.</small>
		  </div>

		  <button type="submit" class="btn btn-primary" name="submit-btnn" style="float: right; margin-top: 10%;">Submit</button>

		</form>
	</div>

</body>
</html>

