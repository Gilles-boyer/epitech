<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>
<body>
    
<div class="container-fluid ">

<?php include_once('header.php')?> 

<h2 class="mt-4  text-center">Fiche produit:</h2>
<form class="border border-light p-5 col-sm-8 col-lg-12" action="router.gil.php" method="POST">
<div class="row d-flex justify-content-center">
    <div class=" mr-5 col-sm-6">
        <label for="exampleInputEmail1">Name product</label>    
        <input type="text" class="form-control mb-4" placeholder="Name">

        <label for="exampleInputEmail1">Short description</label>
        <input type="text" class="form-control mb-4" placeholder="Description">

        <label for="exampleFormControlSelect2">Long description</label>
        <textarea class="form-control mb-4" id="validationTextarea" placeholder="Long Description" required></textarea>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label " for="customFile">Choose file</label>
        </div>
   </div>

        <img src="polo_homme_001.jpg" class="figure-img img-fluid rounded border" alt="...">

</div>
</form>



<?php include_once('footer.php')?>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html> 