<?php  
	echo "<hr  />";
	if(isset($_SESSION['username']))
	{
		echo '<a href="index.php">Home</a>&#10084';
		echo '<a href="viewprofile.php">View Profile</a>&#10084';
		echo '<a href="editprofile.php">Edit Profile</a>&#10084';
		echo '<a href="questionnaire.php">Questionnaire</a>&#10084';
		echo '<a href="mymismatch.php">My Mismatch</a>&#10084';
		echo '<a href="logout.php">Log Out('.$_SESSION['username'].')</a>&#10084';
	}
	else
	{
		echo '<a href="login.php">Log In</a>&#10084';
		echo '<a href="signup.php">Sign Up</a>&#10084';
	}
	echo "<hr />";
?>