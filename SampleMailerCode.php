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
    $mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<!-- <style>
body{
    margin-top:5%;
    margin-right:15%;
    margin-left:15%;
    margin-bottom:15%;
    padding-left:22%;
    background-color: white;    
}
.box{
    background-color: #171A21;
    text-align: center;
    font-size:30px;
    font-family: "Times New Roman",sans-serif;
    color: #DBDBDB;
    height:55px;
    width:55% ;
    border:solid;
    border-bottom: black;
    border-bottom-width: 3px;
    border-width: 1px;
    border-color: white;
    line-height: 1.6em;
    letter-spacing:2px;
    padding-left:30px;
    padding-right: 30px;
}
.box2{
    background-color: #17212E;
    text-align: left;
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;
    color: #66C0F4;
    height:355px;
    width:55% ;
    padding: 30px;
    border : solid;
    border-bottom-color: black;
    border-width: 1px;
    border-color: white;
    border-bottom: none;
    border-top-color: black;
    border-top-width: 1px;


}
.OTP-box{
    padding: 20px;
    background-color: #121A25;
    text-decoration: bold;
    color:white;
    text-align: center;
    font-size: 32px;
    letter-spacing: 10px;

}
.aftertext{
    font-size: 15px;
    color:grey;
    padding-left:2px;

}
.of{
    text-align: center;
    text-shadow: -1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8);
    color: #DBDBDB;
    font-size: 40px;
}

a.hlink:visited { color:#DBDBDB; text-decoration:underline; font-weight:normal; }
a.hlink:hover {color:#DBDBDB; text-decoration:underline; font-weight:normal;}
a.hlink:link { color:orange; text-decoration:underline; font-weight:normal; }
a.hlink:active {color:red; text-decoration:underline; font-weight:normal;}

.hlink {
    -webkit-transition-duration: 0.6s;
    transition-duration: 0.6s;
    transition: all 2s;
    position: relative;
}

.hlink:hover {
    top : -2px;
}


.hlink {
    font-size: 15px;
}

.box3 {
    background-color: black;
    text-align: left;
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;
    color: #66C0F4;
    height:30px;
    width:61% ;
    padding: 10px;
    border-left: solid;
    border-right: solid;
    border-bottom:solid;
    border-width: 1px;
    border-color: white;
    border-top: none;
}

a.index:visited { text-decoration:underline; font-family: Arial, Helvetica, sans-serif; color: #66C0F4; }
a.index:hover { text-decoration:underline; font-family: Arial, Helvetica, sans-serif; color: #66C0F4; }
a.index:link { text-decoration:underline; font-family: Arial, Helvetica, sans-serif; color: #66C0F4; }
a.index:active { text-decoration:underline; font-family: Arial, Helvetica, sans-serif; color: #66C0F4; }

</style> -->
<body link = "#66C0F4" vlink = "#66C0F4" alink = "#66C0F4" style="margin-top:5%;
    margin-right:15%;
    margin-left:15%;
    margin-bottom:15%;
    padding-left:22%;
    background-color: white;">

    <div style="height: 500px; width: 60%;">
        <div class = "box" style=" background-color: #171A21;
    text-align: center;
    font-size:30px;
    color: #DBDBDB;
    height:10%;
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
    color: #DBDBDB;
    font-size: 40px;">ONLINE FIR</div>
    </div>
    <div class = "box2" style = "background-color: #17212E;
    text-align: left;
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;
    color: #66C0F4;
    height:63%;
    padding: 30px;
    border : solid;
    border-bottom-color: black;
    border-width: 1px;
    border-color: white;
    border-bottom: none;
    border-top-color: black;
    border-top-width: 1px;">
        The OTP for your new registration on the portal:
        <br><br>
        <div class = "OTP-box" style = "padding: 20px;
    background-color: #121A25;
    text-decoration: bold;
    color:white;
    text-align: center;
    font-size: 32px;
    letter-spacing: 10px;">
            3020
            
        </div>
        <br/>
        <div class = "aftertext" style = "font-size: 15px;
    color:grey;
    padding-left:2px;">
        *If you did not register on the E-FIR Portal then please ignore this E-Mail.
        </div>
        <div >  
        <a href="" class = "hlink" >ABOUT US</a>
        </div>
    </div>
    <div class = "box3" style="background-color: black;
    text-align: left;
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;
    color: #66C0F4;
    height:7%;
    padding: 10px;
    border-left: solid;
    border-right: solid;
    border-bottom:solid;
    border-width: 1px;
    border-color: white;
    border-top: none;">
        <a href = "http://localhost/Project/DBMS-Project/index.php" class = "index">FIR</a>
        <div style="float: right; color: #999999; font-size: 12px; line-height: 0.8em">
            &copy;Proness 2017-18
            <p>All Rights Reserved
        </div>
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