<?php session_start(); ?>
<?php
	echo $_SESSION['otp'];
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
        	header('Location:http://localhost/DBMS-Project/enternewpassword.php');
        	exit();
        }
        else
        {
        	alert("OTP Entered does not match..");
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
	<link rel="stylesheet" type="text/css" href="OTP-Verification.css">
	<title>New Password Verification</title>
</head>
<body>

	<div class="main-box">
		<div class="inside-box">
			<p style="padding-left: 22%; font-size: 23px; padding-top: 2%;">New Password OTP</p>
			<br><br>
			<div class="mericlass">
				<img src="user-otp.png" class="rounded-circle">
			</div>
			<p style="text-align: center; font-size: 25px;"><?php echo $_SESSION['username']; ?></p>
			<br>
			<div class="form-group">
				<form method="POST" >
					<small class="form-text text-muted">Enter OTP ( One Time Password ) <br> We have just sent to your Registered E-mail ID.</small>
					<br>
				    <input type="password" class="form-control" id="exampleInputEmail1" name ="otpp" aria-describedby="emailHelp" placeholder="Enter OTP (One Time Password)">
				    <button type="submit" name="submit-btnn" class="btn btn-primary">Submit</button>
				</form>
		  	</div>
		  	<br>
		  	<p style="color: grey; margin-left: 25%; margin-bottom: 0;">Wanna Sign-in <a href="try.html" style="text-decoration: none;">Home Page</a></p>
		  	<p style="color: grey; margin-left: 30%">&copy;Proness2017-2018</p>
		</div>
	</div>

</body>
</html>