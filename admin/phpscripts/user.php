<?php

	function createUser($fname, $username, $email, $userlvl) {
		include('connect.php');
		//$user_password= '';
		$user_password = randomPassword();
		$enc_password= password_hash($user_password,PASSWORD_BCRYPT); //This function uses BCRYPT ALGORITHM TO ENCRYPT THE PASSWORD
		echo("<p> or_pass:".$user_password." enc password: ".$enc_password."</p>");
		$userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}','{$enc_password}', '{$email}', CURRENT_TIMESTAMP, '{$userlvl}', 'no', 0, 0, 0)";
		//echo $userString;
		$userQuery = mysqli_query($link, $userString);
		$message="";
		if($userQuery) {
			$message.=$user_password;
		}else{
			$message.= "There was a problem setting up this user.  Maybe reconsider your hiring practices.";
		}
		mysqli_close($link);
		return $message;
	}

function editUser($id, $fname, $username, $password, $email) {
	include('connect.php');
	$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
	//echo $updatestring;
	$updatestring = mysqli_query($link, $updatestring);
	if($updatestring){
		$message= "User successfully created!";
	}else{
		$message = "There was a problem changing your information, please contact your web admin.";
		return $message;
	}
	mysqli_close($link);
}
function deleteUser($id) {
	//echo $id;
	include('connect.php');
	$delstring = "DELETE FROM tbl_user WHERE user_id={$id}";
	$delquery = mysqli_query($link, $delstring);
	if($delquery){
		redirect_to("../admin_index.php");
	}else{
		$message = "F%*k, call security...";
		return $message;
	}

	mysqli_close($link);
}

?>
