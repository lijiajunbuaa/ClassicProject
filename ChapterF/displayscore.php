
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.img{width: 200px;height:200px;display: block;}
	</style>
</head>
<body>

</body>
</html>
<?php  
	define('GW_UPLOADPATH', 'Images/');
	$dbc = mysql_connect("localhost","root","");
	mysql_select_db("test");
	$query = "select * from score where approved = 1 order by score desc ,time asc";
	$result = mysql_query($query);
	echo "<table>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr><td>";
		echo '<span><strong>Score: '.$row['score'].'</strong></span><br />';
		echo "<strong>Name:</strong>".$row['name']."<br/>";
		echo "<strong>Date:</strong>".$row['time']."<br /><td>";
		$path = GW_UPLOADPATH.$row['screenshot'];
		if(is_file($path)&&filesize($path) > 0)
			echo'<td><img src="'.$path.'"  class="img" alt = "Score Picture"/></td><tr>';
		else
			echo '<td><img src="" class="img" alt = "Cannot find"/></td><tr>';
	}
	echo "</table>";
	mysql_close($dbc);
?>