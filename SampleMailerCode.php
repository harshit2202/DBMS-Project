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
    $mail->Username = 'Enter Sender Mail Here';                
    $mail->Password = 'Enter Sender Password here';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('Enter Sender Mail Here', 'Mridul');
    $mail->addAddress('Receiver 1', 'Name 1');    
    $mail->addAddress('Receiver 2', 'Name 2');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'FIR OTP';
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
            3020
            
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
    echo 'Message has been sent';
} 
catch (Exception $e) 
{
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
