<?php session_start();
if(!isset($_SESSION['username'])) {
    header( 'Location: http://localhost/DBMS-Project/index.php');
}
?>

<?php
	$type = $_SESSION['type'];
	$user = $_SESSION['username'];

	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname = "DBMSProject";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("connection error".$conn->connect_error);
	}

	if($_SESSION['type']=='cop'){
		
		$sql = "SELECT * FROM coptable WHERE username= '$user' ";   //comment
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$conn->close();
	}

	else if ($_SESSION['type']=='user') {
	 	$sql = "SELECT * FROM usertable WHERE username= '$user' ";   //comment
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$conn->close();
	}
	else if ($_SESSION['type']=='judge') {
	 	$sql = "SELECT * FROM judgetable WHERE username= '$user' ";   //comment
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$conn->close();
	}  

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="editprofile.css">
	<title><?php echo $_SESSION['username']; ?> - Profile</title>


	<script type="text/javascript">
	function showdata(x){
		if(x == 'user'){
			
			 document.getElementById('userdata').style.display= 'block';
			  document.getElementById('copdata').style.display= 'none';
			   document.getElementById('judgedata').style.display= 'none';

		}
		else if(x == 'cop'){
			document.getElementById('userdata').style.display= 'none';
			  document.getElementById('copdata').style.display= 'block';
			   document.getElementById('judgedata').style.display = 'none';
		}
		else if(x == 'judge'){
			 document.getElementById('userdata').style.display= 'none';
			  document.getElementById('copdata').style.display= 'none';
			   document.getElementById('judgedata').style.display= 'block';
		}

	 }


	 function showsmall(){
	 	alert("Your Changes Have Been Saved.");
	 }
	</script>

