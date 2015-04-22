<?php 


include_once("../Connections/conn.php");
header("Content-Type: text/html; charset=utf-8");

$verify=stripslashes(trim($_GET['verify']));

$query=mysql_query("select id from it_user where dongjie='0' and token='$verify'");
$row=mysql_fetch_array($query);
if($row){
	mysql_query("update it_user set dongjie='1' where id=".$row['id']);
	if(mysql_affected_rows()!=1) die(0);
	$msg='注册成功！';
	header("refresh:2;url=http://localhost/it/qian/denglu.php");
}
else{
	$msg='error';
}
echo $msg;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-注册成功</title>
</head>

<body>

<p><a style="font-family:'微软雅黑';font-size:14px;" href="denglu.php">如果你的浏览器没有反应请点击这里</a></p>
</body>
</html>