
<?php
  //init_set('display');
//  error_reporting(!_ALL);

  require_once('phpscripts/config.php');

  $ip = $_SERVER['REMOTE_ADDR'];
  //  echo $ip;
  if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ //checking that both are not empty
        //echo "you can type;)";
        $result = login($username, $password, $ip);
        $message = $result;
    }else{
    $message = "Please fill in the required fields";
    echo $message;
    }
  }
?>

<!doctype html>
<html>
<head>
<meta charset ="UTF-8">
<title>CMS  PORTAL LOGIN</title>
</head>
<body>

  <h1>Welcome Company Name</h1>
  <?php if(!empty($message)){echo $message;} ?>
  <form action="admin_login.php" method="post">
    <label>Username:</label>
    <input type="text" name="username" value="">
    <label>Password:</label>
    <input type="text" name="password" value="">
    <input type="submit" name="submit" value="Show me the money">
  </form>
</body>
</html>
