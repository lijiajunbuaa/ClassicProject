<?php require_once('../Connections/conn.php'); ?>
<?php 

mysql_query("SET NAMES utf8"); 
 session_cache_limiter('private, must-revalidate');
ini_set("display_errors","Off");
if(isset($_COOKIE['userJIZHU'])){$user=stripslashes(trim($_COOKIE['userJIZHU']));}
if(isset($_SESSION['MM_Username'])){$user=stripslashes(trim($_SESSION['MM_Username']));}
?>
<?php
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT it_car.*,it_pinpai.jibie FROM it_car,it_duibi,it_pinpai WHERE it_duibi.carid=it_car.id and it_duibi.user='$user' and it_car.车型=it_pinpai.xilie";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT it_car.*,it_pinpai.jibie,it_duibi.* FROM it_car,it_duibi,it_pinpai WHERE it_duibi.carid=it_car.id and it_duibi.user='$user' and it_car.车型=it_pinpai.xilie";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-汽车信息对比</title>
</head>
<?php date_default_timezone_set('Asia/Shanghai');
$TIME=date("H");
?>
<body>

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
    
   <div class="duibi"><span style="font-family:'微软雅黑';font-size:16px;color:#AAAAAA;position:relative;top:4px;">已添加对比数<br/><font color="#990033"><strong><?php echo $totalRows_Recordset1 ?></strong></font> 个</span></div>
    
    
   
    
<style type="text/css">
	.CENTER{margin:0 auto;width:970px;}
	.DIYIHANG{margin-bottom:10px;overflow:hidden;width:100%}
	.DIERHANG{margin-bottom:10px;overflow:hidden;width:100%;}
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
         <div style="width:990px;height:1px; background:#AAAAAA;position:relative;top:1px;right:40px"></div> 
</div>

<div class="CENTER" ><!--CENTER-->  
<!--第一行--><div class="DIYIHANG">
<!--logo--><div class="logo"> <a href="index.php"><img style="width:230px;height:170px;" src="image/sc1002181_5.jpg"/></a></div>          

	         
<!-- 大搜索框 -->
				
			
			<form  action="chepinpaisousuo.php" method="post" name="form2" target="_blank" id="form2">
  
  										<input name="sousuo" type="text" class="searchbox" id="sousuo" placeholder="Welcome to Wudu Yizhan! What are you looking for?" autocomplete='off'  />
 										 <input class="search" type="submit" name="sou" id="sou" value="SEARCH" />
				</form>
             	 
                 </div><!--DIYIHANG-->
                 
                 <div style="width:990px;height:1px; background:#E0E0E0;position:relative;bottom:17px;"></div> 
                 
                 
                 
                 

 
 
  
    
   
 
    
<div>
    <style>

