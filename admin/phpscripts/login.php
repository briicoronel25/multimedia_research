<?php

function login($username, $password, $ip){
  require_once('connect.php');
  $username = mysqli_real_escape_string($link,$username); //use mysqli since is the newest
  $password = mysqli_real_escape_string($link,$password);
      $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
      $user_set = mysqli_query($link, $loginstring);
      if(mysqli_num_rows($user_set)){
        $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);

        $id = $found_user['user_id'];
        $_SESSION['user_id'] = $id; //sessions in php are temporary - Don't use cookies and use temporary
        $_SESSION['user_name'] = $found_user['user_fname'];
        if(mysqli_query($link, $loginstring)){
          $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id = {$id}";
          $updatequery = mysqli_query($link, $updatestring);
        }
        //echo $id;
        redirect_to("admin_index.php");
      }else{
        $message="Username and or password is incorrect. <br> Please make sure your caplock key is turned off.";
        return $message;
      }
        mysqli_close($link);
}

?>
