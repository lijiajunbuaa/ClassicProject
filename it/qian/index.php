<?php require_once('../Connections/conn.php'); ?>
<?php
mysql_query("SET NAMES utf8"); 

 session_cache_limiter('private, must-revalidate');
ini_set("display_errors","Off");
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

$maxRows_NEWS1 = 9;
$pageNum_NEWS1 = 0;
if (isset($_GET['pageNum_NEWS1'])) {
  $pageNum_NEWS1 = $_GET['pageNum_NEWS1'];
}
$startRow_NEWS1 = $pageNum_NEWS1 * $maxRows_NEWS1;

mysql_select_db($database_conn, $conn);
$query_NEWS1 = "SELECT * FROM it_news WHERE type = '1' ORDER BY id DESC";
$query_limit_NEWS1 = sprintf("%s LIMIT %d, %d", $query_NEWS1, $startRow_NEWS1, $maxRows_NEWS1);
$NEWS1 = mysql_query($query_limit_NEWS1, $conn) or die(mysql_error());
$row_NEWS1 = mysql_fetch_assoc($NEWS1);

if (isset($_GET['totalRows_NEWS1'])) {
  $totalRows_NEWS1 = $_GET['totalRows_NEWS1'];
} else {
  $all_NEWS1 = mysql_query($query_NEWS1);
  $totalRows_NEWS1 = mysql_num_rows($all_NEWS1);
}
$totalPages_NEWS1 = ceil($totalRows_NEWS1/$maxRows_NEWS1)-1;

$maxRows_NEWS2 = 9;
$pageNum_NEWS2 = 0;
if (isset($_GET['pageNum_NEWS2'])) {
  $pageNum_NEWS2 = $_GET['pageNum_NEWS2'];
}
$startRow_NEWS2 = $pageNum_NEWS2 * $maxRows_NEWS2;

mysql_select_db($database_conn, $conn);
$query_NEWS2 = "SELECT * FROM it_news WHERE type = '2' ORDER BY id DESC";
$query_limit_NEWS2 = sprintf("%s LIMIT %d, %d", $query_NEWS2, $startRow_NEWS2, $maxRows_NEWS2);
$NEWS2 = mysql_query($query_limit_NEWS2, $conn) or die(mysql_error());
$row_NEWS2 = mysql_fetch_assoc($NEWS2);

if (isset($_GET['totalRows_NEWS2'])) {
  $totalRows_NEWS2 = $_GET['totalRows_NEWS2'];
} else {
  $all_NEWS2 = mysql_query($query_NEWS2);
  $totalRows_NEWS2 = mysql_num_rows($all_NEWS2);
}
$totalPages_NEWS2 = ceil($totalRows_NEWS2/$maxRows_NEWS2)-1;

$maxRows_NEWS3 = 9;
$pageNum_NEWS3 = 0;
if (isset($_GET['pageNum_NEWS3'])) {
  $pageNum_NEWS3 = $_GET['pageNum_NEWS3'];
}
$startRow_NEWS3 = $pageNum_NEWS3 * $maxRows_NEWS3;

mysql_select_db($database_conn, $conn);
$query_NEWS3 = "SELECT * FROM it_news WHERE type = '3' ORDER BY id DESC";
$query_limit_NEWS3 = sprintf("%s LIMIT %d, %d", $query_NEWS3, $startRow_NEWS3, $maxRows_NEWS3);
$NEWS3 = mysql_query($query_limit_NEWS3, $conn) or die(mysql_error());
$row_NEWS3 = mysql_fetch_assoc($NEWS3);

if (isset($_GET['totalRows_NEWS3'])) {
  $totalRows_NEWS3 = $_GET['totalRows_NEWS3'];
} else {
  $all_NEWS3 = mysql_query($query_NEWS3);
  $totalRows_NEWS3 = mysql_num_rows($all_NEWS3);
}
$totalPages_NEWS3 = ceil($totalRows_NEWS3/$maxRows_NEWS3)-1;

$maxRows_rejian = 6;
$pageNum_rejian = 0;
if (isset($_GET['pageNum_rejian'])) {
  $pageNum_rejian = $_GET['pageNum_rejian'];
}
$startRow_rejian = $pageNum_rejian * $maxRows_rejian;

mysql_select_db($database_conn, $conn);
$query_rejian = "SELECT * FROM it_rejian,it_pinpai WHERE it_rejian.xilieming=it_pinpai.xilie ORDER BY it_rejian.id";
$query_limit_rejian = sprintf("%s LIMIT %d, %d", $query_rejian, $startRow_rejian, $maxRows_rejian);
$rejian = mysql_query($query_limit_rejian, $conn) or die(mysql_error());
$row_rejian = mysql_fetch_assoc($rejian);

if (isset($_GET['totalRows_rejian'])) {
  $totalRows_rejian = $_GET['totalRows_rejian'];
} else {
  $all_rejian = mysql_query($query_rejian);
  $totalRows_rejian = mysql_num_rows($all_rejian);
}
$totalPages_rejian = ceil($totalRows_rejian/$maxRows_rejian)-1;

$maxRows_zonghepaiming = 6;
$pageNum_zonghepaiming = 0;
if (isset($_GET['pageNum_zonghepaiming'])) {
  $pageNum_zonghepaiming = $_GET['pageNum_zonghepaiming'];
}
$startRow_zonghepaiming = $pageNum_zonghepaiming * $maxRows_zonghepaiming;

mysql_select_db($database_conn, $conn);
$query_zonghepaiming = "SELECT * FROM it_pinpai ORDER BY zonghe DESC";
$query_limit_zonghepaiming = sprintf("%s LIMIT %d, %d", $query_zonghepaiming, $startRow_zonghepaiming, $maxRows_zonghepaiming);
$zonghepaiming = mysql_query($query_limit_zonghepaiming, $conn) or die(mysql_error());
$row_zonghepaiming = mysql_fetch_assoc($zonghepaiming);

if (isset($_GET['totalRows_zonghepaiming'])) {
  $totalRows_zonghepaiming = $_GET['totalRows_zonghepaiming'];
} else {
  $all_zonghepaiming = mysql_query($query_zonghepaiming);
  $totalRows_zonghepaiming = mysql_num_rows($all_zonghepaiming);
}
$totalPages_zonghepaiming = ceil($totalRows_zonghepaiming/$maxRows_zonghepaiming)-1;

$maxRows_zhoudianjiliang = 6;
$pageNum_zhoudianjiliang = 0;
if (isset($_GET['pageNum_zhoudianjiliang'])) {
  $pageNum_zhoudianjiliang = $_GET['pageNum_zhoudianjiliang'];
}
$startRow_zhoudianjiliang = $pageNum_zhoudianjiliang * $maxRows_zhoudianjiliang;

