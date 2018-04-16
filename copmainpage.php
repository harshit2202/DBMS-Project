<?php session_start();
if(!isset($_SESSION['username'])) {
   header( 'Location: http://localhost/DBMS-Project/index.php');
}
//?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet"		 type="text/css" href="copmainpage.css">
	<title>DashBoard</title>
</head>
<body>
	<div class="main-page" >
		
		<div class="heading">
			<span class="mainheading">Online FIR Portal</span>
			<p style="float: left ; width: 60%; text-align: right; margin-top: 2%;"; > <img style="margin-bottom: 1%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="http://localhost/DBMS-Project/logout.php"><img src="logout.png"> Logout</a></p>
		</div>

		<div class ="leftt">
			<a href="http://localhost/DBMS-Project/copmainpage.php" class = "anchor" >
			<div class = "clickable">
				Home
			</div>
			</a>

			<a href="http://localhost/DBMS-Project/copprofile.php" class = "anchor" >
			<div class = "clickable">
				Profile
			</div>
			</a>

			<a href="http://localhost/DBMS-Project/showcopfir.php" class = "anchor" >
			<div class = "clickable">
				Check FIR Records
			</div>
			</a>	

			<a href="http://localhost/DBMS-Project/updatefircop.php" class = "anchor" >
			<div class = "clickable">
				Update FIR Status
			</div>
			</a>	

			<a href="http://localhost/DBMS-Project/wantedpage.php" class = "anchor" >
			<div class = "clickable">
				Wanted List
			</div>
			</a>	

			<a href="http://localhost/DBMS-Project/newwanted.php" class = "anchor" >
			<div class = "clickable">
				Add New Wanted
			</div>
			</a>

            <a href="http://localhost/DBMS-Project/contactus.html" class = "anchor" >
                <div class = "clickable">
                    Contact Log
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
				<div><img src="news1.jpg" style="max-height: 100%; max-width: 100%;"></div>
				<div class="card-inner">
					<div class="card-inner-text">
						<p style="color: orange; font-size: 20px;">High Court stands in favour of MLA, Bihar Case</p>
						<br><br>
						<a href="http://localhost/DBMS-Project/news1.html"><button type="submit" class="btn btn-primary" style="float: right;margin-top: 0px;">Read more....</button></a> 
					</div>
				</div>
			</div>


			<hr style="margin: 0; ">


			<div class="card-outer">
				<div><img src="news2.jpg" style="max-height: 100%; max-width: 100%;"></div>
				<div class="card-inner">
					<div class="card-inner-text">
						<p style="color: orange; font-size: 20px;">10,000 more police vacancies..</p>
						<br><br>
						<a href="http://localhost/DBMS-Project/news2.html"><button type="submit" class="btn btn-primary" style="float: right; margin-top: 27px;">Read more....</button></a> 
					</div>
				</div>
			</div>


			<hr style="margin: 0; ">


			<div class="card-outer-big">
				<div><img src="news3.jpg" style="max-height: 100%; max-width: 100%;"></div>
				<div class="card-inner">
					<div class="card-inner-text">
						<p style="color: orange; font-size: 25px;">Allahabad High Court Orders Arrest Of Unnao BJP MLA Kuldeep Singh Sengar</p>
						<br>
						<p style="color: white; font-size: 15px;">One day after the Allahabad high court questioned the Uttar Pradesh government’s approach in handling the Unnao rape case and why the accused BJP MLA, Kuldeep Singh Sengar, had not been arrested even after an FIR, the court asked the Central Bureau of Investigation (CBI) to arrest, and not just detain, the MLA accused of raping a teenager from Unnao district in June 2017.</p>
						<br><br>
						<a href="http://localhost/DBMS-Project/news3.html"><button type="submit" class="btn btn-primary" style="float: right; margin-top: 13px;">Read more....</button></a> 
					</div>
				</div>
			</div>









		</div>	


		<div class="right-panel">
			<marquee direction="left" style="background-color: #171A21; color: white;">PM, Narendra Modi visiting Allahabad on 27th April 2018</marquee>
			<div class="right-panel-text">
				<p>Upcoming Events in your locality</p>
					<li>Awareness Campaign 2018-19..<img src="newicon.gif" style="padding-bottom: 11px;"></li>
					<li>Voting Event 2018<img src="newicon.gif" style="padding-bottom: 11px;"></li>	
				<hr style="margin-right: 20px; ">
				<p>Current Events in action..</p>
					<li>Swach Bharat Abhiyaan-2018</li>
					<li>CM of UP visiting Allahabad </li>
					<li>MLA, Mr. ABC is currently visiting Prayag</li>
					<li>Social Meet-Up at central park.</li>
				<hr style="margin-right: 20px; ">
				<p>Events must attend..</p>
					<li>CM,UP at Allahabad University</li>
					<li>PM, Narendra Modi visit on 27-04-2017</li>
					<li>Social Environment Camp (SEC)</li>
				<hr style="margin-right: 20px; ">
			</div>



		</div>

	</div>
</body>
</html>