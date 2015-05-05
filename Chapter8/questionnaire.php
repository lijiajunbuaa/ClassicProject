<?php  
	require_once('startsession.php');
	$page_title = 'Questionnaire';
	$user_id = $_SESSION['user_id'];
	require_once('header.php');
	require_once('connectvars.php');
	require_once('appvars.php');
	if(!isset($_SESSION['user_id']))
	{
		echo '<p>Please<a href="login.php">log in</a> to access this page.';
		exit();
	}
	require_once('navmenu.php');
	$dbc=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	$query = "select * from mismatch_response where user_id='$user_id'";
	$data = mysql_query($query);
	//If this user has never answered the questionnaire,insert empty response into the database
	if(mysql_num_rows($data)==0)
	{
		$query = "select topic_id from mismatch_topic order by category_id,topic_id";
		$data = mysql_query($query);
		$topicIDs = array();
		while ($row = mysql_fetch_array($data)) 
		{
			array_push($topicIDs, $row['topic_id']);
		}
		foreach ($topicIDs as $topic_id) 
		{
			$query = "insert into mismatch_response(user_id,topic_id) values ('$user_id','$topic_id')";
			mysql_query($query);
		}
	}
	if(isset($_POST['submit']))
	{
		foreach ($_POST as $response_id => $response) {
			$query = "update mismatch_response set response='$response'where response_id = '$response_id'";
			mysql_query($query);
		}
	}

	$query=
	"
		select mr.response_id,mr.topic_id,mr.response,mt.name as topic_name,mc.name as category_name 
		from mismatch_response as mr 
		inner join mismatch_topic as mt using (topic_id)
		inner join mismatch_category as mc using(category_id)
		where user_id = '$user_id'
	";
	$data = mysql_query($query);
	$responses = array();
	while($row = mysql_fetch_array($data))
	{
		array_push($responses, $row);
	}
	mysql_close($dbc);
	$category=$responses[0]['category_name'];
?>
<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<p>How do you feel about the topic?</p>
	<fieldset>
		<legend><?php echo $category;?></legend>
		<?php  
			foreach ($responses as $response) 
			{	
				$response_id = $response['response_id'];
				$reflect = $response['response'];
				$topic = $response['topic_name'];
				if($response['category_name'] != $category)
				{
					$category = $response['category_name'];
					echo "</fieldset><fieldset><legend>$category</legend>";
				}
				?>
					<?php echo $topic; ?>
					<label><input type="radio" name="<?php echo $response_id; ?>" value="1" <?php  if($reflect == 1) echo 'checked = "checked"';?>/>Like</label>
					<label><input type="radio" name="<?php echo $response_id; ?>" value="2" <?php  if($reflect == 2) echo 'checked = "checked"';?>/>Hate</label>
				
				<br />	
				<?php
			}
		?>
	</fieldset>
	<input type="submit" name="submit" value="Save Questionnaire" />
</form>
<?php  
	require_once('footer.php');
?>