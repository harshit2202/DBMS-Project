<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
	<h1> REGISTER </h1>
	<form method = "POST" action = <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>>
		
		<div class = "input">
				ID &nbsp;&nbsp; <input type = "text"  name = "id" placeholder="Enter Your Police ID"><br>
				NAME &nbsp;<input type = "text"  name = "name" placeholder="Enter Your Name"><br>
				EMAIL &nbsp;<input type = "text"  name = "email" placeholder="Enter your Email ID"><br>
				PASSWORD &nbsp;<input type = "PASSWORD" name="password" placeholder="Enter Password"><br>
				RETYPE PASSWORD &nbsp;<input type = "PASSWORD" name="repassword" placeholder="Retype Password"><br>

				<input type="submit" name = "register">



		</div>
		<?php 
		$nameerr = $emailerr = $policeiderr = $setpasserr= "";
		$name = $id = $email =$password = "";
		if(isset($_POST["email"])){
			$flag1 = $flag2 = 0;
			$len = $_POST["email"];
			$email = str_split($_POST["email"]);


			for($i = 0;$i < $len ; $i++){
				if($email[$i] == "@")
					$flag1 = 1;
				if($flag1 == 1 ) // TO add condition for .com also thats why flag2
					$flag2 = 1;
				if($flag1 == 1 and $flag2 == 1)
					break;

			}
			if($flag1 == 1 and $flag2 == 1)
				$emailerr = false;
			else{
				$emailerr = true;
				alert("Incorrect Email");
			}
			foreach ($email as $k) {
				echo $k;
			}
		}

		if(isset($POST["password"]) && isset($_POST["repassword"])){
			if($POST["password"] == $_POST["repassword"])
				$setpasserr = false;
		}
		elseif (isset($POST["password"]) && isset($_POST["repassword"])) {
			$setpasserr = true;
			alert("Passwords do not match renter");
		}





		function alert($msg) {
    		echo "<script type='text/javascript'>alert('$msg');</script>";
		}
		?>
	</form>
</body>
</html>