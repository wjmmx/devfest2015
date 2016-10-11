<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 6/9/16
 * Time: 3:30 PM
 */

require 'phpmailer/PHPMailerAutoload.php';

function sendMail($mail_recipient, $mail_recipient_name,$mail_subject,$mail_body_html,$mail_body_plain){
    $mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mxhichina.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'registration@scrumgathering.io';                 // SMTP username
    $mail->Password = '^wu&Tq0W';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;
    $mail->CharSet = 'utf-8';
// TCP port to connect to

    $mail->setFrom('registration@scrumgathering.io', 'Regional Scrum Gathering China 2016');
    $mail->addAddress($mail_recipient, $mail_recipient_name);     // Add a recipient
    $mail->addReplyTo('registration@scrumgathering.io', 'Regional Scrum Gathering China 2016');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $mail_subject;
    $mail->Body    = $mail_body_html;
    $mail->AltBody = $mail_body_plain;

    if(!$mail->send()) {
        echo 'email could not be sent.';
        echo 'email Error: ' . $mail->ErrorInfo;
    } else {
        echo 'email has been sent';
    }
}
?>