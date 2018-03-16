<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);
$loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}'";
		$user_set = mysqli_query($link, $loginstring);

		if(mysqli_num_rows($user_set)){
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			if($found_user['user_attempts']>=3){
				$message = "You have tried more than 3 invalid attempts. Enter captcha code.";
			// }
			return $message;
			redirect_to("admin_login.php");

			}
			else{
			
				$user_pass=$found_user['user_pass'];
				if(password_verify($password,$user_pass)){
					$id = $found_user['user_id'];
					$_SESSION['user_id'] = $id;
					$_SESSION['user_date'] = $found_user['user_date'];
					$_SESSION['user_name'] = $found_user['user_fname'];
					
					date_default_timezone_set("America/Toronto");
					$user_date=$found_user['user_date'];
					$login_times=(int)$found_user['user_logins'];
					$actual_time=time(); //getting actual time in seconds
					$account_time=strtotime($user_date); //transform user account date string to seconds
					$difference= ($actual_time - $account_time) / 60; // here, we transform the difference in minutes
					$max_time_limit= 500; //This time limit is in minutes
					
					
					if($difference>$max_time_limit && $login_times==0){
					
						$message = "Your account has been suspended due to you reached the time limit before you can login.<br>Contact with Admin or create a new account. ";
						$findstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}'";
						$find_set = mysqli_query($link, $findstring);
						$fail = mysqli_fetch_array($find_set);
						$track = "UPDATE tbl_user SET user_attempts = user_attempts + 1 WHERE user_id={$fail['user_id']}";
						$trackquery = mysqli_query($link, $track);

						return $message;
					}
					else{
						
						if(mysqli_query($link, $loginstring)){
							$updatestring = "UPDATE tbl_user SET user_date=now(), user_logins = user_logins + 1, user_attempts=0 WHERE user_id={$id}";
							$updatequery = mysqli_query($link, $updatestring, $lastLogin);
						}
						
						$logins_query= "SELECT * FROM tbl_user WHERE user_id={$id}";
						$user_set= mysqli_query($link,$logins_query);
						if(mysqli_num_rows($user_set)){
							$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
							if($found_user['user_logins']>1){
								redirect_to("admin_index.php");
							}
							else{
								redirect_to("admin_edituser.php");
							}
						}
					}
				}
				else{
					$message = "Password is incorrect.<br>Please make sure you have entered the correct password. ";
						//3 failed login attempts
					$findstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}'";
					$find_set = mysqli_query($link, $findstring);
					$fail = mysqli_fetch_array($find_set);
					$track = "UPDATE tbl_user SET user_attempts = user_attempts + 1 WHERE user_id={$fail['user_id']}";
					$trackquery = mysqli_query($link, $track);

					return $message;
				}
			}
		}
		else{
			$message = "Username is incorrect.<br>Please make sure your cap lock key is turned off.";
				//3 failed login attempts
			$findstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}'";
			$find_set = mysqli_query($link, $findstring);
			$fail = mysqli_fetch_array($find_set);
			$track = "UPDATE tbl_user SET user_attempts = user_attempts + 1 WHERE user_id={$fail['user_id']}";
			$trackquery = mysqli_query($link, $track);
				// echo $track;
			// 	if ($user_attempts < 3){
			// 		$mysqli->query("INSERT INTO user_attempts (user_p,date) VALUES ('$ip', NOW())");
			// } else {
			//  	$message = "You have tried more than 3 invalid attempts. Enter captcha code.";
			// // }
			return $message;
		}

		mysqli_close($link);
	}


?>
