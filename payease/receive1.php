<?php
session_start();
//���շ��صĲ���
$v_oid = $_REQUEST['v_oid'];             //֧���ύʱ�Ķ�����ţ���ʱ����
$v_pstatus = $_REQUEST['v_pstatus'];     //1 ������,20 ֧���ɹ�,30 ֧��ʧ��
$v_pstring = urldecode($_REQUEST['v_pstring']);   //֧�������Ϣ���ء���v_pstatus=1ʱ-���ύ��20-֧����ɡ�30-֧��ʧ��
$v_pmode = urldecode($_REQUEST['v_pmode']);       //֧����ʽ��
$v_amount = $_REQUEST['v_amount'];                //�������
$v_moneytype = $_REQUEST['v_moneytype'];          //����
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
//MD5У��
function hmac ($key, $data)
    {
     // ���� md5��HMAC

       $b = 64; // md5�����ֽڳ���
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

    $key = 'test';//�̻�����Կ
	$data1=$v_oid.$v_pstatus.$v_pstring.$v_pmode;
    $md5info= hmac($key, $data1);

    $data2=$v_amount.$v_moneytype;
    $md5money= hmac($key, $data2);

if($md5info == $v_md5info && $md5money == $v_md5money)
{
    //echo("����ָ��У��ɹ�<br>");
	$_SESSION['v_oid']=$v_oid;
	if($v_pstatus=='20')
	{
	    include("success.php");
	    //header("Location: success.php");//֧���ɹ�ʱ���ص�ҳ��
	}
	else if($v_pstatus=='30')
	{
	     header("Location: fail.php");//֧��ʧ��ʱ���ص�ҳ��
	}
	else
	{
	   header("Location: waiting.php");//������ʱ���ص�ҳ��
	}
}
else
{
echo("����ָ��У�����");
	
    
}

?>