mysql_select_db($database_conn, $conn);
$query_zhoudianjiliang = "SELECT * FROM it_pinpai ORDER BY zhoudianji DESC";
$query_limit_zhoudianjiliang = sprintf("%s LIMIT %d, %d", $query_zhoudianjiliang, $startRow_zhoudianjiliang, $maxRows_zhoudianjiliang);
$zhoudianjiliang = mysql_query($query_limit_zhoudianjiliang, $conn) or die(mysql_error());
$row_zhoudianjiliang = mysql_fetch_assoc($zhoudianjiliang);

if (isset($_GET['totalRows_zhoudianjiliang'])) {
  $totalRows_zhoudianjiliang = $_GET['totalRows_zhoudianjiliang'];
} else {
  $all_zhoudianjiliang = mysql_query($query_zhoudianjiliang);
  $totalRows_zhoudianjiliang = mysql_num_rows($all_zhoudianjiliang);
}
$totalPages_zhoudianjiliang = ceil($totalRows_zhoudianjiliang/$maxRows_zhoudianjiliang)-1;

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站</title>
</head>
<?php date_default_timezone_set('Asia/Shanghai');
$TIME=date("H");
?>
<body>
<style type="text/css">
	.CENTER{margin:0 auto;width:970px;}
	.DIYIHANG{margin-bottom:10px;overflow:hidden;width:100%}
	.DIERHANG{margin-bottom:10px;overflow:hidden;width:100%;height:1450px;}
	.DISANHANG{margin-top:20px;margin-left:50px;overflow:hidden;width:100%}
	.logo{display:inline;margin:20px 10px auto auto;padding:0px;float:left;position:relative;top:10px;}
