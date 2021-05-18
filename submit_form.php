<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
$mail->Subject = 'Consulta de: '.$_POST['fullname'];
$mail->Body    = 'Nombre: '.$_POST['fullname'].'<br>Mensaje: '.$_POST['message'].'<br>Email: '.$_POST['email'];

// Send email
if(mail($to,$subject,$htmlContent,$headers)){
    $status = 'ok';
}else{
    $status = 'err';
}
    
// Output status
echo $status;die;
}
