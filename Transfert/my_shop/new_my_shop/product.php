<?php
/*****************************************************************************
 * Created by Gil et cedric  PRODUCT - Poject : my_shop 1/07/2020  
 *  Bootstrap used 
 *  Only VIEW by Users
 *  method="POST" 
 ******************************************************************************/
include_once('class/Bdd.class.php');
$bdd = new Bdd;
session_start();
if (isset($_GET['unset'])) {
    unset($_SESSION['confirmation']);
    unset($_SESSION['confirmationCAT']);
}
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  header('location: index.php');
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
    <title>PRODUCT ADMIN</title>
</head>

<body>

    <div class="container-fluid ">

        <?php include_once('header.php') ?>

        <div class="alert alert-success" role="alert">
            <h4> <?php
                    if (!$user->getAdmin()) {
                        header('location:index.php');
                    }
                    if (isset($_SESSION['confirmation'])) {
                        echo $_SESSION['confirmation'];
                        header('Refresh: 1; admin.php?unset=');
                    } 
                    if (isset($_SESSION['confirmationCAT'])) {
                        echo $_SESSION['confirmationCAT'];
                        header('Refresh: 1; product.php?unset=');
                    }
                    if (!$user->getAdmin()) { 
                        header('location: index.php');
                    }
                    ?> </h4>      
    </div>
        <h2 class="mt-4 text-center">Création fiche produit:
            <a  class="btn btn-secondary float-right mr-3" 
                href="admin.php" 
                role="button">
                Retour
            </a>
        </h2>
        <div class="row">
        <div class="col-lg-1"></div>
        <form   class=" p-4 col-sm-8 col-lg-6 d-flex justify-content-start" 
                action="router.gil.php" 
                method="post" 
                enctype="multipart/form-data"
        >
            <input type="hidden" name="MAX_FILE_SIZE" value="10000" >
            Select Image : <input type="file" name="imgPolo" >
            <div class="text-danger">
              <?php if (isset($_SESSION['errorConfirm'])) {
                echo $_SESSION['errorConfirm'];
              } ?>
            </div>        
            <input type="submit" name="control_img" value="AFFICHER" class="btn btn-primary" >
        </form>
        <h4> <?php
                    if (isset($_SESSION['error_product'])) {
                        echo $_SESSION['error_product'];
                    }
                ?> 
        </h4>
    </div>
  
   <div class="row"> <div class="col-lg-1"></div>   
        <form   class=" pr-5 pl-5 pt-3 pb-3 col-sm-10 col-lg-6" 
                action="router.gil.php" 
                method="post">
            <div class="row d-flex justify-content-center">
                <div class=" ">

                    <label for="nameProduct">Name Product</label>
                    <input value = "<?php if(isset($_SESSION['nameProd'])) {
                        echo $_SESSION['nameProd']; } 
                    ?>"
                    name="nameProduct" 
                    type="text" 
                    class="form-control mb-3" 
                    placeholder="Name">

                    <label for="product_ID">Product Reference</label>
                    <input value = "<?php if(isset($_SESSION['refProd'])) {
                        echo $_SESSION['refProd'];} ?>"
                    name="product_ID" 
                    type="text" 
                    class="form-control mb-3" 
                    placeholder="Product Reference">

                    <label for="priceProduct">Price</label>
                    <input value = "<?php if(isset($_SESSION['priceProd'])){
                        echo $_SESSION['priceProd'];} ?>"
                    name="priceProduct" 
                    type="text" 
                    class="form-control mb-3" 
                    placeholder="0.0">

                    <?php $color = $bdd->selectValueBdd('*','categories');
                        $genre = $bdd->selectValueBdd('*','categories');
                        $size = $bdd->selectValueBdd('*','categories');
                    ?>    
                    <label for="color_id">Category Color</label>
                    <input  value = "<?php if(isset($_SESSION['color_id'])){
                        echo $_SESSION['color_id'];} ?>"
                    list="color_id" 
                    required class="custom-select" 
                    name="color_id"  
                    autocomplete="off">
                    <datalist id="color_id">
                    
                    <?php while($dataColor = $color->fetch()){
                        if($dataColor['parent_id'] == 32){ ?>
                    <option value="<?php echo $dataColor['id']?>"> 
                        <?php echo $dataColor['name'] ?> 
                    </option>
                    <?php }}?>
                    </datalist>
                    
                    <label for="genre_id">Category Genre</label>
                    <input value = "<?php if(isset($_SESSION['genre_id'])){
                        echo $_SESSION['genre_id'];} ?>"
                    list="genre_id" 
                    required class="custom-select" 
                    name="genre_id"  
                    autocomplete="off">
                    <datalist id="genre_id">
                    
                    <?php while($data = $genre->fetch()){
                        if($data['parent_id'] == 33){ ?>
                    <option value="<?php echo $data['id']?>"> 
                        <?php echo $data['name'] ?> 
                    </option>
                    <?php }} ?>
                    </datalist>

                    <label for="size_id">Category Size</label>
                    <input value = "<?php if(isset($_SESSION['size_id'])){
                        echo $_SESSION['size_id'];} ?>"
                     list="size_id" 
                     required class="custom-select" 
                     name="size_id"  
                     autocomplete="off">
                    <datalist id="size_id">
                    
                    <?php while($data= $size->fetch()){
                        if($data['parent_id'] == 34){ ?>
                    <option  value="<?php echo $data['id']?>"> 
                        <?php echo $data['name'] ?> 
                    </option>
                    <?php }} ?>
                    </datalist>
                    
                    <label for="description_short">Short Description</label>
                    <input value = "<?php if(isset($_SESSION['description_short'])){
                        echo $_SESSION['description_short'];} ?>"
                     name="description_short" 
                     type="text" 
                     class="form-control mb-3" 
                     placeholder="Short description">

                    <label for="description_long">Long Description</label>
                    <textarea
                     name="description_long" 
                     class="form-control mb-3" 
                     id="validationTextarea" 
                     placeholder="Long Description">
                     <?php if(isset($_SESSION['description_long'])){
                         echo $_SESSION['description_long'];} ?>
                    </textarea>
                    
                    <label for="discountb">Discount</label>
                    <input value = "<?php if(isset($_SESSION['discountb'])){
                        echo $_SESSION['discountb'];} ?>"
                     name="discountb" 
                     type="text" 
                     class="form-control mb-3" 
                     placeholder="0.0">

                    <label for="quantity">Stock Quantity</label>
                    <input value = "<?php if(isset($_SESSION['quantity'])){
                        echo $_SESSION['quantity'];} ?>"
                     name="quantity" 
                     type="text" 
                     class="form-control mb-3" 
                     placeholder="0.0">
                    
                    <input
                     name= "img_adresse" 
                     value = "img/<?php if(isset($_SESSION['imgProduct'])){ 
                         echo $_SESSION['imgProduct']; } ?>"
                     type="text" 
                     class="form-control mb-4" 
                     readonly
                     >

                    <input  name = "create_product" 
                            type="submit" 
                            value="SOUMETTRE" 
                            class="btn btn-primary btn-lg btn-block"> 
             </div> 
         </div>
     </form>
  <div>

        </div class="">
          <div class="row col-lg-4">
            <div class=" col-lg-12 d-flex align-items-center justify-content-center mt-3 ">
                <?php if (isset($_SESSION['imgProduct'])) { ?>
                    <img    class ="border"
                            src="img/<?php echo $_SESSION['imgProduct']; ?>" 
                            class="figure-img rounded border h-100 mt-5" 
                            alt="...">
                <?php } ?>
            
       
                <div class="text-danger">
                    <?php if (isset($_SESSION['errorCAT'])) {
                        echo $_SESSION['errorCAT'];
                    } ?>
                </div>
            </div>

            <div class=" col-lg-12 d-flex justify-content-center mt-3">
                <div> <h3>Création des catégories</h3></br>
                <label>create color</label>
                <form action="router.gil.php" method="post" class="mb-3">            
                <input name="color" type="text" required>
                <input  name="create_category" 
                        type="submit" 
                        value = "CREATE" 
                        class="btn btn-primary">
                </form>
                <label>create size</label>
                <form action="router.gil.php" method="post" class="mb-3">            
                <input name="size" type="text" required>
                <input  name="create_category" 
                        type="submit" 
                        value = "CREATE" 
                        class="btn btn-primary">
                </form>
                <label>create genre</label>
                <form action="router.gil.php" method="post" class="mb-3">            
                <input name="genre" type="text" required>
                <input  name="create_category" 
                        type="submit" 
                        value = "CREATE" 
                        class="btn btn-primary">
                </form>
                </div>
            </div>
          </div>
        </div>        


    </div>
<div class="container-fluid ">
<?php include_once('footer.php')?> 
</div>
</body>

</html>