<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');

	//Displays date/time of LAST successful login
	require_once('./phpscripts/connect.php');
	confirm_logged_in();
	date_default_timezone_set('Canada/Eastern');

		//variable for hour and 24 hour format
		$Hour = date('G'); //24-hour format of an hour (0 to 23)

		// setting if statments and then echoing out our message, if the hour is greater than our equal to *insert number* AND is less than and equal to *insert new hour* the message will echo
		if ( $Hour >= 5 && $Hour <= 11 ) {
		    echo "<h2 class='time-message'>Morning dude, did you have some coffee already?</h2>";
		} else if ( $Hour >= 12 && $Hour <= 18 ) {
		    echo "<h2 class='time-message'>Good Afternoon dude, Keep it great! </h2>";
		} else if ( $Hour >= 19 || $Hour <= 4 ) {
		    echo "<h2 class='time-message'>Whatsup dude, ready to party?</h2>";
		}

		mysqli_close($link);

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
	<div id="welcomePage">
		<div class="welcomeCon">
	<h1>Welcome Company Name to your admin page</h1>
	<?php echo "<h2>Hi {$_SESSION['user_name']}</h2><p>You last logged in {$_SESSION['user_date']}</p>"; ?>
	<a href="admin_createuser.php">Create User</a><br>
	<a href="admin_edituser.php">Edit User</a><br>
	<a href="admin_deleteuser.php">Delete User</a><br>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
    </div>
  </div>
</body>
</html>
