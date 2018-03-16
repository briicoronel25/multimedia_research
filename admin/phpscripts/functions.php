<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	//THIS FUNCTION GENERATES A RANDOM PASSWORD USING rand function, selecting elements from the string that is hardcoded on the function
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); // declare $pass as an array
		$alphaLength = strlen($alphabet) - 1;
		$passLenght= 8 ;//you can change here the length of the password that you want to generate
		for($i = 0; $i < $passLenght; $i++) { 
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n]; //push an element to array
		}
		return implode($pass); //turn the array into a string
	}
	
?>