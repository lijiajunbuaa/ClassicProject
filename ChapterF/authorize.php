<?php  
	$user_name = 'lijiajun';
	$password = '123';
	if(!isset($_SERVER['PHP_AUTH_USER'])||!isset($_SERVER['PHP_AUTH_PW'])||$_SERVER['PHP_AUTH_USER'] != $user_name || $_SERVER['PHP_AUTH_PW'] != $password)
	{
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate:Basic realm="HighScore_Admin Page"');
		exit('<h2>HighScore</h2>你输入了无效用户名和密码');
	}
?>