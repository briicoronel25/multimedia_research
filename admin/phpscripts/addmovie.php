<?php
   function addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre) {
// echo "works";
    if($_FILES['cover']['type'] == "image/jpeg" || $_FILES['cover']['type'] == "image/jpg"){

      $target = "../images/{$cover['name']}";
      if(move_uploaded_file($_FILES['cover']['tmp_name'], $target)){
        // echo "file moved";

        $orig = "../images/{$cover['name']}";  //or $target
        $th_copy = "../images/TH_{$cover['name']}";
        if(!copy($orig, $th_copy)){
          echo "Failed to copy";
        }

        $size = getimagesize($orig);
        echo $size[0];
      }

    }


   }
 ?>
