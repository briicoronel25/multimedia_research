<?php
	session_start();

	function confirm_logged_in() {
		if(!isset($_SESSION['user_id'])){
			redirect_to("admin_login.php");
		}
	}

	function logged_out() {
		session_destroy();
		if(substr($_SERVER[REQUEST_URI], -strlen("admin_edituser.php")) === "admin_edituser.php"){
			redirect_to("admin_login.php");
		}
		else{
			redirect_to("../admin_login.php");
		}
	}

?>
