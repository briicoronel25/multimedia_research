
<?php
  //here I start the sessions on the server
  session_start();

  function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])){
      redirect_to("admin_login.php");
    }
  }
 ?>
