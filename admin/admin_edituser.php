<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	require_once('phpscripts/connect.php');
	//confirm_logged_in();
	$id = $_SESSION['user_id'];
	//echo $id;
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
	//echo $found_user;

	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
		
		echo("<p>Make query..{$id}</p>");
		$logins_query= "SELECT * FROM tbl_user WHERE user_id={$id}";
		$user_set= mysqli_query($link,$logins_query);
		if(mysqli_num_rows($user_set)){
			echo("<p>into quey....</p>");
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			if($found_user['user_logins']>1){
				redirect_to("admin_index.php");
			}
			else{
				logged_out();
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
	<div id="editPage">
		<h1 class="edit_title">Edit Your Account</h1>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_edituser.php" method="post">
			<div class="edit_container">
			<label class="edit_label" for="fname">First Name:</label>
			<input class="edit_input" type="text" name="fname" id="fname" value="<?php echo $found_user['user_fname']; ?>"><br><br>
			</div>
			
			<div class="edit_container">
			<label class="edit_label">Username:</label>
			<input class="edit_input" type="text" name="username" value="<?php echo $found_user['user_name']; ?>"><br><br>
			</div>
			
			<div class="edit_container">
			<label class="edit_label">Password:</label>
			<input class="edit_input" type="text" name="password" value="<?php echo $found_user['user_pass']; ?>"><br><br>
			</div>
			
			<div class="edit_container">
			<label class="edit_label">Email:</label>
			<input class="edit_input" type="text" name="email" value="<?php echo $found_user['user_email']; ?>"><br><br>
			</div>
			<input id="edit_submit" class="edit_input" type="submit" name="submit" value="Edit Account">
		</form>
	</div>
</body>
</html>
