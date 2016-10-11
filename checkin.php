<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SCRUM GATHERING CHINA 2016 - Checkin</title>
</head>

<body>
<p style="font-size:56px;align=" center"">
<?php echo 'You will not be able to checkin until Oct. 20 dusk' ?>
</br>
</body>
</html>


<!--uncomment below on Oct. 20th noon.-->
<!---->
<!---->
<?php
///**
// * Created by IntelliJ IDEA.
// * User: philip
// * Date: 10/9/16
// * Time: 6:30 AM
// */
//
//$v_qr = $_GET['qr'];
////echo $v_qr;
//
//include_once 'payease/util/conn.php';
//
//$sql_query = "select v_rcvname,v_rcvtel,v_email,rsg_role,checkin from payeaseinfo where qr='$v_qr'";
//
//if (!$result = $con->query($sql_query)) {
//    // Oh no! The query failed.
//    echo "Sorry, the website is experiencing problems.";
//    // Again, do not do this on a public site, but we'll show you how
//    // to get the error information
//    echo "Error: Our query failed to execute and here is why: \n";
//    echo "Query: " . $sql . "\n";
//    echo "Errno: " . $con->errno . "\n";
//    echo "Error: " . $con->error . "\n";
//    exit;
//}
//if ($result->num_rows === 0) {
//    echo 'We cannot find your registration information. Please contact front desk.';
//    exit;
//}
//
//$attendee = $result->fetch_assoc();
//$attendee_mail = $attendee['v_email'];
////echo $attendee_mail . "\n";
//
//$attendee_name = $attendee['v_rcvname'];
////echo $attendee_name . "\n";
//
//$attendee_role = $attendee['rsg_role'];
////echo "Your role is: " . $attendee_role . "\n";

//
////$attendee_tel = $attendee['v_rcvtel'];
////echo "Your telphone # is: " . $attendee_tel . "\n";
//$welcome = "You have checked in more than once!";
//$checkin = $attendee['checkin'];
//
//if ($checkin == 0) {
//    $welcome = "Have fun in RSG Hangzhou 2016!";
//
//    $checkin = $checkin + 1;
//
//    $sql_update = "update payeaseinfo set checkin='$checkin' where qr='$v_qr'";
//
//    if (!$result = $con->query($sql_update)) {
//        // Oh no! The query failed.
//        echo "Sorry, the website is experiencing problems.";
//        // Again, do not do this on a public site, but we'll show you how
//        // to get the error information
//        echo "Error: Our query failed to execute and here is why: \n";
//        echo "Query: " . $sql . "\n";
//        echo "Errno: " . $con->errno . "\n";
//        echo "Error: " . $con->error . "\n";
//        exit;
//    }
//}
//?>
<!--<body>-->
<!--<p style="font-size:56px;align=" center"">-->
<?php //echo $attendee_name ?>
<!--</br>-->
<?php //echo $role ?>
<!--</br>-->
<?php //echo $welcome ?>
<!--</body>-->
<!--</html>-->