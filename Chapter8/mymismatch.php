<?php  
	$page_title='My Mismatch';
	require_once('header.php');
	require_once('startsession.php');
	require_once('navmenu.php');
	require_once('connectvars.php');
	require_once('appvars.php');
	$dbc=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	$login_user_id=$_SESSION['user_id'];
	$query="select * from mismatch_response where user_id='$login_user_id'";
	$data=mysql_query($query);
	if(mysql_num_rows($data) != 0)
	{
		//Grab the response of user who is now logging in.
		$query="SELECT mr.response_id,mr.topic_id,mr.response,mt.name as topic_name
		from mismatch_response as mr 
		inner join mismatch_topic as mt using(topic_id) 
		where mr.user_id = '$login_user_id'";
		$data=mysql_query($query);
		$user_response=array();
		while($row=mysql_fetch_array($data))
		{
			array_push($user_response, $row);
		}
		$user_response_num=count($user_response);
		//Initialize the mismatch search result
		$mismatch_score = 0;
		$mismatch_user_id = -1;
		$mismatch_topics=array();
		//Loop through the user table to grab other users except the current logging in user.
		$query="select id from mismatch_user where id != $login_user_id";
		$data=mysql_query($query);
		while($row = mysql_fetch_array($data))
		{
			$user_id = $row['id'];
			$query2="select response_id,topic_id,response from mismatch_response where user_id='$user_id'";
			$data2=mysql_query($query2);
			$mismatch_response=array();
			while($row2=mysql_fetch_array($data2))
			{
				array_push($mismatch_response, $row2);
			}
			//Compare each response and calculate the score
			$score=0;
			$topics=array();
			for($i = 0;$i < $user_response_num;$i++)
			{
				if($user_response[$i]['response'] + $mismatch_response[$i]['response'] == 3)
				{
					$score++;
					array_push($topics, $user_response[$i]['topic_name']);
				}
			}
			if($score > $mismatch_score)
			{
				$mismatch_score = $score;
				$mismatch_user_id = $row['id'];
				$mismatch_topic = array_slice($topics, 0);
			}
		}
		if($mismatch_user_id != -1)
		{
			$query = "select * from mismatch_user where id = '$mismatch_user_id'";
			$data = mysql_query($query);
			if(mysql_num_rows($data) == 1)
			{
				$row = mysql_fetch_array($data);
				echo "<table><tr><td>Username:</td><td>".$row['username']."</td></tr>";
				echo "<tr><td>Firstname:</td><td>".$row['first_name']."</td></tr>";
				echo "<tr><td>Lastname:</td><td>".$row['last_name']."</td></tr>";
				echo "<tr><td>City:</td><td>".$row['city']."</td></tr>";
				//echo "<tr><td>State:</td><td>".$row['state']."</td></tr>";
				echo '<tr><td>Picture:</td><td><img src="'.GW_UPLOADPATH.$row['picture'].'"/></td></tr>';
				echo "</table>";
				echo '<h4>You are mismatched on the following '.count($mismatch_topic).' topics</h4>';
				foreach ($mismatch_topic as $topic) {
					echo $topic;
					echo "<br />";
				}
				echo '<h4>View <a href="viewprofile.php?user_id='.$row['id'].'">'.$row['first_name'].'\'s profile</a></h4>';
			}
		}
	}
	else
	{
		echo '<label>Please finish the <a href="questionnaire.php">Questionnaire Page</a></label>';
	}
	require_once('footer.php');
?>