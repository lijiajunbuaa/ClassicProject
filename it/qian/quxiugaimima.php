<?php session_start();
ini_set("display_errors","Off");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雾都驿站-修改密码</title>
</head>


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
					</script>
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


<body>
<style type="text/css">
.xiugai1{font-family:"微软雅黑";font-size:15px;}
.xiugai1 input[type='password']{
					padding:0 0 0 10px;
					position:relative;left:7px;
					border-style:solid;
					border-width:1px;
					border-radius:3px;
					border-color:#1ECD97;
					outline-color:#FF0088;
					width:200px;height:30px;}
.xiugai1 input[type='submit']{
							width:80px;height:30px;							
							-webkit-appearance:none;
							border-style:solid;
							border-width:2px;
							border-color:#1ECD97;
							border-radius:20px;
							background-color:#fff;
							outline:none;}
							.xiugai1 input[type='submit']:hover{
								background-color:#1ECD97;}
</style>
<div class="xiugai1">

<form id="form1" name="form1" method="post" action="xiugaimima.php">
  <p>
         请输入密码：<input name="password" type="password" id="password"  onblur="checkpwd1()" onkeydown="checkpwd2()"  onkeyup="checkpwd3()" maxlength="17" />               
				<span id="mimatishi" style="position:relative;left:10px;"></span>
					<input style="position:relative;left:15px;" type="submit" name="xiugai" id="xiugai" value="确认修改" disabled="true"/>
					<input type="hidden" name="userN" id="userN" value="<?php if(isset($_SESSION['MM_Username'])){echo $_SESSION['MM_Username'];}else if(isset($_COOKIE['userJIZHU'])){echo $_COOKIE['userJIZHU'];}?>"/>
    
    </p>
		 
       </form> 
          
  </form>
</body>
</html>