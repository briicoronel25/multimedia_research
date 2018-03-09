<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	require_once('phpscripts/config.php');

	$tbl="tbl_genre";
	$genQuery = getAll($tbl);

	// $ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$cover = $_FILES['cover'];
		$year = $_POST['year'];
		$runtime = $_POST['runtime'];
		$storyline = $_POST['storyline'];
		$trailer = $_POST['trailer'];
		$release = $_POST['release'];
		$genre = $_POST['genList'];
		$uploadMovie = addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre);
		$message = $uploadMovie;
		// echo $cover['name'];
		// echo $cover['type'];
		// echo $cover['size'];
		// echo $cover['tmp_name'];
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
<!-- <link href="./css/style.css" rel="stylesheet" type="text/css" media="screen"> -->
</head>
<body>

	<div id="addmoviePage">
		<div class="addmovieCon">
	<h1 id="title">Welcome Dude</h1>
	<?php if(!empty($message)){echo $message;}?>

	<form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
		<label>Movie Title:</label>
		<input name:"title" type="text" value="text"><br><br>
		<label>Movie Cover Image:</label>
		<input name:"cover" type="file" value=""><br><br>
		<input type="submit" value=""><br><br>
		<label>Movie Year:</label>
		<input name:"year" type="text" value=""><br><br>
		<label>Movie Runtime:</label>
		<input name:"runtime" type="text" value=""><br><br>
		<label>Movie Storyline:</label>
		<input name:"storyline" type="text" value=""><br><br>
		<label>Movie Trailer:</label>
  	<input name:"trailer" type="text" value=""><br><br>
		<label>Movie Release:</label>
		<input name:"release" type="text" value=""><br><br>
			<select name="genList">
				<option value="">Please select a genre</option>
		<?php

				while($row = mysqli_fetch_array($genQuery)) {
					echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
				}
		?>
	</select><br>
    <input type="submit" name="submit" value="Add Movie">
   </form>
</body>
</html>
