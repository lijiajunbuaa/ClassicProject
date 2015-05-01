<?php  
	require_once('startsession.php');
	$page_title = "View Profile";
	require_once('header.php');
	require_once('navmenu.php');
	require_once('connectvars.php');
	require_once('appvars.php');
	if(!empty($_GET['user_id']))
		$user_id = $_GET['user_id'];
	else
		$user_id = $_SESSION['user_id'];
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db('test');
	$query = "select  * from mismatch_user where id='$user_id'";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
	$username = $data['username'];
	$join_date = $data['join_date'];
	$first_name = $data['first_name'];
	$last_name = $data['last_name'];
	$g = $data['gender'];
	$gender = '';
	if($g == 'm')
		$gender = "male";
	else
		$gender = "female";
	$birthdate = $data['birthdate'];
	$city = $data['city'];
	$picture = GW_UPLOADPATH.$data['picture'];
?>
<table>
	<tr>
		<td>Username:</td>
		<td><?php echo $username;?></td>
	</tr>
	<tr>
		<td>Joindate:</td>
		<td><?php echo $join_date;?></td>
	</tr>
	<tr>
		<td>First name:</td>
		<td><?php echo $first_name;?></td>
	</tr>
	<tr>
		<td>Last name:</td>
		<td><?php echo $last_name;?></td>
	</tr>
	<tr>
		<td>Gender:</td>
		<td><?php echo $gender;?></td>
	</tr>
	<tr>
		<td>Birthdate:</td>
		<td><?php echo $birthdate;?></td>
	</tr>
	<tr>
		<td>City:</td>
		<td><?php echo $city;?></td>
	</tr>
	<tr>
		<td>Picture:</td>
		<td><img src="<?php echo $picture;?>"/></td>
	</tr>
</table>
<?php
	mysql_close($dbc);
	require_once('footer.php');
?>