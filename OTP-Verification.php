<?php session_start();
    if(!isset($_SESSION['otp'])) {
        session_destroy();
        header('Location:http://localhost/DBMS-Project/index.php');
    }
?>
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
	    $mail->setFrom('mridulgupta11944@gmail.com', 'Online FIR Portal');
	    $mail->addAddress($emaill, 'Prathmesh');
	    $mail->isHTML(true);
	    $varr = $_SESSION['otp'];
	    $mail->Subject = 'Online FIR Portal OTP is '.$varr;
	    $mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body style="margin-top:80px;
    margin-right:200px;
    margin-left:200px;
    margin-bottom:200px;
    padding-left:300px;">

    <div class = "box" style="background-color: #171A21;
    text-align: center;
    font-size:30px;
    font-family: Times New Roman,sans-serif;
    color: #DBDBDB;
    height:55px;
    width:381px ;
    border:solid;
    border-bottom: black;
    border-bottom-width: 3px;
    border-width: 1px;
    border-color: white;
    line-height: 1.6em;
    letter-spacing:2px;
    padding-left:30px;
    padding-right: 30px;">
    <div class="of" style="text-align: center;
    text-shadow: -1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8);
    color: white;
    font-size: 40px;">ONLINE FIR</div>
    </div>
    <div class = "box2" style="background-color: #17212E;
    text-align: left;
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;
    color: #66C0F4;
    height:355px;
    width:381px ;
    padding: 30px;
    border-left: solid;
    border-right: solid;
    border-bottom:solid;
    border-width: 1px;
    border-color: white;
    line-height: 1.6em;">
    The OTP for your new registration on the portal:
    <br><br>
        <div class = "OTP-box" style="padding: 20px;
    background-color: #121A25;
    text-decoration: bold;
    color:white;
    text-align: center;
    font-size: 32px;
    letter-spacing: 10px;">
            '. $varr.'
            
        </div>
        <div class = "aftertext" style="font-size: 15px;
    color:grey;
    padding-left:2px;
">
        *If you did not register on the E-FIR Portal then please ignore this E-Mail.
        </div>
        <div class = "hlink">   
        <a href="" style="color:grey; text-decoration: underline;text-decoration-color:grey" >ABOUT US</a>
        </div>
    </div>
    
</body>
</html>';
	    $mail->send();
	    alert( 'Message has been sent');
	} 
	catch (Exception $e) 
	{
	    alert( 'Message could not be sent. ');
	}


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
    	$type = "";
    	$user = "";
        $va11 = $_POST['otpp'];
        if($_SESSION['otp'] == $va11)
        {

        	$type = $_SESSION['type'];
        	$user = $_SESSION['username'];
        	if($type =="cop")
        	{
	            $var1 = $_SESSION['police-id'];
	            $var2 = $_SESSION['name'];
	            $var3 = $_SESSION['username'];
	            $var4 = $_SESSION['email'];
	            $var5 = $_SESSION['password'];
	            $var6 = $_SESSION['address'];
	            $var7 = $_SESSION['phone-no'];
	            $sql = "INSERT INTO coptable (copID,name,username,email,password,address,phoneno) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
	            if ($conn->query($sql) === TRUE) {
	                alert( "New record created successfully" );
	            } else {
	                alert( 'Sorry for inconvinience .. Cant be registered right now' );
	            }
				$conn->close();     
			}
			elseif($type =="judge")
        	{
	            $var1 = $_SESSION['judge-id'];
	            $var2 = $_SESSION['name'];
	            $var3 = $_SESSION['address'];
	            $var4 = $_SESSION['phone-no'];
	            $var5 = $_SESSION['username'];
	            $var6 = $_SESSION['password'];
	            $var7 = $_SESSION['email'];
	            $sql = "INSERT INTO judgetable (judgeID,name,address,phoneno,username,password,email) VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
	            if ($conn->query($sql) === TRUE) {
	                alert( "New record created successfully" );
	            } else {
	                alert( 'Sorry for inconvinience .. Cant be registered right now' );
	            }

	            $conn->close();      
			}
			elseif($type =="user")
        	{
	            $var2 = $_SESSION['name'];
	            $var3 = $_SESSION['password'];
	            $var4 = $_SESSION['username'];
	            $var5 = $_SESSION['email'];
	            $var6 = $_SESSION['phone-no'];
	            $var7 = $_SESSION['address'];
	            $sql = "INSERT INTO usertable (name,password,username,email,phoneno,address) VALUES ('$var2','$var3','$var4','$var5','$var6','$var7')";
	            if ($conn->query($sql) === TRUE) {
	                alert( "New record created successfully" );
	            } else {
	                alert( 'Sorry for inconvinience .. Cant be registered right now' );
	            }

	            $conn->close();  
	        }  
        }

        session_destroy();
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['type'] = $type;
        header('Location:http://localhost/DBMS-Project/uploadpic.php');
        exit();
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
			<p style="text-align: center; font-size: 25px;"><?php echo $_SESSION['username']; ?></p>
			<br>
			<div class="form-group">
				<form method="POST" >
				    <input type="password" class="form-control" id="exampleInputEmail1" name ="otpp" aria-describedby="emailHelp" placeholder="Enter OTP (One Time Password)">
				    <button type="submit" name="submit-btnn" class="btn btn-primary">Submit</button>
				</form>
		  	</div>
            <a href="OTP-Verification.php"><img src="retry.png" style="margin-left: 60%">Resend OTP</a>
		  	<br><br><br>
		  	<p style="color: grey; margin-left: 25%; margin-bottom: 0;">Wanna Sign-in <a href="try.html" style="text-decoration: underline;">Home Page</a></p>
		  	<p style="color: grey; margin-left: 30%">&copy;Proness2017-2018</p>
		</div>
	</div>

</body>
</html>