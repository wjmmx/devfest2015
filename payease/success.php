<?php session_start();
$v_oid=$_SESSION['v_oid'];
//echo "$v_oid<br>";


/*
     第一步：更新数据库状态
*/
include_once 'util/conn.php';
$v_pstatus="支付成功";
$v_paymentdate=date('Y-m-d H:i:s');
//echo "$v_paymentdate<br>";
$sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";
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


?>
