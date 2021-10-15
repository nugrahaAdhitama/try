<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
// require '../login/index.html';
// require '../functions/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$to = $_POST["email"];
var_dump($to);
die;
$hash = sha1(rand(0,1000));
$subject = 'Signup | Verification';
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------

 
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$to.'&hash='.$hash.'
 
';


$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth = "true";
$mail->SMPTSecure = "tls";
$mail->Port = "587";
$mail->Username = "nugrahaadhitama22@gmail.com";
$mail->Password = "Ruthless678";
$mail->setFrom("nugrahaadhitama22@gmail.com");
$mail->Body= $message;
$mail->addAddress($to);
if($mail->send()){
    echo "Kekirim";
} else {
    echo "Ga kekirim";
}

$mail->smtpClose();
