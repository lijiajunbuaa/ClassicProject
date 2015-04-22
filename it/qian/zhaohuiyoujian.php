<?php


ini_set("display_errors","Off");
include_once('../Connections/conn.php');
mysql_select_db($database_conn);
header("Content-Type: text/html; charset=utf-8");
$email=trim($_POST['email']);

$sql="SELECT * FROM it_user WHERE email='$email'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
$username=$row['name'];
$password=$row['pwd'];
include_once("smtp.class.php");
$smtpsever="smtp.163.com";
$smtpseverport='25';
$smtpusermail="Tobiichi_Nagoya@163.com";
$smtpuser="Tobiichi_Nagoya@163.com";
$smtppass="liuyang7Tobiichi";
$smtp=new smtp($smtpsever,$smtpseverport,true,$smtpuser,$smtppass);
$smtp->debug = false;
$emailtype="HTML";
$smtpemailto=$email;
$smtpemailfrom=$smtpusermail;
$emailsubject="用户密码找回";
$emailbody="亲爱的".$username.":<br/>请点击链接重设您的密码。<br/>
<a href='http://localhost/it/qian/chongshemima.php?username=".$username."' target='_blank'>http://localhost/it/qian/chongshemima.php?username=".$username."</a><br/>
如果以上链接无法点击，请将她复制到您的浏览器地址栏中进行访问，该连接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/>";
$rs=$smtp->sendmail($smtpemailto,$smtpemailfrom,$emailsubject,$emailbody,$emailtype);

if($rs==1){
	$msg='<font family="微软雅黑" size=2em;">找回密码邮件发送成功！<br/>请登录到您的邮箱进行密码找回！</font>';
	}else{
	$msg=$rs;
	}

	echo $msg;