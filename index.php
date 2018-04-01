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
		
		$user = $_POST['Username'];
		$pass = $_POST['Password'];
		$type = $_POST['cars'];
		if($type=="cop")
		{
			$sql = "SELECT * FROM coptable WHERE username='$user' AND password='$pass' ";
			$result = $conn->query($sql);
			if($result->num_rows == 1)
			{
				$_SESSION['username'] = $user;
				$_SESSION['type'] = "cop";
				header('Location: http://localhost/TestFolder/usermainpage.php');
				exit();
			}
			else
			{
				alert("Username or Password do not match");
			}
		}
		elseif($type=="citizen")
		{
			$sql = "SELECT * FROM usertable WHERE username='$user' AND password='$pass' ";
			$result = $conn->query($sql);
			if($result->num_rows == 1)
			{
				$_SESSION['username'] = $user;
				$_SESSION['type'] = "citizen";
				header('Location: http://localhost/TestFolder/usermainpage.php');
				exit();
			}
			else
			{
				alert("Username or Password do not match");
			}
		}
		elseif($type=="judge")
		{
			$sql = "SELECT * FROM judgetable WHERE username='$user' AND password='$pass' ";
			$result = $conn->query($sql);
			if($result->num_rows == 1)
			{
				$_SESSION['username'] = $user;
				$_SESSION['type'] = "judge";
				header('Location: http://localhost/TestFolder/usermainpage.php');
				exit();
			}
			else
			{
				alert("Username or Password do not match");
			}
		}
		elseif($type=="none")
		{
			alert("Select any of the categories");
		}
		//header('Location: http://localhost/TestFolder/cop1.php');
		//exit();
	}
	function alert($msg){
		echo "<script> alert('$msg'); </script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">
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
   			<p class="lead">New Initiative for your convinience.</p>
  		</div>
	</div>


	<div class="leftt left-panel">
		<p style="font-size: 20px;">Important Information</p>
		<li><a href="missinglist.html">Missing List</a> </li>
		<li><a href="wantedcriminals.html">Most Wanted Criminals</a></li>
		<br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: grey;">&copy; Proness2017-2018</p>
	</div>
	

	<div class="loginpanel">
		<p style="font-size: 30px;">SIGN-IN</p>
		<br>
		<form method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input type="text" name="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="Password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		    <small id="emailHelp" class="form-text text-muted">Never share your password with anyone.</small>
		  </div>
		  
		  <div class="dropdown" style="float: left; margin-top: 10%;" id="dropp">
			  <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Select Any..
			  </button> -->
			  <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenu2" >
			    <button class="dropdown-item" type="button" id="bt1">Cop</button>
			    <button class="dropdown-item" type="button" id="bt2">Citizen</button>
			    <button class="dropdown-item" type="button" id="bt3">Judge</button>
			  </div> -->
			  <div class="form-group" >
				  <select class="form-control" id="sel1" name="cars">
				  	<option value="none">Select any..</option>
				    <option value="cop">Cop</option>
				    <option value="citizen">Citizen</option>
				    <option value="judge">Judge</option>
				  </select>
				</div>
			</div>


		  <button type="submit" class="btn btn-primary" name="submit-btnn" style="float: right; margin-top: 10%;">Submit</button>
		</form>
	</div>

	<div class="signup-panel">
		<p style="font-size: 30px; padding-left: 30%; padding-top: 5%;">New User..!!</p>
		<p style="font-size: 22px; padding-left: 32%; margin-top: 0; margin-bottom: 10%;">Continue as...</p>
		<li class ="listed"><a href="CopRegistration.php">I'm a Cop.</a></li>
		<li class ="listed"><a href="CitizenRegistration.php">I'm a Citizen.</a></li>
		<li class ="listed"><a href="JudgeRegistration.php">I'm a Judge.</a></li>
		<br><br><br><br><br><br>
		<p style="padding-bottom: 0; margin-bottom: 0; text-align: right; color: #777F80; margin-right: 2%;">Select one of the above links to continue...</p>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#bt1").click(function(){
				$("#dropdownMenu2").html("Cop");
			});

			$("#bt2").click(function(){
				$("#dropdownMenu2").html("Citizen");
			});

			$("#bt3").click(function(){
				$("#dropdownMenu2").html("Judge");
			});
		});
	</script>
</body>
</html>

