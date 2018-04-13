<?php session_start(); 
if(!isset($_SESSION['username'])) {
    header( 'Location: http://localhost/DBMS-Project/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm FIR </title>
	<link rel="stylesheet" type="text/css" href="firconfirmation.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php 


    $servername="localhost";
    $username="root";
    $password="";
    $dbname="DBMSProject";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection error".$conn->connect_error);
    }

    $firno = $_SESSION['firno'];
    $user = $_SESSION['username'];

    $sql = "SELECT firno,date,place_crime,descp_crime,time,victim from firtable where firno = '$firno' ";
    $sql2 = "SELECT email from usertable where username = '$user'";

    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $firno=NULL;
    $description = NULL;
    $nameofvictim =NULL;
    $nameofvictim = NULL;
    $namereported = NULL;
    $datecrime = NULL;
    $timecrime = NULL;
    $placecrime = NULL;
    $email = NULL;
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();
    $email =  $row2["email"];


/**************************/


require('E:\xampp\htdocs\fpdf181\fpdf.php');






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
$pdf -> Cell(189,10,'This is a pdf form of the FIR you submitted',0,1,'C');

$pdf->Ln(); //New Line
           //FIR Number
$pdf -> SetFont('Arial','', 15);
$pdf -> Cell(60,7,'FIR Number: ',0,0,'L');
$pdf -> SetTextColor(204,0,0);
$pdf -> Cell(139,7,$row["firno"],0,1,'L');
$pdf -> SetTextColor(0,0,0);
$pdf->Ln(); 
//
//$pdf -> Cell(60,7,'Date Submitted:',0,0,'L');
//$pdf -> Cell(139,7,$dosubmit,0,1,'L');
//$pdf->Ln();
//$pdf -> Cell(60,7,'Name Of Reported:',0,0,'L');
//$pdf -> Cell(139,7,$namereported,0,1,'L');
//$pdf->Ln();
$pdf -> Cell(60,7,'Name Of Victim:',0,0,'L');
$pdf -> Cell(139,7,$row["victim"],0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Date Of Crime:',0,0,'L');
$pdf -> Cell(139,7,$row["date"],0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Place Of Crime:',0,0,'L');
$pdf -> Cell(139,7,$row["place_crime"],0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Time Of Crime:',0,0,'L');
$pdf -> Cell(139,7,$row["time"],0,1,'L');
$pdf->Ln();
$pdf -> Cell(60,7,'Description',0,1,'L');
$pdf -> SetFont('Arial','', 11);
$pdf ->MultiCell(0, 6, $row["descp_crime"], 0,'');
$pdf -> SetFont('Arial','', 15);



//Footer
$pdf -> SetFont('Helvetica','i', 8);
$pdf -> SetY(-20);
$pdf -> Cell(60,7,'This PDF is automatically generated',0,0,'L');
$pdf -> Cell(123,7,chr(169).' All Rights Reserved',0,0,'R');

$dir="FIRpdf\\".$_SESSION['firno'].".pdf";

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
			FIR Number: <?php echo $_SESSION['firno']; ?><br>
			An E-Mail has been sent to your registered Email ID with the FIR PDF.<br>
            Want to Download FIR Manually : 
            <a href="FIRpdf/<?php echo $_SESSION['firno']; ?>.pdf" download > Download Link </a>
            <br>
            <a href="http://localhost/DBMS-Project/usermainpage.php"> Back to Home</a>
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
    $mail->addAddress($email,$user);
    //$mail->addAddress('IIT2016055@iiita.ac.in', 'Harshit');
    $path = "E:\\xampp\htdocs\DBMS-Project\FIRpdf\\" .$_SESSION['firno']. ".pdf";
    $mail->addAttachment($path);         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'FIR OTP';
    $mail->Body    = 'Attached is the FIR Information in PDF form for your records';
    $mail->send();
   // echo 'Message has been sent';
} 
catch (Exception $e) 
{
  //  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

