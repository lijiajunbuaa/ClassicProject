<?php  
	$page_title = 'Edit Profile';
	require_once('header.php');
	require_once('startsession.php');
	require_once('navmenu.php');
	require_once('connectvars.php');
	require_once('appvars.php');
	$id = $_SESSION['user_id'];
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	$query1 = "select * from mismatch_user where id='$id'";
	$result1 = mysql_query($query1);
	$data1 = mysql_fetch_array($result1);
	$username = $data1['username'];
	$first_name = $data1['first_name'];
	$last_name = $data1['last_name'];
	$g = $data1['gender'];
	$gender = '';
	if($g == 'm')
		$gender = "male";
	else
		$gender = "female";
	$birthdate = $data1['birthdate'];
	$city = $data1['city'];
	$picture = GW_UPLOADPATH.$data1['picture'];
?>
<p>Edit Your Profile</p>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php  echo $username; ?>" /><br />
      <label for="first_name">First name:</label>
      <input type="text" id="first_name" name="first_name" value="<?php  echo $first_name; ?>"/><br />
      <label for="last_name">Last name:</label>
      <input type="text" id="last_name" name="last_name" value="<?php  echo $last_name; ?>"/><br />
      <label>
      	Gender:
      	<input type="radio" name="gender" value="male" <?php if($gender == 'male') echo 'checked=checked';?>/>Male
      	<input type="radio" name="gender" value="female"  <?php if($gender == 'female') echo 'checked=checked';?> />Female<br/>
      </label>
      <label for="birthdate">Birthdate:</label>
      <input type="date" id="birthdate" name="birthdate" value="<?php  echo $birthdate; ?>" /><br/>
      <label>
      	City:
      	<select name="city">
      		<option value="Beijing" <?php if($city == 'Beijing') echo 'selected=selected';?>>Beijing</option>
      		<option value="Shanghai" <?php if($city == 'Shanghai') echo 'selected=selected';?>>Shanghai</option>
      		<option value="Guangzhou" <?php if($city == 'Guangzhou') echo 'selected=selected';?>>Guangzhou</option>
      		<option value="Chongqing" <?php if($city == 'Chongqing') echo 'selected=selected';?>>Chongqing</option>
      		<option value="Haerbin" <?php if($city == 'Haerbin') echo 'selected=selected';?>>Haerbin</option>
      		<option value="Wuhan" <?php if($city == 'Wuhan') echo 'selected=selected';?>>Wuhan</option>
      	</select>
      </label>
      <br />
      <img src="<?php echo $picture;?>"/>
      <label>
      	Change to Another Photo:
      	<input type="file" name="picture"/>
      </label>
    </fieldset>
    <input type="submit" value="Change" name="submit" />
</form>
<?php
	mysql_close($dbc);
	require_once('footer.php');
?>