.wrap {
	position:relative;left:5px;
 width:980px; 

}
.md-head{height:33px;
	position:relative;left:330px;top:3px;
	text-align:center;
	width:300px;
	 border-style:solid;
 border-radius:7px;
 border-width:1px;
 border-color:#1ECD97;}
.a10 {font-family:"微软雅黑";
	color:#000;
font-size:18px; 
text-decoration:none; 
}
.a10:hover{ text-shadow:#1ECD97 0px 1px 0px;
	}
.a10:after{ text-shadow:#1ECD97 0px 1px 0px;}
.canshu{
	position:relative;
	right:265px;
	top:22px;}
.xiangmu tr{height:28px;
font-family:"微软雅黑";
font-size:13px;
	}
	.xiangmu td{width:202px;text-align:right;}
</style>


<DIV class="wrap" id=divspacerank>
     <DIV  class="md-head" id=blogs_spacerank>
     <A style="position:relative;top:3px;" class="a10" id=blogs_spacerank_tab_0 hideFocus onClick="blogs_spacerank_ck(0);return false;" href="javascript:;">详细参数对比</A>
     
    
     </DIV>
     <DIV class=md-body>
          <DIV id=blogs_spacerank_0>
               <!--详细参数列表-->
               
               
               
<div class="canshu" style="width:10000px">
<style type="text/css">
table{border-collapse:collapse;}
table td{border:1px solid #ddd;}
</style>
<div style="float:left; margin-left:250px; white-space:nowrap;overflow: hidden;display:inline-block;">
<table class="xiangmu">
  <tr>
    <td height="73px;">
    </td>
  </tr>
  <tr>
    <td>厂商指导价</td>
  </tr>
  <tr>
    <td id="can1" style="border-right-width:0px;"><div align="left" id="jibencanshu" name="jibencanshu"><strong>基本参数</strong></div></td>
  </tr>
  <tr>
    <td>厂商</td>
  </tr>
  <tr>
    <td>级别</td>
  </tr>
  <tr>
    <td>发动机</td>
  </tr>
  <tr>
    <td>变速箱</td>
  </tr>
  <tr>
    <td>长*宽*高</td>
  </tr>
  <tr>
    <td>车身结构</td>
  </tr>
  <tr>
    <td>最高车速（km/h）</td>
  </tr>
  <tr>
    <td>官方0-100km/h加速（s）</td>
  </tr>
  <tr>
    <td>实测0-100km/h加速（s）</td>
  </tr>
  <tr>
    <td>实测100-0km/h制动（s）</td>
  </tr>
  <tr>
    <td>实测油耗（L/100km）</td>
  </tr>
  <tr>
    <td>工信部综合油耗（L/100km）</td>
  </tr>
  <tr>
    <td>整车质保</td>
  </tr>
  <tr>
   <td id="can2" style="border-right-width:0px;"><div align="left" id="cheshen" name="cheshen"><strong>车身</strong></div></td>
  </tr>
  <tr>
    <td>长度（mm）</td>
  </tr>
  <tr>
    <td>宽度（mm）</td>
  </tr>
  <tr>
    <td>高度（mm）</td>
  </tr>
  <tr>
    <td>轴距（mm）</td>
  </tr>
  <tr>
    <td>前轮距（mm）</td>
  </tr>
  <tr>
    <td>后轮距（mm）</td>
  </tr>
  <tr>
    <td>最小离地间隙（mm）</td>
  </tr>
  <tr>
    <td>整备质量（kg）</td>
  </tr>
  <tr>
    <td>车身结构</td>
  </tr>
  <tr>
    <td>车门数（个）</td>
  </tr>
  <tr>
    <td>座位数（个）</td>
  </tr>
  <tr>
    <td>油箱容积（L）</td>
  </tr>
  <tr>
    <td>行李箱容积（L）</td>
  </tr>
  <tr>
    <td id="can3" style="border-right-width:0px;"><div align="left" id="fadongji" name="fadongji"><strong>发动机</strong></div></td>
  </tr>
  <tr>
    <td>发动机型号</td>
  </tr>
  <tr>
    <td>排量（mL）</td>
  </tr>
  <tr>
    <td>进气形式</td>
  </tr>
  <tr>
    <td>气缸数（个）</td>
  </tr>
  <tr>
    <td>每缸气门数（个）</td>
  </tr>
  <tr>
    <td>压缩比</td>
  </tr>
  <tr>
    <td>配气结构</td>
  </tr>
  <tr>
    <td>缸径（mm）</td>
  </tr>
  <tr>
    <td>行程（mm）</td>
  </tr>
  <tr>
    <td>最大马力（Ps）</td>
  </tr>
  <tr>
    <td>最大功率（kW）</td>
  </tr>
  <tr>
    <td>最大功率转速（rpm）</td>
  </tr>
  <tr>
    <td>最大扭矩（N·m）</td>
  </tr>
  <tr>
    <td>最大扭矩转速（rpm）</td>
  </tr>
  <tr>
    <td>发动机特有技术</td>
  </tr>
  <tr>
    <td>燃料形式</td>
  </tr>
  <tr>
    <td>燃油标号</td>
  </tr>
  <tr>
    <td>供油方式</td>
  </tr>
  <tr>
    <td>缸盖材料</td>
  </tr>
  <tr>
    <td>缸体材料</td>
  </tr>
  <tr>
    <td>环保标准</td>
  </tr>
  <tr>
    <td id="can4" style="border-right-width:0px;"><div align="left" id="diandongji" name="diandongji"><strong>电动机</strong></div></td>
  </tr>
  <tr>
    <td>电动机最大功率（kW）</td>
  </tr>
  <tr>
    <td>电动机最大扭矩（N·m）</td>
  </tr>
  <tr>
    <td>电池支持最高续航里程（km）</td>
  </tr>
  <tr>
    <td>电池容量（kWh）</td>
  </tr>
  <tr>
    <td id="can5" style="border-right-width:0px;"><div align="left" id="biansuxiang" name="biansuxiang"><strong>变速箱</strong></div></td>
  </tr>
  <tr>
    <td>简称</td>
  </tr>
  <tr>
    <td>挡位个数</td>
  </tr>
  <tr>
    <td>变速箱类型</td>
  </tr>
  <tr>
   <td id="can6" style="border-right-width:0px;"><div align="left" id="dipanzhuanxiang" name="dipanzhuanxiang"><strong>底盘转向</strong></div></td>
  </tr>
  <tr>
    <td>驱动方式</td>
  </tr>
  <tr>
    <td>四驱形式</td>
  </tr>
  <tr>
    <td>中央差速器结构</td>
  </tr>
  <tr>
    <td>前悬架类型</td>
  </tr>
  <tr>
    <td>后悬架类型</td>
  </tr>
  <tr>
    <td>助力类型</td>
  </tr>
  <tr>
    <td>车体结构</td>
  </tr>
  <tr>
     <td id="can7" style="border-right-width:0px;"><div align="left" id="chelunzhidong" name="chelunzhidong"><strong>车轮制动</strong></div></td>
  </tr>
  <tr>
    <td>前制动器类型</td>
  </tr>
  <tr>
    <td>后制动器类型</td>
  </tr>
  <tr>
    <td>驻车制动类型</td>
  </tr>
  <tr>
    <td>前轮胎规格</td>
  </tr>
  <tr>
    <td>后轮胎规格</td>
  </tr>
  <tr>
    <td>备胎规格</td>
  </tr>
  <tr>
     <td id="can8" style="border-right-width:0px;"><div align="left" id="anquanzhuangbei" name="anquanzhuangbei"><strong>安全装备</strong></div></td>
  </tr>
  <tr>
    <td>主/副驾驶座安全气囊</td>
  </tr>
  <tr>
    <td>前/后排侧气囊</td>
  </tr>
  <tr>
    <td>前/后排头部气囊（气帘）</td>
  </tr>
  <tr>
    <td>膝部气囊</td>
  </tr>
  <tr>
    <td>胎压监测装置</td>
  </tr>
  <tr>
    <td>零胎压继续行驶</td>
  </tr>
  <tr>
    <td>安全带未系提示</td>
  </tr>
  <tr>
    <td>ISOFIX儿童座椅接口</td>
  </tr>
  <tr>
    <td>发动机电子防盗</td>
  </tr>
  <tr>
    <td>车内中控锁</td>
  </tr>
  <tr>
    <td>遥控钥匙</td>
  </tr>
  <tr>
    <td>无钥匙启动系统</td>
  </tr>
  <tr>
    <td>无钥匙进入系统</td>
  </tr>
  <tr>
     <td id="can9" style="border-right-width:0px;"><div align="left" id="caokongpeizhi" name="caokongpeizhi"><strong>操控配置</strong></div></td>
  </tr>
  <tr>
    <td>ABS防抱死</td>
  </tr>
  <tr>
    <td>制动力分配（EBD/CBC等）</td>
  </tr>
  <tr>
    <td>刹车辅助（EBA/BAS/BA等）</td>
  </tr>
  <tr>
    <td>牵引力控制（ASR/TCS/TRC等）</td>
  </tr>
  <tr>
    <td>车身稳定控制（ESC/ESP/DSC等）</td>
  </tr>
  <tr>
    <td>自动驻车/上坡辅助</td>
  </tr>
  <tr>
    <td>陡坡缓降</td>
  </tr>
  <tr>
    <td>可变悬架</td>
  </tr>
  <tr>
    <td>空气悬架</td>
  </tr>
  <tr>
    <td>可变转向比</td>
  </tr>
  <tr>
    <td>前桥限滑差速器/差速锁</td>
  </tr>
  <tr>
    <td>中央差速器锁止功能</td>
  </tr>
  <tr>
    <td>后桥限滑差速器/差速锁</td>
  </tr>
  <tr>
    <td id="can10"  style="border-right-width:0px;"><div align="left" id="waibupeizhi" name="waibupeizhi"><strong>外部配置</strong></div></td>
  </tr>
  <tr>
    <td>电动天窗</td>
  </tr>
  <tr>
    <td>全景天窗</td>
  </tr>
  <tr>
    <td>运动外观套件</td>
  </tr>
  <tr>
    <td>铝合金轮圈</td>
  </tr>
  <tr>
    <td>电动吸合门</td>
  </tr>
  <tr>
    <td>侧滑门</td>
  </tr>
  <tr>
    <td>电动后备厢</td>
  </tr>
  <tr>
    <td id="can11" style="border-right-width:0px;"><div align="left" id="neibupeizhi" name="neibupeizhi"><strong>内部配置</strong></div></td>
  </tr>
  <tr>
    <td>真皮方向盘</td>
  </tr>
  <tr>
    <td>方向盘调节</td>
  </tr>
  <tr>
    <td>方向盘电动调节</td>
  </tr>
  <tr>
    <td>多功能方向盘</td>
  </tr>
  <tr>
    <td>方向盘换挡</td>
  </tr>
  <tr>
    <td>方向盘加热</td>
  </tr>
  <tr>
    <td>定速巡航</td>
  </tr>
  <tr>
    <td>前/后驻车雷达</td>
  </tr>
  <tr>
    <td>倒车视频影像</td>
  </tr>
  <tr>
    <td>行车电脑显示屏</td>
  </tr>
  <tr>
    <td>HUD抬头数字显示</td>
  </tr>
  <tr>
     <td id="can12" style="border-right-width:0px;"><div align="left" id="zuoyipeizhi" name="zuoyipeizhi"><strong>座椅配置</strong></div></td>
  </tr>
  <tr>
    <td>真皮/仿皮座椅</td>
  </tr>
  <tr>
    <td>运动风格座椅</td>
  </tr>
  <tr>
    <td>座椅高低调节</td>
  </tr>
  <tr>
    <td>腰部支撑调节</td>
  </tr>
  <tr>
    <td>肩部支撑调节</td>
  </tr>
  <tr>
    <td>主/副驾驶座电动调节</td>
  </tr>
  <tr>
    <td>第二排靠背角度调节</td>
  </tr>
  <tr>
    <td>第二排座椅移动</td>
  </tr>
  <tr>
    <td>后排座椅电动调节</td>
  </tr>
  <tr>
    <td>电动座椅记忆</td>
  </tr>
  <tr>
    <td>前/后排座椅加热</td>
  </tr>
  <tr>
    <td>前/后排座椅通风</td>
  </tr>
  <tr>
    <td>前/后排座椅按摩</td>
  </tr>
  <tr>
    <td>后排座椅放倒方式</td>
  </tr>
  <tr>
    <td>第三排座椅</td>
  </tr>
  <tr>
    <td>前/后中央扶手</td>
  </tr>
  <tr>
    <td>后排杯架</td>
  </tr>
  <tr>
     <td id="can13" style="border-right-width:0px;"><div align="left" id="duomeitipeizhi" name="duomeitipeizhi"><strong>多媒体配置</strong></div></td>
  </tr>
  <tr>
    <td>GPS导航系统</td>
  </tr>
  <tr>
    <td>定位互动服务</td>
  </tr>
  <tr>
    <td>中控台彩色大屏</td>
  </tr>
  <tr>
    <td>内置硬盘</td>
  </tr>
  <tr>
    <td>蓝牙/车载电话</td>
  </tr>
  <tr>
    <td>车载电视</td>
  </tr>
  <tr>
    <td>后排液晶屏</td>
  </tr>
  <tr>
    <td>外接音源接口（AUX/USB/iPod等）</td>
  </tr>
  <tr>
    <td>CD支持MP3/WMA</td>
  </tr>
  <tr>
    <td>多媒体系统</td>
  </tr>
  <tr>
    <td>扬声器数量</td>
  </tr>
  <tr>
     <td id="can14" style="border-right-width:0px;"><div align="left" id="dengguangpeizhi" name="dengguangpeizhi"><strong>灯光配置</strong></div></td>
  </tr>
  <tr>
    <td>氙气大灯</td>
  </tr>
  <tr>
    <td>LED大灯</td>
  </tr>
  <tr>
    <td>日间行车灯</td>
  </tr>
  <tr>
    <td>自动头灯</td>
  </tr>
  <tr>
    <td>转向头灯（辅助灯）</td>
  </tr>
  <tr>
    <td>前雾灯</td>
  </tr>
  <tr>
    <td>大灯高度可调</td>
  </tr>
  <tr>
    <td>大灯清洗装置</td>
  </tr>
  <tr>
    <td>车内氛围灯</td>
  </tr>
  <tr>
     <td id="can15" style="border-right-width:0px;"><div align="left" id="bolihoushijing" name="bolihoushijing"><strong>玻璃/后视镜</strong></div></td>
  </tr>
  <tr>
    <td>前/后电动车窗</td>
  </tr>
  <tr>
    <td>车窗防夹手功能</td>
  </tr>
  <tr>
    <td>防紫外线/隔热玻璃</td>
  </tr>
  <tr>
    <td>后视镜电动调节</td>
  </tr>
  <tr>
    <td>后视镜加热</td>
  </tr>
  <tr>
    <td>内/外后视镜自动防眩目</td>
  </tr>
  <tr>
    <td>后视镜电动折叠</td>
  </tr>
  <tr>
    <td>后视镜记忆</td>
  </tr>
  <tr>
    <td>后风挡遮阳帘</td>
  </tr>
  <tr>
    <td>后排侧遮阳帘</td>
  </tr>
  <tr>
    <td>后排侧隐私玻璃</td>
  </tr>
  <tr>
    <td>遮阳板化妆镜</td>
  </tr>
  <tr>
    <td>后雨刷</td>
  </tr>
  <tr>
    <td>感应雨刷</td>
  </tr>
  <tr>
    <td id="can16" style="border-right-width:0px;"><div align="left" id="kongtiaobingxiang" name="kongtiaobingxiang"><strong>空调/冰箱</strong></div></td>
  </tr>
  <tr>
    <td>空调控制方式</td>
  </tr>
  <tr>
    <td>后排独立空调</td>
  </tr>
  <tr>
    <td>后座出风口</td>
  </tr>
  <tr>
    <td>温度分区控制</td>
  </tr>
  <tr>
    <td>车内空气调节/花粉过滤</td>
  </tr>
  <tr>
    <td>车载冰箱</td>
  </tr>
  <tr>
     <td id="can17" style="border-right-width:0px;"><div align="left" id="gaokejipeizhi" name="gaokejipeizhi"><strong>高科技配置</strong></div></td>
  </tr>
  <tr>
    <td>自动泊车入位</td>
  </tr>
  <tr>
    <td>发动机启停技术</td>
  </tr>
  <tr>
    <td>并线辅助</td>
  </tr>
  <tr>
    <td>车道偏离预警系统</td>
  </tr>
  <tr>
    <td>主动刹车/主动安全系统</td>
  </tr>
  <tr>
    <td>整体主动转向系统</td>
  </tr>
  <tr>
    <td>夜视系统</td>
  </tr>
  <tr>
    <td>中控液晶屏分屏显示</td>
  </tr>
  <tr>
    <td>自适应巡航</td>
  </tr>
  <tr>
    <td>全景摄像头</td>
  </tr>
</table>
</div>

<script language="javascript">
 var xmlHttp;
	function createXmlHttpRequest(){
		var xmlHttp=null;
		try{
			xmlHttp=new XMLHttpRequest();
		}catch(e){
			try{
				xmlHttp=new ActiveXObjext("Msxml2.XMLHTTP");
			}catch(e){
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		return xmlHttp;
	}
 
 function shoucang(id1){
 xmlHttp=createXmlHttpRequest();

 var url;
 url="verifySHOUCANG.php?id="+id1;
 
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4&&xmlHttp.status==200){
		var $answer=xmlHttp.responseText;
		switch($answer){
			case "chenggong":
			
			case "yitianjia":
			}
			}
		}
		
		
}
 function shanchu(user1,carid1){
 xmlHttp=createXmlHttpRequest();

 var url;
 url="verifySHANCHUduibi.php?user="+user1+"&carid="+carid1;
 
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
		xmlHttp.onreadystatechange=function(){
			location.reload();
		}
		
		
}

</script>

<style type="text/css">
.hhhhhhh {font-family:"微软雅黑";font-size:13px;text-align:center;}
.hhhhhhh td{width:162px;}
.hhhhhhh tr{height:28px;
font-family:"微软雅黑";
font-size:12px;}
.qqqqqqq{
	font-family:"微软雅黑";
	font-size:8px;
	position:relative;top:5px;
	-webkit-appearance:none;
	border-style:solid;
	border-width:1px;
	border-radius:2px;
	border-color:#1ECD97;
	background-color:#fff;}
	.qqqqqqq:hover{background-color:#1ECD97;
	color:#fff;
	cursor:pointer;}
</style>
<?php do { ?><div style="float:left;  white-space:nowrap;overflow: hidden;display:inline-block;">
  <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <table class="hhhhhhh">
    <tr>
      <td height="73px;">
        <span style="font-size:14px;"><strong><?php echo $row_Recordset1['车型']; ?></strong></span><br/><span style="position:relative;"><?php echo $row_Recordset1['款式']; ?></span>
        <br/>
        <?php if(isset($_COOKIE['userJIZHU'])||isset($_SESSION['MM_Username'])){?>
        <input class="qqqqqqq" type="submit" value="收藏" onclick="shoucang('<?php echo $row_Recordset1['id'];?>')">
        <?php }?>
        
        <input class="qqqqqqq" type="submit" value="删除" onclick="shanchu('<?php echo $row_Recordset1['user'];?>','<?php echo $row_Recordset1['carid'];?>')">
        
        </td>
      
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['厂商指导价']; ?></td>
      </tr>
    <tr>
      <td  style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['厂商']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['jibie']?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['发动机']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['变速箱']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['长']; ?>*<?php echo $row_Recordset1['宽']; ?>*<?php echo $row_Recordset1['高']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车身结构']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最高车速']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['官方加速']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['实测加速']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['实测制动']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['实测油耗']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['工信部综合油耗']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['整车质保']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['长']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['宽']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['高']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['轴距']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前轮距']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后轮距']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最小离地间隙']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['整备质量']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车身结构']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车门数']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['座位数']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['油箱容积']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['系里厢容积']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['发动机型号']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['排量']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['进气形式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['气缸数']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['每缸气门数']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['压缩比']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['配气结构']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['缸径']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['行程']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最大马力']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最大功率']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最大功率转速']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最大扭矩']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['最大扭矩转速']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['发动机特有技术']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['燃料形式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['燃油标号']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['供油方式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['缸盖材料']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['缸体材料']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['环保标准']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电动机最大功率']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电动机最大扭矩']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电池支持']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电池容量']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['简称']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['挡位个数']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['变速箱类型']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['驱动方式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['四驱形式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['中央差速器结构']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前悬架类型']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后悬架类型']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['助力类型']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车体结构']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前制动器类型']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后制动器类型']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['驻车制动类型']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前轮胎规格']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后轮胎规格']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['备胎规格']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['主副驾驶座安全气囊']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后排侧气囊']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后排头部气囊']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['膝部气囊']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['胎压监测']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['零胎压继续行驶']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['安全带儿媳提示']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['ISOFIX儿童座椅']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['发动机电子防盗']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车内中控锁']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['遥控钥匙']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['无钥匙启动系统']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['无钥匙进入系统']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['ABS防抱死']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['制动力分配']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['刹车辅助']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['牵引力控制']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车身稳定控制']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['自动驻车']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['陡坡缓降']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['可变悬架']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['空气悬架']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['可变转向比']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['钱桥限滑差速器']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['中央差速器所致功能']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后前线滑差速器']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电动天窗']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['全景天窗']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['运动外观套件']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['铝合金轮圈']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电动吸合门']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['侧滑门']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电动后备箱']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['真皮方向盘']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['方向盘调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['方向盘电动调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['多功能方向盘']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['方向盘换挡']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['方向盘加热']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['方向盘加热']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后驻车雷达']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['打车视频影像']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['行车电脑显示']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['HUD抬头数字']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['真皮座椅']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['运动风格座椅']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['座椅高低调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['腰部支撑调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['肩部支撑调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['主副驾驶座电动调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['第二排靠背角度调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['第二排座椅移动']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后排座椅电动调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['电动座椅技艺']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后排座椅加热']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后排座椅通风']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后排座椅按摩']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前排座椅放倒方式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['第三排座椅']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后中央扶手']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后排杯架']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['GPS导航系统']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['定位互动服务']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['中控台彩色大屏']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['内置硬盘']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['蓝牙车载电话']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车载电视']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后排液晶屏']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['外接音源接口']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['CD支持']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['多媒体系统']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['扬声器数量']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['氙气大灯']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['LED大灯']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['日间行车灯']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['自动头灯']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['转向头灯']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前雾灯']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['大灯高度可调']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['大灯清洗装置']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车内氛围灯']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['前后电动车窗']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车窗放夹手功能']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['防紫外线']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后视镜电动']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后视镜加热']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['内外后视镜自动防眩目']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后视镜电动折叠']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后视镜技艺']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后风挡遮阳帘']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后排侧遮阳帘']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后排隐私玻璃']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['遮阳板化妆镜']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后雨刷']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['感应雨刷']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['空调控制方式']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后排独立空调']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['后座出风口']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['温度分区控制']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车内空气调节']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车载冰箱']; ?></td>
      </tr>
    <tr>
      <td style="border-right-width:0px;border-left-width:0px;">&nbsp;</td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['自动泊车入围']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['发动机启停']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['并线辅助']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['车道偏移']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['主动刹车']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['整体主动转向']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['夜视系统']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['中控液晶屏分屏']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['自适应巡航']; ?></td>
      </tr>
    <tr>
      <td><?php echo $row_Recordset1['全景摄像头']; ?></td>
      </tr>
  </table>
  <?php } // Show if recordset not empty ?>
