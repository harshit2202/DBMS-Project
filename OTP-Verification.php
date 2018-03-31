<?php session_start(); ?>
<?php

	$emaill = $_SESSION['email'];
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'vendor/autoload.php';
	$mail = new PHPMailer(true);                             
	try 
	{                            
	    $mail->isSMTP();                                      
	    $mail->Host = 'smtp.gmail.com';  
	    $mail->SMTPAuth = true;                               
	    $mail->Username = 'mridulgupta11944@gmail.com';                
	    $mail->Password = 'mridul1809';                           
	    $mail->SMTPSecure = 'tls';                            
	    $mail->Port = 587;                                    
	    $mail->setFrom('mridulgupta11944@gmail.com', 'Mridul');
	    $mail->addAddress($emaill, 'Prathmesh');    
	  //  $mail->addAddress('IIT2016055@iiita.ac.in', 'Harshit');
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $varr = $_SESSION['otp'];
	    $mail->Subject = 'Chal Gaya ganduu'.$varr;
	    $mail->Body    = '<h1>Maa K Lode</h1>';
	    $mail->send();
	    echo 'Message has been sent';
	} 
	catch (Exception $e) 
	{
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}


//******************************

    $servername="localhost";
    $username="root";   
    $password="";
    $dbname="DBMSProject";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error)
    {
        die("connection error".$conn->connect_error);
    }

    echo "Connected Successfully";
    if(isset($_REQUEST['submit-btnn']))
    {
        $va11 = $_POST['otpp'];
        if($_SESSION['otp'] == $va11)
        {

        	$type = $_SESSION['type'];
        	if($type =="cop")
        	{
	            $var1 = $_SESSION['police-id'];
	            $var2 = $_SESSION['name'];
	            $var3 = $_SESSION['username'];
	            $var4 = $_SESSION['email'];
	            $var5 = $_SESSION['password'];
	            $var6 = $_SESSION['address'];
	            $var7 = (int)$_SESSION['phone-no'];
	            $sql = "INSERT INTO coptable (copID,name,username,email,password,address,phoneno) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
	            if ($conn->query($sql) === TRUE) 
	            {
	                echo "New record created successfully";

	            } 
	            else 
	            {
	                echo "Error: " . $sql . "<br>" . $conn->error;
	            }
				$conn->close();     
			}
			elseif($type =="judge")
        	{
	            $var1 = $_SESSION['judge-id'];
	            $var2 = $_SESSION['name'];
	            $var3 = $_SESSION['address'];
	            $var4 = (int)$_SESSION['phone-no'];
	            $var5 = $_SESSION['username'];
	            $var6 = $_SESSION['password'];
	            $var7 = $_SESSION['email'];
	            $sql = "INSERT INTO judgetable (judgeID,name,address,phoneno,username,password,email) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
	            if ($conn->query($sql) === TRUE) {
	                echo "New record created successfully";
	            } else {
	                echo "Error: " . $sql . "<br>" . $conn->error;
	            }

	            $conn->close();      
			}
			elseif($type =="user")
        	{
	            $var2 = $_SESSION['name'];
	            $var3 = $_SESSION['password'];
	            $var4 = $_SESSION['username'];
	            $var5 = $_SESSION['email'];
	            $var6 = (int)$_SESSION['phone-no'];
	            $var7 = $_SESSION['address'];
	            $sql = "INSERT INTO usertable (name,password,username,email,phoneno,address) VALUES ('$var2','$var3','$var4','$var5','$var6','$var7')";
	            if ($conn->query($sql) === TRUE) {
	                echo "New record created successfully";
	            } else {
	                echo "Error: " . $sql . "<br>" . $conn->error;
	            }

	            $conn->close();  
	        }  
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="OTP-Verification.css">
	<title>OTP Verification</title>
</head>
<body>

	<div class="main-box">
		<div class="inside-box">
			<p style="padding-left: 28%; font-size: 23px; padding-top: 2%;">OTP Verification</p>
			<br><br>
			<div class="mericlass">
				<img src="user-otp.png" class="rounded-circle">
			</div>
			<p style="text-align: center; font-size: 25px;"><?php echo "Username"; ?></p>
			<br>
			<div class="form-group">
				<form method="POST" action="otp1.php">
				    <input type="password" class="form-control" id="exampleInputEmail1" name ="otpp" aria-describedby="emailHelp" placeholder="Enter OTP (One Time Password)">
				    <button type="submit" name="submit-btnn" class="btn btn-primary">Submit</button>
				</form>
		  	</div>
		  	<br><br><br>
		  	<p style="color: grey; margin-left: 25%; margin-bottom: 0;">Wanna Sign-in <a href="try.html" style="text-decoration: underline;">Home Page</a></p>
		  	<p style="color: grey; margin-left: 30%">&copy;Proness2017-2018</p>
		</div>
	</div>

</body>
</html>