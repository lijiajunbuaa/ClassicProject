<!DOCTYPE html>
<meta charset = "utf-8">
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<p>确定要删除吗？</p>

<?php  
	require_once("appvars.php");
	require_once("connectvars.php");
	require_once("authorize.php");
	if(isset($_GET['id'])&&isset($_GET['name'])&&isset($_GET['time'])&&isset($_GET['score'])&&isset($_GET['screenshot']))
	{
		$id = $_GET['id'];
		$name = $_GET['name'];
		$time = $_GET['time'];
		$score = $_GET['score'];
		$screenshot = $_GET['screenshot'];
?>
		<label>name:<?php echo $name;?></label><br /><br />
		<label>time:<?php echo $time;?></label><br /><br />
		<label>score:<?php echo $score;?></label><br /><br />


	<label><input type="radio" name="verify" value="Yes">Yes</label>
	<label><input type="radio" name="verify" value="No" checked="checked">No</label><br /><br />
	<input type="submit" name="submit" value="提交" />
	<br / ><br />
	<label><a href="highscore_admin.php"><<返回管理页</a></label>
</form>
</body>
</html>
<?php
		}
		else
		{
			echo "<p>没有选择要删除的项目</p>";
		}
		
		if(isset($_POST['submit']))
		{
			if($_POST['verify'] == 'Yes')
			{
				@unlink(GW_UPLOADPATH.$screenshot);
				$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
				mysql_select_db("test");
				$query = "DELETE FROM score where id = '$id' LIMIT 1";
				$result = mysql_query($query);
				mysql_close($dbc);
				Header("Location:highscore_admin.php");
			}
				
			else
			{
				Header("Refresh:5;url=highscore_admin.php");
			}   
		}
		
		
		
	
?>