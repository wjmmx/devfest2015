<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 6/9/16
 * Time: 3:30 PM
 */

require 'phpmailer/PHPMailerAutoload.php';

function sendMail($mail_recipient, $mail_recipient_name,$mail_subject,$mail_body_html,$mail_body_plain,$mail_attachment){
    $mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output

    //Aliyun
//    $mail->isSMTP();                                      // Set mailer to use SMTP
//    $mail->Host = 'smtp.mxhichina.com';  // Specify main and backup SMTP servers
//    $mail->SMTPAuth = true;                               // Enable SMTP authentication
//    $mail->Username = 'registration@scrumgathering.io';                 // SMTP username
//    $mail->Password = '^wu&Tq0W';                           // SMTP password
//    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//    $mail->Port = 465;
//    $mail->CharSet = 'utf-8';

    //outlook
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sgorganizer@outlook.com';                 // SMTP username
    $mail->Password = 'Hangzh0u';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
    $mail->CharSet = 'utf-8';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom('registration@scrumgathering.io', 'Regional Scrum Gathering China 2016');
    $mail->addAddress($mail_recipient, $mail_recipient_name);     // Add a recipient
    $mail->addReplyTo('registration@scrumgathering.io', 'Regional Scrum Gathering China 2016');
    $mail->addCC('organizer@scrumgathering.io');
//$mail->addBCC('bcc@example.com');
//
    $mail->addAttachment($mail_attachment);         // Add attachments
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