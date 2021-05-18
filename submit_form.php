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

// Form Data
$fullname = $_POST['fullname'] ;
$email = $_POST['email'] ;
$message = $_POST['message'] ;

$mailbody = 'New Lead Enquiry' . PHP_EOL . PHP_EOL .
            'Name: ' . $fullname . '' . PHP_EOL .
            'Message: ' . $message . '' . PHP_EOL;

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

$mail->isHTML(false); // Set email format to HTML

$mail->Subject = 'New Lead Enquiry';
$mail->Body    = $mailbody;

if(mail($to,$subject,$htmlContent,$headers)){
    $status = 'ok';
}else{
    $status = 'err';
}
    
// Output status
echo $status;die;
?>