</style>
<style type="text/css">
.dingshang{margin-left:auto;margin-right:auto;position:absolute;top:5px;width:1327px;left:20px;border-left-width:0px;border-top-width:0px;border-right-width:0px;border-style:solid;border-bottom-width:1px;border-color:#AAAAAA}
.dingshang span{font-family:"微软雅黑";font-size:0.875em;}
.dingshang p{font-family:"微软雅黑";font-size:0.875em;}
.dingshang a{font-family:"微软雅黑";font-size:0.9em;color:#000}
.dingshang a:hover{text-shadow:#FFC0CB 0px 1px 0px}
.dingshang a:link{text-decoration:none;}
.dingshang a:visited{color:#000}
.dingshang .dingshang1{width:400px;position:relative;left:5%;}
.dingshang .dingshang2{width:300px;position:absolute;left:900px;top:0px}

</style>
<style type="text/css">
.searchbox{
	float:right;margin-top:109px;margin-right:123px;padding:0px;display:inline;position:relative;top:10px;
width:500px;
height:37px;
padding:0 0 0 23px;
font-family:"微软雅黑";
font-size:16px;
color:#444444;
border:10px solid red;
border-top-right-radius:10px; border-top-left-radius:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;
border-color:#00CED1;
border-bottom-width:3px;
border-top-width:3px;
border-left-width:3px;
border-right-width:3px;
outline: none;
box-shadow:1px 1px 1px #ADD8E6	;

}
.searchbox:focus{border-top-right-radius:10px; border-top-left-radius:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;
border-color:#1ECD97;
border-bottom-width:3px;
border-top-width:3px;
border-left-width:3px;
border-right-width:3px;
}
.search{
	float:right;padding:0px;display:inline;position:relative;bottom:33px;right:58px;
	text-align:center;
	font-family:"微软雅黑";font-size:16px;
	color:#444444;
width:80px;height:43px;
border:10px solid red;
background-color:#fff;
border-top-right-radius:10px; border-top-left-radius:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;
border-color:#00CED1;
border-bottom-width:3px;
border-top-width:3px;
border-left-width:3px;
border-right-width:3px;
outline: none;
box-shadow:1px 1px 1px #ADD8E6;}
.search:hover{border-color:#1ECD97;
	color:#A9A9A9}
.search:active{border-top-right-radius:10px; border-top-left-radius:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;

border-bottom-width:3px;
border-top-width:3px;
border-left-width:3px;
border-right-width:3px;

color:#77FFCC;}
</style>	
   <style type="text/css">
.artist{width:700px;position:relative;height:70px;margin:0 auto;}
.artist li{position:absolute;overflow:hidden;width:70px;height:70px}
.artist li a{background:#ff0048;filter:alpha(opacity=80);left:0px;color:#fff;font-family:'microsoft yahei';position:absolute;top:0px;opacity:.8}
.artist li a strong{line-height:2em}


.artist .a1{left:110px;top:0px}
.artist .a1 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}
.artist .a2{left:200px;top:0px}
.artist .a2 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}
.artist .a3{left:290px;top:0px}
.artist .a3 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}
.artist .a4{left:380px;top:0px}
.artist .a4 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}
.artist .a5{left:470px;top:0px}
.artist .a5 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}
.artist .a6{left:560px;top:0px}
.artist .a6 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}
.artist .a7{left:650px;top:0px}
.artist .a7 a{ text-decoration:none; text-align:center;padding-right:10px;padding-left:10px;font-size:15px;padding-bottom:10px;overflow:hidden;width:50px;padding-top:10px;height:50px}


</style>
<style type = "text/css">
        #side{ position: absolute; top: 0; left: 0; width: 20px; height: 1670px; overflow: hidden; }
    	#side_content{ position: absolute; right: 0; top: 0; height: 1670px; overflow: hidden; width: 770px; background: #ffffff; }
        #side_ctrl{ position: absolute; right: 0; top: 0; height: 1670px; width: 20px; background: #ffffff; }
        
    </style>
<div>
<!--顶上--><div class="dingshang">
	<div class="dingshang1">
<?php if(isset($_COOKIE['userJIZHU'])&&isset($_SESSION['MM_Username'])){?>

		
		<?php if($TIME<11){?>
        <span >早上好！</span>
       <?php }
        else if($TIME<13){?>
        <span>中午好！</span>
       <?php }
        else if($TIME<18){?>
        <span >下午好！</span>
       <?php  }
        else {?>
        <span >晚上好！</span>
        
       <?php }?>
        <span><?php echo stripslashes(trim($_SESSION['MM_Username'])); ?></span>
        <a href="quxiugaimima.php" target="_blank" >&nbsp;&nbsp;&nbsp;修改密码</a>
        <a href="tuichu.php" >&nbsp;&nbsp;退出</a>
        </div>
        <div class="dingshang2">
        <a href="shoucangjia.php" >收藏夹</a> 
        <span>&nbsp;&nbsp;<font color="#AAAAAA">|</font>&nbsp;&nbsp;</span>
        <a href="liuyan.php" target="_blank" >给管理员留言</a>   
<?php }?>
	</div>
	
    <div class="dingshang1">
<?php if(!isset($_COOKIE['userJIZHU'])&&isset($_SESSION['MM_Username'])){?>

		
        <?php if($TIME<11){?>
        <span>早上好！</span>
       <?php }
        else if($TIME<13){?>
        <span>中午好！</span>
       <?php }
        else if($TIME<18){?>
        <span>下午好！</span>
       <?php  }
        else {?>
        <span>晚上好！</span>
        
       <?php }?>
        <span ><?php echo stripslashes(trim($_SESSION['MM_Username'])); ?></span>
         <a href="quxiugaimima.php" target="_blank" >&nbsp;&nbsp;&nbsp;修改密码</a>
         <a href="tuichu.php">&nbsp;&nbsp;退出</a>
         </div>
  		<div class="dingshang2">
         <a href="shoucangjia.php">收藏夹</a>
         <span>&nbsp;&nbsp;<font color="#AAAAAA">|</font>&nbsp;&nbsp;</span>
         <a href="liuyan.php" target="_blank">给管理员留言</a>
<?php }?>
		</div>
        
     	<div class="dingshang1">   
<?php if(isset($_COOKIE['userJIZHU'])&&!isset($_SESSION['MM_Username'])){?>		
		<?php if($TIME<11){?>
        <span>早上好！</span>
       <?php }
        else if($TIME<13){?>
        <span>中午好！</span>
       <?php }
        else if($TIME<18){?>
        <span>下午好！</span>
       <?php  }
        else {?>
        <span>晚上好！</span>
        
       <?php }?>
        <span ><?php echo stripslashes(trim($_COOKIE['userJIZHU'])); ?></span>
        <a href="quxiugaimima.php" target="_blank">&nbsp;&nbsp;&nbsp;修改密码</a>
        <a href="tuichu.php">&nbsp;&nbsp;退出</a>
        </div>
        <div class="dingshang2">
   <a href="shoucangjia.php">收藏夹</a> 
    <span>&nbsp;&nbsp;<font color="#AAAAAA">|</font>&nbsp;&nbsp;</span>
   <a href="liuyan.php" target="_blank">给管理员留言</a>
<?php }?>
		</div>
        
        <div class="dingshang1">  
<?php if(!isset($_COOKIE['userJIZHU'])&&!isset($_SESSION['MM_Username'])){?>
        <?php if($TIME<11){?>
        <span>早上好！</span>
       <?php }
        else if($TIME<13){?>
        <span>中午好！</span>
       <?php }
        else if($TIME<18){?>
        <span>下午好！</span>
       <?php  }
        else {?>
        <span>晚上好！</span>
       <?php }?>
       </div>
       <div class="dingshang2">
        <a href="denglu.php">登陆</a>
         <span>&nbsp;&nbsp;<font color="#AAAAAA">|</font>&nbsp;&nbsp;</span>
        <a href="zhuce.php">注册</a> 
         <span>&nbsp;&nbsp;<font color="#AAAAAA">|</font>&nbsp;&nbsp;</span>
        <a href="liuyan.php" target="_blank">给管理员留言</a>
<?php }?>
		</div>
        
</div>

  		<div class="CENTER" ><!--CENTER-->  
<!--第一行--><div class="DIYIHANG">
<!--logo--><div class="logo"> <a href="index.php">
<img style="width:230px;height:170px;" src="image/sc1002181_5.jpg"/></a></div>          

	         
<!-- 大搜索框 -->

			
			<form  action="chepinpaisousuo.php" method="post" name="form2" target="_blank" id="form2">
  
  										<input name="sousuo" type="text" class="searchbox" id="sousuo" placeholder="Welcome to Wudu Yizhan! What are you looking for?" autocomplete='off'  />
 										 <input class="search" type="submit" name="sou" id="sou" value="SEARCH" />
				</form>
             	 
                 </div><!--DIYIHANG-->
                  <div style="width:990px;height:1px; background:#E0E0E0;position:relative;bottom:17px;"></div> 
<!--第二行--><div class="DIERHANG" >
<!--广告1--><div>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" >
		<param name="movie" value="guanggao1.swf" />
		<param name="quality" value="high" />
		<embed src="guanggao1.swf" width="540" height="280" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
	</object>
			<!--广告1--></div>    
<!--广告2--><div  style="position:relative;left:50px;top:10px;">            
<script type="text/javascript" src="guanggao2/swfobject.js"></script>
<SCRIPT type=text/javascript>			
			var flashvars = {};
			flashvars.xml =  "config.xml";
			var params = {};
			params.allowscriptaccess = "always";
			params.allownetworking = "all";
			params.wmode = "transparent";
			var attributes = {};
			attributes.id = "slider";
			swfobject.embedSWF("cu3er.swf", "cu3er_swf", 

"440", "200", "9", flashvars, params, attributes);
	</SCRIPT>
    <div id="cu3er_swf" style="position:relative;left:80px;">
   
	</div>
<!--广告2--></div>              
   		
  		      
 <!--右选项卡--> <link rel="stylesheet" type="text/css" href="youxuanxiangka1css/style1.css" />
<div class="container" style="position:relative;left:587px;bottom:505px;width:300px;height:400px;">
	<section class="tabs">
		<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		<label for="tab-1" class="tab-label-1">导购</label>
		<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		<label for="tab-2" class="tab-label-2">今日热荐</label>

		<div class="content">
			<div class="content-2">
            <ul style="list-style-type:none;">
             <style>.qqqq a{color:#000;text-decoration:none;border-width:1px;border-style:solid;
				border-radius:4px;
				border-color:#1ECD97;} .qqqq a:visited{color:#000;} </style>
            	
                <?php do { ?>
                  <li style="position:relative;right:62px;bottom:25px;width:380px;height:58px;">
                    <img src="tupian/<?php echo $row_rejian['xilie'];?>/flash/flowList/01.jpg" width="64" height="42">
                    
                    <span style="font-family:'微软雅黑';font-size:13px;position:relative;bottom:29px;left:2px;">总评：<?php echo $row_rejian['zonghe']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_rejian['zuidijia']?>W--<?php echo $row_rejian['zuigaojia']?>W</span>
                    
                    <br/>
                    <span class="qqqq" style="height:60px;font-family:'微软雅黑';font-size:15px;position:relative;left:70px;bottom:25px;">&nbsp;<a href="chedetail.php?che=<?php echo $row_rejian['xilie']?>" target="_blank"><?php echo $row_rejian['xilie']; ?></a><font size="2em"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< <?php echo $row_rejian['jibie']?> ></font></span>    
                    
                    <div style="width:350px;height:1px; background:#E0E0E0;position:relative;right:10px;bottom:15px;"></div> 
                  </li>
                  <?php } while ($row_rejian = mysql_fetch_assoc($rejian)); ?>
            </ul>
              </div>
			
			<div class="content-1">
				<!-- 精确搜索 -->
                <style type="text/css">
						.content-1 label{font-family:"微软雅黑";font-size:14px;}
						.content-1 .cont-2ziti{font-family:"微软雅黑";font-size:16px;position:relative;right:12px;top:2px;}
						.content-1 .cont-2ziti:hover{text-shadow:#1ECD97 0 1px 0;}
						.content-1 .cont-2ziti1:hover{text-shadow:#1ECD97 0 1px 0;}
						.content-1 .cont-2ziti1{font-family:"微软雅黑";font-size:17px;position:relative;right:12px;bottom:3px;}
						.soujiage{text-align:center;width:48px;height:18px;
						font-family:"微软雅黑";
						font-size:14px;color:#444444;
						outline:none;
						border-radius:3px;border:1px solid ;
						border-color:#1ECD97;}
						input[type="radio"]{position:relative;top:3px;
							width:15px;height:15px;
							
							-webkit-appearance:none;
							outline:none;
							border-width:40px;
							
							background:#fff;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
								input[type="radio"]:checked{position:relative;top:3px;
							width:15px;height:15px;
							
							-webkit-appearance:none;
							outline:none;
							border-width:40px;
							
							background:#1ECD97;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
						.nianxuanze{text-align:center;
						position:relative;top:4px;width:63px;height:22px;
						outline:none;
						font-family:"微软雅黑";font-size:14px;
						border-radius:3px;border:1px solid ;
						border-color:#1ECD97}
				</style>
<form action="chepinpaiJQsousuo.php" method="post" name="formn" target="_blank" id="formn">
    <div>
     <span class="cont-2ziti1" >级别:</span><br/>
        <label>
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="微型车" id="RadioGroup1_0" />
          微型车</label>
       
        <label>&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="小型车" id="RadioGroup1_1" />
          小型车</label>
      
        <label>&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="紧凑型车" id="RadioGroup1_2" />
          紧凑型车</label>
       
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="中型车" id="RadioGroup1_3" />
          中型车</label>
       
        <label>&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="中大型车" id="RadioGroup1_4" />
          中大型车</label>
       
        <label style="position:relative;left:6px;">
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="豪华车" id="RadioGroup1_5" />
          豪华车</label>
       
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="MPV" id="RadioGroup1_6" />
          MPV</label>
      
        <label style="position:relative;left:2px;">&nbsp;&nbsp;&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="SUV" id="RadioGroup1_7" />
          SUV</label>
      
        <label style="position:relative;left:1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="xiaoyuanquan" type="radio" name="RadioGroup1" value="跑车" id="RadioGroup1_8" />
          跑车</label>	
    </div>
     <div style="width:291px;height:1px; background:#E0E0E0;position:relative;top:10px;right:15px;"></div> 
    <br/><div>
   		 <span class="cont-2ziti">价格：</span>
         
          <input class="soujiage" style="position:relative;top:3px" name="zuidijia" type="text" id="zuidijia"  size="5" maxlength="7" placeholder="万元" autocomplete='off'/>
          <span style="font-family:'微软雅黑';font-size:12px;position:relative;bottom:0px;">&nbsp;←→&nbsp;</span>
          <input class="soujiage" style="position:relative;top:3px" name="zuigaojia" type="text" id="zuigaojia"  size="5" maxlength="7" placeholder="万元" autocomplete='off'/>
    </div>
     <div style="width:291px;height:1px; background:#E0E0E0;position:relative;top:14px;right:15px;"></div> 
    <br/><div style="position:relative;top:3px;">
    	 <span class="cont-2ziti">上市年份：</span>
          <label for="shangshinian"></label>
          <select class="nianxuanze" name="shangshinian" id="shangshinian" >
           <option  value="">全部</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
          </select>
    </div>
    <div style="width:291px;height:1px; background:#E0E0E0;position:relative;top:16px;right:15px;"></div> 
   <br/> <div style="position:relative;top:6px;">
    	 <span class="cont-2ziti">最注重的评价指数：</span><br/>
    	  
    	    <label style="position:relative;top:4px;">
              <input class="xiaoyuanquan" name="RadioGroup2" type="radio" id="RadioGroup2_00" value="综合" checked="checked" />
    	      综合</label>
             <label style="position:relative;top:4px;"> &nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="空间" id="RadioGroup2_0" />
    	      空间</label>
    	  
    	    <label style="position:relative;top:4px;">&nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="动力" id="RadioGroup2_1" />
    	      动力</label>
    	  
    	    <label style="position:relative;top:4px;">&nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="操控" id="RadioGroup2_2" />
    	      操控</label>
    	    
    	    <label style="position:relative;top:4px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="油耗" id="RadioGroup2_3" />
    	      油耗</label>
    	   
    	    <label style="position:relative;top:4px;">&nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="舒适" id="RadioGroup2_4" />
    	      舒适</label>
    	    
    	    <label style="position:relative;top:4px;">&nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="外观" id="RadioGroup2_5" />
    	      外观</label>
    	    
    	    <label style="position:relative;top:4px;">&nbsp;&nbsp;
    	      <input class="xiaoyuanquan" type="radio" name="RadioGroup2" value="性价比" id="RadioGroup2_6" />
    	      性价比</label>

    </div>
    <div style="width:291px;height:1px; background:#E0E0E0;position:relative;top:19px;right:15px;"></div> 
    <br/>
    
    <link rel="stylesheet" type="text/css" href="anniu/normalize.css" />
<link rel="stylesheet" type="text/css" href="anniu/component.css" />


	
		<div class="progress-button">
			<button><span>帮我找找</span></button>
			
		</div>
    
    
</form>
			</div>
			
		</div>
	</section>
</div>
 <!--新闻-->
 				<!--新闻模块--><div  style="height:480px;">
                 <div style="width:500px;height:1px; background:#E0E0E0;position:relative;bottom:390px;left:47px"></div> 
                <style type="text/css">
				.xinwen{position:relative;bottom:360px;left:32px;
				font-family:"微软雅黑";
				font-size:14px;
				color:#444444;
				
				}
				.xinwen li{
					padding-top:4px;
					list-style-type:circle;
					
					}
				.xinwen a{
					color:#000;
					text-decoration:none;}
				.xinwen a:hover{
					
					text-shadow:#FF69B4 0px 1px 0px;
					}
				.xinwen a:visited{color:#000;}
                </style>
		<div class="xinwen">
        <span style="position:relative;left:17px;font-size:16px;">最新车站信息</span><a href="xinwen.php" 

target="_blank" style="position:relative;left:358px;color:#444444;">更多>></a>
<ul>
       	<?php do { ?>
               	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS1['id']; ?>" target="_blank" ><?php echo $row_NEWS1['title']; ?> </a> <span style="float:right;position:relative;right:470px;color:#AAAAAA;"><?php echo $row_NEWS1['time'];?></span></li>
                	  <?php } while ($row_NEWS1 = mysql_fetch_assoc($NEWS1)); ?>
          </ul>
      </div>
       
			 <div class="xinwen">
             <span style="position:relative;left:17px;font-size:16px;">新车发布信息</span><a href="xinwen.php" 

target="_blank" style="position:relative;left:358px;color:#444444;">更多>></a>
<ul>
       	<?php do { ?>
               	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS2['id']; ?>" target="_blank"><?php echo $row_NEWS2['title']; ?></a><span style="float:right;position:relative;right:470px;color:#AAAAAA;"><?php echo $row_NEWS2['time'];?></span>
                    </li>
                	  <?php } while ($row_NEWS2 = mysql_fetch_assoc($NEWS2)); ?>
          </ul>
        </div>		
                  
			<div class="xinwen">
            <span style="position:relative;left:17px;font-size:16px;">概念技术创新</span><a href="xinwen.php" target="_blank"  style="position:relative;left:358px;color:#444444;">更多>></a>
<ul>
       	<?php do { ?>
               	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS3['id']; ?>" target="_blank"><?php echo $row_NEWS3['title']; ?></a><span style="float:right;position:relative;right:470px;color:#AAAAAA;"><?php echo $row_NEWS3['time'];?></span>
                    </li>
                	  <?php } while ($row_NEWS3 = mysql_fetch_assoc($NEWS3)); ?>
          </ul>
        </div>  
                        
	                     
</div>


<!--综合评分排名-->
<div style="width:333px;height:393px;position:relative;bottom:910px;left:594px;border-style:solid;border-width:1px;
border-radius:7px;border-color:#AAAAAA">

<ul style="list-style-type:none;position:relative;left:33px;top:30px;">
<span style="font-family:'微软雅黑';font-size:16px;position:relative;bottom:42px;right:63px;">综合评分排行榜</span>
<div style="width:333px;height:2px; background:#E0E0E0;position:relative;right:73px;bottom:35px;"></div> 
             <style>.qqqqq a{color:#000;text-decoration:none;border-width:1px;border-style:solid;
				border-radius:4px;
				border-color:#1ECD97;} .qqqqq a:visited{color:#000;} </style>
            	
               
                  <?php do { ?>
                    <li style="position:relative;right:62px;bottom:25px;width:380px;height:58px;">
                      <img src="tupian/<?php echo $row_zonghepaiming['xilie']?>/flash/flowList/01.jpg" width="64" height="42">
                      
                      <span style="font-family:'微软雅黑';font-size:13px;position:relative;bottom:29px;left:2px;">总评：<?php echo $row_zonghepaiming['zonghe']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_zonghepaiming['zuidijia']?>W--<?php echo $row_zonghepaiming['zuigaojia']?>W</span>
                      
                      <br/>
                      <span class="qqqqq" style="height:60px;font-family:'微软雅黑';font-size:15px;position:relative;left:70px;bottom:25px;">&nbsp;<a href="chedetail.php?che=<?php echo $row_zonghepaiming['xilie']?>" target="_blank"><?php echo $row_zonghepaiming['xilie']; ?></a><font size="2em"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< <?php echo $row_zonghepaiming['jibie']?> ></font></span>    
                      
                      <div style="width:333px;height:1px; background:#E0E0E0;position:relative;right:10px;bottom:15px;"></div> 
                      </li>
                    <?php } while ($row_zonghepaiming = mysql_fetch_assoc($zonghepaiming)); ?>
                 
            </ul>
</div>

<!--周点击量排行-->
<div style="width:333px;height:393px;position:relative;bottom:852px;left:594px;border-style:solid;border-width:1px;
border-radius:7px;border-color:#AAAAAA">

<ul style="list-style-type:none;position:relative;left:33px;top:30px;">
<span style="font-family:'微软雅黑';font-size:16px;position:relative;bottom:42px;right:63px;">一周点击量排行榜</span>
<div style="width:333px;height:2px; background:#E0E0E0;position:relative;right:73px;bottom:35px;"></div> 
             <style>.qqqqqq a{color:#000;text-decoration:none;border-width:1px;border-style:solid;
				border-radius:4px;
				border-color:#1ECD97;} .qqqqqq a:visited{color:#000;} </style>
            	
               
                 
                    <?php do { ?>
                      <li style="position:relative;right:62px;bottom:25px;width:380px;height:58px;">
                        <img src="tupian/<?php echo $row_zhoudianjiliang['xilie']?>/flash/flowList/01.jpg" width="64" height="42">
                        
                        <span style="font-family:'微软雅黑';font-size:13px;position:relative;bottom:29px;left:2px;">总评：<?php echo $row_zhoudianjiliang['zonghe']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_zhoudianjiliang['zuidijia']?>W--<?php echo $row_zhoudianjiliang['zuigaojia']?>W</span>
                        
                        <br/>
                        <span class="qqqqqq" style="height:60px;font-family:'微软雅黑';font-size:15px;position:relative;left:70px;bottom:25px;">&nbsp;<a href="chedetail.php?che=<?php echo $row_zhoudianjiliang['xilie']?>" target="_blank"><?php echo $row_zhoudianjiliang['xilie']; ?></a><font size="2em"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< <?php echo $row_zhoudianjiliang['jibie']?> > </font></span>    
                        
                        <div style="width:333px;height:1px; background:#E0E0E0;position:relative;right:10px;bottom:15px;"></div> 
                        </li>
                      <?php } while ($row_zhoudianjiliang = mysql_fetch_assoc($zhoudianjiliang)); ?>
                   
                 
            </ul>
</div>


        
        
        <div style="height:40px;">
        <div style="width:990px;height:1px; background:#E0E0E0;position:relative;bottom:800px;"></div> 
        <span style="font-family:'微软雅黑';font-size:13px;color:#AAAAAA;position:relative;bottom:777px;left:270px;">Copyright © 2014 WUDUYIZHAN.COM. All Rights Reserved.</span>
        </div>
        
        
        
        
        
<!--第二行--></div>              
<!--CENTER--></div>     
</div>               
<!--左边--> <!-- |||左边||| -->   

   <div style="z-index:111110"> 
	
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#side_ctrl").click(function(){
                if($("#side").hasClass("open")){
                    $("#side").animate({width:"20px"}).removeClass("open");
					document.getElementById("hhh").innerHTML="&nbsp;>";
                }else{
                    $("#side").animate({width:"770px"}).addClass("open");
					document.getElementById("hhh").innerHTML="&nbsp;<";
                }
            });
        });
    </script>
    
    </div>
    
   
    <div id="side">
      <div id="side_content">   <!-- 内容 -->
        	
         
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function chan1(){
	document.getElementById("xiaokuang").style.background="#48D1CC";
}
function chan2(){
	document.getElementById("xiaokuang").style.background="#AFEEEE";
}
$(document).ready(function(){

	$('.artist li').each(function(){
		
		$(this).find('.cover').css('top', -$(this).height());
		
		$(this).hover(function(){
			$(this).find('.cover').animate({
				'top': '0'
			},300);
		},function(){
			$(this).find('.cover').animate({
				'top':$(this).height()
			},{
				duration: 300,
				complete:function(){
					$(this).css('top', -$(this).parent('li').height())
				}
			});
		});
		
	});
	
});
</script>

		<!--A--><div><img width="50" height="50" src="image/A.png" style="position:absolute;top:15px;left:0px"/></div>
    	<div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
<div style="position:relative;top:0px;width:770px;height:1px; background:#E0E0E0;"></div>
<ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/A1.jpg" />
		<a href="chepinpai.php?PINPAI=1" target="_blank" class="cover">阿斯顿·马丁</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/A2.jpg" />
		<a href="chepinpai.php?PINPAI=2" target="_blank" class="cover">阿尔法·罗密欧</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/A3.jpg" />
		<a href="chepinpai.php?PINPAI=3" target="_blank" class="cover">奥迪</a>
	</li>
   
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
		 	
           <!--B--> <div><img width="50" height="50" src="image/B.png" style="position:absolute;top:85px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
<ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/B1.jpg" />
		<a href="chepinpai.php?PINPAI=4" target="_blank" class="cover">宝马</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/B2.jpg" />
		<a href="chepinpai.php?PINPAI=5" target="_blank" class="cover">保时捷</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/B3.jpg" />
		<a href="chepinpai.php?PINPAI=6" target="_blank" class="cover">北汽</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/B4.jpg" />
		<a href="chepinpai.php?PINPAI=7" target="_blank" class="cover">奔驰</a>
	</li>
      <li class="a5">
		<img width="70" height="70" src="image/chepinpai/B5.jpg" />
		<a href="chepinpai.php?PINPAI=8" target="_blank" class="cover">奔腾</a>
	</li>
      <li class="a6">
		<img width="70" height="70" src="image/chepinpai/B6.jpg" />
		<a href="chepinpai.php?PINPAI=9" target="_blank" class="cover">本田</a>
	</li>
    <li class="a7">
		<img width="70" height="70" src="image/chepinpai/B7.jpg" />
		<a href="chepinpai.php?PINPAI=10" target="_blank" class="cover">比亚迪</a>
	</li>
   
</ul>
<div style="width:770px;height:1px; background:#E0E0E0;"></div>
<ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/B8.jpg" />
		<a href="chepinpai.php?PINPAI=11" target="_blank" class="cover">标致</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/B9.jpg" />
		<a href="chepinpai.php?PINPAI=12" target="_blank" class="cover">别克</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/B10.jpg" />
		<a href="chepinpai.php?PINPAI=13" target="_blank" class="cover">宾利</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/B11.jpg" />
		<a href="chepinpai.php?PINPAI=14" target="_blank" class="cover">布嘉迪</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            <!--C-->
            <div><img width="50" height="50" src="image/C.png" style="position:absolute;top:230px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/C1.jpg" />
		<a href="chepinpai.php?PINPAI=15" target="_blank" class="cover">昌河</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/C2.jpg" />
		<a href="chepinpai.php?PINPAI=16" target="_blank" class="cover">长安</a>
	</li>
     <li class="a3">
		<img width="70" height="50" style="margin-top:10px" src="image/chepinpai/C3.jpg" />
		<a href="chepinpai.php?PINPAI=17" target="_blank" class="cover">长城</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/C4.jpg" />
		<a href="chepinpai.php?PINPAI=18" target="_blank" class="cover">长丰</a>
	</li>
     <li class="a5">
		<img width="70" height="70" src="image/chepinpai/C5.jpg" />
		<a href="chepinpai.php?PINPAI=19" target="_blank" class="cover">川汽野马</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            
            <!--D-->
            <div><img width="50" height="50" src="image/D.png" style="position:absolute;top:300px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/D1.jpg" />
		<a href="chepinpai.php?PINPAI=20" target="_blank" class="cover">大发</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/D2.jpg" />
		<a href="chepinpai.php?PINPAI=21" target="_blank" class="cover">大众</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/D3.jpg" />
		<a href="chepinpai.php?PINPAI=22" target="_blank" class="cover">道奇</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/D4.jpg" />
		<a href="chepinpai.php?PINPAI=23" target="_blank" class="cover">帝豪</a>
	</li>
    <li class="a5">
    	<img width="60" height="60" style="margin-top:5px;margin-left:5px" src="image/chepinpai/D5.jpg" />
		<a href="chepinpai.php?PINPAI=24" target="_blank" class="cover">东风</a>
	</li>
    <li class="a6">
    	<img width="70" height="70" src="image/chepinpai/D6.jpg" />
		<a href="chepinpai.php?PINPAI=25" target="_blank" class="cover">东风风神</a>
	</li>
    <li class="a7">
    	<img width="70" height="70" src="image/chepinpai/D7.jpg" />
		<a href="chepinpai.php?PINPAI=26" target="_blank" class="cover">东南</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            <!--F-->            <div><img width="50" height="50" src="image/F.png" style="position:absolute;top:370px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/F1.jpg" />
		<a href="chepinpai.php?PINPAI=27" target="_blank" class="cover">法拉利</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/F2.jpg" />
		<a href="chepinpai.php?PINPAI=28" target="_blank" class="cover">飞碟</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/F3.jpg" />
		<a href="chepinpai.php?PINPAI=29" target="_blank" class="cover">菲亚特</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/F4.jpg" />
		<a href="chepinpai.php?PINPAI=30" target="_blank" class="cover">丰田</a>
	</li>
       <li class="a5">
		<img width="70" height="70" src="image/chepinpai/F5.jpg" />
		<a href="chepinpai.php?PINPAI=31" target="_blank" class="cover">福特</a>
	</li>
       <li class="a6">
		<img width="60" height="60" style="margin-top:5px;margin-left:5px" src="image/chepinpai/F6.jpg" />
		<a href="chepinpai.php?PINPAI=32" target="_blank" class="cover">福田</a>
	</li>
    
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            
            <!--G-->
                        <div><img width="50" height="50" src="image/G.png" style="position:absolute;top:445px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/G1.jpg" />
		<a href="chepinpai.php?PINPAI=33" target="_blank" class="cover">广汽</a>
	</li>
  
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            
            <!--H-->
                 <div><img width="50" height="50" src="image/H.png" style="position:absolute;top:515px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/H1.jpg" />
		<a href="chepinpai.php?PINPAI=34" target="_blank" class="cover">哈飞</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/H2.jpg" />
		<a href="chepinpai.php?PINPAI=35" target="_blank" class="cover">海马</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/H3.jpg" />
		<a href="chepinpai.php?PINPAI=36" target="_blank" class="cover">悍马</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/H4.jpg" />
		<a href="chepinpai.php?PINPAI=37" target="_blank" class="cover">红旗</a>
	</li>
       <li class="a5">
		<img width="70" height="70" src="image/chepinpai/H5.jpg" />
		<a href="chepinpai.php?PINPAI=38" target="_blank" class="cover">华普</a>
	</li>
       <li class="a6">
		<img width="70" height="70" src="image/chepinpai/H6.jpg" />
		<a href="chepinpai.php?PINPAI=39" target="_blank" class="cover">华泰</a>
	</li>
    <li class="a7">
		<img width="70" height="70" src="image/chepinpai/H7.jpg" />
		<a href="chepinpai.php?PINPAI=40" target="_blank" class="cover">黄海</a>
	</li>
    
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            
            <!--J-->
                 <div><img width="50" height="50" src="image/J.png" style="position:absolute;top:590px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/J1.jpg" />
		<a href="chepinpai.php?PINPAI=41" target="_blank" class="cover">吉奥</a>
	</li>
    <li class="a2">
		<img width="70" height="50" style="margin-top:10px" src="image/chepinpai/J2.jpg" />
		<a href="chepinpai.php?PINPAI=42" target="_blank" class="cover">吉利</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/J3.jpg" />
		<a href="chepinpai.php?PINPAI=43" target="_blank" class="cover">吉普</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/J4.jpg" />
		<a href="chepinpai.php?PINPAI=44" target="_blank" class="cover">江淮</a>
	</li>
       <li class="a5">
		<img width="70" height="70" src="image/chepinpai/J5.jpg" />
		<a href="chepinpai.php?PINPAI=45" target="_blank" class="cover">捷豹</a>
	</li>
       <li class="a6">
		<img width="70" height="70" src="image/chepinpai/J6.jpg" />
		<a href="chepinpai.php?PINPAI=46" target="_blank" class="cover">金杯</a>
	</li>   
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            
            <!--K-->
                 <div><img width="50" height="50" src="image/K.png" style="position:absolute;top:660px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/K1.jpg" />
		<a href="chepinpai.php?PINPAI=48" target="_blank" class="cover">开瑞</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/K2.jpg" />
		<a href="chepinpai.php?PINPAI=49" target="_blank" class="cover">凯迪拉克</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/K3.jpg" />
		<a href="chepinpai.php?PINPAI=50" target="_blank" class="cover">柯尼赛格</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/K4.jpg" />
		<a href="chepinpai.php?PINPAI=51" target="_blank" class="cover">克莱斯勒</a>
	</li>  
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            
              <!--L-->
            <div><img width="50" height="50" src="image/L.png" style="position:absolute;top:730px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/L1.jpg" />
		<a href="chepinpai.php?PINPAI=52" target="_blank" class="cover">兰博基尼</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/L2.jpg" />
		<a href="chepinpai.php?PINPAI=53" target="_blank" class="cover">劳斯莱斯</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/L3.jpg" />
		<a href="chepinpai.php?PINPAI=54" target="_blank" class="cover">雷克萨斯</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/L4.jpg" />
		<a href="chepinpai.php?PINPAI=55" target="_blank" class="cover">雷诺</a>
	</li>
    <li class="a5">
    	<img width="70" height="70" src="image/chepinpai/L5.jpg" />
		<a href="chepinpai.php?PINPAI=56" target="_blank" class="cover">力帆</a>
	</li>
    <li class="a6">
    	<img width="70" height="70" src="image/chepinpai/L6.jpg" />
		<a href="chepinpai.php?PINPAI=57" target="_blank" class="cover">莲花</a>
	</li>
    <li class="a7">
    	<img width="70" height="70" src="image/chepinpai/L7.jpg" />
		<a href="chepinpai.php?PINPAI=58" target="_blank" class="cover">莲花汽车</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/L8.jpg" />
		<a href="chepinpai.php?PINPAI=59" target="_blank" class="cover">林肯</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/L9.jpg" />
		<a href="chepinpai.php?PINPAI=60" target="_blank" class="cover">铃木</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/L10.jpg" />
		<a href="chepinpai.php?PINPAI=61" target="_blank" class="cover">陆风</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/L11.jpg" />
		<a href="chepinpai.php?PINPAI=62" target="_blank" class="cover">路虎</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
             <!--M-->
            <div><img width="50" height="50" src="image/M.png" style="position:absolute;top:875px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/M1.jpg" />
		<a href="chepinpai.php?PINPAI=63" target="_blank" class="cover">MG</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/M2.jpg" />
		<a href="chepinpai.php?PINPAI=64" target="_blank" class="cover">马自达</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/M3.jpg" />
		<a href="chepinpai.php?PINPAI=65" target="_blank" class="cover">玛莎拉蒂</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/M4.jpg" />
		<a href="chepinpai.php?PINPAI=66" target="_blank" class="cover">迈巴赫</a>
	</li>
    <li class="a5">
    	<img width="70" height="70" src="image/chepinpai/M5.jpg" />
		<a href="chepinpai.php?PINPAI=67" target="_blank" class="cover">迷你MINI</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
             <!--O-->
            <div><img width="50" height="50" src="image/O.png" style="position:absolute;top:945px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/O1.jpg" />
		<a href="chepinpai.php?PINPAI=68" target="_blank" class="cover">讴歌</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/O2.jpg" />
		<a href="chepinpai.php?PINPAI=69" target="_blank" class="cover">欧宝</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
 <!--P-->
            <div><img width="50" height="50" src="image/P.png" style="position:absolute;top:1020px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/P1.jpg" />
		<a href="chepinpai.php?PINPAI=70" target="_blank" class="cover">帕加尼</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
              <!--Q-->
            <div><img width="50" height="50" src="image/Q.png" style="position:absolute;top:1090px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/Q1.jpg" />
		<a href="chepinpai.php?PINPAI=71" target="_blank" class="cover">奇瑞</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/Q2.jpg" />
		<a href="chepinpai.php?PINPAI=72" target="_blank" class="cover">起亚</a>
	</li>
    <li class="a3">
		<img width="70" height="70" src="image/chepinpai/Q3.jpg" />
		<a href="chepinpai.php?PINPAI=73" target="_blank" class="cover">全球鹰</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
  <!--R-->
            <div><img width="50" height="50" src="image/R.png" style="position:absolute;top:1165px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/R1.jpg" />
		<a href="chepinpai.php?PINPAI=74" target="_blank" class="cover">日产</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/R2.jpg" />
		<a href="chepinpai.php?PINPAI=75" target="_blank" class="cover">荣威</a>
	</li>
    <li class="a3">
		<img width="70" height="70" src="image/chepinpai/R3.jpg" />
		<a href="chepinpai.php?PINPAI=76" target="_blank" class="cover">瑞麟</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
              <!--S-->
            <div><img width="50" height="50" src="image/S.png" style="position:absolute;top:1235px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/Jsmart.jpg" />
		<a href="chepinpai.php?PINPAI=47" target="_blank" class="cover">SMART</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/S1.jpg" />
		<a href="chepinpai.php?PINPAI=77" target="_blank" class="cover">萨博</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/S2.jpg" />
		<a href="chepinpai.php?PINPAI=78" target="_blank" class="cover">三菱</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/S3.jpg" />
		<a href="chepinpai.php?PINPAI=79" target="_blank" class="cover">世爵</a>
	</li>
    <li class="a5">
    	<img width="70" height="70" src="image/chepinpai/S4.jpg" />
		<a href="chepinpai.php?PINPAI=80" target="_blank" class="cover">双环</a>
	</li>
    <li class="a6">
    	<img width="70" height="70" src="image/chepinpai/S6.jpg" />
		<a href="chepinpai.php?PINPAI=81" target="_blank" class="cover">斯巴鲁</a>
	</li>
    <li class="a7">
    	<img width="70" height="70" src="image/chepinpai/S7.jpg" />
		<a href="chepinpai.php?PINPAI=82" target="_blank" class="cover">斯柯达</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/S5.jpg" />
		<a href="chepinpai.php?PINPAI=97" target="_blank" class="cover">双龙</a>
	</li>
</ul>
    <div style="width:770px;height:1px; background:#E0E0E0;"></div>
            <!--W-->
            <div><img width="50" height="50" src="image/W.png" style="position:absolute;top:1380px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/W1.jpg" />
		<a href="chepinpai.php?PINPAI=83" target="_blank" class="cover">威兹曼</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/W2.jpg" />
		<a href="chepinpai.php?PINPAI=84" target="_blank" class="cover">威麟</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/W3.jpg" />
		<a href="chepinpai.php?PINPAI=85" target="_blank" class="cover">沃尔沃</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/W4.jpg" />
		<a href="chepinpai.php?PINPAI=86" target="_blank" class="cover">五菱汽车</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div>
             <!--X-->
            <div><img width="50" height="50" src="image/X.png" style="position:absolute;top:1450px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/X1.jpg" />
		<a href="chepinpai.php?PINPAI=87" target="_blank" class="cover">现代</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/X2.jpg" />
		<a href="chepinpai.php?PINPAI=88" target="_blank" class="cover">雪佛兰</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/X3.jpg" />
		<a href="chepinpai.php?PINPAI=89" target="_blank" class="cover">雪铁龙</a>
	</li>
     <li class="a4">
		<img width="70" height="70" src="image/chepinpai/X4.jpg" />
		<a href="chepinpai.php?PINPAI=90" target="_blank" class="cover">西亚特</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div> 
              <!--Y-->
            <div><img width="50" height="50" src="image/Y.png" style="position:absolute;top:1525px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/Y1.jpg" />
		<a href="chepinpai.php?PINPAI=91" target="_blank" class="cover">一汽</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/Y2.jpg" />
		<a href="chepinpai.php?PINPAI=92" target="_blank" class="cover">英菲尼迪</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/Y3.jpg" />
		<a href="chepinpai.php?PINPAI=93" target="_blank" class="cover">英伦</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div> 
            <!--Z-->
            <div><img width="50" height="50" src="image/Z.png" style="position:absolute;top:1595px;left:0px"/></div>	
            <div style="position:relative;top:38px;left:60px;width:20px;height:1px; background:#E0E0E0;"></div>
            <ul class="artist">
	
	<li class="a1">
		<img width="70" height="70" src="image/chepinpai/Z1.jpg" />
		<a href="chepinpai.php?PINPAI=94" target="_blank" class="cover">中华</a>
	</li>
    <li class="a2">
		<img width="70" height="70" src="image/chepinpai/Z2.jpg" />
		<a href="chepinpai.php?PINPAI=95" target="_blank" class="cover">中兴</a>
	</li>
     <li class="a3">
		<img width="70" height="70" src="image/chepinpai/Z3.jpg" />
		<a href="chepinpai.php?PINPAI=96" target="_blank" class="cover">众泰</a>
	</li>
</ul>
 <div style="width:770px;height:1px; background:#E0E0E0;"></div> 
            
            
            
         <!--!!!!!!!!-->   
        </div>
        <div id="side_ctrl" onmouseover="chan1()" onmouseout="chan2()"> 
        
        		<div id="xiaokuang" style=" cursor:pointer;width:20px;height:100px;background:	#AFEEEE;position:fixed;top:35%;">
                 <span id="hhh" style="position:relative;top:34%;font-family:'microsoft yahei';font-size:18px;text-shadow:#999 1px 0px 1px;color:#778899">&nbsp;></span>
                </div>
       
        </div>
      
    </div>
<!--对比悬浮框-->
<style type="text/css">
.duibi{position:absolute;top:60px;left:1240px;
width:70px;height:70px;
border-style:solid;
text-decoration:none;
border-width:1px;
border-color:#1ECD97;
text-align:center;}
</style>
    
    <a href="duibi.php" target="_blank"><div class="duibi"><span style="font-family:'微软雅黑';font-size:16px;color:#AAAAAA;position:relative;top:14px;">进入对比<br/>VS</span></div></a> 
    
</body>
</html>
<?php
mysql_free_result($NEWS1);

mysql_free_result($NEWS2);

mysql_free_result($NEWS3);

mysql_free_result($rejian);

mysql_free_result($zonghepaiming);

mysql_free_result($zhoudianjiliang);
?>
