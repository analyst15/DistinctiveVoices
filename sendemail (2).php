<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$allItems = '';

$alert = '';

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$country = $_POST['country'];
	$street = $_POST['street'];
	$town = $_POST['town'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
    


    try{
        $mail->isSMTP();
        $mail->Host = 'mail.cardingguru.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@cardingguru.com';
        $mail->Password = 'analyst150';
        $mail->Username = 'info@cardingguru.com';
        $mail->SMTPSecure =  'ssl';
        $mail->Port = '465';
        
        $mail->setFrom('info@cardingguru.com');
        $mail->addAddress($email = $_POST['email']);

        $mail->isHTML(true);
        $mail->isSMTP(true);
        $mail->Subject = 'Your Carding Guru Order Has Been Received';
        $mail->Body = "<html>
        <head>
            <title>HTML email</title>
        </head>

        <body>
            <h7>Hi,</h7>
            <p>Thank you for your order. It's on hold until we confirm that payment has been received.</p>

            <h3 style= 'color:#f40;'>ADDITIONAL DETAILS</h3>
            <p>Qr Code Payment:</p>
            
            <img style='height:150px;width:150px' src = 'https://cardingguru.com/product-category/bank-drops/qrcode.jpeg'>

            <p>Wallet Address: <strong>bc1q9fyreedr3z80ue6qlxevckm44aglclfmxjytt0</strong></p>
            <p>Currency: Bitcoin</p>
            <p><strong>We look forward to your order soon</strong></p>

            <p>Support Team</p>
        </body>
    </html>";
        $mail->send();
        $alert = '<div class="alert-success">
                    <span>Successful, Thank you for registering with Carding Guru.</span>
                  </div>';
    } catch(Exception $e){
        $alert = '<div class="alert-error">
                    <span>'.$e->getMessage().'</span>
                  </div>';
    }
}




