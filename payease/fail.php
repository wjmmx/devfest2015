<?php session_start();
$v_oid=$_SESSION['v_oid'];


/*
     第一步：更新数据库状态
*/


include_once 'util/conn.php';
$v_pstatus="支付失败";
$v_paymentdate=date('Y-m-d H:i:s');
$sql= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";
$result = mysql_query ( $sql );



/*
     第二步：通过数据库查询客户的姓名和邮箱
*/


$sql1="select v_rcvname,v_email from payeaseinfo where v_oid='$v_oid'";
$result1 = mysql_query ( $sql1 );
while($row = mysql_fetch_array($result1))
{
   $v_rcvname=$row['v_rcvname'];
   $v_email=$row['v_email'];
}
echo $v_rcvname."您好，欢迎到本网站购物<br>您的个人订单信息如下——>><br>订单编号：".$v_oid."<br>支付状态：支付失败<br>";

?>
