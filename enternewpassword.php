<?php session_start();
    if(!isset($_SESSION['otp'])) {
        session_destroy();
        header('Location:http://localhost/DBMS-Project/index.php');
    }
?>
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

        if($_POST['password']==$_POST['repassword'])
        {
            echo "hello";
            $type = $_SESSION['type'];
            $user = $_SESSION['username'];
            $varr = $_POST['password'];
            echo $type.$user.$varr;
        	if($type =="cop")
        	{
	            $sql = "UPDATE coptable set password = '$varr' where username = '$user'"; 
                if ($conn->query($sql) === TRUE) 
                {
                    alert("Password has been changed successfully");
                    session_destroy();
                    header('Location: http://localhost/DBMS-Project/passwordchanged.php');
                    exit();
                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();   
			}
			else if($type =="judge")
        	{
	            $sql = "UPDATE judgetable set password = '$varr' where username = '$user'";  
                if ($conn->query($sql) === TRUE) 
                {
                    alert("Password has been changed successfully");
                    session_destroy();
                    header('Location: http://localhost/DBMS-Project/passwordchanged.php');
                    exit();
                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();  
			}
			else if($type =="user")
        	{
                echo "hello1";
	            $sql = "UPDATE usertable set password = '$varr' where username = '$user'"; 
                if ($conn->query($sql) === TRUE) 
                {
                    alert("Password has been changed successfully");
                    session_destroy();
                    header('Location: http://localhost/DBMS-Project/passwordchanged.php');
                    exit();
                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
    	        }   
        }
        else
        {
        	alert("Passwords do not match.");
        }
    }
    function alert($msg){
		echo "<script> alert('$msg'); </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="enternewpassword.css">
	<title>Enter New Password</title>
</head>
<body>

	<div class="main-box">
		<div class="inside-box">
			<p style="padding-left: 22%; font-size: 23px; padding-top: 2%;">Enter New Password</p>
			<br>
			<div class="mericlass">
				<img src="user-otp.png" class="rounded-circle">
			</div>
			<p style="text-align: center; font-size: 25px;"><?php echo $_SESSION['username']; ?></p>
			<br>
			<div class="form-group">
				<form method="POST" >
				    <input type="password" style="margin-bottom: 16px;" class="form-control" id="exampleInputEmail1" name ="password" aria-describedby="emailHelp" placeholder="Enter New Password">

				    <input type="password" class="form-control" id="exampleInputEmail1" name ="repassword" aria-describedby="emailHelp" placeholder="Enter New Password Again">
				    <br>
				    <button type="submit" name="submit-btnn" class="btn btn-primary">Submit</button>
				</form>
		  	</div>
		  	<br>
		  	<p style="color: grey; margin-left: 25%; margin-bottom: 0;">Wanna Sign-in <a href="try.html" style="text-decoration: underline;">Home Page</a></p>
		  	<p style="color: grey; margin-left: 30%">&copy;Proness2017-2018</p>
		</div>
	</div>

</body>
</html>