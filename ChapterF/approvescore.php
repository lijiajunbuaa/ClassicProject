<!DOCTYPE html>
<meta charset = "utf-8">
<html>
<head>
	<title></title>
</head>
<body>
<form action = "<?php $_SERVER['PHP_SELF']?>" method="post">
	<p>验证信息如下</p>
<?php  
	require_once('appvars.php');
	require_once('connectvars.php');
	require_once('authorize.php');

	if(isset($_GET['id'])&&isset($_GET['name'])&&isset($_GET['time'])&&isset($_GET['score'])&&isset($_GET['screenshot']))
	{
		$id = $_GET['id'];
		$name = $_GET['name'];
		$time = $_GET['time'];
		$score = $_GET['score'];
		$screenshot = $_GET['screenshot'];
		
	
?>
		<strong>Name:<?php echo $name;?></strong><br />
		<p>Time:<?php echo $time;?></p>
		<p>Score:<?php echo $score;?></p>
		<img style="width:200px;height:200px;"src="<?php echo (GW_UPLOADPATH.$screenshot);?>"/><br/>
		<input type="radio" name="confirm" value="Yes" />Yes
		<input type="radio" name="confirm" value="No" checked="checked" />No
		<br/>
		<input type="submit" name="submit" value="提交"/><br/>
		<label><a href="highscore_admin.php"><<返回管理页</a></label>
<?php
	}
	else
	{
		echo '<p>请选择验证项目</p>';
	}	
	if(isset($_POST['submit']))
	{
		if($_POST['confirm']=='Yes')
		{
			$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			mysql_select_db("test");
			$query = "UPDATE score SET approved = 1 WHERE id='$id'";
			mysql_query($query);
			mysql_close($dbc);
			echo "<br/>成功验证";
			Header("Refresh:2;url=highscore_admin.php");
		}
		else
		{
			Header("Location:highscore_admin.php");
		}
	}
?>
	
</form>
</body>
</html>