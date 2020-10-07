<?php include_once('router.php');
session_start();
if (!isset($_SESSION['user'])) {
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
  <a href="logout.php" > Logout </a>

</body>

</html>