<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
	require_once('appvars.php');
	require_once('connectvars.php');
	require_once('authorize.php');
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db('test');
	$query = "SELECT * FROM score ORDER BY score desc,time asc";
	$result = mysql_query($query);
	echo '<table>';
	while($row = mysql_fetch_array($result))
	{
?>
	<tr>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['time'];?></td>
		<td><?php echo $row['score'];?></td>
		<td><a href="removescore.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'];?>&time=<?php echo $row['time'];?>&score=<?php echo $row['score'];?>&screenshot=<?php echo $row['screenshot'];?>">移除</a></td>
		<?php
			if($row['approved'] == 0)
			{
				?>
					<td><a href="approvescore.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'];?>&time=<?php echo $row['time'];?>&score=<?php echo $row['score'];?>&screenshot=<?php echo $row['screenshot'];?>">认证</a></td>
				<?php
			}
		?>
	</tr>
<?php
	}
	echo '</table>';
	mysql_close($dbc);
?>