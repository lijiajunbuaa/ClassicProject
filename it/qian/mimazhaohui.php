<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-找回密码</title>
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
					case "email_ok":
					document.getElementById("youxiangtishi").innerHTML="此邮箱未注册";
					a1=0;
					check3();
					break;
					case "email_error":
					document.getElementById("youxiangtishi").innerHTML="";
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

				var a1=0;
				var a3=0;			

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
					var suiji;
				
					function checkyanzheng1(){
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
							if(a1==1&&a3==1){
								document.getElementById("zhaohui").disabled=false;
							}

						}
						function check2(){
							if(a1!=1||a3!=1){
								document.getElementById("zhaohui").disabled=true;
							}

						}
						function check3(){
							check();check2();
						}
						</script>
                        <style type="text/css">
			.zhaohui1{margin:0 auto;width:970px;position:relative;top:50px;right:20px;
				width:333px;height:255px;
				border-style:solid;
				border-width:1px;
				border-radius:7px;
				border-color:#1ECD97;}
				.zhaohui1 a{font-family:'微软雅黑';font-size:16px;text-decoration:none;color:#000}
				.zhaohui1 a:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.zhaohui1 a:visited{color:#000;}
				.zhaohui1 span{font-family:'微软雅黑';font-size:14px;}
				.zhaohui1 span:hover{text-shadow:#FF69B4 0px 1px 0px;}
				.zhaohui1 input[type='text']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
				.zhaohui1 input[type='password']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
				.zhaohui1 input[type='checkbox']{
					-webkit-appearance:none;
						width:15px;height:15px;
					outline:none;
							border-width:40px;
							
							background:#fff;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
							.zhaohui1 input[type='checkbox']:checked{
							width:15px;height:15px;
							
							-webkit-appearance:none;
							outline:none;
							border-width:40px;
							
							background:#1ECD97;
							
							border:2px solid #1ECD97;
							border-radius:50%;}
						.zhaohui1 input[type='submit']{
							width:120px;height:30px;							
							-webkit-appearance:none;
							border-style:solid;
							border-width:2px;
							border-color:#1ECD97;
							border-radius:20px;
							background-color:#fff;
							outline:none;}
							.zhaohui1 input[type='submit']:hover{
								background-color:#1ECD97;}
						</style>
<div class="zhaohui1">
<form action="zhaohuiyoujian.php" method="POST" name="form1" id="form1" >
			<div>
            <a style="font-size:18px;text-shadow:#FF69B4 0px 1px 0px;position:relative;left:7px;top:3px;">找回密码</a>
			<a style="position:relative;left:174px;top:3px;" href="denglu.php">登录账号</a>
            <div style="width:333px;height:1px; background:#1ECD97;position:relative;top:9px;"></div> 
            
            <span style="position:relative;left:7px;top:13px;">您的邮箱：</span>        
			<p><input autocomplete='off' name="email" type="text" id="email"  placeholder="EG：233333333@example.com"  onblur="checkyouxiang1()" onkeydown="checkyouxiang2()" onkeyup="checkyouxiang3()"/>
				
			<span id="youxiangtishi" style="position:relative;left:3px;font-size:12px;"></span>
           </p>
				<span style="position:relative;left:7px;bottom:10px;">验证码：</span>
				
                 <p>
                	<input autocomplete='off' style="position:relative;bottom:23px;" name="yanzheng" type="text" id="yanzheng"  onfocus="checkyanzheng()" onblur="checkyanzheng1()" onkeydown="checkyanzheng2()"  onkeyup="checkyanzheng3()"  size="16" maxlength="16" />
				  <span id="yanzhengtishi" style="position:relative;bottom:23px;left:3px;font-size:12px;"></span>
                    
               
                <span id="tupian" style="position:relative;left:7px;bottom:15px;"></span> 
                </p>


                    <div style="position:absolute;left:7px;bottom:13px">
					<input name="zhaohui" type="submit"  disabled="true" id="zhaohui" value="发送到验证邮箱"/> 
					
			  </div>

					
</div>
	  </form>
</div>
</body>
</html>