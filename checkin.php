<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 10/9/16
 * Time: 6:30 AM
 */

$v_qr = $_GET['qr'];
echo $v_qr;

include_once 'payease/util/conn.php';

$sql_query = "select v_rcvname,v_rcvtel,v_email,rsg_role,checkin from payeaseinfo where qr='$v_qr'";

if (!$result = $con->query($sql_query)) {
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
if ($result->num_rows === 0) {
    echo 'We cannot find your registration information. Please contact front desk.';
    exit;
}

$attendee = $result->fetch_assoc();
$attendee_mail = $attendee['v_email'];
echo $attendee_mail . "\n";

$attendee_name = $attendee['v_rcvname'];
echo $attendee_name . "\n";

$attendee_role = $attendee['rsg_role'];
echo "Your role is: " . $attendee_role . "\n";

$checkin = $attendee['checkin'];
echo "Your checkin status is: " . $checkin . "\n";

$attendee_tel = $attendee['v_rcvtel'];
echo "Your telphone # is: " . $attendee_tel . "\n";

$checkin=$checkin+1;

$sql_update= "update payeaseinfo set checkin='$checkin' where qr='$v_qr'";

if (!$result = $con->query($sql_update)) {
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
?>