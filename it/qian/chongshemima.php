<?php 
 session_cache_limiter('private, must-revalidate');
include_once("../Connections/conn.php");
ini_set("display_errors","Off");
header("Content-Type: text/html; charset=utf-8");

$username = stripslashes(trim($_GET['username'])); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-重设密码</title>
</head>
<script language="javascript">
				var a3=0;
				var a4=0;
				function checkpwd1(){
					
					var pas=document.getElementById("password").value;
					var pas1=document.getElementById("password1").value;
					if(pas=="")
					{
						a3=0;
						check3();
						//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						document.getElementById("mimatishi").innerHTML="请输入密码";
					}
					
					else if(pas!=pas1)
						{
							//document.getElementById("querentishi").innerHTML="两次密码不相同";
							//document.getElementById("password1").style.background="url(image/2.png) no-repeat";

							a4=0;
							check3();
						}
						else if(pas==pas1)
						{
							document.getElementById("querentishi").innerHTML="两次密码相同";
							a4=1;
							check3();
						}
				}

				function checkpwd3(){
					var pass=document.getElementById("password").value;
					if(pass=="")
						{
							a3=0;
							check3();
							//document.getElementById("password").style.background="url(image/1.png) no-repeat";
						}

						var passn=/^\w+$/;

						if(passn.test(pass)!=true&&pass!=""){
							document.getElementById("mimatishi").innerHTML="不可包含此字母";
							a3=0;
							check3();
						}
						if(passn.test(pass)==true&&pass.length<7){
							document.getElementById("mimatishi").innerHTML="位数不够";
							a3=0;
							check3();
						}
						if(passn.test(pass)==true&&pass.length>=7){
							var lv=0;
							if (pass.match(/[a-z]/)){lv++;} 
							if (pass.match(/[A-Z]/)){lv++;} 
							if (pass.match(/[0-9]/)){lv++;}
							if (pass.match(/[_]/)){lv++;}
							if(lv==1) document.getElementById("mimatishi").innerHTML="强度1";
							if(lv==2) document.getElementById("mimatishi").innerHTML="强度2";
							if(lv==3) document.getElementById("mimatishi").innerHTML="强度3";
							if(lv==4) document.getElementById("mimatishi").innerHTML="强度4";
							a3=1;
							check3();
						}
						check3();
					}

					function checkpwd2(){
						//document.getElementById("password").style.background="url(image/2.png) no-repeat";
						check3();
					}
					</script>
                    <script language="javascript">
					
					function checkquerenpwd1(){

						var p1=document.getElementById("password").value;
						var p2=document.getElementById("password1").value;	
						if(p1==""){
							//document.getElementById("password1").style.background="url(image/1.png) no-repeat";
							a4=0;
							check3();
						}
						else if(p1.length<7){
							document.getElementById("querentishi").innerHTML="位数不够";
							a4=0;
							check3();
						}
						else if(p1!=p2)
						{
							document.getElementById("querentishi").innerHTML="两次密码不相同";
							//document.getElementById("password1").style.background="url(image/2.png) no-repeat";

							a4=0;
							check3();
						}
						else if(p1==p2)
						{
							document.getElementById("querentishi").innerHTML="两次密码相同";
							a4=1;
							check3();
						}

					}
					function checkquerenpwd2(){
						//document.getElementById("password1").style.background="url(image/2.png) no-repeat";
						check3();
					}
					function checkquerenpwd3(){
						var eeeeee=document.getElementById("password1").value;
						if(eeeeee=="")
						{
							//document.getElementById("password1").style.background="url(image/1.png) no-repeat";
							a4=0;
							check3();
						}
						check3();
					}
					</script> 
				
				
						<script language="javascript">
						function check(){
							if(a3==1&&a4==1){
								document.getElementById("xiugai").disabled=false;
							}

						}
						function check2(){
							if(a3!=1||a4!=1){
								document.getElementById("xiugai").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
						</script>
<body>
    <style type="text/css">
			.chongshe1{
				margin:0 auto;width:970px;position:relative;top:50px;right:20px;
				width:333px;height:213px;
				border-style:solid;
				border-width:1px;
				border-radius:7px;
				border-color:#1ECD97;}
				.chongshe1 a{font-family:'微软雅黑';font-size:16px;text-decoration:none;color:#000}
				.chongshe1 a:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.chongshe1 a:visited{color:#000;}
				.chongshe1 span{font-family:'微软雅黑';font-size:14px;}
				.chongshe1 span:hover{text-shadow:#FF69B4 0px 1px 0px;}
				
				.chongshe1 input[type='password']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
			
						.chongshe1 input[type='submit']{
							width:120px;height:30px;							
							-webkit-appearance:none;
							border-style:solid;
							border-width:2px;
							border-color:#1ECD97;
							border-radius:20px;
							background-color:#fff;
							outline:none;}
							.chongshe1 input[type='submit']:hover{
								background-color:#1ECD97;}
						</style>
<div class="chongshe1">
<form id="form1" name="form1" method="post" action="xiugaichenggong.php">

			
            <span style="font-size:18px;text-shadow:#FF69B4 0px 1px 0px;position:relative;left:7px;top:3px;"><?php echo $username;?>:请修改您的密码</span>
             <div style="width:333px;height:1px; background:#1ECD97;position:relative;top:9px;"></div> 
           
<span style="position:relative;left:7px;top:13px;">重设密码：</span>

			<p> 
            <input name="password" type="password" id="password"  onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
				
				
				<span id="mimatishi" style="position:relative;left:3px;font-size:12px;"></span>
      </p>
				<span style="position:relative;left:7px;bottom:10px;">密码确认：</span>
				<P><input style="position:relative;bottom:23px;" name="password1" type="password" id="password1" onblur="checkquerenpwd1()" onkeydown="checkquerenpwd2()" onkeyup="checkquerenpwd3()" maxlength="17" />             
					
                   <input name="username" type="hidden" id="username" value="<?php echo $username?>" />
     			 <span id="querentishi" style="position:relative;bottom:23px;left:3px;font-size:12px;"></span>
   					 </P>
                     
               
                 <div style="position:relative;left:7px;bottom:23px">
					<input name="xiugai" type="submit"  disabled="true" id="xiugai" value="修改密码"/> 
                    </div>
                    
</form>
</div>
</body>
</html>