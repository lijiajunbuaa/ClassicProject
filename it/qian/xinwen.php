<?php require_once('../Connections/conn.php'); ?>
<?php
mysql_query("SET NAMES utf8"); 

 session_cache_limiter('private, must-revalidate');
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

$maxRows_NEWS1 = 20;
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

$maxRows_NEWS2 = 20;
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

$maxRows_NEWS3 = 20;
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

$maxRows_NEWS4 = 20;
$pageNum_NEWS4 = 0;
if (isset($_GET['pageNum_NEWS4'])) {
  $pageNum_NEWS4 = $_GET['pageNum_NEWS4'];
}
$startRow_NEWS4 = $pageNum_NEWS4 * $maxRows_NEWS4;

mysql_select_db($database_conn, $conn);
$query_NEWS4 = "SELECT * FROM it_news WHERE type = '4' ORDER BY id DESC";
$query_limit_NEWS4 = sprintf("%s LIMIT %d, %d", $query_NEWS4, $startRow_NEWS4, $maxRows_NEWS4);
$NEWS4 = mysql_query($query_limit_NEWS4, $conn) or die(mysql_error());
$row_NEWS4 = mysql_fetch_assoc($NEWS4);

if (isset($_GET['totalRows_NEWS4'])) {
  $totalRows_NEWS4 = $_GET['totalRows_NEWS4'];
} else {
  $all_NEWS4 = mysql_query($query_NEWS4);
  $totalRows_NEWS4 = mysql_num_rows($all_NEWS4);
}
$totalPages_NEWS4 = ceil($totalRows_NEWS4/$maxRows_NEWS4)-1;

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-新闻列表</title>
</head>
<?php date_default_timezone_set('Asia/Shanghai');
$TIME=date("H");
?>
<body><div>
<?php if(isset($_COOKIE['userJIZHU'])&&isset($_SESSION['MM_Username'])){?>

		有cookie有session
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
        修改密码
        <a href="tuichu.php">退出</a>
  <form id="form1" name="form1" method="post" action="xiugaimima.php">
         <p>
         请输入密码：<input name="password" type="password" id="password" placeholder="例：2233@example.com" onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
				<script language="javascript">
				var a2=0;
				function checkpwd1(){
					var pas=document.getElementById("password").value;
					if(pas=="")
					{
						a2=0;
						check3();
						//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						document.getElementById("mimatishi").innerHTML="请输入密码";
					}
				}

				function checkpwd3(){
					var pass=document.getElementById("password").value;
					if(pass=="")
						{
							a2=0;
							check3();
							//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						}

						var passn=/^\w+$/;

						if(passn.test(pass)!=true&&pass!=""){
							document.getElementById("mimatishi").innerHTML="密码中不会含有此字母";
							a2=0;
							check3();
						}
						
						if(passn.test(pass)==true){
							document.getElementById("mimatishi").innerHTML="";
							a2=1;
						}
						check3();
					}

					function checkpwd2(){
						//document.getElementById("password").style.background="url(image/2.png) no-repeat";
						check3();
					}
					</script><span id="mimatishi"></span>
					<input type="submit" name="xiugai" id="xiugai" value="确认修改" disabled="true"/>
					<input type="hidden" name="userN" id="userN" value="<?php echo $_SESSION['MM_Username']?>"/>
                      <script language="javascript">
						function check(){
							if(a2==1){
								document.getElementById("xiugai").disabled=false;
							}

						}
						function check2(){
							if(a2!=1){
								document.getElementById("xiugai").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
                        </script>
         </p>
		 
        
          
        </form>
   <a href="shoucangjia.php">收藏夹</a> |<a href="liuyan.php">给管理员留言</a>
<?php }?>

<?php if(!isset($_COOKIE['userJIZHU'])&&isset($_SESSION['MM_Username'])){?>

		无cookie有session
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
         修改密码
         <a href="tuichu.php">退出</a>
  <form id="form1" name="form1" method="post" action="xiugaimima.php">
         <p>
         请输入密码：<input name="password" type="password" id="password" placeholder="例：2233@example.com"  onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
		   <script language="javascript">
				var a2=0;
				function checkpwd1(){
					var pas=document.getElementById("password").value;
					if(pas=="")
					{
						a2=0;
						check3();
						//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						document.getElementById("mimatishi").innerHTML="请输入密码";
					}
				}

				function checkpwd3(){
					var pass=document.getElementById("password").value;
					if(pass=="")
						{
							a2=0;
							check3();
							//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						}

						var passn=/^\w+$/;

						if(passn.test(pass)!=true&&pass!=""){
							document.getElementById("mimatishi").innerHTML="密码中不会含有此字母";
							a2=0;
							check3();
						}
						
						if(passn.test(pass)==true){
							document.getElementById("mimatishi").innerHTML="";
							a2=1;
						}
						check3();
					}

					function checkpwd2(){
						//document.getElementById("password").style.background="url(image/2.png) no-repeat";
						check3();
					}
					</script><span id="mimatishi"></span>
		   <input type="submit" name="xiugai" id="xiugai" value="确认修改" disabled="true"/>			<input type="hidden" name="userN" id="userN" value="<?php echo $_SESSION['MM_Username']?>"/>
           <script language="javascript">
						function check(){
							if(a2==1){
								document.getElementById("xiugai").disabled=false;
							}

						}
						function check2(){
							if(a2!=1){
								document.getElementById("xiugai").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
                        </script>
                        
         </p>
		 
        
          
        </form>
         <a href="shoucangjia.php">收藏夹</a> |<a href="liuyan.php">给管理员留言</a>
<?php }?>

<?php if(isset($_COOKIE['userJIZHU'])&&!isset($_SESSION['MM_Username'])){?>

		有cookie无session
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
        修改密码
        <a href="tuichu.php">退出</a>
  <form id="form1" name="form1" method="post" action="xiugaimima.php">
         <p>
         请输入密码：<input name="password" type="password" id="password" placeholder="例：2233@example.com" onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
				<script language="javascript">
				var a2=0;
				function checkpwd1(){
					var pas=document.getElementById("password").value;
					if(pas=="")
					{
						a2=0;
						check3();
						//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						document.getElementById("mimatishi").innerHTML="请输入密码";
					}
				}

				function checkpwd3(){
					var pass=document.getElementById("password").value;
					if(pass=="")
						{
							a2=0;
							check3();
							//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						}

						var passn=/^\w+$/;

						if(passn.test(pass)!=true&&pass!=""){
							document.getElementById("mimatishi").innerHTML="密码中不会含有此字母";
							a2=0;
							check3();
						}
						
						if(passn.test(pass)==true){
							document.getElementById("mimatishi").innerHTML="";
							a2=1;
						}
						check3();
					}

					function checkpwd2(){
						//document.getElementById("password").style.background="url(image/2.png) no-repeat";
						check3();
					}
					</script><span id="mimatishi"></span>
					<input type="submit" name="xiugai" id="xiugai" value="确认修改" disabled="true"/>
					<input type="hidden" name="userN" id="userN" value="<?php echo $_COOKIE['userJIZHU']?>"/>
                      <script language="javascript">
						function check(){
							if(a2==1){
								document.getElementById("xiugai").disabled=false;
							}

						}
						function check2(){
							if(a2!=1){
								document.getElementById("xiugai").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
                        </script>
         </p>
		 
        
          
        </form>
   <a href="shoucangjia.php">收藏夹</a> |<a href="liuyan.php">给管理员留言</a>
<?php }?>

<?php if(!isset($_COOKIE['userJIZHU'])&&!isset($_SESSION['MM_Username'])){?>

		无cookie无session
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
        <a href="denglu.php">登陆</a>|<a href="zhuce.php">注册</a> |<a href="liuyan.php">给管理员留言</a>
<?php }?>
</div>

	<!-->新闻模块<--><div>
		<div><span>最新车站信息</span><a href="xinwen.php">更多》</a>
<ul>
       	<?php do { ?>
               	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS1['id']; ?>"><?php echo $row_NEWS1['title']; ?> </a></li>
                	  <?php } while ($row_NEWS1 = mysql_fetch_assoc($NEWS1)); ?>
          </ul>
      </div>
        <div><span>新车发布信息</span><a href="xinwen.php">更多》</a>
<ul>
       	<?php do { ?>
               	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS2['id']; ?>"><?php echo $row_NEWS2['title']; ?></a></li>
                	  <?php } while ($row_NEWS2 = mysql_fetch_assoc($NEWS2)); ?>
                </ul>
        </div>
        <div><span>概念技术创新</span><a href="xinwen.php">更多》</a>
<ul>
       	<?php do { ?>
               	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS3['id']; ?>"><?php echo $row_NEWS3['title']; ?></a></li>
                	  <?php } while ($row_NEWS3 = mysql_fetch_assoc($NEWS3)); ?>
                </ul>
        </div>
        <div><span>精选驱车游记</span><a href="xinwen.php">更多》</a>
<ul>
       	<?php do { ?>
   	    <li><a href="xinwendetail.php?news_id=<?php echo $row_NEWS4['id']; ?>"><?php echo $row_NEWS4['title']; ?></a></li>
                	  <?php } while ($row_NEWS4 = mysql_fetch_assoc($NEWS4)); ?>
                </ul>
        </div>
					</div>
                    
                    
                        <!--对比悬浮框-->
    <div>
    <a href="duibi.php">对比VS</a> </div>

</body>
</html>
<?php
mysql_free_result($NEWS1);

mysql_free_result($NEWS2);

mysql_free_result($NEWS3);

mysql_free_result($NEWS4);
?>
