<?php 
	require_once('startsession.php');
	$page_title = "Where opposites attract!";
	require_once('header.php');
	require_once('connectvars.php');
	require_once('appvars.php');
	require_once('navmenu.php');
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db('test');
	$query = "Select id,first_name,picture from mismatch_user where first_name is not null order by join_date desc limit 5";
	$data = mysql_query($query);
	echo '<h4>Latest members:</h4>';
	echo '<table>';
	while($row = mysql_fetch_array($data))
	{
		if(is_file(GW_UPLOADPATH.$row['picture'])&&filesize(GW_UPLOADPATH.$row['picture'])>0)
		{
			echo '<tr><td><img src="'.GW_UPLOADPATH.$row['picture'].'" alt="'.$row['first_name'].'"/><td/>';
		}
		else
		{
			echo '<tr><td><img src="'.GW_UPLOADPATH.'nopic.jpg'.'" alt="'.$row['first_name'].'"/><td/>';
		}
		if(isset($_SESSION['user_id']))
		{
			echo '<td><a href="viewprofile.php?user_id='.$row['id'].'">'.$row['first_name'].'</a></td></tr>';
		}
		else
		{
			echo '<td>'.$row['first_name'].'</td></tr>';
		}
	}
	echo '</table>';
	mysql_close($dbc);

 ?>
 <?php  
 	require_once('footer.php');
 ?>