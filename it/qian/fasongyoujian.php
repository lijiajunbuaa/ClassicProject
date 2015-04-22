<?php


ini_set("display_errors","Off");
include_once('../Connections/conn.php');
mysql_select_db($database_conn);
header("Content-Type: text/html; charset=utf-8");
$username = stripslashes(trim($_POST['username'])); 
$password=md5(trim($_POST['password']));
$email=trim($_POST['email']);
$dongjie=trim($_POST['dongjie']);
$addtime=trim($_POST['addtime']);
$token=md5($username.$password.$addtime);


$sql="INSERT INTO it_user (name,pwd,email,token,addtime,dongjie) VALUES ('$username','$password','$email','$token','$addtime','$dongjie')";
mysql_query($sql) or die(mysql_error());


if(mysql_insert_id()){
	include_once("smtp.class.php");
	//echo   "                  hahahaah";
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
$emailsubject="用户账号激活";
$emailbody="亲爱的".$username.":<br/>感谢您在本站注册了新的账号。<br/>请点击链接激活您的账号。<br/>
<a href='http://localhost/it/qian/youxiangyanzheng.php?verify=".$token."' target='_blank'>http://localhost/it/qian/youxiangyanzheng.php?verify=".$token."</a><br/>
如果以上链接无法点击，请将她复制到您的浏览器地址栏中进行访问，该连接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/>";
$rs=$smtp->sendmail($smtpemailto,$smtpemailfrom,$emailsubject,$emailbody,$emailtype);

if($rs==1){
	$msg='<font family="微软雅黑" size=2em;">恭喜您，注册成功！<br/>请登录到您的邮箱进行账号验证！</font>';
	}else{
	$msg=$rs;
	}
}
	echo $msg;
?>