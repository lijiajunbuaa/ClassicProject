<?php

	if(isset($_COOKIE['userJIZHU'])){$user=$_COOKIE['userJIZHU']; setcookie('userJIZHU',$user,time()-30*24*3600);}
	session_start();
	unset($_SESSION['MM_Username']);
	echo "<script>location.href='index.php';</script>";
?>