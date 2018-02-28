<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	require_once('phpscripts/config.php');

	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill in the required fields";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

	<div id="loginPage">
		<div class="loginCon">
	<h1 id="title">Welcome Dude</h1>
	<?php if(!empty($message)){echo $message;}?>

	<form action="admin_login.php" method="post">
		<label><h2>Username:</h2></label>
		<input class="inputLog" type="text" name="username" value="">
		<br>
		<label><h2>Password:</h2></label>
		<input class="inputLog" type="text" name="password" value="">
		<br>
		<input class="SubBtn" type="submit" name="submit" value="Show me the money">
	</form>
	<!-- sign up Form -->
	<a id="createUser" href="admin_createuser.php">Create New User</a>



</body>
</html>
