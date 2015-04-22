<?php 


ini_set("display_errors","Off");
include_once("../Connections/conn.php");
header("Content-Type: text/html; charset=utf-8");

$username=stripslashes(trim($_POST['username']));
$password=md5(trim($_POST['password']));
$query=mysql_query("select id from it_user where name='$username'");
$row=mysql_fetch_array($query);
if($row){
	mysql_query("update it_user set pwd='$password' where id=".$row['id']);
	if(mysql_affected_rows()!=1) die(0);
	$msg='密码修改成功！';
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
<title>雾都驿站-修改成功</title>
</head>

<body>
<?php
header("refresh:2;url=http://localhost/it/qian/denglu.php");
?>
现在为您跳转到登陆界面
<p><a style="font-family:'微软雅黑';font-size:14px;" href="denglu.php">如果你的浏览器没有反应请点击这里</a></p>
</body>
</html>