<?php require_once('../Connections/conn.php'); ?>

<?php 

	mysql_select_db($database_conn, $conn);
	mysql_query("update it_pinpai set zhoudianji=0");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
周点击量已清零
</body>
</html>