</div>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
 </div>
         
         
          
          </DIV>
        
        
 </DIV>
</DIV>
<SCRIPT>
  var blogs_spacerank_index = 0,blogs_spacerank_class = 'a10';
  var blogs_spacerank_list = document.getElementById('blogs_spacerank').getElementsByTagName('a');
  function blogs_spacerank_ck(_idx){
  blogs_spacerank_list[blogs_spacerank_index].className = blogs_spacerank_class;
 
  document.getElementById('blogs_spacerank_'+blogs_spacerank_index).style.display = 'none';

  document.getElementById('blogs_spacerank_'+_idx).style.display = 'block';
  
  blogs_spacerank_index = _idx;
  }             
</SCRIPT>


</div> <!--左边导航条-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
(function($){
	$.extend($.fn,{
	scrollTo:function(time,to){
	time=time||800;
	to=to||1;
            $('a[href*=#]', this).click(function(){
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && 
location.hostname == this.hostname) {
      var $target = $(this.hash);
     $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
                    if ($target.length) {
                        if (to == 1) {
                            $('html,body').animate({
                                scrollTop: $target.offset().top
                            }, time);
                        }
                        else if(to==2){
                            $('html,body').animate({
                                scrollLeft: $target.offset().left
                            }, time);
                        }else{
alert('argument error');
		}
                        return false;
                    }
                }
            });
		}
	});
})(jQuery);
</script>
<script type="text/javascript" language="javascript">
$(function(){
   //  $("#a111").scrollTo(600,2妯悜)
  $("#tiaozhuan").scrollTo(700)
});
var t1=document.getElementById("can1").offsetTop;
	var t2=document.getElementById("can2").offsetTop;
	var t3=document.getElementById("can3").offsetTop;
	var t4=document.getElementById("can4").offsetTop;
	var t5=document.getElementById("can5").offsetTop;
	var t6=document.getElementById("can6").offsetTop;
	var t7=document.getElementById("can7").offsetTop;
	var t8=document.getElementById("can8").offsetTop;
	var t9=document.getElementById("can9").offsetTop;
	var t10=document.getElementById("can10").offsetTop;
	var t11=document.getElementById("can11").offsetTop;
	var t12=document.getElementById("can12").offsetTop;
	var t13=document.getElementById("can13").offsetTop;
	var t14=document.getElementById("can14").offsetTop;
	var t15=document.getElementById("can15").offsetTop;
	var t16=document.getElementById("can16").offsetTop;
	var t17=document.getElementById("can17").offsetTop;
