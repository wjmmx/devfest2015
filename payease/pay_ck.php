<?php
/**
	��ҳ������������֧���ύҳ�档�ӿ��ĵ��ĵ�һ���֡���һ��13����Щ���������ó������档���Ų���ȡ�����ߵ�������Ϣ
*/
	$v_ymd=date('Ymd'); //�����������ڣ�Ҫ�󶩵����ڸ�ʽyyyymmdd.
	$v_mid="7007";    //�̻���ţ�������ǩԼ����,���Ե��̻����444
	$v_date=date('His');
	$v_oid=$v_ymd .'-' . $v_mid . '-' .$v_date; //������š�������ŵĸ�ʽ��yyyymmdd-�̻����-��ˮ�ţ���ˮ�ſ���ȡϵͳ��ǰʱ�䣬Ҳ����ȡ�������Ҳ�����̻��Լ�����Ķ����ţ��Լ�����Ķ����ű��뱣֤ÿ?���ύ����������Ψһ��??
	$v_rcvname=$_POST['v_rcvname']; //�ջ�������,�������̻���Ŵ��������Ӣ�����֡���Ϊ����ƽ̨�ı����gb2312��
	$v_rcvaddr=$_POST['v_rcvaddr']; //�ջ��˵�ַ�������̻���Ŵ���
	$v_rcvtel=$_POST['v_rcvtel'];   //�ջ��˵绰
	$v_rcvpost=$_POST['v_rcvpost'];  //�ջ�������
	$v_amount=$_POST['v_amount']; //�������
	$v_orderstatus="1";//���״̬:0-δ���룬1-����
	$v_ordername=$v_rcvname;  //����������
	$v_moneytype="0";  //0Ϊ����ң�1Ϊ��Ԫ��2ΪŷԪ��3ΪӢ����4Ϊ��Ԫ��5Ϊ��Ԫ��6Ϊ�Ĵ�����Ԫ��7Ϊ¬��(�ڿ��̻�����ֻ��Ϊ�����)
	$v_url="http://localhost/payease/receive1.php"; //֧����ɺ��ʵʱ���ص�ַ��֧����ɺ�ʵʱ���������ַ������?�ڴ˵��������������з��ص�֧��ȷ����Ϣ?��ϸ�ķ��ز�����ʽ��(�ӿ��ĵ��ĵڶ����ֻ��ߴ���ʾ����received1.php)
	//echo $v_oid."<br>";
	//echo $v_amount."<br>";
	//echo $v_rcvname."<br>";
	//echo $v_rcvaddr."<br>";
	//echo $v_rcvtel."<br>";
	//echo $v_rcvpost."<br>";
	
	//v_md5info�ļ���
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
    $data = $v_moneytype.$v_ymd.$v_amount.$v_rcvname.$v_oid.$v_mid.$v_url;//�߸�������ƴ��
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

//���ݿ⴦����payeaseinfo�������һ������
	$v_email=$_POST['v_email'];//�����û��������ַ�����ڲ������ݿ�
    $v_orderdate=date('Y-m-d H:i:s');
	$insertdate="0000-00-00 00:00:00";
    $v_pstatus="δ֧��";
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
	   $message="�ظ������ύ������ϵ��վ";
	   include 'pay.php';
    }
    else
    {
	if($v_moneytype==0)
	{
	  $v_moneytype="�����";
	 // echo $v_moneytype."<br>";
	}
	$result=mysql_query("insert into payeaseinfo (v_oid,v_orderdate,v_paymentdate,v_amount,v_moneytype,v_pstatus,v_rcvname,v_rcvaddr,v_rcvtel,v_rcvpost,v_email) value ('$v_oid','$v_orderdate','$insertdate','$v_amount','$v_moneytype','$v_pstatus','$v_rcvname','$v_rcvaddr','$v_rcvtel','$v_rcvpost','$v_email')");
    /*
	if($result)
	{
	   echo '����ɹ�';
	}
	else
	{
	  echo '����ʧ��';
	}*/
	}
?>
