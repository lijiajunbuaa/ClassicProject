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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
 ini_set('session.gc_maxlifetime',10); 
	 }

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=md5($_POST['password']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "dengluchenggong.php";
  $MM_redirectLoginFailed = "denglushibai.php";
  $MM_redirectLoginDONGJIE = "tishidongjie.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conn, $conn);
  
  $DONGJIE="SELECT dongjie FROM it_user WHERE name='$loginUsername'";
  $dongjieresult=mysql_query($DONGJIE);
  $dongjie=mysql_fetch_array($dongjieresult);
  $shifoudongjie=$dongjie['dongjie'];
  
  if($shifoudongjie=="0")
  {
	    $_SESSION['usernameWW'] = $loginUsername;
  		header("Location: " . $MM_redirectLoginDONGJIE );
  }else {
  
  $LoginRS__query=sprintf("SELECT name, pwd FROM it_user WHERE name=%s AND pwd=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
  $LoginRS = mysql_query($LoginRS__query, $conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

	if($_POST['jizhu']==11){
		setcookie("userJIZHU", $loginUsername, time()+30*24*3600);
		setcookie("userJIZHU2", $loginUsername, time()+30*24*3600);
		}else{
			setcookie("userJIZHU", $loginUsername, time()-30*24*3600);
			setcookie("userJIZHU2", $loginUsername, time()+30*24*3600);
		}
	
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
	   $_SESSION['usernameWW'] = $loginUsername;
    header("Location: ". $MM_redirectLoginFailed );
  }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-登陆</title>
</head>

<body>
<script language="javascript">
	
var a1=0;
var a2=0;
var a3=0;
//var a4=0;
	
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
	
	function Validate(id,value){
		xmlHttp=createXmlHttpRequest();
		var url;
		switch(id)
		{
			case "username":
			url="verify.php?username="+value;
			break;
		}
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4&&xmlHttp.status==200){
				var $answer=xmlHttp.responseText;

				switch($answer){
					case "username_ok":
					document.getElementById("nichengtishi").innerHTML="不存在此用户";
					a1=0;
					check3();
					break;
					case "username_error":
					document.getElementById("nichengtishi").innerHTML="";
					a1=1;
					check3();
					break;
				}
			}

		}
	}
	function Validate1(id,value){
		xmlHttp=createXmlHttpRequest();
		var url;
		url="verify.php?yanzheng="+value;

		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4&&xmlHttp.status==200){
				var $answer=xmlHttp.responseText;

				if($answer==document.getElementById("yanzheng").value.toLowerCase()){
					document.getElementById("yanzhengtishi").innerHTML="正确";
					a3=1;
					check3();
				}
				else{
					document.getElementById("yanzhengtishi").innerHTML="不正确";
					a3=0;
					check3();
				}
			}

		}
	}

    </script>
     <script language="javascript">
				
				function checknicheng3()
				{
					var eee=document.getElementById("username").value;
					if(eee=="")
					{
						a1=0;
						//document.getElementById("username").style.background="url(image/1.png) no-repeat";
					}
					check3();
				}
				function checknicheng1()
				{
					var nam=document.getElementById("username").value;
					var usern=/^\w{7,20}$/;
					if(nam=="")
					{
						document.getElementById("nichengtishi").innerHTML="请输入昵称";
						//document.getElementById("username").style.background="url(image/1.png) no-repeat";
						a1=0;
						check3();
					}
					else if(usern.test(nam)!=true)
					{
						document.getElementById("nichengtishi").innerHTML="格式不正确";
						a1=0;
						check3();
					}
					else
					{
						Validate(document.getElementById("username").id,document.getElementById("username").value);
					}
					
				}
				function checknicheng2()
				{
					//document.getElementById("username").style.background="url(image/2.png) no-repeat";
					check3();
				}
				</script>
                <script language="javascript">
				
				function checkpwd1(){
					checknicheng1();
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
					</script>
                     <script language="javascript">
					var suiji;
				
					function checkyanzheng1(){
						checknicheng1();
						var tt=document.getElementById("yanzheng").value;
						if(tt=="")
						{
							var rann=Math.floor(Math.random()*51+1);
							suiji=rann;
							document.getElementById("tupian").innerHTML=('<img src="image/yanzheng/'+parseInt(rann)+'.png">');
							document.getElementById("yanzhengtishi").innerHTML="请输入验证码";
							//document.getElementById("yanzheng").style.background="url(image/1.png) no-repeat";
						check3();
						}
						else{
							Validate1(document.getElementById("yanzheng"),suiji);	

						}

					}

					function checkyanzheng(){

						
						if(a3==0){
							var rann=Math.floor(Math.random()*51+1);
							suiji=rann;
							document.getElementById("tupian").innerHTML=('<img src="image/yanzheng/'+parseInt(rann)+'.png">');
						}
						check3();
						
					}
					function checkyanzheng3()
					{
						
						var ee=document.getElementById("yanzheng").value;
						if(ee=="")
						{

							//document.getElementById("yanzheng").style.background="url(image/1.png) no-repeat";
							a3=0;
							check3();
						}
						check3();
					}
					function checkyanzheng2()
					{
						//document.getElementById("yanzheng").style.background="url(image/2.png) no-repeat";
						check3();
					}
					</script>
                     <script language="javascript">
						function check(){
							if(a1==1&&a2==1&&a3==1){
								document.getElementById("denglu").disabled=false;
							}

						}
						function check2(){
							if(a1!=1||a2!=1||a3!=1){
								document.getElementById("denglu").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
						</script>	
                        <style type="text/css">
			.denglu1{margin:0 auto;width:970px;position:relative;top:50px;right:20px;
				width:333px;height:332px;
				border-style:solid;
				border-width:1px;
				border-radius:7px;
				border-color:#1ECD97;}
				.denglu1 a{font-family:'微软雅黑';font-size:16px;text-decoration:none;color:#000}
				.denglu1 a:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.denglu1 a:visited{color:#000;}
				.denglu1 span{font-family:'微软雅黑';font-size:14px;}
				.denglu1 span:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.denglu1 input[type='text']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
				.denglu1 input[type='password']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
				.denglu1 input[type='checkbox']{
					-webkit-appearance:none;
						width:15px;height:15px;
					outline:none;
							border-width:40px;
							
							background:#fff;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
							.denglu1 input[type='checkbox']:checked{
							width:15px;height:15px;
							
							-webkit-appearance:none;
							outline:none;
							border-width:40px;
							
							background:#1ECD97;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
						.denglu1 input[type='submit']{
							width:80px;height:30px;							
							-webkit-appearance:none;
							border-style:solid;
							border-width:2px;
							border-color:#1ECD97;
							border-radius:20px;
							background-color:#fff;
							outline:none;}
							.denglu1 input[type='submit']:hover{
								background-color:#1ECD97;}
						</style>
                        
<div class="denglu1">
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
           <div>
           			<a style="font-size:18px;text-shadow:#FF69B4 0px 1px 0px;position:relative;left:7px;top:3px;">登陆</a>
           			<a style="position:relative;left:210px;top:3px;" href="zhuce.php">注册账号</a>
                    <div style="width:333px;height:1px; background:#1ECD97;position:relative;top:9px;"></div> 
                
                    <span style="position:relative;left:7px;top:13px;">账号：</span>
                <p>
                <input autocomplete='off' type="text" name="username" id="username"  placeholder="EG：233333333@example.com" onblur="checknicheng1()" onkeydown="checknicheng2()" onkeyup="checknicheng3()" maxlength="20" value="<?php if(isset($_SESSION['usernameWW'])){echo $_SESSION['usernameWW'];}else{if(isset($_COOKIE['userJIZHU2'])){echo $_COOKIE['userJIZHU2'];}}
				?>"/>
               
                <span id="nichengtishi" style="position:relative;left:3px;font-size:12px;"><span></p>
           		
                
                	<span style="position:relative;left:7px;bottom:10px;">密码：</span>
              		<a href="mimazhaohui.php" style="font-size:14px;position:relative;left:195px;bottom:10px;">忘记了密码？</a>
               	
            	
                <p> <input style="position:relative;bottom:23px;" name="password" type="password" id="password"   onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
				<span id="mimatishi" style="position:relative;bottom:22px;left:3px;font-size:12px;"></span></p>
             	
             		<span style="position:relative;left:7px;bottom:34px;">验证码：</span>
                
              
                <p>
                	<input autocomplete='off' style="position:relative;bottom:47px;" name="yanzheng" type="text" id="yanzheng"  onfocus="checkyanzheng()" onblur="checkyanzheng1()" onkeydown="checkyanzheng2()"  onkeyup="checkyanzheng3()"  size="16" maxlength="16" />
				 
                     <span id="yanzhengtishi" style="position:relative;bottom:47px;left:3px;font-size:12px;"></span>
               
                <span id="tupian" style="position:relative;left:7px;bottom:39px;"></span>
                </p>
              	
                <div  style="position:absolute;left:4px;bottom:59px;">
                <input style="position:relative;top:12px;"  type="checkbox" name="jizhu" id="jizhu" value=11/>
                <span style="position:relative;top:6px;right:5px;">记住我 （不建议公用电脑勾选此项）</span>
              </div>
              
               <div style="position:absolute;left:7px;bottom:10px"><input type="submit" name="denglu" id="denglu" value="登陆"/></div>
              
            
    </div>
</form>
</div>
        
</body>
</html>