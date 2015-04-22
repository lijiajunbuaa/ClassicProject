<?php include('../Connections/conn.php');
		//include(dirname(__FILE__).'Connections/conn.php');
?>
<?php


ini_set("display_errors","Off");
mysql_select_db($database_conn);
header("Cache-Control: no-cache, must-revalidate");

$url_string=parse_url($_SERVER["REQUEST_URI"]);
$query_string=$url_string["query"];
$parameter_string=explode('=',$query_string);
$parameter_type=$parameter_string[0];
$parameter_value=$parameter_string[1];

$SQL="";
//$DONGJIE="";
switch($parameter_type)
{
	case "username":
	$SQL="SELECT * FROM it_user WHERE name='$parameter_value'";
	break;
	case "email":
	$SQL="SELECT * FROM it_user WHERE email='$parameter_value'";
	//$DONGJIE="SELECT dongjie FROM it_user WHERE email='$parameter_value'";
	break;
	case "yanzheng":
	$SQL="SELECT zhi FROM it_yanzheng WHERE tupian='$parameter_value'";
	break;
	case "denglu":
	$SQL="SELECT pwd FROM it_user WHERE name='$parameter_value'";
	break;
}

$result=mysql_query($SQL) or die(mysql_error());
$rows=mysql_num_rows($result);
       //$dongjieresult=mysql_query($DONGJIE) or die(mysql_error());
$answer="";
if($rows==1)
{
	switch($parameter_type){
		case "username":
		$answer="username_error";
		break;
		case "email":
		$answer="email_error";
		break;
		case "yanzheng":
		$answer1=mysql_fetch_array($result);
		$answer=$answer1[0];
		break;
		case "denglu":
		$answer1=mysql_fetch_array($result);
		$answer=$answer1['pwd'];
		break;
	}
} else if($rows==0){
		switch($parameter_type){
			case "username":
			$answer="username_ok";
			break;
			case "email":
			$answer="email_ok";
			break;
		}
}
echo $answer;
?>