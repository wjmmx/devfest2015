<?php

/**
*  这是接口文档的第三部分。它是服务器对服务器的，可以防止实时返回漏单（断网、电，客户关闭银行返回的页面）
*  针对接口第二部分有接收不到的情况
*/

//接收返回的参数
$v_oid=$_REQUEST['v_oid'];//订单编号组
$v_pmode= urldecode($_REQUEST['v_pmode']);//支付方式组
$v_pstatus=$_REQUEST['v_pstatus'];//支付状态组
$v_pstring= urldecode($_REQUEST['v_pstring']);//支付结果说明
$v_amount=$_REQUEST['v_amount'];//订单支付金额
$v_count=$_REQUEST['v_count'];//订单个数
$v_moneytype=$_REQUEST['v_moneytype'];//订单支付币种
$v_mac=$_REQUEST['v_mac'];//数字指纹（v_mac）
$v_md5money=$_REQUEST['v_md5money'];//数字指纹（v_md5money）
$v_sign=$_REQUEST['v_sign'];//验证商城数据签名（v_sign）
//拆分参数
$sp = '|_|';
$a_oid = explode($sp, $v_oid);
$a_pmode = explode($sp, $v_pmode);
$a_pstatus = explode($sp, $v_pstatus);
$a_pstring = explode($sp, $v_pstring);
$a_amount = explode($sp, $v_amount);
$a_moneytype = explode($sp, $v_moneytype);
//MD5校验
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
	$data1=$v_oid.$v_pmode.$v_pstatus.$v_pstring.$v_count;
    $mac= hmac($key, $data1);

    $data2=$v_amount.$v_moneytype;
    $md5money= hmac($key, $data2);
if($mac == $v_mac or $md5money == $v_md5money)
{
	echo("sent");
	//更改数据库状态
	//通过for循环查看该笔通知有几笔订单,并对于更改数据库状态
	 for($i=0;$i<$v_count;$i++)
	 {
	    include_once 'util/conn.php';
		if($a_pstatus[$i]=='1')
		{
            $v_pstatus="支付成功";
		    $v_paymentdate=date('Y-m-d H:i:s');
            $sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$a_oid[$i]'";
            $result = mysql_query ( $sql );
			/*
		    if($result)
            {
               echo "数据库更新成功<br>";
            }
            else
            {
               echo "数据库无操作<br>";
            }
		    */
		}
		else if($a_pstatus[$i]=='3')
		{
            $v_pstatus="支付失败";
		    $v_paymentdate=date('Y-m-d H:i:s');
            $sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$a_oid[$i]'";
            $result = mysql_query ( $sql );
		}
		else
		{
			$v_pstatus="待处理";
		    $v_paymentdate=date('Y-m-d H:i:s');
            $sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$a_oid[$i]'";
            $result = mysql_query ( $sql );
		}
		
	 }
}
else
{
	echo("error");
	echo("<br>");
}
?>
