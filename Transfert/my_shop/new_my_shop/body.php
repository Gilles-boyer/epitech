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
          <form action="router.gil.php" method="post" class="form-inline my-2 my-lg-0">
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

  <nav class="navbar navbar-expand-lg navbar-light mb-4 ml-3 mr-3 
              justify-content-around border-bottom border-top">
    <?php //creation de filtre de recherche selection 
    $color = $bdd->selectValueBdd('*', 'categories');
    $genre = $bdd->selectValueBdd('*', 'categories');
    $size = $bdd->selectValueBdd('*', 'categories');
    ?>
    <div class="dropdown mr-3">
      <a  class="btn btn-outline-secondary dropdown-toggle" 
          style="width:200px;" 
          href="#" 
          role="button" 
          id="dropdownMenuLink" 
          data-toggle="dropdown" 
          aria-haspopup="true" 
          aria-expanded="false">
        Trier par
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="index.php?filter=">Prix croissant</a>
        <a class="dropdown-item" href="index.php?filter=desc">Prix décroissant</a>
      </div>
    </div>
    <div class="dropdown mr-3">
      <a  class="btn btn-outline-secondary dropdown-toggle " 
          style="width:200px;" 
          href="#" 
          role="button" 
          id="dropdownMenuLink" 
          data-toggle="dropdown" 
          aria-haspopup="true" 
          aria-expanded="false">
        Couleur
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php
        while ($dataColor = $color->fetch()) {
          if ($dataColor['parent_id'] == 32) { ?>
            <a class="dropdown-item" 
                href="router.gil.php?filter=<?php echo $dataColor['name']; ?>">
              <?php echo $dataColor['name']; ?>
            </a>
        <?php }
        }
        ?>
      </div>
    </div>

    <div class="dropdown mr-3 ">
      <a  class="btn btn-outline-secondary dropdown-toggle " 
          style="width:200px;" 
          href="#" 
          role="button" 
          id="dropdownMenuLink" 
          data-toggle="dropdown" 
          aria-haspopup="true" 
          aria-expanded="false">
        taille
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <?php
        while ($dataSize = $size->fetch()) {
          if ($dataSize['parent_id'] == 34) { ?>
            <a  class="dropdown-item" 
                href="router.gil.php?filter=<?php echo $dataSize['name']; ?>">
              <?php echo $dataSize['name']; ?>
            </a>
        <?php }
        }
        ?>
      </div>
    </div>
    <div class="dropdown mr-3">
      <a class="btn btn-outline-secondary dropdown-toggle " 
          style="width:200px;" 
          href="#" 
          role="button" 
          id="dropdownMenuLink" 
          data-toggle="dropdown" 
          aria-haspopup="true" 
          aria-expanded="false">
        Genre
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <?php
        while ($dataGenre = $genre->fetch()) {
          if ($dataGenre['parent_id'] == 33) { ?>
            <a  class="dropdown-item" 
                href="router.gil.php?filter=<?php echo $dataGenre['name']; ?>">
              <?php echo $dataGenre['name']; ?>
            </a>
        <?php }
        }
        ?>
      </div>
    </div>

  </nav>

  <div class="row ml-1 mr-1">
    <!--vibility of products-->
    <?php
    $req = $bdd->selectValueBdd('count(id) as nbProd', 'products  WHERE visibility = 1');
    $data = $req->fetch();

    $nbProd = $data['nbProd'];
    $perPage = 8;
    $nbPage = ceil($nbProd / $perPage);
    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPage) {
      $cPage = $_GET['p'];
    } else {
      $cPage = 1;
    }
    $req = $bdd->selectValueBdd('*', 
                      "products LIMIT " . (($cPage - 1) * $perPage) . ",$perPage");  
    if(isset($_GET['filter'])) {
      $orderBy =  htmlspecialchars($_GET['filter']);
      if($orderBy == "desc") {
        $req = $bdd->selectValueBdd('*', 
              "products ORDER BY price desc LIMIT " . (($cPage - 1) * $perPage) . ",$perPage");  
      } else {
        $req = $bdd->selectValueBdd('*', 
              "products ORDER BY price LIMIT " . (($cPage - 1) * $perPage) . ",$perPage");  
      }
    }
    
    while ($data = $req->fetch()) {
      if ($data['visibility'] == true) {
    ?>

        <div class="col-lg-3 col-md-3 mb-2">
          <div class="card h-100 ">
            <a  href="customerproduct.php?id_prod=<?php echo $data['id']; ?>" 
                class="border bottom">
              <img  class="card-img-top img-zoom" 
                    src="<?php echo $data['img_adresse']; ?>" 
                    alt="">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a  href="customerproduct.php?id_prod=<?php echo $data['id']; ?>" 
                    class="text-decoration-none text-secondary">
                  <?php echo $data['name']; ?>
                </a>
              </h4>

              <h5>
                <?php
                if ($data['discountb'] > 0) {
                  $discount = ($data['price'] * $data['discountb']) / 100;
                  $price = $data['price'] - $discount;
                  echo  number_format($price, 2) . 
                                "€ <small><em class='text-danger'>Promo </em></small>";
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
    <?php }
    } ?>

  </div>

  <div class="mt-4 ml-3">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php
        for ($i = 1; $i <= $nbPage; $i++) {
          if ($i == $cPage) {
        ?><li class="page-item active ">
              <p class="page-link bg-dark text-white border-dark"> <?php echo "$i "; ?></p>
            </li><?php
                } else {
                  ?><li class="page-item ">
              <?php echo " <a class=\"page-link text-dark\" href=\"index.php?p=$i\">$i</a> ";
              ?></li><?php
                    }
                  } ?>
      </ul>
    </nav>
  </div>

</body>

</html>