<?php
/**
 *  Server to server interface
 */

$v_oid = $_REQUEST['v_oid'];//order number
$v_pmode = urldecode($_REQUEST['v_pmode']);//payment method
$v_pstatus = $_REQUEST['v_pstatus'];//payment status
$v_pstring = urldecode($_REQUEST['v_pstring']);//payment result description
$v_amount = $_REQUEST['v_amount'];//order amount
$v_count = $_REQUEST['v_count'];//order counts
$v_moneytype = $_REQUEST['v_moneytype'];//payment currency
$v_mac = $_REQUEST['v_mac'];//v_mac
$v_md5money = $_REQUEST['v_md5money'];//v_md5money
$v_sign = $_REQUEST['v_sign'];//v_sign
//Split parameter
$sp = '|_|';
$a_oid = explode($sp, $v_oid);
$a_pmode = explode($sp, $v_pmode);
$a_pstatus = explode($sp, $v_pstatus);
$a_pstring = explode($sp, $v_pstring);
$a_amount = explode($sp, $v_amount);
$a_moneytype = explode($sp, $v_moneytype);
//MD5 validation
function hmac($key, $data)
{

    $b = 64;
    if (strlen($key) > $b) {
        $key = pack("H*", md5($key));
    }
    $key = str_pad($key, $b, chr(0x00));
    $ipad = str_pad('', $b, chr(0x36));
    $opad = str_pad('', $b, chr(0x5c));
    $k_ipad = $key ^ $ipad;
    $k_opad = $key ^ $opad;

    return md5($k_opad . pack("H*", md5($k_ipad . $data)));
}

$key = 'test';
$data1 = $v_oid . $v_pmode . $v_pstatus . $v_pstring . $v_count;
$mac = hmac($key, $data1);

$data2 = $v_amount . $v_moneytype;
$md5money = hmac($key, $data2);
if ($mac == $v_mac or $md5money == $v_md5money) {
    echo("sent");

    for ($i = 0; $i < $v_count; $i++) {
        include_once 'util/conn.php';
        if ($a_pstatus[$i] == '1') {
            $v_pstatus = "paid";
        } else if ($a_pstatus[$i] == '3') {
            $v_pstatus = "failure";
        } else {
            $v_pstatus = "waiting";
        }
        $v_paymentdate = date('Y-m-d H:i:s');
        $v_oid = $a_oid[$i];
        $sql_backconfirmation = "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";
        echo $sql_backconfirmation;

        if ($con->query($sql_backconfirmation) === TRUE) {
            echo "Order status updated successfully";

            include_once 'util/sendemail.php';

            //$v_oid = "20160622-82370001-173050";
            $sql = "SELECT v_rcvname, v_email from payeaseinfo where v_oid='$v_oid'";

            if (!$result = $con->query($sql)) {
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
                echo 'no records found for Order#: ' . $v_oid;
                exit;
            }

            $attendee = $result->fetch_assoc();
            $mail_recipient = $attendee['v_email'];
            echo $mail_recipient;

            $mail_recipient_name = $attendee['v_rcvname'];
            echo $mail_recipient_name;

            $mail_subject = 'Thank you for registering Regional Scrum Gathering China 2016!';
            $mail_body_html = $mail_recipient_name
                . ', 您好! <br><br>非常感谢您注册Regional Scrum Gathering China 2016! <br>请记住下面的订单号,您将在会议当天签到时用到它: <b>'
                . $v_oid . '</b><br><br> 此致, <br> Regional Scrum Gathering China 2016组织者<br><br><br>'
                . 'Hi, ' . $mail_recipient_name
                . '<br><br>Thank you for registering Regional Scrum Gathering China 2016! <br>Please remember your OrderNO which will be used during the conference check in: <b>'
                . $v_oid . '</b><br><br> Sincerely, <br> Regional Scrum Gathering China 2016 Organizer';
            $mail_body_plain = $mail_recipient_name
                . ', 您好! \n\n非常感谢您注册Regional Scrum Gathering China 2016! \n请记住下面的订单号,您将在会议当天签到时用到它: '
                . $v_oid . '\n\n 此致, \n Regional Scrum Gathering China 2016组织者\n\n\n'
                . 'Hi, ' . $mail_recipient_name
                . '\n\nThank you for registering Regional Scrum Gathering China 2016! \nPlease remember your OrderNO which will be used during the conference check in: '
                . $v_oid . '\n\n Sincerely, \n Regional Scrum Gathering China 2016 Organizer';

            sendMail($mail_recipient, $mail_recipient_name, $mail_subject, $mail_body_html, $mail_body_plain);

         } else {
            echo "Error: " . $sql_backconfirmation . "<br>" . $con->error;
        }
    }
} else {
    echo("error");
    echo("<br>");
}
?>
