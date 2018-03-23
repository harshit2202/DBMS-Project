<!DOCTYPE html>
<html>
<head>
	<title>Online FIR Portal</title>
	<link rel="stylesheet" type="text/css" href="mainpage.css">
</head>
<body>
	<div class="mains">
		

		<div class="left-side block">
			<p>HeLLLLo</p>
		</div>


		<div class="mid-side block">
			<p class="headerr">Online FIR Portal</p>
		
			<div class="formss">
				<form method="post">
					<div class ="usernamee">
						Username  &nbsp;&nbsp;&nbsp; <input type="text" name="Username" placeholder="username@123">
					</div>
					<br><br>
					<div class ="passwordd">
						Password  &nbsp;&nbsp;&nbsp;  <input type="password" name="Password" placeholder="password">
					</div>
					<br><br>
					<div class="radios">
						<input type="radio" name="usertype" value="citizen">&nbsp;&nbsp;Citizen <br>
						<input type="radio" name="usertype" value="judge">&nbsp;&nbsp;Judge<br>
						<input type="radio" name="usertype" value="cop">&nbsp;&nbsp;Cop
					</div>
					<div class="btn">
						<input type="submit" value="SUBMIT" name="yoyoyo">
					</div>
				</form>
			</div>

			<p>New User!!</p>

		</div>
	


	</div>
</body>
</html>
<?php

	if(isset($_REQUEST['yoyoyo']))
	{
		echo "hahaha";
		$user = $_POST['Username'];
		$pass = $_POST['Password'];
		echo $user;
		echo $pass;
	}

?>