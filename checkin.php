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

$sql_query = "select v_rcvname,v_revtel,v_email,rsq_role,checkin from payeaseinfo where qr='$v_qr'";
//$sql_update= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";

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
$mail_recipient = $attendee['v_email'];
echo $mail_recipient . "\n";

$mail_recipient_name = $attendee['v_rcvname'];
echo $mail_recipient_name . "\n";

$role = $attendee['rsq_role'];
echo "Your role is: " . $role . "\n";

?>