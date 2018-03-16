<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	//confirm_logged_in();
  $tbl = "tbl_user";
  $users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
	<div id="deletePage">
		<h1 id="delete_title">Delete Users page</h1>
	  <?php
		while($row = mysqli_fetch_array($users)) {
		  //never user your production id for this cuz it canbe destryed. instead create a dummy tbl
		  echo "<p class='delete_name'>{$row['user_fname']}</p><a class='delete_link' href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Delete User</a><br>";
		}
	  ?>
  </div>
</body>
</html>
