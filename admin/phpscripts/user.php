<?php

	function createUser($fname, $username, $password, $email, $userlvl) {
		include('connect.php');
		$userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', CURRENT_TIMESTAMP, '{$userlvl}', 'no', 0, 0, 0)";
		//echo $userString;
		$userQuery = mysqli_query($link, $userString);
		if($userQuery) {
			redirect_to("admin_index.php");
				}else{
			$message = "There was a problem setting up this user.  Maybe reconsider your hiring practices.";
			return $message;
		}
		mysqli_close($link);
	}

function editUser($id, $fname, $username, $password, $email) {
	include('connect.php');
	$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
	//echo $updatestring;
	$updatestring = mysqli_query($link, $updatestring);
	if($updatestring){
		redirect_to("admin_index.php");
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
