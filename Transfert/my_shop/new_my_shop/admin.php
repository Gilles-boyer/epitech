<?php
/*****************************************************************************
 * Created by Gil et cedric  ADMIN PAGE - Poject : my_shop 26/06/2020  
 *  Bootstrap used 
 *  Only use by Admin 
 *          -> PRODUCT = create - delete - visibility on/off -
 *  method="POST" 
 ******************************************************************************/
include_once('class/Bdd.class.php');
$bdd = new Bdd;

session_start();
if (isset($_GET['unset'])) {
    unset($_SESSION['confirmation']);
}
unset($_SESSION['imgProduct']);
if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link   rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
            crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="alert alert-success" role="alert">
        <h4> 
            <?php
                if (!$user->getAdmin()) {
                    header('location:index.php');
                }
                if (isset($_SESSION['confirmation'])) {
                    echo $_SESSION['confirmation'];
                    header('Refresh: 1; admin.php?unset=');
                }
                if (!$user->getAdmin()) {
                    header('location: index.php');
                }
            ?> 
        </h4>
    </div>

    <h2 class="ml-3 mb-5 text-center">Mon compte Admin</h2>

    <div class="row mb-5 ml-3 mr-3">
        <div class="col-lg-3"></div>

        <form action="router.gil.php" method="get" class="col-lg-6 mb-3 border rounded p-3">
            <h3 class="mb-4">Gestion des Utilisateurs</h3>
            <div class="form-group">
                <label for="id">Please choose a user :</label>
                <input list="id_admin" 
                       required class="custom-select" 
                       name="id_admin" 
                       autocomplete="off">
                <datalist id="id_admin">
                    <?php
                    $test = $bdd->selectValueBdd('*', 'users');
                    while ($donnees = $test->fetch()) {
                    ?>
                        <option 
                        value="<?php echo $donnees['id']; ?>"> <?php echo $donnees['email'] . " 
                        " . $donnees['lastname'] . " 
                        " . $donnees['firstname'] . " ";
                        if ($donnees['admin'] == true) {
                            echo 'ADMIN';
                        }
                        ?></option>
                    <?php
                    } ?>
                </datalist>
            </div>
            <button name="admin" 
                    value="0" 
                    type="submit" 
                    class="btn btn-primary">
                    Admin OFF
            </button>
            <button name="admin" 
                    value="1" 
                    type="submit" 
                    class="btn btn-success">
                    Admin ON 
            </button>
            <button type="button" 
                    class="btn btn-danger" 
                    data-toggle="modal" 
                    data-target="#exampleModal">
                    Delete User
            </button>

            <!-- Modal -->
            <div class="modal fade" 
                 id="exampleModal" 
                 tabindex="-1" 
                 role="dialog" 
                 aria-labelledby="exampleModalLabel" 
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">WARNING</h5>
                            <button type="button" 
                                    class="close" 
                                    data-dismiss="modal" 
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this user ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" 
                                    class="btn btn-secondary" 
                                    data-dismiss="modal">
                                    Close
                            </button>
                            <input type="submit" 
                                   name="iddelete" 
                                   value="DELETE" 
                                   class="btn-danger">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- deuxieme form -->
    <div class="row ml-3 mr-3 mb-3">
        <div class="col-lg-3 "></div>

        <form action="router.gil.php" method="get" class="col-lg-6  border rounded pt-3 ">
            <h3 class="mb-4">Gestion des Produits et Catégories</h3>
            <div class="form-group">
                <label for="id">Please choose a Product :</label>
                <input list="id_product" 
                       class="custom-select" 
                       name="id_product" 
                       autocomplete="off"
                       required>
                <datalist id="id_product">
                    <?php
                    $test = $bdd->selectValueBdd('*', 'products');
                    while ($donnees = $test->fetch()) {
                    ?>
                        <option 

                        value="<?php echo $donnees['id']; ?>"> <?php echo $donnees['id'] . " 
                        " . $donnees['name'] . "
                        " . $donnees['product_ID'] . "
                        " . $donnees['created_at'] . " ";
                        if ($donnees['visibility'] == true) {
                            echo 'Visible';
                        }
                        ?></option>
                    <?php
                    } ?>
                </datalist>

                <div class="row col_lg mt-3 ml-1">

                    <button name="visibility" 
                            value="0" 
                            type="submit" 
                            class="btn btn-danger mr-2 mb-1">
                            Visibility OFF
                    </button>
                    <button name="visibility" 
                            value="1" 
                            type="submit" 
                            class="btn btn-success mr-4 mb-1">
                            Visibility ON 
                    </button>

                    <div class="row-col-lg-3">
                        <button name="editProd" 
                                value="1"
                                type="submit" 
                                class="btn btn-primary">
                                Edit Product
                        </button>
                        <a class="btn btn-success" 
                           href="product.php">
                           New Product</a>
                        <button type="button" 
                                class="btn btn-danger" 
                                data-toggle="modal" 
                                data-target="#productModal">
                            Delete Product
                        </button>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" 
                 id="productModal" 
                 tabindex="-1" 
                 role="dialog" 
                 aria-labelledby="productModalLabel" 
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel">WARNING</h5>
                            <button type="button" 
                                    class="close" 
                                    data-dismiss="modal" 
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this Product ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" 
                                    class="btn btn-secondary" 
                                    data-dismiss="modal">
                                    Close
                            </button>
                            <input type="submit" name="prodDelete" value="DELETE">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include_once('footer.php') ?>

</body>

</html>