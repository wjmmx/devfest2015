<?php session_start();
$v_oid=$_SESSION['v_oid'];
//echo "$v_oid<br>";


/*
     ��һ�����������ݿ�״̬
*/
include_once 'util/conn.php';
$v_pstatus="֧���ɹ�";
$v_paymentdate=date('Y-m-d H:i:s');
//echo "$v_paymentdate<br>";
$sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";
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


?>
