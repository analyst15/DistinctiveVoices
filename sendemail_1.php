<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset: utf8\r\n";

$alert = '';

if(isset($_POST['submit_'])){
  $email = $_POST['email'];

  try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'techanalyst41@gmail.com';
        $mail->Password = '0706870680';
        $mail->Username = 'techanalyst41@gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('techanalyst41@gmail.com');
        $mail->addAddress($email = $_POST['email']);

        $mail->isHTML(true);
        $mail->isSMTP(true);
        $mail->Subject = 'Welcome to Distinctive Voices';
        $mail->Body = "<h3>Hello</h3>
        <p>Thank you for your Subscription</p>";
        $mail->send();
        $alert = '<div class="alert-success">
                    <span>Message Sent! Thank you for contacting us.</span>
                  </div>';
    } catch(Exception $e){
        $alert = '<div class="alert-error">
                    <span>'.$e->getMessage().'</span>
                  </div>';
    }
}
?>
