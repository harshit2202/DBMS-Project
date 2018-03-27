<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="otp1.css">
	<title>OTP Verification</title>
</head>
<body>

	<div class="main-box">
		<div class="inside-box">
			<p style="padding-left: 28%; font-size: 23px; padding-top: 2%;">OTP Verification</p>
			<br><br>
			<div class="mericlass">
				<img src="user.png" class="rounded-circle">
			</div>
			<p style="text-align: center; font-size: 25px;"><?php echo "Username"; ?></p>
			<br>
			<div class="form-group">
			    <input type="email" class="form-control" id="exampleInputEmail1" name ="otpp" aria-describedby="emailHelp" placeholder="Enter OTP (One Time Password)">
			    <button type="button" class="btn btn-primary">Submit</button>
		  	</div>
		  	<br><br><br>
		  	<p style="color: grey; margin-left: 25%; margin-bottom: 0;">Wanna Sign-in <a href="try.html" style="text-decoration: underline;">Home Page</a></p>
		  	<p style="color: grey; margin-left: 30%">&copy;Proness2017-2018</p>
		</div>
	</div>

</body>
</html>