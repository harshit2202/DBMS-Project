<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<link rel="stylesheet" type="text/css" href="wantedpage.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<div class="main-page" >
		
		<div class="heading">
			<span class="mainheading">Online FIR Portal</span>
			<p style="float: left ; margin-left: 50%; margin-top: 2%;"; >  &nbsp; &nbsp; &nbsp; 
		</div>

        <h1 style="margin-left: 35%; margin-top: 2%; margin-bottom: 2%;">List of Missing Criminals</h1>

        <?php

        $servername = "localhost";
        $usernmae = "root";
        $password = "";
        $dbname = "dbmsproject";

        $conn = mysqli_connect($servername,$usernmae,$password,$dbname);

        if($conn-> connect_error) {
            die("connection error ".$conn->connect_error);
        }

        $sql = "select * from wantedtable";

        $result = $conn->query($sql);

        $display = "";

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $display = $display . '<div class = "wanted">';
                $display = $display . '<img src="'.    $row["photoaddress"]     .'" height="150" width="150" class="pic" >';
                $display = $display . '<div class="wantedinfo">';
                $display = $display . 'Name = ' . $row['name'] . '<br>';
                $display = $display . 'Description = ' . $row['description'] . '<br>';
                $display = $display . 'Last Seen = ' . $row['lastseen'] . '<br>';
                $display = $display . '</div> </div>';
            }
        }
        echo $display;
        ?>
</body>
</html>