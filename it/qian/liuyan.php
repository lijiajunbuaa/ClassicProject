<?php require_once('../Connections/conn.php'); ?>
<?php
mysql_query("SET NAMES utf8"); 

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO it_message (`user`, zhuti, content, `time`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString($_POST['zhuti'], "text"),
                       GetSQLValueString($_POST['neirong'], "text"),
                       GetSQLValueString($_POST['time'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "liuyanchenggong.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 ini_set("display_erros","Off"); ?>
<?php date_default_timezone_set('Asia/Shanghai');
$TIME=date('Y-m-d H:i:s',time());
?>
<?php 
session_start();
	$user="";
	if(isset($_COOKIE['userJIZHU'])){$user=$_COOKIE['userJIZHU'];}
	if(isset($_SESSION['MM_Username'])){$user=$_SESSION['MM_Username'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-留言</title>
</head>

<body>
<style type="text/css">
.liuyan1{text-align:center;margin:0 auto; width:470px;height:417px; position:relative;top:30px;
border-style:solid;
				border-width:1px;
				border-radius:7px;
				border-color:#1ECD97
}
.liuyan1 input[type='text']{
					font-size:14px;
					font-family:"微软雅黑";
					padding:0 0 0 10px;
					position:relative;top:10px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
					.liuyan1 textarea{
						font-size:16px;
						font-family:"微软雅黑";
					padding:0 0 0 10px;
					position:relative;top:25px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:420px;height:300px;
					resize:none;}
					.liuyan1 input[type='submit']{
							width:80px;height:30px;	
							position:relative;top:40px;						
							-webkit-appearance:none;
							border-style:solid;
							border-width:2px;
							border-color:#1ECD97;
							border-radius:20px;
							background-color:#fff;
							outline:none;}
							.liuyan1 input[type='submit']:hover{
								background-color:#1ECD97;}
</style>
<div class="liuyan1">
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
		<div>
		 	<div>
		  <input autocomplete='off' placeholder="请输入主题" type="text" name="zhuti" id="zhuti" />
			<input name="user" type="hidden" id="user" value="<?php echo $user;?>" />
		 	<input name="time" type="hidden" id="time" value="<?php echo $TIME;?>" />
		 	</div>
            
       	  <div>
          <textarea name="neirong" id="neirong" cols="45" rows="5"></textarea> 
       	  </div>
          
         	 <div>
		 <input type="submit" name="tijiao" id="tijiao" value="发送" />
			</div>
		</div>
		<input type="hidden" name="MM_insert" value="form1" />
</form>
</div>
</body>
</html>