<?php

/**
*  ���ǽӿ��ĵ��ĵ������֡����Ƿ������Է������ģ����Է�ֹʵʱ����©�����������磬�ͻ��ر����з��ص�ҳ�棩
*  ��Խӿڵڶ������н��ղ��������
*/

//���շ��صĲ���
$v_oid=$_REQUEST['v_oid'];//���������
$v_pmode= urldecode($_REQUEST['v_pmode']);//֧����ʽ��
$v_pstatus=$_REQUEST['v_pstatus'];//֧��״̬��
$v_pstring= urldecode($_REQUEST['v_pstring']);//֧�����˵��
$v_amount=$_REQUEST['v_amount'];//����֧�����
$v_count=$_REQUEST['v_count'];//��������
$v_moneytype=$_REQUEST['v_moneytype'];//����֧������
$v_mac=$_REQUEST['v_mac'];//����ָ�ƣ�v_mac��
$v_md5money=$_REQUEST['v_md5money'];//����ָ�ƣ�v_md5money��
$v_sign=$_REQUEST['v_sign'];//��֤�̳�����ǩ����v_sign��
//��ֲ���
$sp = '|_|';
$a_oid = explode($sp, $v_oid);
$a_pmode = explode($sp, $v_pmode);
$a_pstatus = explode($sp, $v_pstatus);
$a_pstring = explode($sp, $v_pstring);
$a_amount = explode($sp, $v_amount);
$a_moneytype = explode($sp, $v_moneytype);
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
	$data1=$v_oid.$v_pmode.$v_pstatus.$v_pstring.$v_count;
    $mac= hmac($key, $data1);

    $data2=$v_amount.$v_moneytype;
    $md5money= hmac($key, $data2);
if($mac == $v_mac or $md5money == $v_md5money)
{
	echo("sent");
	//�������ݿ�״̬
	//ͨ��forѭ���鿴�ñ�֪ͨ�м��ʶ���,�����ڸ������ݿ�״̬
	 for($i=0;$i<$v_count;$i++)
	 {
	    include_once 'util/conn.php';
		if($a_pstatus[$i]=='1')
		{
            $v_pstatus="֧���ɹ�";
		    $v_paymentdate=date('Y-m-d H:i:s');
            $sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$a_oid[$i]'";
            $result = mysql_query ( $sql );
			/*
		    if($result)
            {
               echo "���ݿ���³ɹ�<br>";
            }
            else
            {
               echo "���ݿ��޲���<br>";
            }
		    */
		}
		else if($a_pstatus[$i]=='3')
		{
            $v_pstatus="֧��ʧ��";
		    $v_paymentdate=date('Y-m-d H:i:s');
            $sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$a_oid[$i]'";
            $result = mysql_query ( $sql );
		}
		else
		{
			$v_pstatus="������";
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
