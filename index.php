<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// matikan email antivirus
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/Exception.php");
require("PHPMailer/src/SMTP.php");

  use PHPMailer\PHPMailer\PHPMailer;


$mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP                              // Passing `true` enables exceptions

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // debugging: 1 = errors and messages, 2 = messages only
    $mail->isSMTP();                                      // Set mailer to use SMTP
  	$mail->Host = "smtp.gmail.com";   // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'andrign20@gmail.com';                 // SMTP username
    $mail->Password = 'gunawan20';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted Jangan di gabung antara port tsl dan ssl
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('andrign20@gmail.com', 'Mailer');
    $mail->addAddress('andrign20@gmail.com', 'Andri');     // Add a recipient
    // $mail->addAddress('andrign20@gmail.com');               // Name is optional
    $mail->addReplyTo('andrign20@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}