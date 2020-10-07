<?php
/*****************************************************************************
 * Created by Gil et cedric  SETTING USER - Poject : my_shop 26/06/2020  
 *  Bootstrap used 
 *  Only use by Users
 *  method="POST" 
 ******************************************************************************/
session_start();
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!--css bootstrap link-->
  <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
        crossorigin="anonymous">

  <!--css stylesheet-->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include_once('header.php'); ?>


  <!--inscription form-->
  <div class="container decal col-lg-5">
  <div class="alert alert-success" role="alert">
  <h4>
      <?php 
      if (isset($_SESSION['confirmation'])) {
        echo $_SESSION['confirmation'];
        header('Refresh: 1; index.php');
      } ?>
    </h4>
  </div>
    <?php 

    ?>
    <h1 class="text-center mb-5">Mon compte</h1>
    <form action="router.gil.php" method="POST" class="needs-validation">
      <!--first name & last name une seule ligne-->
      <div class="form-row">
        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" id="first-name">
          <label for="inputFirstName">First Name</label>
          <input value="<?php echo $user->getFirstName();
                         ?> " name="firstName" 
                              type="text" 
                              pattern=".{2,21}" 
                              required title="3 characters minimum" 
                              class="form-control" 
                              placeholder="First Name" 
                              id="inputFirstName" 
                              required>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorFirstName'])) {
              echo  $_SESSION['errorFirstName'];
            } ?>
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" id="last-name">
          <label for="inputLastName">Last Name</label>
          <input value="<?php  echo $user->getLastName();
                         ?>" name="lastName" 
                             type="text" 
                             pattern=".{2,21}"  
                             title="3 characters minimum" 
                             class="form-control" 
                             placeholder="Last Name" 
                             id="inputLastName" 
                             required>
          <div class="valid-feedback">
            Looks good!
          </div>

          <div class="text-danger">
            <?php if (isset($_SESSION['errorLastName'])) {
              echo $_SESSION['errorLastName'];
            } ?>
          </div>
        </div>
      </div>
      <!--email-->
      <div class="form-group col-xs-12">
        <label for="inputEmail3" class="col-xs-2 col-form-label">E-mail</label>
        <div class="col-xs-10">
          <input value="<?php echo $user->getEmail();
                         ?>" name="email" 
                             type="email" 
                             class="form-control" 
                             id="inputEmail3" 
                             placeholder="Enter your e-mail" 
                             required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}">
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorEmail'])) {
              echo $_SESSION['errorEmail'];
            } ?>
          </div>
        </div>
      </div>
      <!--password-->
      <div class="form-group col-xs-12">
          <label for="inputPassword3" class="col-xs-3 col-form-label">
            Password
          </label>
        <div class="col-xs-9">
          <input name="password" 
                 type="password" 
                 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" 
                 title="8 characters minimum" 
                 class="form-control" 
                 id="inputPassword3" 
                 placeholder="Enter your password">
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorPassword'])) {
              echo $_SESSION['errorPassword'];
            } ?>
          </div>
        </div>
      </div>
      <!--password confirmation-->
      <div class="form-group col-xs-12">
          <label for="inputPassword4" class="col-xs-4 col-form-label">
            Password confirmation
          </label>
        <div class="col-xs-8">
          <input name="passwordConfirmation" 
                 type="password" 
                 pattern=".{8,20}" 
                 title="8 characters minimum" 
                 class="form-control" 
                 id="inputPassword3" 
                 placeholder="Confirm your password">
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="text-danger">
            <?php if (isset($_SESSION['errorConfirm'])) {
              echo $_SESSION['errorConfirm'];
            } ?>
          </div>
        </div>
      </div>
      <!--checkbox remember me & button sign up une seule ligne-->
      <div class="form-row">
        <!--button sign up-->
        <div class="form-group col-md-12">
          <button name="submitSettingUser" 
                  type="button" 
                  name="submit_inscription" 
                  class="btn btn-outline-primary btn-lg btn-block">Modify
          </button>
        </div>
      </div>
    </form> 
    
  </div>

  <div class="container-fluid ">
<?php include_once('footer.php')?> 
</div>

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


</body>

</html>