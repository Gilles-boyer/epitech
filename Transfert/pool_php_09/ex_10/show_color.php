<?php
session_start();

//test si le cookie à une couleur 
if(isset($_COOKIE['background_color']))
{
    $color = $_COOKIE['background_color'];

    if(empty($color))
    {
        $_SESSION['error'] = "vous n'avez pas saisi une couleur."; //error
        header('Location:set_color.php');
    }
    elseif($color == "white")
    {
        ?> <style> body { background-color: white; } </style> <?php // style white
    }
    elseif($color == "black")
    {
        ?> <style> body { background-color: black; } </style> <?php // style black
    }
    elseif($color == "red")
    {
        ?> <style> body { background-color: red; } </style> <?php // style red
    }
    elseif($color == "blue")
    {
        ?> <style> body { background-color: blue; } </style> <?php // style blue
    }
    else
    {
        $_SESSION['error'] = "la couleur choisit n'est pas autorisée.";//error
        header('Location:set_color.php');
    }
}
else
{
    
    $_SESSION['error'] = "merci de saisir une couleur."; //error
    header('Location:set_color.php');

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Background</title>

</head>

<body>
    
</body>


</html>