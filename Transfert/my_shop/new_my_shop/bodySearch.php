<?php

/******************************************************************************
 * Created by Gil & cedric BODY - Poject : my_shop  26/06/2020
 *  Bootstrap used  
 *  home page : product grid - pagination - 
 *  
 ******************************************************************************/
$bdd =  new Bdd; ?>

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
  <title>Index</title>
</head>


<body>

  <div class="jumbotron jumbotron-fluid img-fluid ">
    <div class="container">
      <h1 class="display-4">POLO</h1>
      <p class="lead">Les polos a l'affiche.</p>
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <h5 class="text-white h4">Recherche</h5>
          <span class="text-muted">Pour trouver un produit c'est ici !</span>
          <form action="router.gil.php" method="POST" class="form-inline my-2 my-lg-0">
            <input  class="form-control mr-sm-2" 
                    type="search" 
                    name="searchform" 
                    placeholder="Search" 
                    aria-label="Search">
            <button name="searchsubmit" 
                    class="btn btn-outline-primary my-2 my-sm-0" 
                    type="submit">
              Recherche
            </button>
          </form>
          <?php
          $q = $_SESSION['search'];
          $req = $bdd->selectValueBdd(
            'prod.*, 
                              color.name as color,
                              genre.name as genre,
                              size.name as size',
            'products prod 
                              LEFT JOIN categories color ON prod.color_id = color.id
                              LEFT JOIN categories genre ON prod.genre_id = genre.id
                              LEFT JOIN categories size ON prod.size_id = size.id
                              WHERE CONCAT( prod.name, 
                                            color.name, 
                                            genre.name, 
                                            size.name, 
                                            prod.product_ID, 
                                            prod.price
                              )
                              LIKE "%' . $q . '%"'
          );
          ?>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-secondary">
        <button class="navbar-toggler" 
                type="button" 
                placeholder="Search" 
                data-toggle="collapse" 
                data-target="#navbarToggleExternalContent" 
                aria-controls="navbarToggleExternalContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
          <img src="https://img.icons8.com/ios-filled/40/000000/search.png" />
        </button>
      </nav>
    </div>

  </div>
  </div>

  <div class="row ml-1 mr-1">
    <?php

    if ($req->rowCount() == 0) {
      echo "we are sorry, we didn't find your search";
    } else {

      while ($data = $req->fetch()) {
        if ($data['visibility'] == true) {
    ?>

          <div class="col-lg-3 col-md-3 mb-2">
            <div class="card h-100 ">
              <a 
                href="customerproduct.php?id_prod=<?php echo $data['id']; ?>" 
                class="border bottom">
                <img class="card-img-top img-zoom" 
                src="<?php echo $data['img_adresse']; ?>" 
                alt="">
              </a>
                <div class="card-body">
                <h4 class="card-title">
                  <a href="customerproduct.php?id_prod=<?php echo $data['id']; ?>" 
                    class="text-decoration-none text-secondary">
                    <?php echo $data['name']; ?>
                  </a>
                </h4>

                <h5>
                  <?php
                  if ($data['discountb'] > 0) {
                    $discount = ($data['price'] * $data['discountb']) / 100;
                    $price = $data['price'] - $discount;
                    echo  number_format($price, 2) . "€ Promo";
                  } else {
                    echo $data['price'] . "€";
                  }
                  ?>
                </h5>
                <p class="card-text"><?php echo $data['description_short']; ?></p>
              </div>

              <div class="card-footer d-flex justify-content-between">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                <a href="customerproduct.php?id_prod=<?php echo $data['id']; ?>">
                  <img src="https://img.icons8.com/windows/20/000000/add-basket.png" />
                </a>
              </div>
            </div>
          </div>
    <?php
        }
      }
    }
    ?>

  </div>

</body>

</html>