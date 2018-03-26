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
				USERNAME &nbsp;<input type = "text"  name = "username" placeholder="Enter your Username"><br>
				PASSWORD &nbsp;<input type = "PASSWORD" name="password" placeholder="Enter Password"><br>
				RETYPE PASSWORD &nbsp;<input type = "PASSWORD" name="repassword" placeholder="Retype Password"><br>
				<input type="submit" name = "register">
		</div>		
	</form>
</body>
</html>
<?php 
	$nameerr = $emailerr = $policeiderr = $setpasserr= "";
	$name = $id = $email =$password = "";

	$servername="localhost";
	$username="root";	
	$password="";
	$dbname="DBMSProject";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("connection error".$conn->connect_error);
	}

	echo "Connected Successfully";

	if(isset($_REQUEST["register"]))
	{
		// Check that all fields are filled....

		$var1 = $_POST["username"];
		$sql = "SELECT username FROM usertable WHERE username='$var1'";

		$result1 = $conn->query($sql);

		$var2 = $_POST["email"];
		$sql2 = "SELECT email FROM usertable WHERE email='$var2'";

		$result2 = $conn->query($sql2);

		if($result1->num_rows ==0 && $result2->num_rows==0)
		{

			$flag1 = $flag2 = $flag3 = 0;
			$len = strlen($_POST["email"]);
			$email = str_split($_POST["email"]);


			for($i = 0;$i < $len ; $i++)
			{
			 	if($email[$i] == "@")
			 	{	
			 		$flag1 = 1;
					break;
				}	
			}
			$var1 = $len -4;
			if($email[$var1]=="." && $email[$var1 +1]=="c" && $email[$var1 +2]=="o" && $email[$var1 + 3]=="m")
			{
				$flag2 =1;
			}

			
			if($_POST["password"] == $_POST["repassword"])
				$flag3 = 1;
			else
				alert("Passwords do not match...");

			if($flag1==1 && $flag2==1 && $flag3==1)
			{
				//INSERT INTO TABLE....

				

			}

		}

		elseif ($result1->num_rows >0) {
			alert("Username already exists...");
		}

		elseif ($result2->num_rows >0) {
			alert("Email - ID already exists...");
		}

	}
	function alert($msg) {
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}

?>