window.onscroll=function(){
	
	var now=document.body.scrollTop-document.body.clientHeight;
	
	 if(t1<now&&now<t2){
		document.getElementById("ttt1").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t2<now&&now<t3){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t3<now&&now<t4){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
	else if(t4<now&&now<t5){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t5<now&&now<t6){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t6<now&&now<t7){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t7<now&&now<t8){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t8<now&&now<t9){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t9<now&&now<t10){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t10<now&&now<t11){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t11<now&&now<t12){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t12<now&&now<t13){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";


		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t13<now&&now<t14){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t14<now&&now<t15){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t15<now&&now<t16){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";"color:#000;";
		document.getElementById("ttt16").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";"color:#000;";
		document.getElementById("ttt17").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";"color:#000;";
		}
		else if(t16<now&&now<t17){
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		else if(t17<now) {
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#1ECD97;font-weight:bold;border-style:solid;border-radius:3px;border-width:1px;border-color:#1ECD97;";
		}
		else {
		document.getElementById("ttt1").style.cssText="color:#000;";
		document.getElementById("ttt2").style.cssText="color:#000;";
		document.getElementById("ttt3").style.cssText="color:#000;";
		document.getElementById("ttt4").style.cssText="color:#000;";
		document.getElementById("ttt5").style.cssText="color:#000;";
		document.getElementById("ttt6").style.cssText="color:#000;";
		document.getElementById("ttt7").style.cssText="color:#000;";
		document.getElementById("ttt8").style.cssText="color:#000;";
		document.getElementById("ttt9").style.cssText="color:#000;";
		document.getElementById("ttt10").style.cssText="color:#000;";
		document.getElementById("ttt11").style.cssText="color:#000;";
		document.getElementById("ttt12").style.cssText="color:#000;";
		document.getElementById("ttt13").style.cssText="color:#000;";
		document.getElementById("ttt14").style.cssText="color:#000;";
		document.getElementById("ttt15").style.cssText="color:#000;";
		document.getElementById("ttt16").style.cssText="color:#000;";
		document.getElementById("ttt17").style.cssText="color:#000;";
		}
		
}
</script>
    <style type="text/css">
	
	#tiaozhuan {width:110px; position:fixed; top:156px; left:43px;text-align:center;font-family:"微软雅黑";font-size:13px;
	border-style:solid;
	border-color:#1ECD97;
	border-width:1px;}
	#tiaozhuan dd{position:relative;right:36px;bottom:7px;}
	
	#tiaozhuan a{ display:block; width:100px; height:20px;   float:left;text-decoration:none;
	color:#000;}
	#tiaozhuan a:hover{color:#1ECD97;font-weight:bold;
	border-style:solid;
	border-radius:3px;
	border-width:1px;
	border-color:#1ECD97;}
	</style>
    <div id="tiaozhuan">
    <dl> 
  <dd ><a id="ttt1" href="#jibencanshu">基本参数</a></dd>
  <dd ><a id="ttt2" href="#cheshen">车身</a></dd>
  <dd ><a id="ttt3" href="#fadongji" >发动机</a></dd>
    <dd ><a id="ttt4" href="#diandongji" >电动机</a></dd>
      <dd><a id="ttt5" href="#biansuxiang">变速箱</a></dd>
      <dd ><a id="ttt6" href="#dipanzhuanxiang" >底盘转向</a></dd>
       <dd><a id="ttt7" href="#chelunzhidong">车轮制动</a></dd>
        <dd><a id="ttt8" href="#anquanzhuangbei">安全装备</a></dd>
        <dd><a id="ttt9" href="#caokongpeizhi">操控配置</a></dd>
        <dd><a id="ttt10" href="#waibupeizhi" >外部配置</a></dd>
          <dd><a id="ttt11" href="#neibupeizhi" >内部配置</a></dd>
           <dd><a id="ttt12" href="#zuoyipeizhi" >座椅配置</a></dd>
        	<dd><a id="ttt13" href="#duomeitipeizhi" >多媒体配置</a></dd>
          <dd><a id="ttt14" href="#dengguangpeizhi">灯光配置</a></dd>
            <dd><a id="ttt15" href="#bolihoushijing" >玻璃/后视镜</a></dd>
             <dd><a id="ttt16" href="#kongtiaobingxiang">空调/冰箱</a></dd>
                <dd><a id="ttt17" href="#gaokejipeizhi" >高科技配置</a></dd>
                </dl>
    
    </div>
    
    
   

    
   
    
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
