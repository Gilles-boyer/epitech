<?php include_once('router.php');
unset($_SESSION['display_confirmation']);
unset($_SESSION['display_error']);
unset($_SESSION['title']);
unset($_SESSION['content']);
session_start();
if (isset($_COOKIE['user'])) {
  $_SESSION['user'] = $_COOKIE['user'];
} elseif (!isset($_SESSION['user'])) {
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
  <h4> <a href="logout.php"> Logout </a></br> </h4>
  <h4> <a href="modify_account.php"> Settings </a></br> </h4>

  <?php
  if ($_SESSION['admin'] == true) {
  ?><h4> <a href="admin.php"> Admin settingss </a></br> </h4><?php
  ?><h4> <a href="newsletter.php"> News Letter </a></br> </h4><?php
  } 
  ?>
  </br>

<?php 
$reponse = $bdd->query('SELECT * FROM news ORDER BY id DESC');
while ($donnees = $reponse->fetch())
{
  ?><h5><?php echo $donnees['title'];?></h5>
  <p><?php echo $donnees['content'];?></p>
  </br>
  <p><?php $author = takeValueBdd('id',$donnees['id_user'], 'users','name',$bdd); 
           echo 'created by '.$author;
      ?>
  </p>
  </br> <?php
}
?>
</body>

</html>