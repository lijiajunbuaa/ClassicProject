<?php  
	$page_title = 'Log In';
	require_once('header.php');
	require_once('connectvars.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dpassword = md5($password);
	//$remember = $_POST['remember'];
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db('test');
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<fieldset>
	<legend>Log In INFO</legend>
	<label>Username:<input type="text" name="username" value="<?php if(isset($username)) echo $username;?>" /></label><br />
	<label>Password:<input type="password" name="password" /></label><br />
	<!--<label><input type="checkbox" name="remember" value="remember" />Remember ME</label><br />-->
	<input type="submit" name="submit" value="LogIn"/>
</fieldset>
</form>
<?php  

	if(isset($_POST['submit']))
	{
		if(!empty($username)&&!empty($password))
		{
			$query = "SELECT id,username FROM mismatch_user WHERE username = '$username'AND password = '$dpassword'";
			$data = mysql_query($query);
			$query1 = "SELECT id,username FROM mismatch_user WHERE username = '$username'";
			$data1 = mysql_query($query1);
			if((mysql_num_rows($data) == 0)&&(mysql_num_rows($data1)==1))
			{
				echo 'Wrong Password';
			}
			else if((mysql_num_rows($data) == 1)&&(mysql_num_rows($data1) == 1))
			{
				$row = mysql_fetch_array($data);
				setcookie('user_id',$row['id'],time()+60*60*24*7);
				setcookie('username',$row['username'],time()+60*60*24*7);
				header("Location:index.php");
			}
			else
			{
				echo "Username does not exist";
			}
		}
		else
		{
			echo 'Please fill in the username and password';
		}
	}
?>
<?php  
	mysql_close($dbc);
	require_once('footer.php');
?>