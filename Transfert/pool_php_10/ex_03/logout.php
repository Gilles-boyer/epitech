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

 </br>
  <form action="router.php" class="form_inscription" method="post">

    <input type="submit" name="submit_logout" value="Logout" /> </br>

  </form>

</body>

</html>