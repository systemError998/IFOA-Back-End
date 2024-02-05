<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //per fare debug, lascia
    $mail->isSMTP();                                            //Send using SMTP, lascia
    $mail->Host       = 'sandbox.smtp.mailtrap.io';             //Host dell'account di posta elettronica da usare
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'e3da2509c37e09';                       //SMTP username
    $mail->Password   = '61738adcf78aed';                       //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
    $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Joe Mustacho');     //Email di chi invia 
    $mail->addAddress('joe@example.net', 'Mila Kleo');      //Email destinatario 
    //$mail->addAddress('destinatario2');                   //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('in copia');
    //$mail->addBCC('in copia nascosto');


    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Inviare una mail in formato html
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    
} catch (Exception $e) {
    
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}