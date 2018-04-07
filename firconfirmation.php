<?php session_start(); ?>
<!-- ?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbmsproject";

	$firno = $_GET['id'];

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	$user = $_SESSION['username'];
	$sql = "select email from usertable where username = '$user'";

	$result = $conn->query($sql);

	while($row = mysqli_fetch_row($result));

	$email = $row[0]; 

?> -->





<!DOCTYPE html>
<html>
<head>
	<title>Confirm FIR </title>
	<link rel="stylesheet" type="text/css" href="firconfirmation.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php 
require('C:\xampp\htdocs\fpdf181\fpdf.php');
$firno='4566546465446546564';
$docrime ='YESSS';
$dosubmit = 'ASASAAS';
$description = 'Setting Tough paper';
$nameofvictim ='';
$namereported = '';
$datecrime = '30/03/2018';
$timecrime = '6:30 PM';
$placecrime = 'IIIT';





$pdf = new FPDF('p','mm','A4');
$pdf -> AddPage();

$pdf -> Rect(5, 5, 200, 285 ,''); // BORDER

$pdf -> SetLeftMargin(20); 	
$pdf -> SetRightMargin(10);
$pdf -> SetAutoPageBreak(true, 10);
$pdf -> SetFont('Helvetica','', 32);
$pdf -> SetXY(10,15);
$pdf -> Cell(189,5,'Online FIR',0,1,'C');

$pdf -> SetFont('Helvetica','i', 8);
$pdf -> SetX(10);
$pdf -> Cell(189,10,'This is a pdf from of the FIR you submitted',0,1,'C');

$pdf->Ln(); //New Line
           //FIR Number
$pdf -> SetFont('Arial','', 15);
$pdf -> Cell(60,7,'FIR Number: ',0,0,'L');
$pdf -> SetTextColor(204,0,0);
$pdf -> Cell(139,7,$firno,0,1,'L');
$pdf -> SetTextColor(0,0,0);
$pdf->Ln(); 

$pdf -> Cell(60,7,'Date Submitted:',0,0,'L');
$pdf -> Cell(139,7,$dosubmit,0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Name Of Reported:',0,0,'L');
$pdf -> Cell(139,7,$namereported,0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Name Of Victim:',0,0,'L');
$pdf -> Cell(139,7,$nameofvictim,0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Date Of Crime:',0,0,'L');
$pdf -> Cell(139,7,$datecrime,0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Place Of Crime:',0,0,'L');
$pdf -> Cell(139,7,$placecrime,0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Time Of Crime:',0,0,'L');
$pdf -> Cell(139,7,$timecrime,0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Description',0,1,'L');
$pdf -> SetFont('Arial','', 11);
$pdf ->MultiCell(0, 6, $description, 0,'');
$pdf -> SetFont('Arial','', 15);



//Footer
$pdf -> SetFont('Helvetica','i', 8);
$pdf -> SetY(-20);
$pdf -> Cell(60,7,'This PDF is automatically generated',0,0,'L');
$pdf -> Cell(123,7,chr(169).' All Rights Reserved',0,0,'R');

$dir="test.pdf";

$pdf->Output($dir,'F');

?>







</head>
<body>
<div class="main-page" >
		
		<div class="heading">
			<span class="mainheading">Online FIR Portal</span>
			<p style="float: left ; margin-left: 50%; margin-top: 2%;"; >  &nbsp; &nbsp; &nbsp; 
		</div>
		<div class = "normaltext">
			FIR Number:  <!-- PHP Variable  here --><br>
			An E-Mail has been sent to your registered Email ID with the FIR PDF.<br>
			Else Download Here: 
		</div>

</div>

</body>
</html>


<?php

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
    $mail->addAddress('IIT2016028@iiita.ac.in', 'Prathmesh');    
    $mail->addAddress('IIT2016055@iiita.ac.in', 'Harshit');
    $mail->addAttachment('C:\xampp\htdocs\Project\DBMS-Project\test.pdf');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'FIR OTP';
    $mail->Body    = 'Attached is the FIR Information in PDF form for your records';
    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) 
{
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

