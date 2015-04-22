<?php include('../Connections/conn.php');
		//include(dirname(__FILE__).'Connections/conn.php');
?>
<?php


 session_start();?>
<?php date_default_timezone_set('Asia/Shanghai');
$TIME=date('Y-m-d H:i:s',time());
?>
<?php
ini_set("display_errors","Off");
mysql_select_db($database_conn);
header("Cache-Control: no-cache, must-revalidate");

$id=$_GET['id'];

if(isset($_COOKIE['userJIZHU'])){$user=stripslashes(trim($_COOKIE['userJIZHU']));}
if(isset($_SESSION['MM_Username'])){$user=stripslashes(trim($_SESSION['MM_Username']));}

mysql_select_db($database_conn);
$sq="select carid from it_shoucangjia where user='$user' and carid='$id'";
$result=mysql_query($sq) or die(mysql_error());
$rows=mysql_num_rows($result);
		if($rows==1){
			echo "yitianjia";
			}

 else if($rows==0){
$sql="insert into it_shoucangjia (user,carid,shijian) values ('$user','$id','$TIME')";
mysql_query($sql) or die(mysql_error());
if(mysql_insert_id()){
echo "shoucangchenggong";
}
}
?>