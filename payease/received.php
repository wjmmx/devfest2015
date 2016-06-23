<?php
session_start();
//receive return parameter
$v_oid = $_REQUEST['v_oid'];             //order NO
$v_pstatus = $_REQUEST['v_pstatus'];     //1 To DO, 20 Pay Success, 30 Pay failure
$v_pstring = urldecode($_REQUEST['v_pstring']);   //Payment information
$v_pmode = urldecode($_REQUEST['v_pmode']);       //Payment method
$v_amount = $_REQUEST['v_amount'];                //Order Amount
$v_moneytype = $_REQUEST['v_moneytype'];          //Payment Currency
$v_md5info = $_REQUEST['v_md5info'];
$v_md5money = $_REQUEST['v_md5money'];
$v_sign = $_REQUEST['v_sign'];
$v_email = $_REQUEST['$v_email'];
$v_attendee_name = $_REQUEST['$v_attendee_name'];

//echo $v_oid . "<br>";
//echo $v_pstatus . "<br>";
//echo $v_pstring . "<br>";
//echo $v_pmode . "<br>";
//echo $v_amount . "<br>";
//echo $v_moneytype . "<br>";
//echo $v_md5info . "<br>";
//echo $v_md5money . "<br>";
//echo $v_sign . "<br>";
//MD5 validation
function hmac($key, $data)
{
    //create md5 HMAC

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

$key = 'test';//mechandise key
$data1 = $v_oid . $v_pstatus . $v_pstring . $v_pmode;
$md5info = hmac($key, $data1);

$data2 = $v_amount . $v_moneytype;
$md5money = hmac($key, $data2);

if ($md5info == $v_md5info && $md5money == $v_md5money) {

    $_SESSION['v_oid'] = $v_oid;
    if ($v_pstatus == '20') {
        include("success.php"); //Payment success page
    } else if ($v_pstatus == '30') {
        header("Location: fail.php");//Payment failure page
    } else {
        header("Location: waiting.php");//waiting page
    }
} else {
    echo("Digits fingerprint validation failure!");
}

?>