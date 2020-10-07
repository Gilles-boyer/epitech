<?php
session_start();
/******************************************************************************
 * Created by Xinyu  USER FORM SIGIN - Poject : my_shop   (Groupe 3)  26/06/2020
 *  Bootstrap used  
 *  invalid-feedback : color red ($error_table-xss-secutrity-password verify)
 *  valid-feedback : color green 
 *  /!\  NE PAS OUBLIER ACTION A METTRE SUR router.php 
 *  /!\  NE PAS OUBLIER table_error (echo invalid or valid)
 */

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!--css bootstrap link-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!--css stylesheet-->
  <script src="https://use.fontawesome.com/2c8cd8006d.js"></script>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include_once('header.php'); ?>
  <!--singin form-->
  <div class="container">
    
    <h1>
      <?php 
      if(!empty($_COOKIE['login'])) {
        header('location:gil.index.php');
      }elseif (isset($_SESSION['confirmation'])) {
        echo $_SESSION['confirmation'];
        header('Refresh: 1; gil.index.php');
      } ?>
    </h1>

    <form action="router.gil.php" method="POST" class="needs-validation" novalidate>
      <!--email-->
      <div class="form-group col-xs-12">
        <label for="inputEmail3" class="col-xs-2 col-form-label">E-mail</label>
        <div class="col-xs-10">
          <input type="email" value="<?php if (isset($_SESSION['email'])) {
                                        echo $_SESSION['email'];
                                      } ?>" name="email" class="form-control" id="inputEmail3" placeholder="Enter your e-mail" required>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorEmail'])) {
              echo $_SESSION['errorEmail'];
            } ?>
          </div>
        </div>
        <!--password-->
        <div class="form-group col-xs-12">
          <label for="inputPassword3" class="col-xs-3 col-form-label">Password</label>
          <div class="col-xs-9">
            <input type="password" name="password" pattern=".{8,21}" required title="8 characters minimum" class="form-control" id="inputPassword3" placeholder="Enter your password" required>
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="text-danger">
              <?php if (isset($_SESSION['errorPassword'])) {
                echo $_SESSION['errorPassword'];
              } ?>
            </div>
          </div>
          <div class="form-group col-md-3">
            <div class="form-check">
              <input name="remember" value = "1" class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Remember me
              </label>
            </div>
          </div>
          <!--checkbox remember me & button sign in une seule ligne-->
          <div class="form-row">
            <!--button sign up-->
            <div class="form-group col-md-4">
              <button name="submit_signin" type="submit" class="btn btn-primary">Sign in</button>
            </div>
          </div>
    </form>
  </div>
  <?php include_once('footer.php'); ?>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

  <!--script Bootstrap before /body-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>