<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');

	//Displays date/time of LAST successful login
	require_once('./phpscripts/connect.php');
	confirm_logged_in();

	$lastLogin = "UPDATE `tbl_user` SET `user_lastLogin` = now()  WHERE user_id=1";

	// This is updating our most recent login time into the database
if(mysqli_multi_query($link, $lastLogin)){
		echo  "its working"; // "its working" message is showing up but not the time of the last login
} else {
		echo " is Broken " . mysqli_error($link);
}

mysqli_close($link);
//end last logIn

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
</head>
<body>
	<h1>Welcome Company Name to your admin page</h1>
	<?php echo "<h2>Hi-{$_SESSION['user_name']}</h2>"; ?>
	<a href="admin_createuser.php">Create User</a><br>
	<a href="admin_edituser.php">Edit User</a><br>
	<a href="admin_deleteuser.php">Delete User</a><br>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
