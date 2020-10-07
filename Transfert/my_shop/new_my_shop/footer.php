<!--******************************************************************************
 * Created by Gil & cedric FOOTER - Poject : my_shop  26/06/2020
 *  Bootstrap used  
 *  invalid-feedback : color red ($error_table-xss-secutrity-password verify)
 *  valid-feedback : color green 
 ******************************************************************************-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
        crossorigin="anonymous">
  <link rel="stylesheet" href="stylefooter.css">
  <title>footer</title>
</head>

<body>


  <footer>
    <div class="container-fluid ">
      <div class="border-top border-bottom py-3 mt-5 ">
        <div class=" mx-auto iconsR" style="width: 240px;">
          <a href=""><img src="https://img.icons8.com/fluent/48/000000/facebook-new.png" /></a>
          <a href=""><img src="https://img.icons8.com/fluent/48/000000/pinterest.png" /></a>
          <a href=""><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
          <a href=""><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-4">
        <div class="col mb-4">
          <div class="border-right border-left">
            <div class="card-body">
              <h5 class="card-title"> A PROPOS</h5>
              <p class="card-text"> 
                <a href="#">A propos</a></br> 
                <a href="#">Conditions d'utilisation</a></br> 
                <a href="#">Conditions de vente</a></br> 
                <a href="#">Carrière</a></p>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="border-right">
            <div class="card-body">
              <h5 class="card-title">MON COMPTE</h5>
              <p class="card-text"> 
                <a href="settingUser.php"> Mon compte</a></br> 
                <a href="#">Suiviez vos commandes</a></br>
                <a href="settingUser.php">Modifiez votre compte</a></br></p>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="border-right">
            <div class="card-body">
              <h5 class="card-title">RELATION CLIENT</h5>
              <p class="card-text"><a href="#">Assistance</a></br>
                <a href="#">Expédition</a></br><a href="#">Cartes cadeaux</a></br>
                <a href="#">Trouvez votre taille</a></p>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="border-right">
            <div class="card-body border-bottom-0">
              <h5 class="card-title">NEWSLETTER</h5>
              <p class="card-text news">Inscrivez-vous pour recevoir toutes les bonnes affaires</p>
              <form class="form-inline">
                <input class="form-control mr-sm-2" 
                       style="width:170px;" type="search" 
                       placeholder="E-mail" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Envoyer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>