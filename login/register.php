<?php
// konek ke halaman functions.php
require '../functions/functions.php';

$email = $_POST["email"];
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
// require '../login/index.html';
// require '../functions/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$hash = sha1(rand(0,1000));
$subject = 'Signup | Verification';
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------

 
Please click this link to activate your account:
http://xiimipa1sman6jakarta.epizy.com/login/verify.php?email='.$email.'&hash='.$hash.'
 
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
$mail->addAddress($email);
if($mail->send()){
    echo "Kekirim";
} else {
    echo "Ga kekirim";
}

$mail->smtpClose();

// cek button sudah ditekan atau belum
if(isset($_POST["register"])){
    
    if( register($_POST) > 0 ){
        $msg = "Akun berhasil dibuat, silahkan cek email untuk melakukan verifikasi!";
    } else {
        echo mysqli_error($connectSQL);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    
    <?php if(isset($msg)) : ?>
        <section class="jumbotron text-center" id="jumbotron">
            <div class="container">
              <div class="row text-center justify-content-evenly align-items-center d-flex flex-row-reverse">
                <div class="col-md-12">
                  <p class="lead"><?= $msg; ?></p>
                </div>
              </div>
            </div>
        </section>
    <?php endif; ?>

</body>
</html>