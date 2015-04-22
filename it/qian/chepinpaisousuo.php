<?php require_once('../Connections/conn.php'); ?>
<?php 
mysql_query("SET NAMES utf8"); 

 session_cache_limiter('private, must-revalidate');
ini_set("display_errors","Off");
if(isset($_POST['sousuo'])){$pinpaisousuo=$_POST['sousuo'];}?>
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

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM it_pinpai where pinpai like '%".$pinpaisousuo."%' or xilie like '%".$pinpaisousuo."%' GROUP BY xilie ORDER BY pinpaizhi";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn, $conn);
$query_rejian = "SELECT * FROM it_rejian,it_pinpai WHERE it_rejian.xilieming=it_pinpai.xilie ORDER BY it_rejian.id";
$rejian = mysql_query($query_rejian, $conn) or die(mysql_error());
$row_rejian = mysql_fetch_assoc($rejian);
$totalRows_rejian = mysql_num_rows($rejian);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-品牌</title>
</head>

<body>



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
                 
                 
                 
               <!--右选项卡--> <link rel="stylesheet" type="text/css" href="youxuanxiangka1css/style1.css" />
<div class="container" style="position:relative;left:587px;bottom:25px;width:300px;height:400px;">
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
                    <img src="image/1.png" width="64" height="42">
                    
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



<style type="text/css">
.sousuo1{
	width:500px;font-family:"微软雅黑";font-size:15px;position:relative;left:37px;bottom:433px;
			margin-top:10px;}
			.sousuo1 div{margin-top:10px;}
			.sousuo1 a{color:#00BBFF;text-decoration:none;
			border-style:solid;
			border-width:1px;
			border-color:#1ECD97;
			border-radius:4px;}<?php echo $row_Recordset1['xiliezhi']; ?>
</style>

<div class="sousuo1" style="position:relative;left:300px;">(总共 <?php echo $totalRows_Recordset1 ?> 个搜索结果)</div>
<div class="sousuo1"  style="width:480px;height:1px; background:#E0E0E0;position:relative;"></div>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <?php do { ?>
   <div class="sousuo1"><img src="tupian/<?php echo $row_Recordset1['xilie']?>/flash/flowList/01.jpg" width="60px;" height:"40px;">
     <a style="position:absolute;left:73px;bottom:13px;" href="chedetail.php?che=<?php echo $row_Recordset1['xilie']?>" target="_blank"><?php echo $row_Recordset1['xilie']; ?><br/><font size="-6">——<?php echo $row_Recordset1['pinpai']?></font></a>
      <span style="position:absolute;left:270px;bottom:27px;font-size:13px;">级别：<?php echo $row_Recordset1['jibie']?></span> <span style="position:absolute;left:383px;bottom:27px;font-size:13px;">上市年份：<?php echo $row_Recordset1['shangshinian']?></span> 
			 <span style="position:absolute;top:35px;left:73px;font-size:13px;">价格区间：<?php echo $row_Recordset1['zuidijia']?>W--<?php echo $row_Recordset1['zuigaojia']?>W</span>  
			  <span style="position:absolute;top:35px;left:270px;font-size:13px;">综合评分：<?php echo $row_Recordset1['zonghe']?></span>  <span style="position:absolute;top:35px;left:383px;font-size:13px;">周点击量：<?php echo $row_Recordset1['zhoudianji']?></span></div>
             <div class="sousuo1" style="width:480px;height:1px; background:#E0E0E0;position:relative;"></div>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  <?php } // Show if recordset not empty ?>
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
mysql_free_result($Recordset1);

mysql_free_result($rejian);
?>

