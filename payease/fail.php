<?php session_start();
$v_oid=$_SESSION['v_oid'];


/*
     ��һ�����������ݿ�״̬
*/


include_once 'util/conn.php';
$v_pstatus="֧��ʧ��";
$v_paymentdate=date('Y-m-d H:i:s');
$sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";
$result = mysql_query ( $sql );



/*
     �ڶ�����ͨ�����ݿ��ѯ�ͻ�������������
*/


$sql1="select v_rcvname,v_email from payeaseinfo where v_oid='$v_oid'";
$result1 = mysql_query ( $sql1 );
while($row = mysql_fetch_array($result1))
{
   $v_rcvname=$row['v_rcvname'];
   $v_email=$row['v_email'];
}
echo $v_rcvname."���ã���ӭ������վ����<br>���ĸ��˶�����Ϣ���¡���>><br>������ţ�".$v_oid."<br>֧��״̬��֧��ʧ��<br>";

?>
