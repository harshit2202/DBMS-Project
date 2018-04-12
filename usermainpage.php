<?php session_start();
    if(!isset($_SESSION['username'])) {
        header( 'Location: http://localhost/DBMS-Project/index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="usermainpage.css">
	<title>DashBoard</title>
</head>
<body>
	<div class="main-page" >
		
		<div class="heading">
			<span class="mainheading">Online FIR Portal</span>
			<p style="float: left ; margin-left: 40%; margin-top: 2%;"; > <img style="margin-bottom: 1%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a style="text-decoration: none;" href="http://localhost/DBMS-Project/logout.php"><img src="logout.png"> Logout</a></p>
		</div>

		<div class ="leftt">
			<a href="http://localhost/DBMS-Project/usermainpage.php" class = "anchor" >
			<div class = "clickable">
				Home
			</div>
			</a>

			<a href="http://localhost/DBMS-Project/userprofile.php" class = "anchor" >
			<div class = "clickable">
				Profile
			</div>
			</a>

			<a href="http://localhost/DBMS-Project/lodgeFIR.php" class = "anchor" >
			<div class = "clickable">
				New FIR
			</div>
			</a>	

			<a href="http://localhost/DBMS-Project/showuserfir.php" class = "anchor" >
			<div class = "clickable">
				FIR History
			</div>
			</a>	

			<a href="NULL" class = "anchor" >
			<div class = "clickable">
				Nearest Police Station
			</div>
			</a>	

			<a href="http://localhost/DBMS-Project/contactus.html" class = "anchor" >
			<div class = "clickable">
				Contact Us
			</div>
			</a>			
		</div>

		<div class="news-panel">

			<!-- <div class="card" style="width: 98%; margin-top: 1%; margin-left: 1%;">
			  <img class="card-img-top" src="news1.jpg" alt="Card image cap">
			  <div class="card-body">
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>



			<div class="card" style="width: 98%; margin-top: 1%; margin-left: 1%;">
			  <img class="card-img-top" src="news1.jpg" alt="Card image cap">
			  <div class="card-body">
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div> -->
<!-- 
			<div class = "outer-card" style="height: 100%; width: 100%;">
				<div style="height: 100%; margin-left: 1.2%; padding-top: 1%; "><img src = "news1.jpg" style="box-shadow: 1px 1px 1px 1px;height: 65%;	border-radius: 3px;"></div>
				<div class="inner-card">
					<h2> Lorem Ipsum </h2>
				</div>
			</div> -->

			<div class="card-outer">
				<div><img src="news2.jpg" style="max-height: 100%; max-width: 100%;"></div>
				<div class="card-inner">
					<div class="card-inner-text">
						<p style="color: orange;">News Heading...</p>
						<br><br>
						<a href="index.php"><button type="submit" class="btn btn-primary" style="float: right;margin-top: 13px;">Read more....</button></a> 
					</div>
				</div>
			</div>


			<hr style="margin: 0; ">


			<div class="card-outer">
				<div><img src="news2.jpg" style="max-height: 100%; max-width: 100%;"></div>
				<div class="card-inner">
					<div class="card-inner-text">
						<p style="color: orange;">News Heading...</p>
						<br><br>
						<a href="index.php"><button type="submit" class="btn btn-primary" style="float: right; margin-top: 13px;">Read more....</button></a> 
					</div>
				</div>
			</div>


			<hr style="margin: 0; ">


			<div class="card-outer-big">
				<div><img src="news2.jpg" style="max-height: 100%; max-width: 100%;"></div>
				<div class="card-inner">
					<div class="card-inner-text">
						<p style="color: orange; font-size: 30px;">News Heading...</p>
						<br>
						<p style="color: white; font-size: 18px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						<br><br>
						<a href="index.php"><button type="submit" class="btn btn-primary" style="float: right; margin-top: 13px;">Read more....</button></a> 
					</div>
				</div>
			</div>









		</div>	


		<div class="right-panel">
			<marquee direction="left" style="background-color: #171A21; color: white;">Hiiii I am marquee text..</marquee>
			<div class="right-panel-text">
				<p>Upcoming Events in your locality</p>
					<li>Awareness Campaign 2018-19..</li>
					<li>Police Dharnaaaaaaa 2018</li>	

			</div>



		</div>

	</div>
</body>
</html>