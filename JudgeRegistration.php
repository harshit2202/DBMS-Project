<!--TODO restore for variables-->
<?php session_start(); ?>
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


	if(isset($_REQUEST["submit"]))
	{
		$varrr = $_POST["phone-no"];

		// Check that all fields are filled....

		$var1 = $_POST["username"];
		$sql = "SELECT username FROM judgetable WHERE username='$var1'";

		$result1 = $conn->query($sql);

		$var2 = $_POST["email"];
		$sql2 = "SELECT email FROM judgetable WHERE email='$var2'";

		$result2 = $conn->query($sql2);

		if($result1->num_rows ==0 && $result2->num_rows==0)
		{

			$flag1 = $flag2 = $flag3 = 0;
			$len = strlen($_POST["email"]);
			$email =$_POST["email"];



			$email = filter_var($email,FILTER_SANITIZE_EMAIL);
			if(filter_var($email,FILTER_VALIDATE_EMAIL))
				$flag1=1;

			
			if($_POST["password"] == $_POST["repassword"])
				$flag2 = 1;
			else
				alert("Passwords do not match...");

			if(strlen($_POST['phone-no'])==10)
				$flag3=1;

			if($flag1==1 && $flag2==1  && $flag3==1)
			{
				//INSERT INTO TABLE....
				$_SESSION['judge-id']=$_POST['judge-id'];
				$_SESSION['name']=$_POST['name'];
				$_SESSION['email']=$_POST['email'];
				$_SESSION['username']=$_POST['username'];
				$_SESSION['password']=$_POST['password'];
				$_SESSION['address']=$_POST['address'];
				$_SESSION['phone-no']=$_POST['phone-no'];
				$_SESSION['otp']=mt_rand(1000,9999);
				$_SESSION['type']="judge";
				header('Location: http://localhost/TestFolder/OTP-Verification.php');
				exit();

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
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="JudgeRegistration.css">
	<title>JUDGE Registration</title>
</head>
<body>

		<div class="maine">

			<div class="leftt left-panel">
				<p style="font-size: 35px;">Online FIR Registration Portal</p>
				<br><br><br>
				<p style="font-size: 20px;">Important Information</p>
				<li><a href="missinglist.html">Missing List</a> </li>
				<li><a href="wantedcriminals.html">Most Wanted Criminals</a></li>

				<br><br><br><br><br><br>
				<p style="margin-bottom: 0;">Already Registered?</p>
				<p style="margin-bottom: 14%;"><a href="try.html">Sign In</a></p>
				<p style="color: grey;">&copy; Proness2017-2018</p>
			</div>

			<div class="main-side">
				<br>
				<p style="font-size: 40px;  text-align: center;">JUDGE Registration</p>
				<br><br>
					<form method="post">
						<div class="form-group">
						    <label for="inputAddress2">JUDGE Unique Registration Number</label>
						    <input required type="text" name="judge-id" class="form-control" id="inputAddress2" placeholder="Provided by Indian Judicial authorization">
					  	</div>
					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputEmail4">Name</label>
					      <input required type="text" name="name" class="form-control" id="inputEmail4" placeholder="Full name">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputPassword4">Email-ID</label>
					      <input required type="email" name="email" class="form-control" id="inputPassword4" placeholder="Email">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputAddress">Address</label>
					    <input required type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main Street">
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputCity">Username</label>
					      <input required type="text" name="username" class="form-control" id="inputCity" placeholder="proness123">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputState">Contact Number(Phone no.)</label>
					      <input required type="text" name="phone-no" class="form-control" id="inputCity" placeholder="9837012345">
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputCity">Password</label>
					      <input required type="password" name="password" class="form-control" id="inputCity" placeholder="Password">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputState">Confirm Password</label>
					      <input required type="password" name="repassword" class="form-control" id="inputCity" placeholder="Confirm Password">
					    </div>
					  </div>
					  <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
					</form>

			</div>

		</div>

</body>
</html>