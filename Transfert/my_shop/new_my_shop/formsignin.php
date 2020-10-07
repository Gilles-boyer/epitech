<?php
session_start();
/******************************************************************************
 * Created by Gil & cedric USER FORM SIGIN - Poject : my_shop  26/06/2020
 *  Bootstrap used  
 *  invalid-feedback : color red ($error_table-xss-secutrity-password verify)
 *  valid-feedback : color green 
 ******************************************************************************/
if (!empty($_COOKIE['login'])) {
  header('location:index.php');
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
  <link rel="stylesheet" href="css/style.css">
  <title>Polo Shop</title>
</head>

<body>
  <div class="container-fluid">
    <!-- Header -->
    <?php include_once('header.php') ?>

    <div class="alert alert-success" role="alert">
      <h4>
        <?php if (isset($_SESSION['confirmation'])) {
          echo $_SESSION['confirmation'];
          header('Refresh: 1; index.php');
        }
        ?>
      </h4>
    </div>
    <!-- Default form register -->
    <div class="row">
      <div class="col-lg-3 border-secondary"></div>
      <form class="text-center border border-light p-5 col-sm-8 col-lg-6 " 
            action="router.gil.php" method="POST">

        <h1><span class="badge badge-secondary mb-4">Sign in</span></h1>

        <div class="form-row mb-4">
          <div class="col">

            <!-- E-mail -->
            <input type="email" value="<?php if (isset($_SESSION['email'])) {
                                          echo $_SESSION['email'];
                                        } ?>" name="email" id="defaultRegisterFormEmail" 
                                              class="form-control mb-4" 
                                              placeholder="E-mail" 
                                              require>
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="text-danger">
              <?php if (isset($_SESSION['errorEmail'])) {
                echo $_SESSION['errorEmail'];
              } ?>
            </div>
            <!-- Password -->
            <input type="password" name="password" 
                    pattern=".{8,12}" 
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

          <!-- Check Remember me -->
            <div class="d-flex justify-content-start ml-4">
              <input class="form-check-input" type="checkbox" id="autoSizingCheck">
              <label class="form-check-label " for="autoSizingCheck">
                Remember me
              </label>
            </div>

            <!-- Sign up button -->
            <button name="submit_signin" 
                    class="btn btn-outline-primary my-4 btn-block" 
                    type="submit">Login</button>
            <a href="#" class="text-decoration-none text-secondary ">Mot de passe oublié ?</a>

      </form>
      
    </div>


  </div>
  <!-- Footer -->
  <div class="container-fluid ">
    <?php include_once('footer.php') ?>
  </div>


</body>

</html>