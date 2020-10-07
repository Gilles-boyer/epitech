<?php

/*****************************************************************************
 * Created by cedric & Gil USER FORM SIGNUP - Poject : my_shop 26/06/2020  
 *  Bootstrap used 
 *  invalid-feedback : color red ($error_table - xss & secutrity respect +php)
 *  valid-feedback : color green 
 *  method="POST" 
 ******************************************************************************/
session_start();
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
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>

  <div class="container-fluid">
    <?php include_once('header.php'); ?>

    <div class="alert alert-success" role="alert">
      <h4>
        <?php
        if (!empty($_COOKIE['login'])) {
          header('location:index.php');
        } elseif (isset($_SESSION['confirmation'])) {
          echo $_SESSION['confirmation'];
          header('Refresh: 1; index.php');
        } ?>
      </h4>
    </div>
    <!-- Default form register -->
    <div class="form-row mb-5 "></div>
    <div class="row">
      <div class="col-lg-3 border-secondary"></div>
      <form class="text-center border border-light p-5 col-sm-8 col-lg-6 " 
            action="router.gil.php" 
            method="post">

        <h1><span class="badge badge-secondary mb-4">Sign up</span></h1>

        <div class="form-row mb-4">
          <div class="col">
            <!-- First name -->
            <input value="<?php if (isset($_SESSION['firstName'])) {
                            echo  $_SESSION['firstName'];
                          } ?> " name="firstName" 
                                 type="text" 
                                 pattern=".{2,21}" 
                                 class="form-control" 
                                 placeholder="First name" 
                                 id="inputFirstName" require>
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="text-danger">
              <?php if (isset($_SESSION['errorFirstName'])) {
                echo  $_SESSION['errorFirstName'];
              } ?>
            </div>
          </div>

          <div class="col mb-4" id="last-name">
            <!-- Last name -->
            <input value="<?php if (isset($_SESSION['lastName'])) {
                            echo $_SESSION['lastName'];
                          } ?>" name="lastName" 
                                type="text" 
                                pattern=".{2,21}" 
                                title="3 characters minimum" 
                                class="form-control" 
                                placeholder="Last Name" 
                                id="inputLastName" required>
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="text-danger">
              <?php if (isset($_SESSION['errorLastName'])) {
                echo $_SESSION['errorLastName'];
              } ?>
            </div>
          </div>

          <!-- E-mail -->
          <input value="<?php if (isset($_SESSION['email'])) {
                          echo $_SESSION['email'];
                        } ?>" name="email" 
                              type="email" 
                              id="defaultRegisterFormEmail" 
                              class="form-control mb-4" 
                              placeholder="E-mail" 
                              pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}"
                              required>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorEmail'])) {
              echo $_SESSION['errorEmail'];
            } ?>
          </div>
          <!-- Password -->
          <input name="password" type="password" 
                 id="defaultRegisterFormPassword" 
                 class="form-control mb-4" 
                 placeholder="Password" 
                 aria-describedby="defaultRegisterFormPasswordHelpBlock"
                 require>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorPassword'])) {
              echo $_SESSION['errorPassword'];
            } ?>
          </div>

          <!-- Password confirmation-->
          <input name="passwordConfirmation" 
                 type="password" 
                 pattern=".{8,12}" 
                 id="defaultRegisterFormPassword" 
                 class="form-control mb-4" 
                 placeholder="Password" 
                 aria-describedby="defaultRegisterFormPasswordHelpBlock">
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorConfirm'])) {
              echo $_SESSION['errorConfirm'];
            } ?>
          </div>

          <!-- Sign up button -->
          <button name="submitInscription" 
                  class="btn btn-outline-primary my-4 btn-block" 
                  type="submit">Sign in</button>

          <div class="row ml-1 d-flex d-flex justify-content-center" style="width:100%;">

            <button type="button" 
                    class="btn btn-outline-secondary d-flex flex-row align-items-center mr-3">
                    <img src="https://img.icons8.com/fluent/48/000000/facebook-new.png" />
                    FACEBOOK</button>

            <button type="button" 
                    class="btn btn-outline-secondary d-flex flex-row align-items-center">
                    <img src="https://img.icons8.com/color/48/000000/google-logo.png" />
                    GOOGLE</button>

          </div>

      </form>
      
    </div>
      <!-- Footer -->
    <div class="container-fluid ">
      <?php include_once('footer.php') ?>
    </div>

  </div>
</body>

</html>