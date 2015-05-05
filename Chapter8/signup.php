<?php
	$page_title = 'Sign Up';
	require_once('header.php');
	require_once('connectvars.php');
	require_once('appvars.php');
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db('test');
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$dpassword1 = md5($password1);
	$dpassword2 = md5($password2);
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$city = $_POST['city'];
	$picture_name = $_FILES['picture']['name'];
	$picture_type = $_FILES['picture']['type'];
	$picture_size = $_FILES['picture']['size'];
	$picture_path = $_FILES['picture']['tmp_name'];
?>
<p>Please enter your username and desired password to sign up to Mismatch.</p>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
      <label for="first_name">First name:</label>
      <input type="text" id="first_name" name="first_name" value="<?php if (!empty($first_name)) echo $first_name; ?>"/><br />
      <label for="last_name">Last name:</label>
      <input type="text" id="last_name" name="last_name" value="<?php if (!empty($last_name)) echo $last_name; ?>"/><br />
      <label>
      	Gender:
      	<input type="radio" name="gender" value="male" />Male
      	<input type="radio" name="gender" value="female" />Female<br/>
      </label>
      <label for="birthdate">Birthdate:</label>
      <input type="date" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; ?>" /><br/>
      <label>
      	City:
      	<select name="city">
      		<option value="Beijing">Beijing</option>
      		<option value="Shanghai">Shanghai</option>
      		<option value="Guangzhou">Guangzhou</option>
      		<option value="Chongqing">Chongqing</option>
      		<option value="Haerbin">Haerbin</option>
      		<option value="Wuhan">Wuhan</option>
      	</select>
      </label>
      <br />
      <label>
      	Upload real photo:
      	<input type="file" name="picture"/>
      </label>
      
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
</form>
<?php  
	
	if(isset($_POST['submit']))
	{
		if(!empty($username)&&!empty($password1)&&!empty($password2)&&!empty($first_name)&&!empty($last_name)&&!empty($gender)&&!empty($birthdate)&&!empty($city)&&!empty($picture_name))
		{
			if(($picture_type == 'image/png'||$picture_type == 'image/gif'||$picture_type == 'image/jpeg'||$picture_type == 'image/pjpeg')&&$picture_size > 0 && $picture_size <= GW_MAXFILESIZE)
			{
				if($dpassword1 == $dpassword2)
				{
					$namequery = "select username from mismatch_user where username = '$username'";
					$namedata = mysql_query($namequery);
					if(mysql_num_rows($namedata) == 0)
					{
						$query = "INSERT INTO mismatch_user(username,password,join_date,first_name,last_name,gender,birthdate,city,picture)VALUES ('$username','$dpassword1',NOW(),'$first_name','$last_name','$gender','$birthdate','$city','$picture_name')";
						$target = GW_UPLOADPATH.$picture_name;
						if(move_uploaded_file($picture_path, $target))
						{
							mysql_query($query)or die('cannot qurery');
							echo 'Sign Up Successfully!';
							@unlink($picture_path);
							Header('Refresh:1;url=login.php');
						}	
						
					}
					else
					{
						echo 'Please change the username';
					}
				}
				else
				{
					echo 'The passwords are not agreed';
				}
			}
			else
			{
				echo 'The photo type is not correct or the size is too large';
			}
		}
		else
		{
			echo "Please type in all the information";
		}
	}
?>
<?php  
	mysql_close($dbc);
	require_once('footer.php');
?>