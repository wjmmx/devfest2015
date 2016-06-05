<?php

/**
*  Server to server interface
*/

$v_oid=$_REQUEST['v_oid'];//order number
$v_pmode= urldecode($_REQUEST['v_pmode']);//payment method
$v_pstatus=$_REQUEST['v_pstatus'];//payment status
$v_pstring= urldecode($_REQUEST['v_pstring']);//payment result description
$v_amount=$_REQUEST['v_amount'];//order amount
$v_count=$_REQUEST['v_count'];//order counts
$v_moneytype=$_REQUEST['v_moneytype'];//payment currency
$v_mac=$_REQUEST['v_mac'];//v_mac
$v_md5money=$_REQUEST['v_md5money'];//v_md5money
$v_sign=$_REQUEST['v_sign'];//v_sign
//Split parameter
$sp = '|_|';
$a_oid = explode($sp, $v_oid);
$a_pmode = explode($sp, $v_pmode);
$a_pstatus = explode($sp, $v_pstatus);
$a_pstring = explode($sp, $v_pstring);
$a_amount = explode($sp, $v_amount);
$a_moneytype = explode($sp, $v_moneytype);
//MD5 validation
function hmac ($key, $data)
    {

       $b = 64;
       if (strlen($key) > $b) {
          $key = pack("H*",md5($key));
        }
        $key  = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;

        return md5($k_opad  . pack("H*",md5($k_ipad . $data)));
    }

    $key = 'test';
	$data1=$v_oid.$v_pmode.$v_pstatus.$v_pstring.$v_count;
    $mac= hmac($key, $data1);

    $data2=$v_amount.$v_moneytype;
    $md5money= hmac($key, $data2);
if($mac == $v_mac or $md5money == $v_md5money)
{
	echo("sent");

	 for($i=0;$i<$v_count;$i++)
	 {
	    include_once 'util/conn.php';
		if($a_pstatus[$i]=='1')
		{
            $v_pstatus="paid";
		}
		else if($a_pstatus[$i]=='3')
		{
            $v_pstatus="failure";
		}
		else
		{
			$v_pstatus="waiting";
		}
         $v_paymentdate=date('Y-m-d H:i:s');
         $sql_backconfirmation= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$a_oid[$i]'";

         if ($con->query($sql_backconfirmation) === TRUE) {
             echo "Order status updated successfully";
         } else {
             echo "Error: " . $sql_backconfirmation . "<br>" . $con->error;
         }
	 }
}
else
{
	echo("error");
	echo("<br>");
}
?>
