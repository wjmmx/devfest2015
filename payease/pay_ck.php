<?php
/**
	submit to payease
*/
    include_once 'util/conn.php';

    $v_payment = $_POST['v_payment'];
    $v_payment_currency = $_POST['v_payment_currency'];
    $v_payment_interface = "https://pay.yizhifubj.com/prs/user_payment.checkit";

    if ($v_payment === "pay_online") {
        if ($v_payment_currency === "pay_dollar") {
            $v_payment_interface = "https://pay.yizhifubj.com/prs/e_user_payment.checkit";
        }
    }

    $v_promotion_code = $_POST['v_promotion_code'];

    $v_attendee_name = $_POST['v_rcvname'];

    $v_ymd=date('Ymd'); //Order Date yyyymmdd.
	$v_mid="82370001";    //Merchandise ID
	$v_date=date('His');
	$v_oid=$v_ymd .'-' . $v_mid . '-' .$v_date; //OrderNO
	$v_rcvname=$v_mid; //Use Merchandise ID
	$v_rcvaddr=$v_mid; //Use Merchandise ID
	$v_rcvtel=$_POST['v_rcvtel'];   //Telephone
	$v_rcvpost="310000";  //postcode
	$v_amount=$_POST['v_amount']; //Order Amount
	$v_orderstatus="1";//Order status: 0-Not Ready 1-Ready
	$v_ordername="RSGChina2016";  //people name who placed the order
	$v_moneytype="0";  //0: RMB; 1: Dollar; 2: Europe;
	$v_url=$domain_name . "/payease/receive1.php"; //the return URL

	//v_md5info calculation
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

    $key = 'test';//Merchandise' key
    $data = $v_moneytype.$v_ymd.$v_amount.$v_rcvname.$v_oid.$v_mid.$v_url;//Concat the 7 parameters
    $v_md5info=hmac($key, $data);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>send</title>

</head>
<body>
<form action="<?php echo $v_payment_interface ?>" method="post" name="payease_form" target="_parent">
	  <input type="hidden"  name="v_mid"        value="<?php echo $v_mid ?>">              
      <input type="hidden"  name="v_oid"      value="<?php echo $v_oid ?>">               
      <input type="hidden"  name="v_rcvname"  value="<?php echo $v_rcvname ?>"> 
      <input type="hidden"  name="v_rcvaddr"  value="<?php echo $v_rcvaddr ?>">       
      <input type="hidden"  name="v_rcvtel"   value="<?php echo $v_rcvtel ?>">        
      <input type="hidden"  name="v_rcvpost"  value="<?php echo $v_rcvpost ?>">   
      <input type="hidden"  name="v_amount"   value="<?php echo $v_amount ?>">       
      <input type="hidden"  name="v_ymd"      value="<?php echo $v_ymd ?>">        
      <input type="hidden"  name="v_orderstatus" value="<?php echo $v_orderstatus ?>"> 
      <input type="hidden"  name="v_ordername" value="<?php echo $v_ordername ?>">
      <input type="hidden"  name="v_moneytype" value="<?php echo $v_moneytype ?>">     
      <input type="hidden"  name="v_url" value="<?php echo $v_url ?>">         
      <input type="hidden"  name="v_md5info" value="<?php echo $v_md5info ?>">
</form>
<script language="javascript">payease_form.submit();</script>
</body>
</html>
<?php

//Insert a record into DB
$v_email = $_POST['v_email'];//User's email address
$v_orderdate = date('Y-m-d H:i:s');
$insertdate = date('Y-m-d H:i:s');
$v_pstatus = "NotPaid";

//echo $v_payment  . "<br>";
//echo $v_payment_currency . "<br>";
//echo $v_payment_interface . "<br>";
//echo $v_mid  . "<br>";
//echo $v_oid  . "<br>";
//echo $v_attendee_name  . "<br>";
//echo $v_rcvaddr  . "<br>";
//echo $v_rcvtel  . "<br>";
//echo $v_rcvpost  . "<br>";
//echo $v_amount  . "<br>";
//echo $v_ymd  . "<br>";
//echo $v_orderstatus  . "<br>";
//echo $v_ordername  . "<br>";
//echo $v_moneytype  . "<br>";
//echo $v_url  . "<br>";
//echo $v_md5info  . "<br>";




$sql = "select * from payeaseinfo where v_oid='$v_oid'";

$result = $con->query($sql);
$count = $result->num_rows;

echo $count . "<br>";

if ($count == 1) {
    $message = "You've submitted same order twice! Please contact with Conference Organizer";
    include 'register.php';
} else {
    if ($v_moneytype == 0) {
        $v_moneytype = "人民币";
        // echo $v_moneytype."<br>";
    }

    $sql1 = "INSERT INTO payeaseinfo (v_oid,v_orderdate,v_paymentdate,v_amount,v_moneytype,v_pstatus,v_rcvname,v_rcvaddr,v_rcvtel,v_rcvpost,v_email,v_promotion) VALUES ('$v_oid','$v_orderdate','$insertdate','$v_amount','$v_moneytype','$v_pstatus','$v_attendee_name','$v_rcvaddr','$v_rcvtel','$v_rcvpost','$v_email','$v_promotion_code')";

    if ($con->query($sql1) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql1 . "<br>" . $con->error;
    }

    $con->close();
//
//    $con->commit();
//
//    printf("Affected rows (INSERT): %d\n", $con->affected_rows);
//
//    echo $con->host_info . "<br>";
    //echo $con->init();
//    if (!$result = $con->query($sql1)) {
//
//        echo "Database error! Please contact Conference Organizer" . "<br>";
//    }

}
?>
