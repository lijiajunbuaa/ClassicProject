<?php


 session_cache_limiter('private, must-revalidate');
 ini_set("display_erros","Off"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>雾都驿站-注册</title>

</head>

<body>

	<script type="text/javascript">
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
			case "email":
			url="verify.php?email="+value;
			break;
		}
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4&&xmlHttp.status==200){
				var $answer=xmlHttp.responseText;

				switch($answer){
					case "username_ok":
					document.getElementById("nichengtishi").innerHTML="用户名可用";
					a2=1;
					check3();
					break;
					case "email_ok":
					document.getElementById("youxiangtishi").innerHTML="邮箱可用";
					a1=1;
					check3();
					break;
					case "username_error":
					document.getElementById("nichengtishi").innerHTML="用户名不可用";
					a2=0;
					check3();
					break;
					case "email_error":
					document.getElementById("youxiangtishi").innerHTML="邮箱不可用";
					a1=0;
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
					a5=1;
					check3();
				}
				else{
					document.getElementById("yanzhengtishi").innerHTML="不正确";
					a5=0;
					check3();
				}
			}

		}
	}
	</script>
    	<script language="javascript">

				var a1=0;
				var a2=0;
				var a3=0;
				var a4=0;
				var a5=0;
				var a6;
				

				function checkyouxiang3(){
					var eeee=document.getElementById("email").value;
					if(eeee=="")
					{
						a1=0;
						//document.getElementById("email").style.background="url(image/1.png) no-repeat";
					}
					
					check3();
				}
				function checkyouxiang1(){
					
					var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
					var ema=document.getElementById("email").value;
					if(ema=="")
					{
						document.getElementById("youxiangtishi").innerHTML="请输入邮箱地址"; 
						//document.getElementById("email").style.background="url(image/1.png) no-repeat";
						a1=0;
						check3();
					}			
					else if(reg.test(ema)!=true)
					{
						document.getElementById("youxiangtishi").innerHTML="格式不正确"; 	
						a1=0;		
						check3();
					}
					else
					{
						

						Validate(document.getElementById("email").id,document.getElementById("email").value); 
						
					}
					
				}	

				function checkyouxiang2(){
					
					//document.getElementById("email").style.background="url(image/2.png) no-repeat";
					check3();
				}
				</script>
                <script language="javascript">
				
				function checknicheng3()
				{
					var eee=document.getElementById("username").value;
					if(eee=="")
					{
						a2=0;
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
						a2=0;
						check3();
					}
					else if(usern.test(nam)!=true)
					{
						document.getElementById("nichengtishi").innerHTML="格式不正确";
						a2=0;
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
						//	document.getElementById("querentishi").innerHTML="两次密码不相同";
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
					var suiji;
					
					function checkyanzheng1(){

						if(document.getElementById("tongyi").checked==true) 
						{
							a6=1;
							check3();
							}
						else{ 
						a6=0;	
						check3();
						}	

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

						if(a5==0){
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
							a5=0;
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
							if(a1==1&&a2==1&&a3==1&&a4==1&&a5==1&&document.getElementById("tongyi").checked==true){
								document.getElementById("zhuce").disabled=false;
							}

						}
						function check2(){
							if(a1!=1||a2!=1||a3!=1||a4!=1||a5!=1||document.getElementById("tongyi").checked!=true){
								document.getElementById("zhuce").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
						</script>
				<style type="text/css">
				.zhuce1{margin:0 auto;width:970px;position:relative;top:50px;right:20px;
				width:333px;height:450px;
				border-style:solid;
				border-width:1px;
				border-radius:7px;
				border-color:#1ECD97;}
				.zhuce1 a{font-family:'微软雅黑';font-size:16px;text-decoration:none;}
				.zhuce1 a:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.zhuce1 a:visited{color:#000;}
				.zhuce1 span{font-family:'微软雅黑';font-size:14px;}
				.zhuce1 span:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.zhuce1 input[type='text']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
				.zhuce1 input[type='password']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
				.zhuce1 input[type='checkbox']{
					-webkit-appearance:none;
						width:15px;height:15px;
					outline:none;
							border-width:40px;
							
							background:#fff;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
							.zhuce1 input[type='checkbox']:checked{
							width:15px;height:15px;
							
							-webkit-appearance:none;
							outline:none;
							border-width:40px;
							
							background:#1ECD97;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
						.zhuce1 input[type='submit']{
							width:80px;height:30px;							
							-webkit-appearance:none;
							border-style:solid;
							border-width:2px;
							border-color:#1ECD97;
							border-radius:20px;
							background-color:#fff;
							outline:none;}
							.zhuce1 input[type='submit']:hover{
								background-color:#1ECD97;}
				</style>
                
                
	<div class="zhuce1">
		<form action="fasongyoujian.php" method="POST" name="form1" id="form1" >
			<div>
            <a style="font-size:18px;text-shadow:#FF69B4 0px 1px 0px;position:relative;left:7px;top:3px;">注册</a>
			<a style="position:relative;left:210px;top:3px;" href="denglu.php">登录账号</a>
           
            <div style="width:333px;height:1px; background:#1ECD97;position:relative;top:9px;"></div> 
            
            <span   style="position:relative;left:7px;top:13px;">注册邮箱：</span>        
			<p><input autocomplete='off' name="email" type="text" id="email"   placeholder="EG.233333333@example.com"  onblur="checkyouxiang1()" onkeydown="checkyouxiang2()" onkeyup="checkyouxiang3()"/>
			
			<span id="youxiangtishi" style="position:relative;left:3px;font-size:12px;"></span>
            </p>
            
           <span   style="position:relative;left:7px;bottom:10px;"> 昵称：</span>
            	<p>	<input autocomplete='off' style="position:relative;bottom:23px;" name="username" type="text" id="username" placeholder="EG.Tobiichi_Oragami_11" onblur="checknicheng1()" onkeydown="checknicheng2()" onkeyup="checknicheng3()" maxlength="20" />
				
				<span id="nichengtishi" style="position:relative;bottom:22px;left:3px;font-size:12px;"></span>
                </p>
                
			<span style="position:relative;left:7px;bottom:34px;">密码：</span>
			<p> <input style="position:relative;bottom:47px;" name="password" type="password" id="password" onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
				<span id="mimatishi"  style="position:relative;bottom:47px;left:3px;font-size:12px;"></span>
               </p>
               
				<span style="position:relative;left:7px;bottom:58px;">密码确认：</span>
				<P><input style="position:relative;bottom:71px;" name="password1" type="password" id="password1"  onblur="checkquerenpwd1()" onkeydown="checkquerenpwd2()" onkeyup="checkquerenpwd3()" maxlength="17" /> 
				<span id="querentishi" style="position:relative;bottom:71px;left:3px;font-size:12px;"></span>
                </P>
                
				<span style="position:relative;left:7px;bottom:82px;">验证码：</span>
				<p><input autocomplete='off'  style="position:relative;bottom:94px;" name="yanzheng" type="text" id="yanzheng" onfocus="checkyanzheng()" onblur="checkyanzheng1()" onkeydown="checkyanzheng2()"  onkeyup="checkyanzheng3()"  size="16" maxlength="16" />
					<span id="yanzhengtishi" style="position:relative;left:3px;bottom:94px;font-size:12px;"></span>
                    <span id="tupian" style="position:relative;left:7px;bottom:87px;"></span>
                   </p>

				
                <div style="position:absolute;left:4px;bottom:50px;">
				<input style="position:relative;top:6px;" name="tongyi" type="checkbox" id="tongyi" onmouseout="check3()" onclick="check3()" />

					<span style="position:relative;right:5px;">  我已同意《……网会员注册协议》</span>
              </div>
              
                    <div style="position:absolute;left:7px;bottom:9px">
					<input name="zhuce" type="submit"  disabled="true" id="zhuce" value="注册"/> 		
					</div>


					<div> <input name="addtime" type="hidden" id="addtime" value="<?php date_default_timezone_set('Asia/Shanghai'); echo date("Y-m-d"); ?>" />
                    </div>
					<div>
						<input name="dongjie" type="hidden" id="dongjie" value="0" />
             		 </div>
</div>
	  </form>
      </div>
				
                
                </body>
				</html>