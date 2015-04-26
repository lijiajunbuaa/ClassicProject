<!DOCTYPE html>
<meta charset = "utf-8">
<?php  
	define('GW_UPLOADPATH', './Images/');
	define('GW_MAXFILESIZE',307200);
	$name = $_POST['name'];
	$score = $_POST['score'];
?>
<html>
<head>
	<title></title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<label>Name:<input type="text" name="name" value="<?php if(!empty($name)) echo ($name);?>" /></label>
<br /><br />
<label>Score:<input type="text" name="score" value="<?php if(!empty($score)) echo ($score);?>" /></label>
<br /><br />
<label>Screen shot:<input type="file" name="screenshot"/></label>
<br /><br />
<input type="submit" name="submit" value="Add"/>
</form>
</body>
</html>
<?php  
	
	$screenshot = $_FILES['screenshot']['name'];
	$screenshot_type= $_FILES['screenshot']['type'];
	$screenshot_size = $_FILES['screenshot']['size'];
	if(isset($_POST['submit']))
	{
		if(!empty($name)&&is_numeric($score)&&!empty($screenshot))
		{
			if(($screenshot_type=='image/png'||$screenshot_type=='image/jpeg'||$screenshot_type=='image/pjpeg'||$screenshot_type=='image/gif')&& ($screenshot_size > 0 && $screenshot_size < GW_MAXFILESIZE))
			{
				if($_FILES['screenshot']['error'] == 0)
				{
					$target = GW_UPLOADPATH.$screenshot;
					if(move_uploaded_file($_FILES['screenshot']['tmp_name'], $target))
					{
						$dbc = mysql_connect("localhost","root","");
						mysql_select_db("test");
						$query = "Insert into score(time,name,score,screenshot) values(NOW(),'$name','$score','$screenshot')";
						mysql_query($query);
						echo "Insert Successfully.";

						mysql_close($dbc);
					}
					else
					{
						echo '<p>上传文件错误</p>';
					}

				}
			}
			else
			{
				echo '<p>文件格式错误或文件大于'.(GW_MAXFILESIZE/1024).'KB</p>';
			}
			@unlink($_FILES['screenshot']['tmp_name']);

		}
		else
		{
			echo '<p>请填写全部信息</p>';
		}
	}
?>