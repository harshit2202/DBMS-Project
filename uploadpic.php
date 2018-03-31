<?php session_start(); ?>
<?php


    $servername="localhost";
    $username="root";   
    $password="";
    $dbname="DBMSProject";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error)
    {
        die("connection error".$conn->connect_error);
    }

    if(isset($_REQUEST['submit-btnn']))
    {
    	$target_dir = "upload/";
    	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
    	{
   			 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		}

		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{
			echo "ho gya";
		}
		else
		{
			echo "nhi hua";
		}
    }

   // echo "Connected Successfully";
   //  if(isset($_REQUEST['submit-btnn']))
   //  {
   //      $va11 = $_POST['otpp'];
   //      if($_SESSION['otp'] == $va11)
   //      {

   //      	$type = $_SESSION['type'];
   //      	if($type =="cop")
   //      	{
	  //           $var1 = $_SESSION['police-id'];
	  //           $var2 = $_SESSION['name'];
	  //           $var3 = $_SESSION['username'];
	  //           $var4 = $_SESSION['email'];
	  //           $var5 = $_SESSION['password'];
	  //           $var6 = $_SESSION['address'];
	  //           $var7 = (int)$_SESSION['phone-no'];
	  //           $sql = "INSERT INTO coptable (copID,name,username,email,password,address,phoneno) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
	  //           if ($conn->query($sql) === TRUE) 
	  //           {
	  //               echo "New record created successfully";

	  //           } 
	  //           else 
	  //           {
	  //               echo "Error: " . $sql . "<br>" . $conn->error;
	  //           }
			// 	$conn->close();     
			// }
			// elseif($type =="judge")
   //      	{
	  //           $var1 = $_SESSION['judge-id'];
	  //           $var2 = $_SESSION['name'];
	  //           $var3 = $_SESSION['address'];
	  //           $var4 = (int)$_SESSION['phone-no'];
	  //           $var5 = $_SESSION['username'];
	  //           $var6 = $_SESSION['password'];
	  //           $var7 = $_SESSION['email'];
	  //           $sql = "INSERT INTO judgetable (judgeID,name,address,phoneno,username,password,email) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
	  //           if ($conn->query($sql) === TRUE) {
	  //               echo "New record created successfully";
	  //           } else {
	  //               echo "Error: " . $sql . "<br>" . $conn->error;
	  //           }

	  //           $conn->close();      
			// }
			// elseif($type =="user")
   //      	{
	  //           $var2 = $_SESSION['name'];
	  //           $var3 = $_SESSION['password'];
	  //           $var4 = $_SESSION['username'];
	  //           $var5 = $_SESSION['email'];
	  //           $var6 = (int)$_SESSION['phone-no'];
	  //           $var7 = $_SESSION['address'];
	  //           $sql = "INSERT INTO usertable (name,password,username,email,phoneno,address) VALUES ('$var2','$var3','$var4','$var5','$var6','$var7')";
	  //           if ($conn->query($sql) === TRUE) {
	  //               echo "New record created successfully";
	  //           } else {
	  //               echo "Error: " . $sql . "<br>" . $conn->error;
	  //           }

	  //           $conn->close();  
	  //       }  
   //      }
    //}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="uploadpic.css">
	<title>Add Profile Photo</title>
</head>
<body>

	<div class="main-box">
		<div class="inside-box">
			<p style="padding-left: 23%; font-size: 23px; padding-top: 2%;">Add Profile Photo</p>
			<br><br>
			<div class="mericlass">
				<img src="user-otp.png" class="rounded-circle">
			</div>
			<p style="text-align: center; font-size: 25px;"><?php echo $_SESSION['username']; ?></p>
			<br>

			<div class="form-group">
				<form method="POST" action="uploadpic.php" enctype="multipart/form-data">	&nbsp;
				    <input type="file" name="fileToUpload" id="fileToUpload" >
				    <button type="submit" name="submit-btnn" class="btn btn-primary">Save photo..</button>
			    	<button type="submit" name="submit-btnn" class="btn btn-primary">Submit</button>
				</form>
		  	</div>

		  	<br><br><br>
		  	<p style="color: grey; margin-left: 25%; margin-bottom: 0;">Wanna Sign-in <a href="index.php" style="text-decoration: none;">Home Page</a></p>
		  	<p style="color: grey; margin-left: 30%">&copy;Proness2017-2018</p>
		</div>
	</div>

</body>
</html>