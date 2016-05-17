<?php
/**
	此页面是向首信易支付提交页面。接口文档的第一部分。表单一共13项有些参数可以用常量代替。首信不提取消费者的敏感信息
*/
	$v_ymd=date('Ymd'); //订单产生日期，要求订单日期格式yyyymmdd.
	$v_mid="7007";    //商户编号，和首信签约后获得,测试的商户编号444
	$v_date=date('His');
	$v_oid=$v_ymd .'-' . $v_mid . '-' .$v_date; //订单编号。订单编号的格式是yyyymmdd-商户编号-流水号，流水号可以取系统当前时间，也可以取随机数，也可以商户自己定义的订单号，自己定义的订单号必须保证每?次提交，订单号是唯一的??
	$v_rcvname=$_POST['v_rcvname']; //收货人姓名,建议用商户编号代替或者是英文数字。因为首信平台的编号是gb2312的
	$v_rcvaddr=$_POST['v_rcvaddr']; //收货人地址，可用商户编号代替
	$v_rcvtel=$_POST['v_rcvtel'];   //收货人电话
	$v_rcvpost=$_POST['v_rcvpost'];  //收货人邮箱
	$v_amount=$_POST['v_amount']; //订单金额
	$v_orderstatus="1";//配货状态:0-未配齐，1-已配
	$v_ordername=$v_rcvname;  //订货人姓名
	$v_moneytype="0";  //0为人民币，1为美元，2为欧元，3为英镑，4为日元，5为韩元，6为澳大利亚元，7为卢布(内卡商户币种只能为人民币)
	$v_url="http://localhost/payease/receive1.php"; //支付完成后的实时返回地址。支付完成后实时先向这个地址做返回?在此地囿下做接收银行返回的支付确认消息?详细的返回参数格式西(接口文档的第二部分或者代码示例的received1.php)
	//echo $v_oid."<br>";
	//echo $v_amount."<br>";
	//echo $v_rcvname."<br>";
	//echo $v_rcvaddr."<br>";
	//echo $v_rcvtel."<br>";
	//echo $v_rcvpost."<br>";
	
	//v_md5info的计算
	function hmac ($key, $data)
    {
     // 创建 md5的HMAC

       $b = 64; // md5加密字节长度
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

    $key = 'test';//商户的密钥
    $data = $v_moneytype.$v_ymd.$v_amount.$v_rcvname.$v_oid.$v_mid.$v_url;//七个参数的拼串
    $v_md5info=hmac($key, $data);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>send</title>

</head>
<body>
<form action="https://pay.yizhifubj.com/customer/i18n/i18n_raw_order3_0.jsp" method="post" name="payease_form" target="_parent">
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

//数据库处理，在payeaseinfo表里插入一条数据
	$v_email=$_POST['v_email'];//接收用户的邮箱地址，用于插入数据库
    $v_orderdate=date('Y-m-d H:i:s');
	$insertdate="0000-00-00 00:00:00";
    $v_pstatus="未支付";
    //echo $v_email."<br>";
	//echo $v_orderdate."<br>";
	//echo $insertdate."<br>";
	//echo $v_pstatus."<br>";
    include_once 'util/conn.php';
    $sql= "select * from payeaseinfo where v_oid='$v_oid'";
    $result = mysql_query ( $sql );
    $count = mysql_num_rows ( $result );
    if($count==1)
    {
	   $message="重复订单提交，请联系网站";
	   include 'pay.php';
    }
    else
    {
	if($v_moneytype==0)
	{
	  $v_moneytype="人民币";
	 // echo $v_moneytype."<br>";
	}
	$result=mysql_query("insert into payeaseinfo (v_oid,v_orderdate,v_paymentdate,v_amount,v_moneytype,v_pstatus,v_rcvname,v_rcvaddr,v_rcvtel,v_rcvpost,v_email) value ('$v_oid','$v_orderdate','$insertdate','$v_amount','$v_moneytype','$v_pstatus','$v_rcvname','$v_rcvaddr','$v_rcvtel','$v_rcvpost','$v_email')");
    /*
	if($result)
	{
	   echo '插入成功';
	}
	else
	{
	  echo '插入失败';
	}*/
	}
?>
