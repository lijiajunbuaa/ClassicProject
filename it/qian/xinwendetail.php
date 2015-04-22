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

$colname_Recordset1 = "-1";
if (isset($_GET['news_id'])) {
  $colname_Recordset1 = $_GET['news_id'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM it_news WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);$colname_Recordset1 = "-1";
if (isset($_GET['news_id'])) {
  $colname_Recordset1 = $_GET['news_id'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM it_news WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-新闻资讯</title>
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

		<div>
       	  <span><?php echo $row_Recordset1['title']; ?></span>
            <span><?php echo $row_Recordset1['time']; ?></span>
          <span><?php echo $row_Recordset1['type']; ?></span>
		  <span><?php echo $row_Recordset1['content']; ?></span>
        </div>
    <!--对比悬浮框-->
    <div>
    <a href="duibi.php">对比VS</a> </div>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
