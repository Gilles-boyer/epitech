<?php 
/******************************************************************************
 * Created by Gil & cedric HEADER - Poject : my_shop  27/06/2020
 *  Bootstrap used  
 *  navbar include index.php   
 ******************************************************************************/
include_once('class/Users.class.php');
include_once('class/Bdd.class.php');
if (!empty($_COOKIE['login'])) {
  $_SESSION['login'] = $_COOKIE['login'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="#">
    <title>header</title>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-light border-bottom mb-4">
<a class="navbar-brand" href="index.php">
    <div class="row col-lg-12"> 
      <img src="logo2.png" width="40" height="40" alt="" loading="lazy" class="mr-5"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-nav mr-auto ">
            <a  class="nav-item nav-link text-dark icon-bar" 
                href="router.gil.php?filter=homme">
                HOMME
            </a> 
            <a  class="nav-item nav-link text-dark" 
                href="router.gil.php?filter=femme">
                FEMME
            </a>
            <a  class="nav-item nav-link text-dark" 
                href="router.gil.php?filter=enfant">
                ENFANT
            </a>   
          </div> 
        </div> 
      
    <div class="row "> 
      <?php
      if (isset($_SESSION['login'])) {
      ?>
      <ul class="navbar-nav"> 
        <li class="nav-item dropdown mr-3">
            <a class="nav-link dropdown-toggle dropdown-toggle " 
            href="#" id="navbarDropdownMenuLink" 
                role="button" 
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false">
            <img src="https://img.icons8.com/windows/32/000000/gender-neutral-user.png"/>
            <?php
            $nouveauTab = unserialize($_SESSION['login']);
            $user = $nouveauTab["monObjet"];
            echo $user->getFirstName() . ' ' . $user->getLastName(); ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="router.gil.php?logout=">logout</a>
              <a class="dropdown-item" href="settingUser.php">Setting</a>
              <?php if ($user->getAdmin()) { ?>
                <a class="dropdown-item" href="admin.php">Admin</a>
                
              <?php } ?>
          </div>
        </li>
      </ul> 
    <?php
    } else {
    ?>   
        <ul class="navbar-nav">  
          <li class="nav-item dropdown mr-3">
          <a class="nav-link dropdown-toggle dropdown-toggle " 
            href="#" id="navbarDropdownMenuLink" 
                role="button" 
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false">
              <img src="https://img.icons8.com/windows/32/000000/gender-neutral-user.png"/>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="formsignup.php">Sign up</a>
              <a class="dropdown-item" href="formsignin.php">Sign in</a>
            </div>
          </li>
        </ul>
    <?php } ?>
          <a class="navbar-brand mr-1" href="#">
          <img src="https://img.icons8.com/ios-glyphs/30/000000/shopping-basket-2.png"/>
          </a>  
  </div> 
   
</nav>

</header>
</html>