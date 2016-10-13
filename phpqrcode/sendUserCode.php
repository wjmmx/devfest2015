<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 10/8/16
 * Time: 2:35 PM
 */

include('qrconfig.php');
include_once '../payease/util/conn.php';
include_once '../payease/util/sendemail.php';

$tempDir = QRCODE_FOLDER;
$conferenceDir = CONFERENCE_MATERIALS;

$mail_attachment1=$conferenceDir.'大会公众号.jpg';
$mail_attachment2=$conferenceDir.'大会小秘书.jpg';
$mail_attachment3=$conferenceDir.'大会日程.pdf';

$sql_fetch_attendees = "SELECT v_rcvname, v_email, qr from payeaseinfo where qr_is_sent=0 LIMIT 15";

if (!$attendeelist = $con->query($sql_fetch_attendees)) {
    // Oh no! The query failed.
    echo "Sorry, the website is experiencing problems.";
    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $con->errno . "\n";
    echo "Error: " . $con->error . "\n";
    exit;
}

while($attendee = $attendeelist->fetch_assoc()){
    $mail_recipient = $attendee["v_email"];
    echo 'mail_recipient: '. $mail_recipient . "<br>" ;
    $name_recipient = $attendee["v_rcvname"];
    echo 'name_recipient: '. $name_recipient . "<br>" ;

    $qr = $attendee["qr"];

    $fileName = $qr.'.png';
    $pngAbsoluteFilePath = $tempDir.$fileName;

    $mail_subject='【参会提醒-请阅读】Scrum Gathering China 2016大会';

    $mail_body = $name_recipient.', 您好！' . file_get_contents("../conference_materials/conference_notification.html");

    $success = sendMail($mail_recipient, $name_recipient, $mail_subject, $mail_body, $qr,$mail_attachment1,$mail_attachment2,$mail_attachment3,$pngAbsoluteFilePath);

    $sql_updateqr = "update payeaseinfo set qr='$qr', qr_is_sent='$success' where v_email='$mail_recipient' and v_rcvname='$name_recipient'";
//    echo $sql_updateqr . "<br>";

    if ($con->query($sql_updateqr) === TRUE) {
//        echo "qrcode attached successfully" . "<br>";
        echo "--------------" . "<br>";
    } else {
        echo "Error: " . $sql_updateqr . "<br>" . $con->error;
    }
}
