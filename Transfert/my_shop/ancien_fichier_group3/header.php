<?php include_once('class/Users.class.php');
include_once('class/Bdd.class.php');
if (!empty($_COOKIE['login'])) {
  $_SESSION['login'] = $_COOKIE['login'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!--css bootstrap link-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/2c8cd8006d.js"></script>
  <!--css stylesheet-->
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/logo2.png" alt="Polo Shop">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item cat">
          <a class="nav-link active" href="#">Hommes</a>
        </li>
        <li class="nav-item cat">
          <a class="nav-link active" href="#">Femmes</a>
        </li>
        <li class="nav-item cat">
          <a class="nav-link active" href="#">Enfants</a>
        </li>
      </ul>
      <?php
      if (isset($_SESSION['login'])) {
      ?>
        <div class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-o" aria-hidden="true"></i>
            <?php
            $nouveauTab = unserialize($_SESSION['login']);
            $user = $nouveauTab["monObjet"];
            echo $user->getFirstName() . ' ' . $user->getLastName(); ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="router.gil.php?logout=">logout</a>
            <a class="dropdown-item" href="settingUser.php">Setting</a>
            <?php if ($user->getAdmin()) { ?>
              <a class="dropdown-item" href="settingUser.php">Admin</a>
            <?php } ?>
          </div>
        </div>
      <?php
      } else {
      ?>
        <div class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-o" aria-hidden="true"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="signup_form.gil.php">Sign up</a>
            <a class="dropdown-item" href="signin_form.gil.php">Sign in</a>
          </div>
        </div>
      <?php } ?>
      <div class="nav-item cart">
        <a class="nav-link" href="">
          <img src="img/cart-button.svg" alt="add to cart">
        </a>
      </div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="rechercher un article" aria-label="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
      </form>

    </div>
  </nav>
  <!--script Bootstrap before /body-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>