</head>
<body>
	<div class="main-page">


		<div class="heading">
			<span class="mainheading">Online FIR Portal</span>
			<p style="float: left;margin-top: 1.5%; margin-left: 5%; font-size: 20px;"><a style="text-decoration: none;" href="http://localhost/DBMS-Project/<?php echo $_SESSION['type'];?>mainpage.php"><img style="margin-bottom: 8%;" src="home.png"> Home</a></p>
			<p style="float: left ; width: 60%; text-align: right;margin-top: 1.8%;"; > <img style="margin-bottom: 1%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp;
			 <a style="text-decoration: none;" href="http://localhost/DBMS-Project/logout.php"><img src="logout.png"> Logout</a></p>
		</div>

		<div class="details-section">
			<div class="image-initials">
				<img src="<?php if($row["photoaddress"]!=""){echo $row["photoaddress"];} else{echo "user-big.png";}  ?>" style="border-width: 2px;">
				<h2 style="text-align: center;padding-right: 15%;"><?php echo $_SESSION['username']; ?></h2>
				<p style="text-align: center;padding-right: 15%;"><?php echo $row["name"]; ?></p>
			</div>
			
			<div class="information" id = "copdata" style="display: none;">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = POST>
				<p style="margin-bottom: 0;">COP Registration number : </p>
					<p name="copID" style="font-size: 25px;font-weight:bold;"> <?php echo $row['copID'];?>  </p>



				<p style="margin-bottom: 0;">Username : </p>
				<p name="username" style="font-size: 25px;font-weight:bold;"> <?php echo $row['username'];?>  </p>

			

				<p style="margin-bottom: 0;">Email - ID : </p>
				<p name="email" style="font-size: 25px;font-weight:bold;"> <?php echo $row['email'];?>  </p>

				

				<p style="margin-bottom: 0;">Name : </p>
				<input type="text" name="name" placeholder=<?php echo $row['name'];?>>
				<br>			


				<p style="margin-bottom: 0;">Contact number : </p>
				<input type="number" name="phoneno" placeholder=<?php echo $row['phoneno'];?>>

				<br>

				<p style="margin-bottom: 0;">Address : </p>
				<input type="text" name="address" placeholder=<?php echo $row['address'];?>>
				<br>
				

				<p style="margin-bottom: 0;">Change Password </p>
				<input type="password" name="password" placeholder="Enter New Password">
				<br>


				<button type="submit" class="btn btn-primary" name="submit-btnn" onclick="showsmall()" >Submit</button>
				<br>

			</form>		
			</div>

			<div class="information" id = "judgedata" style="display: none;">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = POST>
				<p style="margin-bottom: 0;">JUDGE Registration number : </p>
				<p name="judgeID" style="font-size: 25px;"> <?php echo $row['judgeID'];?>  </p>
				


				<p style="margin-bottom: 0;">Username : </p>
				<p name="username" style="font-size: 25px;"> <?php echo $row['username'];?>  </p>


				<p style="margin-bottom: 0;">Email - ID : </p>
				<p name="email" style="font-size: 25px;font-weight:bold;"> <?php echo $row['email'];?>  </p>

			
				<p style="margin-bottom: 0;">Name : </p>
				<input type="text" name="name" placeholder=<?php echo $row['name'];?>>
				<br>
				

				<p style="margin-bottom: 0;">Contact number : </p>
				<input type="number" name="phoneno" placeholder=<?php echo $row['phoneno'];?>>

				<br>

				<p style="margin-bottom: 0;">Address : </p>
				<input type="text" name="address" placeholder=<?php echo $row['address'];?>>
				<br>

				<p style="margin-bottom: 0;">Change Password </p>
				<input type="password" name="password" placeholder="Enter New Password">
				<br>		

				<button type="submit" class="btn btn-primary" name="submit-btnn" onclick="showsmall()" >Submit</button>
				<br>
			</form>		
			</div>

			<div class="information" id = "userdata" style="display: none;">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = POST>
				
				<p style="margin-bottom: 0;">Username : </p>
				<p name="username" style="font-size: 25px;"> <?php echo $row['username'];?>  </p>



				<p style="margin-bottom: 0;">Email - ID : </p>
				<p name="email" style="font-size: 25px;font-weight:bold;"> <?php echo $row['email'];?>  </p>
		
				
				<p style="margin-bottom: 0;">Name : </p>
				<input type="text" name="name" placeholder=<?php echo $row['name'];?>>
				<br>		


				<p style="margin-bottom: 0;">Contact number : </p>
				<input type="number" name="phoneno" placeholder=<?php echo $row['phoneno'];?>>

				<br>

				<p style="margin-bottom: 0;">Address : </p>
				<input type="text" name="address" placeholder=<?php echo $row['address'];?>>
				<br>

				<p style="margin-bottom: 0;">Change Password </p>
				<input type="password" name="password" placeholder="Enter New Password">

				<button type="submit" class="btn btn-primary" name="submit-btnn" onclick="showsmall()" >Submit</button>
				<br>


			</form>
			<?php 
				 echo "<script> showdata('".$_SESSION['type']."'); </script>";
			 ?>		
			</div>

		</div>

	</div>
	

</body>
</html>
<?php 
if(isset($_REQUEST['submit-btnn']))	
	{
		$servername = "localhost";
		$username = "root";
		$password ="";
		$dbname = "DBMSProject";

		$conn = new mysqli($servername,$username,$password,$dbname);
		$var1 = $_POST['name'];
		$var2 = $_POST['phoneno'];
		$var3 = $_POST['address'];
		$var4 = $_POST['password'];
		$var4 = md5($var4);
		$var5 = $_SESSION['username'];

		if($_SESSION['type']=='cop'){
		
			$sql = "UPDATE coptable SET name='$var1',phoneno='$var2',address='$var3',password='$var4' WHERE username = '$var5'";
			$result = $conn->query($sql);
			$conn->close();
		}

		else if ($_SESSION['type']=='user') {
		 	$sql = "UPDATE usertable SET name='$var1',phoneno='$var2',address='$var3',password='$var4' WHERE username = '$var5'";
			$result = $conn->query($sql);
			$conn->close();
		}
		else if ($_SESSION['type']=='judge') {
		 	$sql = "UPDATE judgetable SET name='$var1',phoneno='$var2',address='$var3',password='$var4' WHERE username = '$var5'";
			$result = $conn->query($sql);
			$conn->close();
		}  
	}
?>
