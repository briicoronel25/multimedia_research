
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body>
	<div id="createuserPage">
	<div class="createuserCon">
	<h1 id="title">Let's register!</h1>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">

	<label><h2>First Name:<h2></label>
	<input class="inputLog" type="text" name="fname" value="	<?php if(!empty($fname)){echo $fname;} ?>
"><br><br>

	<label><h2>Username:</h2></label>
	<input class="inputLog" type="text" name="username" value="	<?php if(!empty($username)){echo $username;} ?>
"><br><br>

	<label><h2>Email:</h2></label>
	<input class="inputLog" type="text" name="email" value="	<?php if(!empty($email)){echo $email;} ?>
"><br><br>

	<label><h2>User Level:</h2></label>
	<select name="userlvl">
		<option value="">Please select a user level</option>
		<option value="2">Web Admin</option>
		<option value="1">Web Master</option>
	</select><br><br>

	<input class="createUser-bttn" type="submit" name="submit" value="Create User">
	</form>
 </div>
</div>

<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	require_once('phpscripts/send_mail.php');
	include ('phpscripts/PHPMailer.php');
	include ('phpscripts/SMTP.php');
	include ('phpscripts/OAuth.php');
	// confirm_logged_in();
	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$userlvl = $_POST['userlvl'];
		if(empty($userlvl)){
			$message = "Please select a user level.";
		}else{
			$pass = createUser($fname, $username, $email, $userlvl);
			$result= sendMail($fname,$username,$pass,$email);
			redirect_to("admin_index.php");
		}
	}

?>
</body>
</html>
