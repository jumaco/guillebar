<?php
require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// Form Data
$fullname = $_POST['fullname'] ;
$email = $_POST['email'] ;
$message = $_POST['message'] ;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'front.fullstack@gmail.com'; // SMTP username
$mail->Password = 'Front2021'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

$mail->setFrom('front.fullstack@gmail.com', 'LoDeFuilleBar'); // Admin ID
$mail->addAddress('juan.manuel.corral@hotmail.com', 'Juan'); // Business Owner ID
$mail->addReplyTo($email, $fullname); // Form Submitter's ID

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
