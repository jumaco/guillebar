<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])){

// Submitted form data
$name   = $_POST['name'];
$email  = $_POST['email'];
$message= $_POST['message'];

$to=$name;
$subject=$email;
$body=$message;

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;                     //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'front.fullstack@gmail.com';                     //SMTP username
$mail->Password   = 'Front2021';                         //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
$mail->setFrom('front.fullstack@gmail.com', 'LoDeGuilleBar'); // Admin ID
$mail->addAddress('juan.manuel.corral@hotmail.com', 'Juan'); // Business Owner ID
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Nueva consulta desde LO DE GUILLE BAR WEB, de: '.$_POST['name'];
$mail->Body    =    '
                    <h2>La solicitud de contacto se ha enviado, los detalles se dan a continuacion.</h2>
                    <table cellspacing="0" style="width: 300px; height: 200px;">
                        <tr>
                            <th style="font-weight:bold;">Name:</th><td>'.$name.'</td>
                        </tr>
                        <tr style="background-color: #e0e0e0;">
                            <th style="font-weight:bold;">Email:</th><td>'.$email.'</td>
                        </tr>
                        <tr>
                            <th style="font-weight:bold;">Message:</th><td>'.$message.'</td>
                        </tr>
                    </table>';



if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

}