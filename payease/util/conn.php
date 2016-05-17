<?php
$con=mysql_connect('localhost','root','123') or die(mysql_error());
mysql_select_db('payease',$con);
mysql_query('set names gb2312',$con);
?>