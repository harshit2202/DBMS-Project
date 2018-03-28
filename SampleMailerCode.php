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
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Chal Gaya ganduu';
    $mail->Body    = '<h1>Maa K Lode</h1>';
    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) 
{
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}