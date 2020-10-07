<?php
session_start(); 
include_once("class/Control.class.php");
$bdd =  new Bdd;
?>
<!--*****************************************************************************
 * Created by Gil et cedric  CUSTOMER PRODUCT - Poject : my_shop 26/06/2020  
 *  Bootstrap used 
 *  Only use by Users
 *  method="POST" 
 *****************************************************************************-->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  rel="stylesheet" 
         href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
         integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
         crossorigin="anonymous">
  <link rel="stylesheet" href="stylecustomerproduct.css">
  <title>Customer_product</title>
</head>

<body>
<?php include_once("header.php");
  
 if(isset($_GET['id_prod'])) { 
   $id_prod = $_GET['id_prod'];
   if(Control::fieldExist('products','id','id','id',$id_prod,$bdd)) {
      $req = $bdd->selectValueBddWhereMulti('*','products','id', $id_prod);
      $data = $req->fetch();
?>
<div class="row mt-5 mb-5 justify-content-center">
        
       
        <img src="<?php echo $data['img_adresse']; ?>" 
             class="col-lg-4 pl-5 pr-5 mb-4 mr-4 ml-4 img-zoom" 
             alt="polo" 
             srcset="">
                
        
        <div class="col-lg-5 pl-5 pr-5 ">
            <p class="mt-3 text-secondary"><?php echo $data['product_ID']; ?></p>
            <h2 class="mt-3"><?php echo  $data['name']; ?> </h2>
            <small class="text-muted ">&#9733; &#9733; &#9733; &#9733; &#9734; 
               <a href="#" class="text-dark  ">(commentaire)</a> </small>
              <p class="mt-1"><?php echo $data['description_short']; ?> </p>
              <p class="mt-1"> 
            <?php
            if($data['discountb']>0){
               $discount = ($data['price'] * $data['discountb'])/100;
               $price = $data['price'] - $discount;
               echo number_format($price,2)."€ <em class='text-danger'> Promo </em>";
            } else {
               echo $data['price']."€";
            } 
            ?>
            </p>
              <p class="mt-1"> 
         <?php $color = $bdd->selectValueBddWhere( 'name',
                                                   'categories',
                                                   'name', 
                                                   'id', 
                                                   $data['color_id']);
              echo $color; ?>
              </p>
            <p class="mt-2 text-monospace text-left "> 
                  <a href="" 
                     class="mr-4 text-dark text-decoration-none font-weight-bolder">XS</a> 
                  <a href="" 
                     class="mr-4 text-dark text-decoration-none font-weight-bolder">S</a> 
                  <a href="" 
                     class="mr-4 text-dark text-decoration-none font-weight-bolder">M</a> 
                  <a href="" 
                     class="mr-4 text-dark text-decoration-none font-weight-bolder">L</a>
                  <a href="" 
                     class="mr-4 text-dark text-decoration-none font-weight-bolder">XL</a>
                  <a href="" 
                     class="mr-4 text-dark text-decoration-none font-weight-bolder">XXL</a>
                  <a href="" class="text-secondary "> <small> Guide des tailles</small></a>
            </p>
            <button type="button" 
                    class="btn btn-block btn-outline-primary mb-3 mt-3 ">
                    Ajouter au panier
            </button>
            <p class="border-top border-bottom pt-3 pb-3 mt-4 text-justify">
                 <strong> Présentation du produit:</strong></br>
                     <?php echo $data['description_long']; ?></p>
                 <p class="text-center"> 
                    <img class="mr-3"
                         width="30px" 
                         src="https://img.icons8.com/carbon-copy/100/000000/in-transit.png"/> 
                     <small> Livraison standard - Offerte à partir de 80€</small></p>
        </div>
</div>
<?php
  } else {
   header('location: index.php');
    }
  } else {
   header('location: index.php');
    }  ?>

  <?php include_once("footer.php")?>
</body>

</html>