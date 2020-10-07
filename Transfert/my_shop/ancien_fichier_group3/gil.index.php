<?php
session_start();
unset($_SESSION['confirmation']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--css bootstrap link-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!--use fontawesome-->
        <script src="https://use.fontawesome.com/2c8cd8006d.js"></script>
        <!--css stylesheet-->
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
    <?php include_once('header.php'); ?>
        <div class="content">
            <!--first category-->
            <div class="row ">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-8 col-sm-8 col-md-9 col-lg-9 display-cat">
                    <h2>Hommes</h2>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="dropright btn-toolbar">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Trier par
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Nouveautés</a>
                        <a class="dropdown-item" href="#">Prix croissant</a>
                        <a class="dropdown-item" href="#">Prix décroissant</a>
                        </div>
                    </div>
                    <div class="dropright">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Couleur
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Foncé</a>
                        <a class="dropdown-item" href="#">Clair</a>
                        <a class="dropdown-item" href="#">Motif</a>
                        </div>
                    </div>
                    <div class="dropright">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Taille
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">XS</a>
                        <a class="dropdown-item" href="#">S</a>
                        <a class="dropdown-item" href="#">M</a>
                        <a class="dropdown-item" href="#">L</a>
                        <a class="dropdown-item" href="#">XL</a>
                        </div>
                    </div>
                    <div class="dropright">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Genre
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">hommes</a>
                        <a class="dropdown-item" href="#">femmes</a>
                        <a class="dropdown-item" href="#">filles</a>
                        <a class="dropdown-item" href="#">garçon</a>
                        </div>
                    </div>
                    <div class="dropright">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Prix
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <div class="form-check dropdown-item">
                                <input class="form-check-input" type="checkbox" id="Checkbox1" value="option1">
                                <label class="form-check-label" for="Checkbox1">0€ - 10€</label>
                            </div>
                            <div class="form-check dropdown-menu">
                                <input class="form-check-input" type="checkbox" id="Checkbox2" value="option2">
                                <label class="form-check-label" for="Checkbox2">10€ - 20€</label>
                            </div>
                            <div class="form-check dropdown-item">
                                <input class="form-check-input" type="checkbox" id="Checkbox3" value="option3">
                                <label class="form-check-label" for="Checkbox3">20€ - 30€</label>
                            </div>
                            <div class="form-check dropdown-item">
                                <input class="form-check-input" type="checkbox" id="Checkbox4" value="option4">
                                <label class="form-check-label" for="Checkbox4">plus de 30€</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-homme">
                            <img src="./img/polo_homme_001.jpg" alt="polo homme">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-homme">
                            <img src="./img/polo_homme_002.jpg" alt="polo homme">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_003.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_005.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_006.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_007.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_009.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_010.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_011.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_004.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_008.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_012.jpg" alt="polo homme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <!--seconde category-->
            <div class="row ">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-8 col-sm-8 col-md-9 col-lg-9 display-cat">
                    <h2>Femmes</h2>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-femme">
                            <img src="./img/polo_femme_001.jpg" alt="polo femme">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-femme">
                            <img src="./img/polo_femme_002.jpg" alt="polo femme">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_003.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_005.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_006.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_007.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_009.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_010.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_011.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-homme">
                        <img src="./img/polo_homme_004.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_008.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_femme_012.jpg" alt="polo femme">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <!--third category-->
            <div class="row ">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-8 col-sm-8 col-md-9 col-lg-9 display-cat">
                    <h2>Enfants</h2>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-enfant">
                            <img src="./img/polo_enfant_001.jpg" alt="polo enfant">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-enfant">
                            <img src="./img/polo_enfant_002.jpg" alt="polo enfant">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_003.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_005.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-femme">
                        <img src="./img/polo_enfant_006.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_007.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_009.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_010.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_011.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_004.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_008.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-enfant">
                        <img src="./img/polo_enfant_012.jpg" alt="polo enfant">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <!--forth category-->
            <div class="row ">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-8 col-sm-8 col-md-9 col-lg-9 display-cat">
                    <h2>Bébés</h2>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-4 col-sm-4 col-md-3 col-lg-2">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-bebe">
                            <img src="./img/polo_bebe_001.jpg" alt="polo bebe">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                        <a href="" class="polo-bebe">
                            <img src="./img/polo_bebe_002.jpg" alt="polo bebe">
                        </a>
                        <div class="price">
                            <h5>29,99€</h1>
                        </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-bebe">
                        <img src="./img/polo_bebe_003.jpg" alt="polo bebe">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-1 picture">
                </div>
            </div>
            <div class="row">
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-2 picture">
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-bebe">
                        <img src="./img/polo_bebe_005.jpg" alt="polo bebe">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-bebe">
                        <img src="./img/polo_bebe_006.jpg" alt="polo bebe">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
                <div class="group col-xs-6 col-sm-6 col-md-4 col-lg-3 picture">
                    <a href="" class="polo-bebe">
                        <img src="./img/polo_bebe_004.jpg" alt="polo bebe">
                    </a>
                    <div class="price">
                        <h5>29,99€</h1>
                    </div>
                </div>
            
            <!--pagination-->
                    <nav class="d-flex justify-content-around" aria-label="Page navigation">
                        <ul class="pagination pagination-lg">
                            <div class="page">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                  </span>
                            </li>
                            </div>
                            <div class="page" >
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            </div>
                            <div class="page">
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            </div>
                            <div class="page">
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            </div>
                            <div class="page">
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            </div>
                            <div class="page">
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            </div>
                            <div class="page">
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            </div>
                            <div class="page">
                                <li class="page-item"><a class="page-link" href="#">
                                    next
                                </a></li>
                            </div>

                        </ul>
                      </nav>
        </div>
        <?php include_once('footer.php'); ?>
    <!--script Bootstrap before /body-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
