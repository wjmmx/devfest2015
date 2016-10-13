<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SCRUM GATHERING CHINA 2016 - Find My QR Code</title>
</head>

<?php
$urlRelativeFilePath = 'qrcode/'.$_GET['key'].'.png';
?>

<body>
<p style="font-size:56px;align=" center"">
<?php if (!file_exists($urlRelativeFilePath)){
    echo '您给的密钥有问题，小弟也帮不了您了。<br><br>据说找江湖传说中的光头博士管用。。。';
} else {
    echo '<img src="'.$urlRelativeFilePath.'" />';
} ?>

</body>
</html>