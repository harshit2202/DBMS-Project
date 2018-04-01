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


$pdf->Output();

 ?>