<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单页面</title>
<script type="text/javascript">
window.onload=function(){
	var form=document.getElementById('form');
	var v_rcvname=document.getElementById('v_rcvname');
	var v_amount=document.getElementById('v_amount');
	var v_rcvaddr=document.getElementById('v_rcvaddr');
	var v_rcvtel=document.getElementById('v_rcvtel');
	var v_rcvpost=document.getElementById('v_rcvpost');
	var v_email=document.getElementById('v_email');
	form.onsubmit=function(){
		if(v_rcvname.value=='')
		{
			alert('客户姓名不能为空');
			return false;
		}
		if(v_amount.value=='')
		{
			alert('订单金额不能为空');
			return false;
		}
		if(v_rcvaddr.value=='')
		{
			alert('客户地址不能为空');
			return false;
		}
		if(v_rcvtel.value=='')
		{
			alert('客户电话不能为空');
			return false;
		}
		if(v_rcvpost.value=='')
		{
			alert('客户邮编不能为空');
			return false;
		}
		if(v_email.value=='')
		{
			alert('客户邮箱不能为空');
			return false;
		}
		return true;
		};
};
</script>
</head>
<body>
<table width="400" border="1" align="center">
<form action="pay_ck.php" method="post" id="form">
    <tr>
    	<td colspan="2" align="center">订单相关信息填写</td>
    </tr>
    <tr>
        <td width="31%"><div align="right">客户姓名:</div></td>
        <td width="69%"><input type="text" name="v_rcvname" id="v_rcvname"/></td>
    </tr>
    <tr>
        <td width="31%"><div align="right">订单金额:</div></td>
        <td width="69%"><input type="text" name="v_amount" id="v_amount"/></td>
    </tr>
    <tr>
        <td width="31%"><div align="right">客户地址:</div></td>
        <td width="69%"><input type="text" name="v_rcvaddr" id="v_rcvaddr"/></td>
    </tr>
	<tr>
        <td width="31%"><div align="right">客户电话:</div></td>
        <td width="69%"><input type="text" name="v_rcvtel" id="v_rcvtel"/></td>
    </tr>
	<tr>
        <td width="31%"><div align="right">客户邮编:</div></td>
        <td width="69%"><input type="text" name="v_rcvpost" id="v_rcvpost"/></td>
    </tr>
		<tr>
        <td width="31%"><div align="right">客户邮箱:</div></td>
        <td width="69%"><input type="text" name="v_email" id="v_email"/></td>
    </tr>
    <tr>
        <td colspan="2" align="right">
             <input type="submit" name="submit" value="提交"/>
			
        </td>
    </form>
  </table>
</body>
</html>
