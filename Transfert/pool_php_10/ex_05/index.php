<?php include_once('router.php');
unset($_SESSION['display_confirmation']);
session_start();
if(isset($_COOKIE['user'])) {
  $_SESSION['user'] = $_COOKIE['user'];
} elseif(!isset($_SESSION['user'])) {
  header('location:login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INDEX</title>
</head>

<body>

  <h2> <?php echo "Hello " . $_SESSION['user'] . "!!"; ?></h2></br>
  <h4> <a href="logout.php" > Logout </a></br> </h4>
<h4> <a href="modify_account.php" > Settings </a></br> </h4>
</body>

</html>