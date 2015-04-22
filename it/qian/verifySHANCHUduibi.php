<?php include('../Connections/conn.php');
		//include(dirname(__FILE__).'Connections/conn.php');
?>
<?php 


session_start();?>

<?php
ini_set("display_errors","Off");
mysql_select_db($database_conn);
header("Cache-Control: no-cache, must-revalidate");

$user=$_GET['user'];
$carid=$_GET['carid'];
echo $user;
echo $carid;
mysql_query("delete from it_duibi where user='$user' and carid='$carid'");
echo "shanchu";
?>