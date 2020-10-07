<?php
session_start();

if(isset($_POST['submit'])) //test la commande submit pour le formulaire
{
    $choice = htmlspecialchars($_POST['background']); 
    $choice = strtolower($choice); //modif le format de saisie

    setcookie("background_color",$choice, time() +3600); //cookie
    unset($_SESSION['error']);
    header('Location:show_color.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Choice color</title>

</head>

<body>

<?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; } //print the error code ?> 

<form action="" method="POST">

<label for="background">Merci de saisir une couleur :</label> </br>
<input type="text" name="background"  required> </br>

<input type="submit" name = "submit" value="Submit">

</form>

</body>

</html>