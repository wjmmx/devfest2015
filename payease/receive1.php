<?php
session_start();
//接收返回的参数
$v_oid = $_REQUEST['v_oid'];             //支付提交时的订单编号，此时返回
$v_pstatus = $_REQUEST['v_pstatus'];     //1 待处理,20 支付成功,30 支付失败
$v_pstring = urldecode($_REQUEST['v_pstring']);   //支付结果信息返回。当v_pstatus=1时-已提交。20-支付完成。30-支付失败
$v_pmode = urldecode($_REQUEST['v_pmode']);       //支付方式。
$v_amount = $_REQUEST['v_amount'];                //订单金额
$v_moneytype = $_REQUEST['v_moneytype'];          //币种
$v_md5info = $_REQUEST['v_md5info'];
$v_md5money = $_REQUEST['v_md5money'];
$v_sign = $_REQUEST['v_sign'];

echo $v_oid."<br>";
echo $v_pstatus."<br>";
echo $v_pstring."<br>";
echo $v_pmode."<br>";
echo $v_amount."<br>";
echo $v_moneytype."<br>";
echo $v_md5info."<br>";
echo $v_md5money."<br>";
echo $v_sign."<br>";
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
	$data1=$v_oid.$v_pstatus.$v_pstring.$v_pmode;
    $md5info= hmac($key, $data1);

    $data2=$v_amount.$v_moneytype;
    $md5money= hmac($key, $data2);

if($md5info == $v_md5info && $md5money == $v_md5money)
{
    //echo("数字指纹校验成功<br>");
	$_SESSION['v_oid']=$v_oid;
	if($v_pstatus=='20')
	{
	    include("success.php");
	    //header("Location: success.php");//支付成功时返回的页面
	}
	else if($v_pstatus=='30')
	{
	     header("Location: fail.php");//支付失败时返回的页面
	}
	else
	{
	   header("Location: waiting.php");//待处理时返回的页面
	}
}
else
{
echo("数字指纹校验错误");
	
    
}

?>